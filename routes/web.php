<?php

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Review;
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

Route::get('/', function () {
    $courses = Course::all();
    $instructors = Instructor::all();
    $review = Review::all();
    return view('dashboard', compact('courses', 'instructors'))->with('review', $review);
})->name('mainDashboard');

Route::get('selection/{type}', function ($type) {
    return view('selection', compact('type'));
})->name('selection');

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



require __DIR__ . '/auth.php';
