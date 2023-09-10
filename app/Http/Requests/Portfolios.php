<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Portfolios extends FormRequest
{

    protected $rules = [
        'title' => 'required',
        'category' => 'required:max:30',
        'date' => 'required:max:30',
        'customer' => 'required:max:30',
        'address' => 'required:max:255',
        'file' => 'required:dimensions:max_width:37,max_height:37:image',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.portfolios.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
