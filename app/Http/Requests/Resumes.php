<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Resumes extends FormRequest
{

    protected $rules = [

        'title' => 'required:max:30',
        'type' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
