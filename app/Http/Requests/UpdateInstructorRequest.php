<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstructorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'instructorName' => 'string|required',
            'instructorEmail' => 'email|required',
            'instructorPassword' => 'nullable|string|max:8|min:1',
        ];
    }
}
