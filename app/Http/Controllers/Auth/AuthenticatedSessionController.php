<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create($type):View
    {
        return view('auth.login',compact('type'));
    }

    /**
     * Handle an incoming authentication request.
     * @throws ValidationException
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if($request->guard==='student'){
            return redirect()->intended(RouteServiceProvider::student);
        }else if($request->guard==='instructor'){
            return redirect()->intended(RouteServiceProvider::instructor);
        }else{
            return redirect()->intended(RouteServiceProvider::admin);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if ($request->get('guard')==='student'){
            Auth::guard('student')->logout();
        }elseif ($request->get('guard')==='instructor'){
            Auth::guard('instructor')->logout();
        }elseif ($request->get('guard')==='admin'){
            Auth::guard('admin')->logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
