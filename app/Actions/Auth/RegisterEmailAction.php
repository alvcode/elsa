<?php

namespace App\Actions\Auth;

use App\Contracts\Auth\RegisterActionsContract;
use App\Models\User;

class RegisterEmailAction implements RegisterActionsContract
{

    public function __invoke(array $data): User
    {
        return User::create();
    }
}