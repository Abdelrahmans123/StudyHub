<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseContentController extends Controller
{


    public function index(Request $request)
    {
        $id=$request->id;
        $content=CourseContent::all();
        return view('Pages.Instructor.Course.Content.index',compact('content','id'));

    }

    public function create(Request $request)
    {
        $id=$request->id;
        $courses=Course::find($id);
        return view('Pages.Instructor.Course.Content.create',compact('courses'));
    }

    public function store(Request $request)
    {

        try {
            $request->validate(
                [
                    'contentTitle'=>'required|string',
                    'contentType'=>'required|string',
                    'courseContent'=>'required|string',
                    'file_name'=>'required|mimes:pdf|max:2048',
                    'id'=>'required|exists:courses,id'
                ]
            );
            $pdfFile = $request->file('file_name');
            $fileName = time() . '_' . $pdfFile->getClientOriginalName();
            $content=new CourseContent();
            $content->title=$request->contentTitle;
            $content->content_type=$request->contentType;
            $content->content=$request->courseContent;
            $content->content_file=$fileName;
            $content->courseId=$request->id;
            $content->save();
            $pdfFile->storeAs('pdfs', $fileName, 'public');
            return redirect('instructor/content')->with('success','Course Content is Added Successfully');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
