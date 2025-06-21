<?php

use App\Http\Controllers\Instructor\AttendanceController;
use App\Http\Controllers\Instructor\CourseContentController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\Instructor\ResponseController;
use App\Http\Controllers\Instructor\OnlineSessionController;
use App\Http\Controllers\Instructor\QuestionController;
use App\Http\Controllers\Instructor\QuizController;
use App\Http\Controllers\Instructor\StudentController;
use App\Models\OnlineSession;
use Illuminate\Support\Facades\Route;

Route::prefix('instructor')->name('instructor.')->middleware(['auth:instructor','verified','VerifyInstructorStatus','redirectIfExpired'])->group(function(){
    Route::get('dashboard',function(){
        $courseIds = \App\Models\Course::where('instructor_id', auth()->user()->id)->pluck('id');
        $studentCount = \App\Models\Student::whereIn('courseId', $courseIds)->count();
        $count=$courseIds->count();
        $onlineSession=OnlineSession::all();
        return view('Pages.Instructor.dashboard', ['studentCount' => $studentCount,'courseCount'=>$count,'onlineSession'=>$onlineSession]);

    })->name('dashboard');
    Route::Resource('onlineSession',OnlineSessionController::class);
    Route::resource('quiz',QuizController::class);
    Route::resource('question',QuestionController::class);
    Route::get('question/create/{id}', [QuestionController::class, 'created'])->name('question.create');
    Route::get('studentQuiz/{id}',[QuizController::class,'studentQuiz'])->name('student.quiz');
    Route::post('repeatQuiz',[QuizController::class,'repeatQuiz'])->name('student.repeatQuiz');
    Route::resource('response',ResponseController::class);
    Route::get('course/show/{id}',[CourseController::class,'show'])->name('course.show');
    Route::resource('course',CourseController::class);
    Route::resource('attendance',AttendanceController::class);
    Route::get('educationalTool',function (){
        return view('Pages.Instructor.educationalTool');
    })->name('educationalTool');
    Route::resource('student',StudentController::class);
    Route::get('profile',[ProfileController::class,'index'])->name('profile.show');
    Route::put('profile/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::resource('content', CourseContentController::class);
    Route::get('content/{id}', 'Instructor\CourseContentController@index')->name('instructor.content.index');

});
