<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\ForgotActionsContract;
use App\Mail\ForgotEmail;
use App\Models\v1\ConfirmationCode;
use App\Models\v1\User;
use Illuminate\Support\Facades\Mail;

class ForgotEmailAction implements ForgotActionsContract
{
    public function __invoke(string $email): bool
    {
        $user = User::query()->where(['email' => $email])->first();

        if($user){
            $confirmationCode = ConfirmationCode::createCode($user->id, 'forgot_email', 20, 111111, 999999);
            Mail::to($user->email)->send(new ForgotEmail(['forgot_email_code' => $confirmationCode->code]));
        }

        return true;
    }
}