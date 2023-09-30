<?php

namespace App\Models\v1;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Exceptions\UnprocessableHttpException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int $id
 * @property int $phone_number
 * @property string $email
 * @property int $validate_email_code
 * @property string $email_verified_at
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone_number',
        'validate_email_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'validate_email_code'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Регистрация юзера по e-mail
     *
     * @param array $params - [email, password]
     * @return self
     */
    public static function createByEmail(array $params): self
    {
        return self::query()->create(
            [
                'email' => $params['email'],
                'password' => $params['password'],
                'validate_email_code' => rand(11111, 32767)
            ]
        );
    }


    public static function createByPhoneNumber(int $phone_number): self 
    {
        return self::query()->create(
            [
                'phone_number' => $phone_number,
            ]
        );
    }


    /**
     * Подтверждение email
     *
     * @param integer $code
     * @return self
     */
    public function confirmEmail(int $code): self 
    {
        if((int)$this->validate_email_code === $code){
            $carbon = Carbon::now();
            $this->email_verified_at = $carbon->format('Y-m-d H:i:s');
            $this->save();
            return $this;
        }

        throw new UnprocessableHttpException(__('auth.invalid_code'));
    }


    public static function getByEmailAndPassword(string $email, string $password): self
    {
        $user = self::query()->where([
            'email' => $email
        ])->first();

        if(!$user){
            throw new UnprocessableHttpException(__('auth.failed'));
        }

        if(!Hash::check($password, $user->password)){
            throw new UnprocessableHttpException(__('auth.password'));
        }

        return $user;
    }

    /**
     * Сброс пароля
     *
     * @param string $password
     * @return self
     */
    public function resetPassword(string $password): self 
    {
        $this->password = $password;
        $this->save();

        return $this;
    }


    public function isEmailAccount(): bool 
    {
        if($this->email !== null && $this->phone_number === null){
            return true;
        }
        return false;
    }

    

    public function isConfirmEmail(): bool 
    {
        if($this->email_verified_at){
            return true;
        }
        return false;
    }
}
