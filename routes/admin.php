<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Instructor\InstructorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'redirectIfExpired'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('instructors', [AdminController::class, 'instructorPage'])->name('instructors');
    Route::get('instructors/create', [AdminController::class, 'create'])->name('instructors.create');
    Route::post('instructors/store', [InstructorController::class, 'store'])->name('instructors.store');
    Route::get('instructors/edit/{instructor}', [InstructorController::class, 'edit'])->name('instructors.edit');
    Route::put('instructors/update', [InstructorController::class, 'update'])->name('instructors.update');

    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('courses/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::put('courses/update', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/destroy', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::resource('fee', FeeController::class);
    Route::resource('response', ResponseController::class);
    Route::get('acceptedResponse/{response}', [ResponseController::class, 'addImage'])->name('acceptedResponse');
    Route::post('addCourse', [ResponseController::class, 'acceptedResponse'])->name('addCourse');
    Route::get('notAcceptedResponse/{response}', [ResponseController::class, 'notAcceptedResponse'])->name('notAcceptedResponse');
    Route::get('response/count', [ResponseController::class, 'responseCount'])->name('response.count');

    Route::resource('review', ReviewController::class);
});
