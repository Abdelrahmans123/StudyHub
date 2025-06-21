<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Repository\Student\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected StudentRepositoryInterface $repository;
    public function __construct(StudentRepositoryInterface $repository){
        $this->repository=$repository;
    }
    public function index()
    {
        return $this->repository->index();
    }

}
