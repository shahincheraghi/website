<?php

namespace App\Http\Controllers;

use App\Models\InsuranceType;
use Illuminate\Http\Request;

class InsuranceTypeController extends Controller
{
    public function getInsuranceDetails(Request $request)
    {
        $typeCodeInsurance=$request->typeCodeInsurance;
        $check= InsuranceType::
        where('type','=',$typeCodeInsurance)
            ->where('status','=',1)
            ->get();
        if($check->isNotEmpty()){
            $data = [
                'message' => 'درخواست موفقیت آمیز',
                'status'  => true,
                'type'=>            $check[0]->type,
                'name'=>            $check[0]->name,
                'description'=>     $check[0]->description,
            ];
            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'بیمه نامه ایی پیدا نشد .',
                'status'  => false,

            ];
            return response()->json($data, 200);

        }
    }
}
