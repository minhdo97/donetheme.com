<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $redirectTo = route('admin.auth.login');

        if (Auth::guard('admin')->guest()) {
            return redirect()->to($redirectTo);
        }

        return $next($request);
    }
}
