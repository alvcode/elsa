<?php

namespace App\Layer\Domain\Users;

use App\Layer\Domain\Users\Dto\UserDto;
use App\Layer\Domain\Users\Entity\UserEntity;

class UserBuilder 
{
    public function make(UserDto $userDto): UserEntity 
    {
        $userEntity = new UserEntity();
        $userEntity->setId($userDto->getId());
        $userEntity->setPhoneNumber($userDto->getPhoneNumber());
        $userEntity->setEmail($userDto->getEmail());
        $userEntity->setValidateEmailCode($userDto->getValidateEmailCode());
        $userEntity->setValidateVerifiedAt($userDto->getValidateVerifiedAt());
        $userEntity->setCreatedAt($userDto->getCreatedAt());
        $userEntity->setUpdatedAt($userDto->getUpdatedAt());
        
        return $userEntity;
    }
}