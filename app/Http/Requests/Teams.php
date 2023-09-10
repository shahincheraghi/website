<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Teams extends FormRequest
{

    protected $rules = [
        'fullname' => 'required:max:30',
        'designation' => 'required:max:255',
        'file' => 'required:image:dimensions:max_width:360,max_height:310',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.teams.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
