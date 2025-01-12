<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class AdminMiddleware
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
 
        if (auth()->check() && auth()->user()->role == User::ROLE_ADMIN) {
            return $next($request);
        }

        
        return redirect('home')->with('alert', 'error', 'Access denied. Admins only.');
    }
}
