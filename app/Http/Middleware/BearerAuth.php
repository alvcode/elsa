<?php

namespace App\Http\Middleware;

use App\Exceptions\UnauthorizedHttpException;
use App\Http\Validators\v1\Auth\DeviceIdHeaderValidator;
use App\Models\v1\User;
use App\Models\v1\UserToken;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BearerAuth
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        $validateDeviceId = new DeviceIdHeaderValidator(['Device-Id' => $request->header('Device-Id')]);
        $validateDeviceId = $validateDeviceId->validate();

        if (!$token) {
            throw new UnauthorizedHttpException(__('auth.unauthorized'));
        }

        $userId = UserToken::getUserIdByTokenAndDevice($token, $validateDeviceId['Device-Id']);
        if(!$userId){
            throw new UnauthorizedHttpException(__('auth.unauthorized'));
        }

        $user = User::where('id', $userId)->first();

        if (!$user) {
            throw new UnauthorizedHttpException(__('auth.unauthorized'));
        }

        // Авторизуем пользователя
        Auth::login($user);
    
        return $next($request);
    }
}