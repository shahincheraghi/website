<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Pages extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:30',
        'titleEn' => 'required:max:30',
        'file' => 'required',
        'short_description' => 'required',
        'keywords' => 'required',
        'multiKeywordsSeoPage' => 'required',
        'titleSeoPage' => 'required',
        'descriptionSeoPage' => 'required',

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
