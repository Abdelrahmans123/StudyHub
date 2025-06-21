<?php

namespace App\Providers;

use App\Repository\Admin\AdminRepository;
use App\Repository\Admin\CourseRepository;
use App\Repository\Admin\Interfaces\AdminRepositoryInterface;
use App\Repository\Admin\Interfaces\CourseRepositoryInterface;
use App\Repository\Admin\Interfaces\ResponseRepositoryInterface;
use App\Repository\Admin\Interfaces\ReviewRepositoryInterface;
use App\Repository\Admin\ResponseRepository;
use App\Repository\Admin\ReviewRepository;
use App\Repository\Instructor\AttendanceRepository;
use App\Repository\Instructor\InstructorRepository;
use App\Repository\Instructor\Interfaces\AttendanceRepositoryInterface;
use App\Repository\Instructor\Interfaces\InstructorRepositoryInterface;
use App\Repository\Instructor\Interfaces\OnlineSessionRepositoryInterface;
use App\Repository\Instructor\Interfaces\QuestionInterfaceRepository;
use App\Repository\Instructor\Interfaces\QuizRepositoryInterface;
use App\Repository\Instructor\OnlineSessionRepository;
use App\Repository\Instructor\QuestionRepository;
use App\Repository\Instructor\QuizRepository;
use App\Repository\Student\ExamRepository;
use App\Repository\Student\Interfaces\ExamRepositoryInterface;
use App\Repository\Student\Interfaces\StudentRepositoryInterface;
use App\Repository\Student\StudentRepository;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
public function register()
{
    $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
    $this->app->bind(CourseRepositoryInterface::class,CourseRepository::class);
    $this->app->bind(ResponseRepositoryInterface::class,ResponseRepository::class);
    $this->app->bind(ReviewRepositoryInterface::class,ReviewRepository::class);
    $this->app->bind(AttendanceRepositoryInterface::class,AttendanceRepository::class);
    $this->app->bind(\App\Repository\Instructor\Interfaces\CourseRepositoryInterface::class,\App\Repository\Instructor\CourseRepository::class);
    $this->app->bind(InstructorRepositoryInterface::class,InstructorRepository::class);
    $this->app->bind(OnlineSessionRepositoryInterface::class,OnlineSessionRepository::class);
    $this->app->bind(QuizRepositoryInterface::class,QuizRepository::class);
    $this->app->bind(QuestionInterfaceRepository::class,QuestionRepository::class);
    $this->app->bind(\App\Repository\Instructor\Interfaces\ResponseRepositoryInterface::class,\App\Repository\Instructor\ResponseRepository::class);
    $this->app->bind(\App\Repository\Student\Interfaces\CourseRepositoryInterface::class,\App\Repository\Student\CourseRepository::class);
    $this->app->bind(ExamRepositoryInterface::class,ExamRepository::class);
    $this->app->bind(\App\Repository\Student\Interfaces\ReviewRepositoryInterface::class,\App\Repository\Student\ReviewRepository::class);
    $this->app->bind(StudentRepositoryInterface::class,StudentRepository::class);
}
}
