<?php

namespace App\Layer\Domain\Users\Repositories;

use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;
use App\Layer\Persistence\Entity\Users\UserPersistence;

interface UserRepositoryInterface
{
    public function insertByEmail(CreateUserByEmailPersistence $userPersistence): void;

    public function getUserByEmail(string $email): UserPersistence;

    public function updateUser(UserPersistence $userPersistence): UserPersistence;

    public function getUserById(UserPersistence $userPersistence): UserPersistence;
}