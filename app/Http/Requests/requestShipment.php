<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestShipment extends FormRequest
{

    protected $rules = [
        'title' => 'required:max:255',
        'english_title' => 'required:max:255',
        'active' => 'nullable|between:0,2',
        'type_payment' => 'nullable|between:0,2',
        'insurance_rates' => 'required|integer',
        'taxation' => 'required|integer',
        'fixed_extra_amount' => 'required|integer',
        'fixed_extra_percentage' => 'required|integer',
        'minimum_order_cost' => 'required|integer',
        'surplus_amount' => 'required|integer',
        'typeproduct.*' => 'required|integer',
        'destination_cities' => 'required',
        'destination_cities.*' => 'required|exists:city,id',
        'image' => 'required|image',
    ];

    public function authorize()
    {
//dd($this->all());

        if (\Request::route()->getName() == "Admin.shipments.update") {
            $this->rules['image'] = 'nullable';
        }
        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
