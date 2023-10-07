<?php

namespace App\Layer\Domain\Users\Repositories;

use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;

interface UserEmailRepositoryInterface
{
    public function send(CreateUserByEmailPersistence $userPersistence): void;
}