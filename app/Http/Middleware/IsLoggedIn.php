<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('login')) {
            return $next($request); // Allow access to the login page
        }

        // Check if a user is logged in by checking the session directly
        if (!$request->session()->has('user')) {
            return redirect()->route('login')->with('error', 'Not yet logged in.');
        }

        return $next($request);
    }
}
