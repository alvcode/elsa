<?php

namespace App\Layer\Persistence\Model\Users;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;

class CreateUserByEmailModel
{
    public function fromDomain(CreateUserByEmailEntity $user): CreateUserByEmailPersistence
    {
        return new CreateUserByEmailPersistence(
            $user->getEmail(),
            $user->getPassword(),
            $user->getValidateEmailCode()
        );
    }

    public function toDomain(CreateUserByEmailPersistence $userPersistence): CreateUserByEmailEntity
    {
        return new CreateUserByEmailEntity(
            $userPersistence->getEmail(),
            $userPersistence->getPassword(),
            $userPersistence->getValidateEmailCode()
        );
    }
}