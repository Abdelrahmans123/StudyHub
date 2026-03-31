<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::with('instructor')->withCount('students')->get();
        $instructors = Instructor::with('courses')->get();
        $reviews = Review::with(['student', 'course'])->get();

        return view('dashboard', compact('courses', 'instructors', 'reviews'));
    }

    public function selection(string $type)
    {
        return view('selection', compact('type'));
    }
}
