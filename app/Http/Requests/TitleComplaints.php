<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleComplaints extends FormRequest
{

    protected $rules = [
        'name' => 'required:max:30',
        'order' => 'required:max:30',
        'status' => 'required:max:30',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.pages.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
