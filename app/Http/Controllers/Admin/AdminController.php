<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Student;
use App\Repository\Admin\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{
    protected AdminRepositoryInterface $repository;

    public function __construct(AdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dashboard()
    {
        $studentCount = Student::count();
        $instructorCount = Instructor::count();
        $courseCount = Course::count();

        return view('Pages.Admin.dashboard', compact('studentCount', 'instructorCount', 'courseCount'));
    }

    public function instructorPage()
    {
        $instructors = $this->repository->getInstructors();

        return view('Pages.Admin.Instructor.index', compact('instructors'));
    }

    public function create()
    {
        return view('Pages.Admin.Instructor.create');
    }
}
