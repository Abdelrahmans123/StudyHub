<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyInstructorStatus
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->active !== 1) {
            Auth::logout();
            return redirect()->route('login.show','instructor')->with('error', 'Your account is inactive. Please contact the administrator.');

        }

        return $next($request);
    }
}
