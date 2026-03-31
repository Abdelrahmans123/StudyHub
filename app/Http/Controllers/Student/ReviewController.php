<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Repository\Student\Interfaces\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected ReviewRepositoryInterface $repository;

    public function __construct(ReviewRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $student = Auth::user();
        $review = $this->repository->getAll();

        return view('Pages.Student.Review.index', compact('student', 'review'));
    }

    public function create($id)
    {
        $course = $this->repository->getCourse($id);

        return view('Pages.Student.Review.create', compact('course'));
    }

    public function store(StoreReviewRequest $request)
    {
        return $this->repository->store($request);
    }
}
