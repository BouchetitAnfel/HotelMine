<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Ensure the auth guard is being used properly
        if (Auth::check() && Auth::user() && Auth::user()->role === '$role') {
            return $next($request);
        }

        // Redirect to login if user does not have the required role
        return redirect()->route('login');
    }
}
