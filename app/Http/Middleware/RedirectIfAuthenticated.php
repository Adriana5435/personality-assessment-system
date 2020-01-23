<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * This middleware checks if the user is authenticated and redirects accordingly based on user type.
     *
     * @param Request $request
     * @param  Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $guard = null)
    {
        // Check if the user is authenticated using the specified guard
        if (Auth::guard($guard)->check()) {
            // If the authenticated user is an admin, redirect to the admin home route
            if (auth()->user()->is_admin) {
                return redirect(route('admin.home'));
            }
            // If not an admin, redirect to the user dashboard on the front-end
            return redirect(route('front.user.dashboard'));
        }

        // Continue processing the request
        return $next($request);
    }
}
