<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;

class CheckAuth
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
        if (!$request->session()->has('isLoggedTrue')) {
            $request->session()->flash('message', 'Please login first! ');
            $request->session()->flash('color', 'red');
            return redirect('login');
        }
        return $next($request);
    }
}
