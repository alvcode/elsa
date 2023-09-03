<?php 

namespace App\Contracts\v1\Auth;

use App\Models\User;

interface RegisterActionsContract
{
    public function __invoke(array $data): User;
}