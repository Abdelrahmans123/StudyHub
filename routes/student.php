<?php

use App\Http\Controllers\Student\CourseContentController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\ReviewController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->name('student.')->middleware(['auth:student','verified','VerifyStudentStatus','redirectIfExpired'])->group(function($request){
    Route::get('dashboard',[StudentController::class,'index'])->name('dashboard');
    Route::get('educationalTool',function (){
        return view('Pages.Student.educationalTool');
    })->name('educationalTool');
    Route::get('onlineSession',function (){
        $onlineSession=\App\Models\OnlineSession::all();
        return view('Pages.Student.onlineSession',compact('onlineSession'));
    })->name('onlineSession');
    Route::resource('exam',ExamController::class);
    Route::resource('course',CourseController::class);
    Route::get('course/enroll/{id}',[CourseController::class,'enroll'])->name('course.enroll');
    Route::resource('review',ReviewController::class);
    Route::get('review/create/{id}', [ReviewController::class, 'create'])->name('review.create');
    Route::get('profile',[ProfileController::class,'index'])->name('profile.show');
    Route::put('profile/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::get('recentCourse/{id}',[CourseController::class,'recentCourse'])->name('recentCourse');
    Route::resource('content', CourseContentController::class)->names([
        'index' => 'content.index',         // You can adjust these names as needed
        'create' => 'content.create',
        'store' => 'content.store',
        'show' => 'content.show',
        'edit' => 'content.edit',
        'update' => 'content.update',
        'destroy' => 'content.destroy',
    ]);
    Route::get('downloadFile/{file}',[CourseContentController::class,'downloadFile'])->name('downloadFile');
});
