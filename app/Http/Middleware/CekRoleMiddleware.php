<?php

namespace App\Http\Middleware;

use Closure;

class CekRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,  $role)
    {
        if (session('role_user') == $role) {
            return $next($request);
        }
        return back()->with('toast_error', 'No Authorization');
    }
}
