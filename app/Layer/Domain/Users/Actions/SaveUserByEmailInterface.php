<?php

namespace App\Layer\Domain\Users\Actions;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Model\Users\CreateUserByEmailModel;

interface SaveUserByEmailInterface
{
    public function __construct(
        CreateUserByEmailModel $userModel, 
        UserRepositoryInterface $userRepository
    );

    public function save(CreateUserByEmailEntity $userEntity): void;
}