<?php

namespace App\Http\Middleware;

use Closure;

class CekLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('status_login')) {
            return redirect('/');
        }
        return $next($request);
    }
}
