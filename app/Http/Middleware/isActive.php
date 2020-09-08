<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isActive
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
        if (Auth::check() && auth()->user()->isActive !== 1) {

            Auth::logout();

            return redirect('login')->with('info','you\'r account has been blocked 😟! plz contact to administrator');
        }

        return $next($request);
    }
}
