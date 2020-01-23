<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * This method is used to determine the redirection URL when a user is not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the request does not expect JSON response
        // If not, redirect the user to the login route
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
