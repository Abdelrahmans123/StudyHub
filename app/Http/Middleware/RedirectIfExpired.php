<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfExpired
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && $request->hasSession() && ! Session::has('lastActivity')) {
            Session::put('lastActivity', time());
        } elseif (Auth::check() && $request->hasSession() && time() - Session::get('lastActivity') > config('session.lifetime') * 60) {
            Auth::logout();

            return redirect('/')->with('session_expired', 'Your session has expired.');
        }

        return $next($request);
    }
}
