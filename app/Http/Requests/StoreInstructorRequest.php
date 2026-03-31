<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
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
            'instructorPassword' => 'string|max:8|min:1',
        ];
    }
}
