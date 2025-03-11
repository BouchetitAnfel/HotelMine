<?php
namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;

class Authenticate extends BaseAuthenticate
{
    protected function redirectTo($request)
    {
        return $request->expectsJson() ? null : route('login');
    }
}
