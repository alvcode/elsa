<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\ConfirmActionsContract;
use App\Models\v1\User;

class ConfirmEmailAction implements ConfirmActionsContract
{

    public function __invoke(array $data): User
    {
        $user = User::query()->where(['email' => $data['email']])
            ->firstOrFail();

        return $user->confirmEmail((int)$data['code']);
    }
}