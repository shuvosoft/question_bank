<?php

namespace App\Http\Middleware;

use Closure;

class SubAdminMiddleware
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
        if (Auth::check() && Auth::user()->role->id == 3)
        {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
