<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Repository\Student\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected CourseRepositoryInterface $repository;
    public function __construct(CourseRepositoryInterface $repository){
        return $this->repository=$repository;
    }
    public function index()
    {
        return $this->repository->index();
    }
    public function enroll($id){
        return$this->repository->enroll($id);
    }
    public function recentCourse($id){
        return$this->repository->recentCourse($id);
    }
}
