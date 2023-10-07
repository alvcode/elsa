<?php

namespace App\Layer\Persistence\Repositories\Email;

use App\Layer\Domain\Users\Repositories\UserEmailRepositoryInterface;
use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;
use App\Mail\ConfirmEmail;
use Illuminate\Support\Facades\Mail;

class UserEmailRepository implements UserEmailRepositoryInterface
{
    public function send(CreateUserByEmailPersistence $userPersistence): void
    {
        Mail::to($userPersistence->getEmail())
            ->send(new ConfirmEmail(['validate_email_code' => $userPersistence->getValidateEmailCode()]));
    }
}