<?php

namespace App\Layer\Domain\Users\Actions;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Domain\Users\Repositories\UserEmailRepositoryInterface;
use App\Layer\Persistence\Model\Users\CreateUserByEmailModel;

interface SendConfirmEmailInterface
{
    public function __construct(
        CreateUserByEmailModel $userModel, 
        UserEmailRepositoryInterface $userRepository
    );

    public function send(CreateUserByEmailEntity $userEntity): void;
}