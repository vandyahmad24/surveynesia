<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class ActiveUser
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
         if (Auth::user()->is_active == 'null') {
            return redirect('/get-otp');
        }
        return $next($request);
    }
}
