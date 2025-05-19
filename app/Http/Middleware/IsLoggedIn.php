<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLoggedIn
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
        if ($request->is('login') || $request->is('register')) {
            return $next($request); // Allow access to the login page
        }

        // Check if a user is logged in by checking the session directly
        // if (!$request->session()->has('user')) {
        //     return redirect()->route('login')->with('error', 'Not yet logged in.');
        // }

        if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda belum login.');
    }

        return $next($request);
    }
}
