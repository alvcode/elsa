<?php 

namespace App\Contracts\v1\Auth;

use App\Models\v1\User;

interface ConfirmActionsContract
{
    public function __invoke(array $data): User;
}