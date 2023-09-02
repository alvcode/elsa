<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\Auth\RegisterEmailAction;
use App\Contracts\Auth\RegisterActionsContract;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterActionsContract::class => RegisterEmailAction::class
    ];
}