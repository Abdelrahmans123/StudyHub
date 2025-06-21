<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Repository\Instructor\Interfaces\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected QuizRepositoryInterface $quiz;
    public function __construct(QuizRepositoryInterface $quiz){
        $this->quiz=$quiz;
}

    public function index()
    {
        return $this->quiz->index();
    }

    public function create()
    {
        return $this->quiz->create();
    }
    public function store(Request $request)
    {
        return $this->quiz->store($request);
    }

    public function edit($id)
    {
        return $this->quiz->edit($id);
    }
    public function update(Request $request)
    {
        return $this->quiz->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->quiz->destroy($request);
    }
    public function studentQuiz($id){
        $degree=Degree::where('quizId',$id)->get();
        return view('Pages.Instructor.Quiz.StudentQuiz.index',compact('degree'));
    }
    public function repeatQuiz(Request $request){
        Degree::where('studentId',$request->studentId)->where('quizId',$request->quizId)->delete();
        return redirect()->back()->with('success','Quiz is Opened for student Successfully');
    }
}
