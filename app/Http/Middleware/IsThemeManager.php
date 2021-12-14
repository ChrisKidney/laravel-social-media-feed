<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsThemeManager
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
        if(!Auth::user()->isThemeManager()) {
            return back()->with('status', 'Denied - You do not have permissions to access Theme Management')->with('status_type', 'danger');
        }
        else {
            return $next($request);
        }
    }
}
