<?php 

namespace App\Contracts\Auth;

use App\Models\User;

interface RegisterActionsContract
{
    public function __invoke(array $data): User;
}