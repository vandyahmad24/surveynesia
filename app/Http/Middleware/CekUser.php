<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Survey;
use View;
class CekUser
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
       if (Auth::user()->level != 'user') {
            return redirect('/');
        }
     
        return $next($request);
    }
}
