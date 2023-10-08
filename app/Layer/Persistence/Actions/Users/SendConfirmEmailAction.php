<?php

namespace App\Layer\Persistence\Actions\Users;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;
use App\Layer\Domain\Users\Repositories\UserEmailRepositoryInterface;
use App\Layer\Domain\Users\Actions\SendConfirmEmailInterface;
use App\Layer\Persistence\Model\Users\CreateUserByEmailModel;

class SendConfirmEmailAction implements SendConfirmEmailInterface
{
    private CreateUserByEmailModel $userModel;
    private UserEmailRepositoryInterface $userEmailRepository;

    public function __construct(
        CreateUserByEmailModel $userModel, 
        UserEmailRepositoryInterface $userEmailRepository
    )
    {
        $this->userModel = $userModel;
        $this->userEmailRepository = $userEmailRepository;
    }

    public function send(CreateUserByEmailEntity $user): void
    {
        $this->userEmailRepository->send(
            $this->userModel->fromDomain($user)
        );
    }
}