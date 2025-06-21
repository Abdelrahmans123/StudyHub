<?php

namespace App\Repository\Student;

use App\Models\Course;
use App\Models\Review;

class ReviewRepository implements Interfaces\ReviewRepositoryInterface
{

    public function index()
    {
        $student=auth()->user();
        $review=Review::all();
        return view('Pages.Student.Review.index',compact('student','review'));
    }

    public function create($id)
    {
        $course=Course::findOrFail($id);
        return view('Pages.Student.Review.create',compact('course'));
    }

    public function store($request)
    {
        $request->validate([
            'review'=>'required'
        ]);
        $review=new Review();
        $review->studentId=auth()->user()->id;
        $review->courseId=$request->id;
        $review->review=$request->review;
        $review->save();
        return redirect()->route('student.review.index')->with('success','Review is added successfully');
    }
}
