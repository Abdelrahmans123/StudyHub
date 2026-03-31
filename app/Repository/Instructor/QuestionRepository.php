<?php

namespace App\Repository\Instructor;

use App\Models\Question;
use App\Models\Quiz;
use App\Repository\Instructor\Interfaces\QuestionInterfaceRepository;

class QuestionRepository implements QuestionInterfaceRepository
{
    public function getAll()
    {
        return Question::all();
    }

    public function findQuiz($id)
    {
        return Quiz::findOrFail($id);
    }

    public function getAllQuizzes()
    {
        return Quiz::all();
    }

    public function store($request)
    {

        try {
            $question = new Question;
            $question->title = $request->questionTitle;
            $question->answers = $request->questionAnswer;
            $question->rightAnswer = $request->questionRightAnswer;
            $question->score = $request->score;
            $question->quizId = $request->quizId;
            $question->save();

            return redirect()->route('instructor.question.index')->with('success', 'Question is Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function find($id)
    {
        return Question::findOrFail($id);
    }

    public function update($request)
    {

        try {
            $question = Question::findOrFail($request->id);
            $question->title = $request->questionTitle;
            $question->answers = $request->questionAnswer;
            $question->rightAnswer = $request->questionRightAnswer;
            $question->score = $request->score;
            $question->quizId = $request->quizId;
            $question->save();

            return redirect()->route('instructor.question.index')->with('success', 'Question is Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Question::destroy($request->id);

        return redirect()->route('instructor.question.index')->with('success', 'Question is Deleted Successfully');
    }
}
