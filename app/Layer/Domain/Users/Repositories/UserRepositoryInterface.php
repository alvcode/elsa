<?php

namespace App\Layer\Domain\Users\Repositories;

use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;

interface UserRepositoryInterface
{
    public function insertByEmail(CreateUserByEmailPersistence $userPersistence): void;
}