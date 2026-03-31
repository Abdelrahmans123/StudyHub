<?php

namespace App\Repository\Instructor;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use App\Repository\Instructor\Interfaces\QuizRepositoryInterface;

class QuizRepository implements QuizRepositoryInterface
{
    public function getAll()
    {
        return Quiz::all();
    }

    public function getCourses()
    {
        return Course::all();
    }

    public function find($id)
    {
        return Quiz::findOrFail($id);
    }

    public function store($request)
    {

        try {
            $quiz = new Quiz;
            $quiz->name = $request->quizTopic;
            $quiz->courseId = $request->courseId;
            $quiz->instructorId = Auth::user()->id;
            $quiz->save();

            return redirect()->route('instructor.quiz.index')->with('success', 'Quiz is Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {

        try {
            $quiz = Quiz::findOrFail($request->input('id'));
            $quiz->name = $request->input('quizTopic');
            $quiz->courseId = $request->input('courseId');
            $quiz->instructorId = Auth::user()->id;
            $quiz->save();

            return redirect()->route('instructor.quiz.index')->with('success', 'Quiz is Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Quiz::destroy($request->id);

            return redirect()->route('instructor.quiz.index')->with('success', 'Quiz is Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
