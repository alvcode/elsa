<?php

namespace App\Layer\Domain\Users;

use App\Layer\Domain\Users\Dto\CreateUserByEmailDto;
use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;

class CreateUserByEmailBuilder
{
    public function make(CreateUserByEmailDto $createUserByEmailDto): CreateUserByEmailEntity
    {
        return new CreateUserByEmailEntity(
            $createUserByEmailDto->getEmail(),
            $createUserByEmailDto->getPassword(),
            $createUserByEmailDto->getValidateEmailCode()
        );
    }
}