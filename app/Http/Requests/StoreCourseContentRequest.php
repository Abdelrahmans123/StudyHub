<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseContentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contentTitle' => 'required|string',
            'contentType' => 'required|string',
            'courseContent' => 'required|string',
            'file_name' => 'required|mimes:pdf|max:2048',
            'id' => 'required|exists:courses,id',
        ];
    }
}
