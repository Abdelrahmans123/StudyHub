<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyStudentStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->active !== 1) {
            Auth::logout();
            return redirect()->route('login.show','student')->with('error', 'Your account is inactive. Please contact the administrator.');
        }

        return $next($request);
    }
}
