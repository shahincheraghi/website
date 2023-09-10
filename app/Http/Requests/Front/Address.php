<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class Address extends FormRequest
{
    protected $rules = [
        'receiver' => 'required:max:255',
        'cel' => 'required|iran_mobile',
        'city_id' => 'required|integer|exists:city,id',
        'tel' => 'required|integer',
        'postal_code' => 'required|iran_postal_code',
        'address' => 'required',
    ];

    public function authorize()
    {


        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
