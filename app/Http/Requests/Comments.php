<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Comments extends FormRequest
{

    protected $rules = [

	     'fullname' => 'required:max:30',
	     'text' => 'required:max:250',
	     'email' => 'required',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.comments.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
