<?php

namespace App\Layer\Persistence\Model\Users;

use App\Layer\Domain\Users\Entity\UserEntity;
use App\Layer\Persistence\Entity\Users\UserPersistence;

class UserModel
{
    public function fromDomain(UserEntity $user): UserPersistence
    {
        $persistence = new UserPersistence();
        $persistence->setId($user->getId());
        $persistence->setPhoneNumber($user->getPhoneNumber());
        $persistence->setEmail($user->getEmail());
        $persistence->setValidateEmailCode($user->getValidateEmailCode());
        $persistence->setEmailVerifiedAt($user->getEmailVerifiedAt());
        $persistence->setCreatedAt($user->getCreatedAt());
        $persistence->setUpdatedAt($user->getUpdatedAt());
        return $persistence;
    }

    public function toDomain(UserPersistence $userPersistence): UserEntity
    {
        $entity = new UserEntity();
        $entity->setId($userPersistence->getId());
        $entity->setPhoneNumber($userPersistence->getPhoneNumber());
        $entity->setEmail($userPersistence->getEmail());
        $entity->setValidateEmailCode($userPersistence->getValidateEmailCode());
        $entity->setEmailVerifiedAt($userPersistence->getEmailVerifiedAt());
        $entity->setCreatedAt($userPersistence->getCreatedAt());
        $entity->setUpdatedAt($userPersistence->getUpdatedAt());
        return $entity;
    }
}