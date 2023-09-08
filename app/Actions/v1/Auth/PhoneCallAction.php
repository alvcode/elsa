<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\PhoneCallActionsContract;
use App\Models\v1\ConfirmationCode;
use App\Models\v1\User;
use App\Services\AuthCall\AuthCallFactoryManager;

class PhoneCallAction implements PhoneCallActionsContract
{

    public function __invoke(array $data): bool
    {
        $user = User::query()->where(['phone_number' => $data['phone_number']])->first();
        if(!$user){
            $user = User::createByPhoneNumber((int)$data['phone_number']);
        }
        $authCallManager = new AuthCallFactoryManager();
        $authCallFactory = $authCallManager->getAuthCallFactory();
        $authCall = $authCallFactory->createAuthCall();
        $authCall->setNumber((int)$data['phone_number']);
        $authCall->call();

        // Установим код последних 4-х в ConfirmationCode
        ConfirmationCode::setCode($user->id, 'auth_call', 10, $authCall->getCode());
        
        return true;
    }
}