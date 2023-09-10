<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Faqs extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:255',
        'text' => 'required',
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
