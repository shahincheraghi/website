<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'db.host' => 'required',
            'db.port' => 'required',
            'db.username' => 'required',
            'db.password' => 'nullable',
            'db.database' => 'required',
            'admin.first_name' => 'required',
            'admin.last_name' => 'required',
            'admin.email' => 'required|email',
            'admin.password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => ' :attribute را وارد کنید .',
            '*.required_if' => 'The :attribute field is required when :other is :value.',
            '*.email' => ' :attribute نادرست است .',
            '*.unique' => 'The :attribute has already been taken.',
            '*.confirmed' => 'The :attribute confirmation does not match.',
            '*.min' => 'The :attribute must be at least :min characters.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'db.host' => 'هاست ',
            'db.port' => 'پورت',
            'db.username' => 'نام کاربری دیتابیس ',
            'db.password' => 'کلمه عبور دیتابیس',
            'db.database' => 'نام دیتابیس',
            'admin.first_name' => 'نام ',
            'admin.last_name' => 'نام خانوادگی',
            'admin.email' => 'ایمیل',
            'admin.password' => 'کلمه عبور',
        ];
    }
}
