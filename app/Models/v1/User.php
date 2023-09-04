<?php

namespace App\Models\v1;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property int $phone_number
 * @property string $email
 * @property int $validate_email_code
 * @property string $email_verified_at
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property bool $is_deleted
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'is_deleted'
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
                'is_deleted' => false, 
                'validate_email_code' => rand(11111, 32767)
            ]
        );
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
