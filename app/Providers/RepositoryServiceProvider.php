<?php

namespace App\Providers;

use App\Layer\Domain\Users\Repositories\UserEmailRepositoryInterface;
use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Repositories\Email\UserEmailRepository;
use App\Layer\Persistence\Repositories\Users\UserRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepositoryInterface::class => UserRepository::class,
        UserEmailRepositoryInterface::class => UserEmailRepository::class
    ];
}