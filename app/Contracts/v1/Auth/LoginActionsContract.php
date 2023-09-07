<?php 

namespace App\Contracts\v1\Auth;

use App\Models\v1\UserToken;

interface LoginActionsContract
{
    public function __invoke(array $data, string $deviceId): UserToken;
}