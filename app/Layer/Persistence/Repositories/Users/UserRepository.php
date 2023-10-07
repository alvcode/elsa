<?php

namespace App\Layer\Persistence\Repositories\Users;

use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;
use App\Models\v1\User;

class UserRepository implements UserRepositoryInterface
{
    public function insertByEmail(CreateUserByEmailPersistence $userPersistence): void 
    {
        User::query()->create(
            [
                'email' => $userPersistence->getEmail(),
                'password' => $userPersistence->getPassword(),
                'validate_email_code' => $userPersistence->getValidateEmailCode()
            ]
        );
    }
}