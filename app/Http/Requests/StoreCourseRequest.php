<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'courseName' => 'string|required',
            'description' => 'string|required',
            'courseStart' => 'required',
            'courseEnd' => 'required',
            'instructorId' => 'required|exists:instructors,id',
            'file_name' => 'required|image',
        ];
    }
}
