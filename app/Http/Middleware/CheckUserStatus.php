<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->status->id !== 2) {
            return redirect(route('main-page'))->withErrors(['alert' => 'You cannot post a request until your profile is checked by our administrators']);
        }
        return $next($request);
    }
}
