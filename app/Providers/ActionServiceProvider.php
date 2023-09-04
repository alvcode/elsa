<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\v1\Auth\RegisterEmailAction;
use App\Contracts\v1\Auth\RegisterActionsContract;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterActionsContract::class => RegisterEmailAction::class
    ];
}