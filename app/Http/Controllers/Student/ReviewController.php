<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use App\Repository\Student\Interfaces\ReviewRepositoryInterface;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected ReviewRepositoryInterface $repository;
    public function __construct(ReviewRepositoryInterface $repository){
        return $this->repository=$repository;
    }
    public function index()
    {
        return   $this->repository->index();
    }

    public function create($id)
    {
        return $this->repository->create($id);
    }

    public function store(Request $request)
    {
        return    $this->repository->store($request);
    }

}
