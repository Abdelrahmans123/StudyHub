<?php

namespace App\Repository\Instructor;

use App\Models\Question;
use App\Models\Quiz;
use App\Repository\Instructor\Interfaces\QuestionInterfaceRepository;

class QuestionRepository implements QuestionInterfaceRepository
{

    public function index()
    {
    $question=Question::all();
    return view('Pages.Instructor.Quiz.Question.index',compact('question'));
    }

    public function created($id)
    {
        $quiz=Quiz::findOrFail($id);
        return view('Pages.Instructor.Quiz.Question.created',compact('quiz'));
    }
    public function create(){
        $quiz=Quiz::all();
        return view('Pages.Instructor.Quiz.Question.create',compact('quiz'));
    }
    public function store($request)
    {

        $request->validate(
            [
                'questionTitle'=>'required|string',
                'questionAnswer'=>'required|string',
                'questionRightAnswer'=>'required|string',
                'score'=>'required',
                'quizId'=>'required|exists:quizzes,id'
            ]
        );
        try {
            $question = new Question();
            $question->title = $request->questionTitle;
            $question->answers = $request->questionAnswer;
            $question->rightAnswer = $request->questionRightAnswer;
            $question->score = $request->score;
            $question->quizId = $request->quizId;
            $question->save();
            return redirect()->route('instructor.question.index')->with('success','Question is Added Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question=Question::findOrFail($id);
        return view('Pages.Instructor.Quiz.Question.edit',compact('question'));
    }

    public function update($request)
    {

        $request->validate(
            [
                'questionTitle'=>'required|string',
                'questionAnswer'=>'required|string',
                'questionRightAnswer'=>'required|string',
                'score'=>'required',
                'quizId'=>'required|exists:quizzes,id'
            ]
        );
        try {
            $question =  Question::findOrFail($request->id);
            $question->title = $request->questionTitle;
            $question->answers = $request->questionAnswer;
            $question->rightAnswer = $request->questionRightAnswer;
            $question->score = $request->score;
            $question->quizId = $request->quizId;
            $question->save();
            return redirect()->route('instructor.question.index')->with('success','Question is Updated Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Question::destroy($request->id);
        return redirect()->route('instructor.question.index')->with('success','Question is Deleted Successfully');
    }
}
