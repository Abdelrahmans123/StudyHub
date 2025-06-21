<?php

namespace App\Repository\Instructor;

use App\Models\Course;
use App\Models\Quiz;
use App\Repository\Instructor\Interfaces\QuizRepositoryInterface;

class QuizRepository implements QuizRepositoryInterface
{

    public function index()
    {
        $quiz=Quiz::all();
        return view('Pages.Instructor.Quiz.index',compact('quiz'));
    }

    public function create()
    {
        $courses=Course::all();
        return view('Pages.Instructor.Quiz.create',compact('courses'));
    }

    public function store($request)
    {
        $request->validate(
            [
                'quizTopic'=>'string|required',
                'courseId'=>'required|exists:courses,id'
            ]
        );
        try{
        $quiz=new Quiz();
        $quiz->name=$request->quizTopic;
        $quiz->courseId=$request->courseId;
        $quiz->instructorId=auth()->user()->id;
        $quiz->save();
        return redirect()->route('instructor.quiz.index')->with('success','Quiz is Added Successfully');
    }catch (\Exception $e){
return redirect()->back()->with(['error'=>$e->getMessage()]);
}
    }

    public function edit($id)
    {
       $courses=Course::all();
       $quiz=Quiz::findOrFail($id);
       return view('Pages.Instructor.Quiz.edit',compact('courses','quiz'));
    }

    public function update($request)
    {
        $request->validate(
            [
                'quizTopic'=>'string|required',
                'courseId'=>'required|exists:courses,id'
            ]
        );

        try{
            $quiz = Quiz::findOrFail($request->input('id')); // Use input('id') instead of $request->id
            $quiz->name = $request->input('quizTopic');
            $quiz->courseId = $request->input('courseId');
            $quiz->instructorId = auth()->user()->id;
            $quiz->save();
            return redirect()->route('instructor.quiz.index')->with('success','Quiz is Updated Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try{
            Quiz::destroy($request->id);
            return redirect()->route('instructor.quiz.index')->with('success','Quiz is Deleted Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
