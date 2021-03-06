<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // App\Http\Middleware\BlockUserMiddleware.php
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->blocked){
            abort(403);
        }
        return $next($request);
    }
}
