<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'questionTitle' => 'required|string',
            'questionAnswer' => 'required|string',
            'questionRightAnswer' => 'required|string',
            'score' => 'required',
            'quizId' => 'required|exists:quizzes,id',
        ];
    }
}
