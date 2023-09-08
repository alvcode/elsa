<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\LoginPhoneActionsContract;
use App\Exceptions\UnprocessableHttpException;
use App\Models\v1\ConfirmationCode;
use App\Models\v1\User;
use App\Models\v1\UserToken;

class LoginPhoneAction implements LoginPhoneActionsContract
{
    public function __invoke(array $data, string $deviceId): UserToken
    {
        $user = User::query()->where(['phone_number' => $data['phone_number']])->first();

        if(!$user){
            throw new UnprocessableHttpException(__('auth.user_not_found'));
        }

        $code = ConfirmationCode::checkAndSetUsed($user->id, 'auth_call', $data['code']);

        if(!$code){
            throw new UnprocessableHttpException(__('auth.invalid_code'));
        }
        
        $userToken = new UserToken();
        return $userToken->createPair($user, $deviceId);
    }
}