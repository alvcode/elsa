<?php 

namespace App\Contracts\v1\Auth;

interface ResetActionsContract
{
    public function __invoke(array $data): bool;
}