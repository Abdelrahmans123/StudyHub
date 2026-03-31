<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\Student\Interfaces\CourseRepositoryInterface;

class CourseController extends Controller
{
    protected CourseRepositoryInterface $repository;

    public function __construct(CourseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $course = $this->repository->getAll();

        return view('Pages.Student.Course.index', compact('course'));
    }

    public function enroll($id)
    {
        return $this->repository->enroll($id);
    }

    public function recentCourse($id)
    {
        $course = $this->repository->find($id);

        return view('Pages.Student.Course.show', compact('course'));
    }
}
