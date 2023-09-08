<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int $user_id
 * @property string $token
 * @property string $refresh_token
 * @property int $expired_to
 */
class UserToken extends Model
{
    use HasFactory;

    const TOKEN_EXPIRED_MINUTES = 360; // 360 - 6 часов

    protected $fillable = [
        'user_id', 'token', 'refresh_token', 'expired_to', 'device_id'
    ];

    public $timestamps = false;
    protected $primaryKey = 'token';
    protected $keyType = 'string';

    /**
     * Создает пару токен + рефреш токен
     *
     * @param User $user
     * @param string $deviceId
     * @return self
     */
    public function createPair(User $user, string $deviceId): self 
    {
        // удалим старые пары
        self::query()->where(['user_id' => $user->id, 'device_id' => $deviceId])->delete();

        // Сгенерируем новый
        $token = self::generateToken();
        $refreshToken = self::generateToken();

        $carbon = Carbon::now();
        $carbon->addMinutes(self::TOKEN_EXPIRED_MINUTES);

        return self::query()->create([
            'user_id' => $user->id,
            'token' => $token,
            'refresh_token' => $refreshToken,
            'expired_to' => $carbon->getTimestamp(),
            'device_id' => $deviceId
        ]);
    }


    /**
     * Возвращает пару
     *
     * @param string $token
     * @param string $refresh_token
     * @param string $deviceId
     * @return self|null
     */
    public static function getPair(string $token, string $refresh_token, string $deviceId): self|null
    {
        return self::query()->where([
            'token' => $token,
            'refresh_token' => $refresh_token,
            'device_id' => $deviceId
        ])->first();
    }


    /**
     * Очищает все токены пользователя
     * Используем, например, при сбросе пароля
     *
     * @param integer $user_id
     * @return boolean
     */
    public static function flushTokensByUser(int $user_id): bool 
    {
        self::query()->where(['user_id' => $user_id])->delete();
        return true;
    }


    /**
     * Генерирует токен
     *
     * @return void
     */
    public static function generateToken()
    {
        $plainTextToken = sprintf(
            '%s%s%s',
            config('sanctum.token_prefix', ''),
            $tokenEntropy = Str::random(40),
            hash('CRC32', $tokenEntropy)
        );

       return hash('sha256', $plainTextToken);
    }
}
