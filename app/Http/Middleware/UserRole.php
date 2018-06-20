<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserRole
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
      if(\Auth::user()->role == 3) {
          return redirect('banned');
      }
        return $next($request);
    }
}
