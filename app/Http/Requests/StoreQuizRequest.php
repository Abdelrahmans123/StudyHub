<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quizTopic' => 'string|required',
            'courseId' => 'required|exists:courses,id',
        ];
    }
}
