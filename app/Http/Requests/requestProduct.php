<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestProduct extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:255',
        'english_title' => 'required:max:255',
        'code' => 'required:max:255',
        'seo' => 'required:max:255',
        'price' => 'required:max:255',
        'accounting_code' => 'required:max:30|alpha_num',
        'guarantee' => 'required|string',
        'discount_percent' => 'required|between:0,101',
        'min_order' => 'required|between:0,101',
        'count' => 'required|between:0,101',
        'weight' => 'required|between:0,101',
        'length' => 'required|between:0,101',
        'width' => 'required|between:0,101',
        'height' => 'required|between:0,101',
        'type' => 'required|between:0,4',
        'short_description' => 'required',
        'description' => 'required',
        'image' => 'required|image',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.products.update") {
            $this->rules['image'] = 'nullable';
        }

        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
