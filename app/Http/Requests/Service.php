<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Service extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:30',
        'image' => 'required:image:dimensions:max_width:555,max_height:408',
        'text' => 'required:max:250',
        'icons' => 'required:max:250',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.services.update") {
            $this->rules['image'] = 'nullable';
        }
        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
