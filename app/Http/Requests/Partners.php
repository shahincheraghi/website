<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Partners extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:30',
        'file' => 'required:image:dimensions:max_width:200,max_height:75',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.partners.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
