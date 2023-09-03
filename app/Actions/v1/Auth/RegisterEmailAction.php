<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Models\User;

class RegisterEmailAction implements RegisterActionsContract
{

    public function __invoke(array $data): User
    {
        return User::create();
    }
}