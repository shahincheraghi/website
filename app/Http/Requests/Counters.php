<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Counters extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:30',
//        'icons' => 'required:max:30',
        'number' => 'required:max:250',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.counters.update") {
            $this->rules['image'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
