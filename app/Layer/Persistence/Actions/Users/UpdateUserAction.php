<?php

namespace App\Layer\Persistence\Actions\Users;

use App\Layer\Domain\Users\Actions\UpdateUserActionInterface;
use App\Layer\Domain\Users\Entity\UserEntity;
use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Model\Users\UserModel;

class UpdateUserAction implements UpdateUserActionInterface
{
    private UserModel $userModel;
    private UserRepositoryInterface $userRepository;

    public function __construct(UserModel $userModel, UserRepositoryInterface $userRepository)
    {
        $this->userModel = $userModel;
        $this->userRepository = $userRepository;
    }

    public function action(UserEntity $userEntity): UserEntity
    {
        return $this->userModel->toDomain(
            $this->userRepository->updateUser(
                $this->userModel->fromDomain($userEntity)
            )
        );
    }
}