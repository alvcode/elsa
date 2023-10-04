<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\ResetActionsContract;
use App\Exceptions\UnprocessableHttpException;
use App\Models\v1\ConfirmationCode;
use App\Models\v1\User;
use App\Models\v1\UserToken;

class ResetPasswordAction implements ResetActionsContract
{
    public function __invoke(array $data): bool
    {
        $user = User::query()->where(['email' => $data['email']])->first();

        if(!$user){
            throw new UnprocessableHttpException(__('auth.user_not_found'));
        }

        $code = ConfirmationCode::checkAndSetUsed($user->id, 'forgot_email', $data['code']);

        if(!$code){
            throw new UnprocessableHttpException(__('auth.invalid_reset_code'));
        }

        $user->resetPassword($data['password']);
        UserToken::flushTokensByUser($user->id);

        return true;
    }
}