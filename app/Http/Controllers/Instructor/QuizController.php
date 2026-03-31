<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Degree;
use App\Repository\Instructor\Interfaces\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected QuizRepositoryInterface $quiz;

    public function __construct(QuizRepositoryInterface $quiz)
    {
        $this->quiz = $quiz;
    }

    public function index()
    {
        $quiz = $this->quiz->getAll();

        return view('Pages.Instructor.Quiz.index', compact('quiz'));
    }

    public function create()
    {
        $courses = $this->quiz->getCourses();

        return view('Pages.Instructor.Quiz.create', compact('courses'));
    }

    public function store(StoreQuizRequest $request)
    {
        return $this->quiz->store($request);
    }

    public function edit($id)
    {
        $courses = $this->quiz->getCourses();
        $quiz = $this->quiz->find($id);

        return view('Pages.Instructor.Quiz.edit', compact('courses', 'quiz'));
    }

    public function update(UpdateQuizRequest $request)
    {
        return $this->quiz->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->quiz->destroy($request);
    }

    public function studentQuiz($id)
    {
        $degree = Degree::where('quizId', $id)->get();

        return view('Pages.Instructor.Quiz.StudentQuiz.index', compact('degree'));
    }

    public function repeatQuiz(Request $request)
    {
        Degree::where('studentId', $request->studentId)->where('quizId', $request->quizId)->delete();

        return redirect()->back()->with('success', 'Quiz is Opened for student Successfully');
    }
}
