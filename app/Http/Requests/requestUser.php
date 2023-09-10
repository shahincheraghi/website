<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestUser extends FormRequest
{
    protected $rules = [
        'name' => 'required:max:30',
        'family' => 'required:max:30',
        'email' => 'required|email',
        'mobile' => 'required',
        'username' => 'required|unique:users,id',
        'national_identity' => 'required',
        'status' => 'required',
        'type' => 'required',
        'birth_date' => 'required',
    ];

    public function authorize()
    {
        if (\Request::route()->getName() == "Admin.users.update") {
            $this->rules['imageInfo'] = 'nullable';
        }
        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
