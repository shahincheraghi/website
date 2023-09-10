<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Skill extends FormRequest
{

    protected $rules = [
        'title' => 'required',
        'percent' => 'required',
        'icons' => 'required:max:250',
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
