<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
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
        
        if(Auth::check() && Auth::user()->role == "admin"){
            return $next($request);
        }
        else{
            return abort(403, 'Unauthorized');
        }
    }
}
