<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfExpired;
use App\Http\Middleware\VerifyInstructorStatus;
use App\Http\Middleware\VerifyStudentStatus;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/student.php'));
            Route::middleware('web')
                ->group(base_path('routes/admin.php'));
            Route::middleware('web')
                ->group(base_path('routes/instructor.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            RedirectIfExpired::class,
        ]);

        $middleware->alias([
            'VerifyInstructorStatus' => VerifyInstructorStatus::class,
            'VerifyStudentStatus' => VerifyStudentStatus::class,
            'redirectIfAuthenticated' => RedirectIfAuthenticated::class,
            'redirectIfExpired' => RedirectIfExpired::class,
        ]);

        $middleware->redirectGuestsTo(fn () => route('mainDashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
