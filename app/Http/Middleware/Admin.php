<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (empty(auth()->user()->level) == true){
            return redirect('/');
        }

        if (auth()->user()->level == 'Admin'){
            return $next($request);
        }
        else {
            return redirect('/');
        }

    }
}
