<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Categorys extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:30',
        'type' => 'required:max:30',
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
