<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorResponseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'courseName' => 'string|required|unique:courses,name',
            'description' => 'string|required',
            'courseStart' => 'required',
            'courseEnd' => 'required|after:courseStart',
        ];
    }
}
