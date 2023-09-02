<?php

namespace App\Actions\Auth;

use App\Models\User;

class RegisterEmailAction
{

    public function __invoke(array $data): User
    {
        return User::create();
    }
}