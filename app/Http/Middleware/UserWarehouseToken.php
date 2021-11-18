<?php

namespace App\Http\Middleware;

use Closure;

class UserWarehouseToken
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
            if(getActiveUserType() != 3){
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
