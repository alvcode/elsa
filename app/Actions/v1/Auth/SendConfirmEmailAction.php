<?php

namespace App\Actions\v1\Auth;

use App\Contracts\v1\Auth\SendConfirmActionsContract;
use App\Exceptions\UnprocessableHttpException;
use App\Mail\ConfirmEmail;
use App\Models\v1\User;
use Illuminate\Support\Facades\Mail;

class SendConfirmEmailAction implements SendConfirmActionsContract
{

    public function __invoke(array $data): bool
    {
        $user = User::query()->where(['email' => $data['email']])->first();

        if(!$user){
            throw new UnprocessableHttpException(__('auth.user_not_found'));
        }

        if($user->isConfirmEmail()){
            throw new UnprocessableHttpException(__('auth.email_confirmed'), code: -3);
        }

        Mail::to($user->email)->send(new ConfirmEmail(['validate_email_code' => $user->validate_email_code]));

        return true;
    }
}