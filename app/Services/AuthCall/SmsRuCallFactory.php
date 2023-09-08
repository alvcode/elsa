<?php

namespace App\Services\AuthCall;

class SmsRuCallFactory implements AuthCallFactoryInterface
{
    public function createAuthCall(): AuthCallInterface
    {
        return new SmsRuCallService(config('services.smsru.api_key'));
    }
}