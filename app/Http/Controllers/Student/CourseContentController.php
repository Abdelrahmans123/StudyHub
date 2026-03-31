<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseContentController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $courses = CourseContent::where('courseId', $id)->get();

        return view('Pages.Student.Course.Content.index', compact('courses'));
    }

    public function downloadFile($file)
    {
        $path = 'pdfs/'.$file;
        $filePath = Storage::disk('public')->path($path);

        return response()->download($filePath, $file);
    }
}
