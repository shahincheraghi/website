<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Blogs extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:30',
        'author_name' => 'required:max:30',
        'category' => 'required:max:30',
        'file' => 'required',
        'short_description' => 'required',
        
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.blogs.update") {
            $this->rules['file'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
