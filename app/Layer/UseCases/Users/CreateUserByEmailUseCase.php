<?php

namespace App\Layer\UseCases\Users;

use App\Layer\Domain\Users\CreateUserByEmailBuilder;
use App\Layer\Domain\Users\Dto\CreateUserByEmailDto;
use App\Layer\Domain\Users\Actions\SaveUserByEmailInterface;
use App\Layer\Domain\Users\Actions\SendConfirmEmailInterface;

class CreateUserByEmailUseCase
{
    private CreateUserByEmailBuilder $userBuilder;
    private SaveUserByEmailInterface $saveUser;
    private SendConfirmEmailInterface $sendEmail;

    public function __construct(
        CreateUserByEmailBuilder $userBuilder, 
        SaveUserByEmailInterface $saveUser,
        SendConfirmEmailInterface $sendEmail
    )
    {
        $this->userBuilder = $userBuilder;
        $this->saveUser = $saveUser;
        $this->sendEmail = $sendEmail;
    }

    public function action(CreateUserByEmailDto $createUserDto): void
    {
        $createUserDto->setValidateEmailCode($this->generateValidationCode());

        $user = $this->userBuilder->make($createUserDto);
        $this->saveUser->save($user);

        $this->sendEmail->send($user);
    }


    private function generateValidationCode(): int
    {
        return rand(11111, 32767);
    }
}