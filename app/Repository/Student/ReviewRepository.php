<?php

namespace App\Repository\Student;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Repository\Student\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function getAll()
    {
        return Review::all();
    }

    public function getCourse($id)
    {
        return Course::findOrFail($id);
    }

    public function store($request)
    {

        $review = new Review;
        $review->studentId = Auth::id();
        $review->courseId = $request->id;
        $review->review = $request->review;
        $review->save();

        return redirect()->route('student.review.index')->with('success', 'Review is added successfully');
    }
}
