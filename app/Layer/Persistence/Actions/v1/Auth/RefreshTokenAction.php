<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\RefreshActionsContract;
use App\Exceptions\UnprocessableHttpException;
use App\Models\v1\User;
use App\Models\v1\UserToken;

class RefreshTokenAction implements RefreshActionsContract
{
    public function __invoke(array $data, string $deviceId): UserToken
    {
        $oldToken = UserToken::getPair($data['token'], $data['refresh_token'], $deviceId);
        if(!$oldToken){
            throw new UnprocessableHttpException(__('auth.refresh_not_found'));
        }

        $user = User::query()->where(['id' => $oldToken->user_id])->first();

        if(!$user){
            throw new UnprocessableHttpException(__('auth.user_not_found'));
        }

        $userToken = new UserToken();
        return $userToken->createPair($user, $deviceId);
    }
}