<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('mainDashboard');

Route::get('selection/{type}', [DashboardController::class, 'selection'])->name('selection');

Route::get('/dashboard', function () {
    if (auth()->guard('web')->check()) {
        return Redirect::route('user.dashboard');
    } elseif (auth()->guard('student')->check()) {
        return Redirect::route('student.dashboard');
    } elseif (auth()->guard('instructor')->check()) {
        return Redirect::route('instructor.dashboard');
    } elseif (auth()->guard('admin')->check()) {
        return Redirect::route('admin.dashboard');
    }
})->middleware(['redirectIfAuthenticated:web,student,instructor,admin'])
    ->name('dashboard');

require __DIR__.'/auth.php';
