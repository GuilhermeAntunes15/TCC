<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->US_FL_PROFESSOR_SN == 'S' 
        ) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
