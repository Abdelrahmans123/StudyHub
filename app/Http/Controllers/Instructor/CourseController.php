<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Repository\Instructor\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    protected CourseRepositoryInterface $course;
    public function __construct(CourseRepositoryInterface $course){
        $this->course=$course;
    }

    public function show($id)
    {
        return   $this->course->show($id);
    }






}
