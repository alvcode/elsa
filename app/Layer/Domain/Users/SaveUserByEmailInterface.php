<?php

namespace App\Layer\Domain\Users;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Persistence\Model\Users\CreateUserByEmailModel;
use App\Layer\Persistence\Repositories\Users\UserRepository;

interface SaveUserByEmailInterface
{
    public function __construct(
        CreateUserByEmailModel $userModel, 
        UserRepository $userRepository
    );

    public function save(CreateUserByEmailEntity $userEntity): void;
}