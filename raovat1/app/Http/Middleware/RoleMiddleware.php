<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // Controllers/Middeware/RoleMiddleware.php
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = auth()->user()->role->name;
        // echo $userRole -> check xem có phải admin khay user
        
        // Admin không thể qua user và ngược lại 
        if(!in_array($userRole, $roles)){
            abort (401);
        }

        return $next($request);
    }
}
