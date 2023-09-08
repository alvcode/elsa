<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property string $action
 * @property string $valid_to
 * @property bool $is_used
 */
class ConfirmationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'code', 'action', 'valid_to', 'is_used'
    ];

    public $timestamps = false;

    const ACTIONS = [
        'forgot_email' => 'Восстановление e-mail',
        'auth_call' => 'Код входа по звонку'
    ];


    /**
     * Создает код на подтверждение
     * @param $userId - ID юзера
     * @param $action - self::ACTIONS
     * @param $lifeTime - Время жизни в минутах
     * @param $minVal - Минимальное значение кода
     * @param $maxVal - Максимальное значение кода
     * @return ConfirmationCodes
     * @throws BadRequestHttpException
     */
    public static function createCode(
        int $userId, 
        string $action, 
        int $lifeTime, 
        int $minVal, 
        int $maxVal
    ): self
    {
        if(!isset(self::ACTIONS[$action])){
            throw new \Exception('Передан неизвестный action');
        }

        $carbon = Carbon::now();
        $carbon->addMinutes($lifeTime);

        return self::create([
            'user_id' => $userId,
            'action' => $action,
            'valid_to' => $carbon->format('Y-m-d H:i:s'),
            'is_used' => false,
            'code' => mt_rand($minVal, $maxVal)
        ]);
    }

    /**
     * Устанавливает уже существующий код на подтверждение
     *
     * @param integer $userId - ID юзера
     * @param string $action - self::ACTIONS
     * @param integer $lifeTime - Время жизни в минутах
     * @param string $code
     * @return void
     */
    public static function setCode(
        int $userId,
        string $action,
        int $lifeTime,
        string $code
    )
    {
        if(!isset(self::ACTIONS[$action])){
            throw new \Exception('Передан неизвестный action');
        }

        $carbon = Carbon::now();
        $carbon->addMinutes($lifeTime);

        return self::create([
            'user_id' => $userId,
            'action' => $action,
            'valid_to' => $carbon->format('Y-m-d H:i:s'),
            'is_used' => false,
            'code' => $code
        ]);
    }


    /**
     * Проверяет наличие и отмечает, что код был использован
     *
     * @param integer $userId
     * @param string $action
     * @param string $code
     * @return boolean
     */
    public static function checkAndSetUsed(
        int $userId, 
        string $action, 
        string $code
    ): bool
    {
        $carbon = Carbon::now();

        $model = self::query()->where([
            'user_id' => $userId,
            'action' => $action,
            'code' => $code,
            'is_used' => false
        ])
        ->where('valid_to', '>', $carbon->format('Y-m-d H:i:s'))
        ->first();

        if(!$model){
            return false;
        }
        $model->is_used = true;
        $model->save();

        return true;
    }
}
