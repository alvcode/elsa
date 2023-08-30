<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResponseApi 
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
