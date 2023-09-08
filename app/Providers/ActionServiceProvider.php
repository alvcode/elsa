<?php

namespace App\Providers;

use App\Actions\v1\Auth\ConfirmEmailAction;
use App\Actions\v1\Auth\ForgotEmailAction;
use App\Actions\v1\Auth\LoginEmailAction;
use App\Actions\v1\Auth\LoginPhoneAction;
use App\Actions\v1\Auth\PhoneCallAction;
use App\Actions\v1\Auth\RefreshTokenAction;
use Illuminate\Support\ServiceProvider;
use App\Actions\v1\Auth\RegisterEmailAction;
use App\Actions\v1\Auth\ResetPasswordAction;
use App\Actions\v1\Auth\SendConfirmEmailAction;
use App\Contracts\v1\Auth\ConfirmActionsContract;
use App\Contracts\v1\Auth\ForgotActionsContract;
use App\Contracts\v1\Auth\LoginActionsContract;
use App\Contracts\v1\Auth\LoginPhoneActionsContract;
use App\Contracts\v1\Auth\PhoneCallActionsContract;
use App\Contracts\v1\Auth\RefreshActionsContract;
use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Contracts\v1\Auth\ResetActionsContract;
use App\Contracts\v1\Auth\SendConfirmActionsContract;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterActionsContract::class => RegisterEmailAction::class,
        ConfirmActionsContract::class => ConfirmEmailAction::class,
        LoginActionsContract::class => LoginEmailAction::class,
        RefreshActionsContract::class => RefreshTokenAction::class,
        ForgotActionsContract::class => ForgotEmailAction::class,
        ResetActionsContract::class => ResetPasswordAction::class,
        SendConfirmActionsContract::class => SendConfirmEmailAction::class,
        PhoneCallActionsContract::class => PhoneCallAction::class,
        LoginPhoneActionsContract::class => LoginPhoneAction::class
    ];
}