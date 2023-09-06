<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Mail\ConfirmEmail;
use App\Models\v1\User;
use Illuminate\Support\Facades\Mail;

class RegisterEmailAction implements RegisterActionsContract
{

    public function __invoke(array $data): User
    {
        $user = User::createByEmail($data);

        Mail::to($user)->send(new ConfirmEmail(['validate_email_code' => $user->validate_email_code]));

        return $user;
    }
}