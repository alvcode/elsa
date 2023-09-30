<?php

namespace App\Http\Middleware;

use App\Models\v1\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class BearerAuth
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            throw new UnauthorizedException(__('auth.unauthorized'));
        }

        // Найдем пользователя по токену (предполагая, что вы используете столбец "api_token" для хранения токена)
        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // Авторизуем пользователя
        Auth::login($user);

        return $next($request);
    }
}