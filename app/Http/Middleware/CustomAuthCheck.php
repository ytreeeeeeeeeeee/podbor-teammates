<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()) {
            return redirect(route('main-page'));
        }
        return $next($request);
    }
}
