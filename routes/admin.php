<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth:admin','verified','redirectIfExpired'])->group(function($request){
    Route::get('dashboard',function(){
        $studentCount=Student::count();
        $instructorCount=Instructor::count();
        $courseCount=Course::count();
        return view('Pages.Admin.dashboard',compact('studentCount','instructorCount','courseCount'));
    })->name('dashboard');
    Route::get('instructors',[AdminController::class,'instructorPage'])->name('instructors');
    Route::get('instructors/create',[AdminController::class,'create']);
    Route::post('instructors/store',[InstructorController::class,'store']);
    Route::get('instructors/edit/{id}',[InstructorController::class,'edit'])->name('instructors.edit');
    Route::put('instructors/update',[InstructorController::class,'update'])->name('instructors.update');
    Route::get('courses',[CourseController::class,'index']);
    Route::get('courses/create',[CourseController::class,'create']);
    Route::get('courses/edit/{id}',[CourseController::class,'edit']);
    Route::post('courses/store',[CourseController::class,'store']);
    Route::put('courses/update',[CourseController::class,'update']);
    Route::delete('courses/destroy',[CourseController::class,'destroy']);
    Route::resource('fee',FeeController::class);
    Route::resource('response',ResponseController::class);
    Route::get('acceptedResponse/{id}',[ResponseController::class,'addImage'])->name('acceptedResponse');
    Route::post('addCourse',[ResponseController::class,'acceptedResponse'])->name('addCourse');
    Route::get('notAcceptedResponse/{id}',[ResponseController::class,'notAcceptedResponse'])->name('notAcceptedResponse');
    Route::get('response/count', [ResponseController::class, 'responseCount']);
    Route::resource('review',ReviewController::class);

});
