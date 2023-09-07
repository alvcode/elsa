<?php 

namespace App\Contracts\v1\Auth;


interface ForgotActionsContract
{
    public function __invoke(string $email): bool;
}