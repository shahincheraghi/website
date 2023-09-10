<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sliders extends FormRequest
{

    protected $rules = [
//        'title' => 'required:max:30',
        'file' => 'required:image:dimensions:max_width:250,max_height:250',
//        'text' => 'required:max:250',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.sliders.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
