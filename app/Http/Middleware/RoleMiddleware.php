<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $roles)
    {
        // Split the roles by the pipe character
        $rolesArray = explode('|', $roles);

        // Check if the user is authenticated and their role is in the allowed roles
        if (auth()->check() && !in_array(auth()->user()->role, $rolesArray)) {
            return redirect('/'); // Redirect to home or a different page
        }
        
        return $next($request);
    }
}