<?php

namespace App\Http\Middleware;

use Closure;

class NextAuth
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
        if ($request->session()->has('isLoggedTrue')) {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
