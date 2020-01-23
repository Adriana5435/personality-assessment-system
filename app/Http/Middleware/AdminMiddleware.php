<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Check if the authenticated user is an admin, and proceed accordingly.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and an admin
        if ($request->user() && $request->user()->admin) {
            // User is authenticated and is an admin, proceed to the next middleware or route handler
            return $next($request);
        } elseif ($request->user()) {
            // User is authenticated but not an admin, redirect to the front index
            return redirect()->route('front.index');
        } else {
            // User is not authenticated, redirect to the login page
            return redirect()->route('login');
        }
    }
}
