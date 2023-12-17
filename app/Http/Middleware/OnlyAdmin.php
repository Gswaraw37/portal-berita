<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        throw_if(Auth::user()->role_id != 1, AuthorizationException::class);
 
        throw_if(
            Auth::user()->role_id != 1,
            AuthorizationException::class,
            'Anda Bukan Admin!'
        );

        return $next($request);
    }
}
