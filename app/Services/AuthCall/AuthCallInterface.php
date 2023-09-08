<?php

namespace App\Services\AuthCall;

interface AuthCallInterface 
{
    /**
     * Установка ключа API
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey);

    /**
     * Установка номера телефона на который будет происходить отправка
     *
     * @param integer $phoneNumber
     * @return void
     */
    public function setNumber(int $phoneNumber);

    /**
     * Совершение звонка
     *
     * @return boolean
     */
    public function call(): bool;

    /**
     * Получение кода 4-х последних цифр номера
     *
     * @return string
     */
    public function getCode(): string;
}