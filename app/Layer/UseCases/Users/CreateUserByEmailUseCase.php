<?php

namespace App\Layer\UseCases\Users;

use App\Layer\Domain\Users\CreateUserByEmailBuilder;
use App\Layer\Domain\Users\Dto\CreateUserByEmailDto;
use App\Layer\Domain\Users\SaveUserByEmailInterface;

class CreateUserByEmailUseCase
{
    private CreateUserByEmailBuilder $userBuilder;
    private SaveUserByEmailInterface $saveUser;

    public function __construct(CreateUserByEmailBuilder $userBuilder, SaveUserByEmailInterface $saveUser)
    {
        $this->userBuilder = $userBuilder;
        $this->saveUser = $saveUser;
    }

    public function create(CreateUserByEmailDto $createUserDto): void
    {
        $user = $this->userBuilder->make($createUserDto);

        $this->saveUser->save($user);
    }
}