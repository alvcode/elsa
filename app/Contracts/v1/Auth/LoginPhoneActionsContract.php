<?php 

namespace App\Contracts\v1\Auth;

use App\Models\v1\UserToken;

interface LoginPhoneActionsContract
{
    public function __invoke(array $data, string $deviceId): UserToken;
}