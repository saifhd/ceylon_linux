<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DestributorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role->name == 'User' || auth()->user()->role->name=='user') {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
