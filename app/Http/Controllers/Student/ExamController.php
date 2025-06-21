<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\Student\Interfaces\ExamRepositoryInterface;


class ExamController extends Controller
{
    protected ExamRepositoryInterface $repository;
    public function __construct(ExamRepositoryInterface $repository){
        return $this->repository=$repository;
    }
    public function index()
    {
        return $this->repository->index();
    }

    public function show($id)
    {
        return  $this->repository->show($id);
    }
}
