<?php

namespace App\UseCases\Users;

use App\Domain\Users\Dto\CreateUserByEmailDto;

class CreateUserByEmailUseCase
{
    private UserBuilder $userBuilder;
    private SaveUserByEmailInterface $saveUser;

    public function __construct(UserBuilder $userBuilder, SaveUserByEmailInterface $saveUser)
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