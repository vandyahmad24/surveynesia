<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class cekoperasional
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
          if (Auth::user()->level != 'operasional') {
            return redirect('/');
        }
        return $next($request);
    }
}
