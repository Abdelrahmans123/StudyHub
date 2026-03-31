<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseContentRequest;
use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $content = CourseContent::all();

        return view('Pages.Instructor.Course.Content.index', compact('content', 'id'));

    }

    public function create(Request $request)
    {
        $id = $request->id;
        $courses = Course::find($id);

        return view('Pages.Instructor.Course.Content.create', compact('courses'));
    }

    public function store(StoreCourseContentRequest $request)
    {
        try {
            $pdfFile = $request->file('file_name');
            $fileName = time().'_'.$pdfFile->getClientOriginalName();
            $content = new CourseContent;
            $content->title = $request->contentTitle;
            $content->content_type = $request->contentType;
            $content->content = $request->courseContent;
            $content->content_file = $fileName;
            $content->courseId = $request->id;
            $content->save();
            $pdfFile->storeAs('pdfs', $fileName, 'public');

            return redirect('instructor/content')->with('success', 'Course Content is Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }
}
