<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSubjectRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
        ];
    }
}
