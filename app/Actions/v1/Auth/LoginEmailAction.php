<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\LoginActionsContract;
use App\Exceptions\UnprocessableHttpException;
use App\Models\v1\User;
use App\Models\v1\UserToken;

class LoginEmailAction implements LoginActionsContract
{
    public function __invoke(array $data, string $deviceId): UserToken
    {
        $user = User::getByEmailAndPassword($data['email'], $data['password']);

        if($user->isEmailAccount() && !$user->isConfirmEmail()){
            throw new UnprocessableHttpException(__('auth.email_not_confirmed'), code: -2);
        }
        
        $userToken = new UserToken();
        return $userToken->createPair($user, $deviceId);
    }
}