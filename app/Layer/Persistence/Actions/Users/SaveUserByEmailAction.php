<?php

namespace App\Layer\Persistence\Actions\Users;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Domain\Users\SaveUserByEmailInterface;
use App\Layer\Persistence\Model\Users\CreateUserByEmailModel;
use App\Layer\Persistence\Repositories\Users\UserRepository;

class SaveUserByEmailAction implements SaveUserByEmailInterface
{
    private CreateUserByEmailModel $userModel;
    private UserRepository $userRepository;

    public function __construct(
        CreateUserByEmailModel $userModel, 
        UserRepository $userRepository
    )
    {
        $this->userModel = $userModel;
        $this->userRepository = $userRepository;
    }

    public function save(CreateUserByEmailEntity $user): void
    {
        $this->userRepository->insertByEmail(
            $this->userModel->fromDomain($user)
        );
    }
}