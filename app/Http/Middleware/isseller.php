<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isseller
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
        if (Auth::user() && Auth::user()->roles == 'seller') {
            # code...
            return $next($request);
        }

        return redirect('/seller');
    }
}
