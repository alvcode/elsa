<?php

namespace App\Domain;

use App\Domain\Entity\CreateUserByEmailEntity;
use App\Domain\Users\Dto\CreateUserByEmailDto;

class CreateUserBuilder
{
    public function make(CreateUserByEmailDto $createUserByEmailDto): CreateUserByEmailEntity
    {
        return new CreateUserByEmailEntity(
            null,
            $createUserByEmailDto->getEmail(),
            $createUserByEmailDto->getPassword()
        );
    }
}