<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestShipmentTarrif extends FormRequest
{

    protected $rules = [
        'post_type' => 'required|between:0,2',
        'minimum_weight' => 'required|integer',
        'maximum_weight' => 'required|integer',
        'shipping_cost' => 'required|integer',
    ];

    public function authorize()
    {        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
