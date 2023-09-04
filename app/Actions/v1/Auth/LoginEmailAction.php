<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Models\v1\User;

class LoginEmailAction implements RegisterActionsContract
{

    public function __invoke(array $data): User
    {
        return User::createByEmail($data);
    }
}