<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckForAdminPrivileges
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!in_array(Auth::user()->role, ["admin", "entry"])) {
            return redirect('/403');
        }

        return $next($request);
    }
}
