<?php

namespace App\Layer\Persistence\Repositories\Users;

use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;
use App\Models\v1\User;

class UserRepository
{
    public function insertByEmail(CreateUserByEmailPersistence $userPersistence): void 
    {
        User::query()->create(
            [
                'email' => $userPersistence->getEmail(),
                'password' => $userPersistence->getPassword(),
                'validate_email_code' => rand(11111, 32767)
            ]
        );
    }
}