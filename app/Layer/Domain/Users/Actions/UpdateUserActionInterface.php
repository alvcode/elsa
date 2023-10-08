<?php

namespace App\Layer\Domain\Users\Actions;

use App\Layer\Domain\Users\Entity\UserEntity;
use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Model\Users\UserModel;

interface UpdateUserActionInterface 
{
    public function __construct(UserModel $userModel, UserRepositoryInterface $userRepository);

    public function action(UserEntity $userEntity): UserEntity;
}