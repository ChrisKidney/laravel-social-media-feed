<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->isUserAdmin()) {
            return back()->with('status', 'Denied - You do not have permissions to access User Management')->with('status_type', 'danger');
        }
        else {
            return $next($request);
        }
    }
}
