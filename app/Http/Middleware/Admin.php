<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'admin' guard is authenticated
        if (!Auth::guard('admin')->check()) {
            return redirect()
                ->route('admin.login') // Ensure this route matches your admin login route name
                ->with('error', 'You do not have permission to access this page.');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
