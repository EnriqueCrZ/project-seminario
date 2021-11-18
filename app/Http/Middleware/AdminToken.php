<?php

namespace App\Http\Middleware;

use Closure;

class AdminToken
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
        if(getActiveUserType() != 1){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
