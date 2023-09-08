<?php 

namespace App\Contracts\v1\Auth;

interface SendConfirmActionsContract
{
    public function __invoke(array $data): bool;
}