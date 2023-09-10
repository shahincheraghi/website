<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeContentInfoRequest extends FormRequest
{

    protected $rules = [

        'title' => 'required',
        'status' => 'required',

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
