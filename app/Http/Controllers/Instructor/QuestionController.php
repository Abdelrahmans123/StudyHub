<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Repository\Instructor\Interfaces\QuestionInterfaceRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected QuestionInterfaceRepository $question;

    public function __construct(QuestionInterfaceRepository $question)
    {
        $this->question = $question;
    }

    public function index()
    {
        $question = $this->question->getAll();

        return view('Pages.Instructor.Quiz.Question.index', compact('question'));
    }

    public function create()
    {
        $quiz = $this->question->getAllQuizzes();

        return view('Pages.Instructor.Quiz.Question.create', compact('quiz'));
    }

    public function created($id)
    {
        $quiz = $this->question->findQuiz($id);

        return view('Pages.Instructor.Quiz.Question.created', compact('quiz'));
    }

    public function store(StoreQuestionRequest $request)
    {
        return $this->question->store($request);
    }

    public function edit($id)
    {
        $question = $this->question->find($id);

        return view('Pages.Instructor.Quiz.Question.edit', compact('question'));
    }

    public function update(UpdateQuestionRequest $request)
    {
        return $this->question->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->question->destroy($request);
    }
}
