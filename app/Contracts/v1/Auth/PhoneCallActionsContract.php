<?php 

namespace App\Contracts\v1\Auth;

interface PhoneCallActionsContract
{
    public function __invoke(array $data): bool;
}