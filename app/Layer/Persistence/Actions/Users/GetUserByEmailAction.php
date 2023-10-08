<?php

namespace App\Layer\Persistence\Actions\Users;

use App\Layer\Domain\Users\Actions\GetUserByEmailActionInterface;
use App\Layer\Domain\Users\Entity\UserEntity;
use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Model\Users\UserModel;

class GetUserByEmailAction implements GetUserByEmailActionInterface
{
    private UserModel $userModel;
    private UserRepositoryInterface $userRepository;

    public function __construct(UserModel $userModel, UserRepositoryInterface $userRepository)
    {
        $this->userModel = $userModel;
        $this->userRepository = $userRepository;
    }
    
    public function action(string $email): UserEntity
    {
        return $this->userModel->toDomain(
            $this->userRepository->getUserByEmail($email)
        );
    }
}