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
        $id=$request->id;
        $courses=CourseContent::where('courseId',$id)->get();
        return view('Pages.Student.Course.Content.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function show(CourseContent $courseContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseContent $courseContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseContent $courseContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseContent $courseContent)
    {
        //
    }
    public function downloadFile($file){
        $path = 'pdfs/' . $file;
        $filePath = Storage::disk('public')->path($path);
        return response()->download($filePath, $file);
    }
}
