<?php

namespace App\Providers;

use App\Actions\v1\Auth\ConfirmEmailAction;
use App\Actions\v1\Auth\ForgotEmailAction;
use App\Actions\v1\Auth\LoginEmailAction;
use App\Actions\v1\Auth\RefreshTokenAction;
use Illuminate\Support\ServiceProvider;
use App\Actions\v1\Auth\RegisterEmailAction;
use App\Contracts\v1\Auth\ConfirmActionsContract;
use App\Contracts\v1\Auth\ForgotActionsContract;
use App\Contracts\v1\Auth\LoginActionsContract;
use App\Contracts\v1\Auth\RefreshActionsContract;
use App\Contracts\v1\Auth\RegisterActionsContract;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterActionsContract::class => RegisterEmailAction::class,
        ConfirmActionsContract::class => ConfirmEmailAction::class,
        LoginActionsContract::class => LoginEmailAction::class,
        RefreshActionsContract::class => RefreshTokenAction::class,
        ForgotActionsContract::class => ForgotEmailAction::class
    ];
}