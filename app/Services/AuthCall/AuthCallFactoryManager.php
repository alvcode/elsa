<?php

namespace App\Services\AuthCall;

use App\Models\v1\MainConfig;

class AuthCallFactoryManager
{
    /**
     * Возвращает фабрику на основе конфигурации приложения
     *
     * @return AuthCallFactoryInterface
     */
    public function getAuthCallFactory(): AuthCallFactoryInterface
    {
        $strategy = $this->getStrategy();

        if($strategy === 'SmsRu'){
            return new SmsRuCallFactory();
        }
    }

    /**
     * Метод в котором описываем логику выбора. Может изменяться
     *
     * @return string
     */
    private function getStrategy()
    {
        return MainConfig::getByName('auth_call_service');
    }
}