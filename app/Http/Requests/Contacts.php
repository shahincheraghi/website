<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contacts extends FormRequest
{

    protected $rules = [
        'subject' => 'required:max:30',
        'fullname' => 'required:max:30',
        'email' => 'required:max:30',
        'text' => 'required:max:250',
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
