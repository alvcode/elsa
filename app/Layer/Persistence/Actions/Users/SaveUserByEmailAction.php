<?php

namespace App\Layer\Persistence\Actions\Users;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Domain\Users\SaveUserByEmailInterface;
use App\Layer\Persistence\Model\Users\CreateUserByEmailModel;

class SaveUserByEmailAction implements SaveUserByEmailInterface
{
    private CreateUserByEmailModel $userModel;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        CreateUserByEmailModel $userModel, 
        UserRepositoryInterface $userRepository
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