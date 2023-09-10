<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'title_complaint_id' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $Complaint = new Complaint();
        $Complaint->fullName = $request->fullName;
        $Complaint->nationalCode = $request->nationalCode;
        $Complaint->mobile = $request->mobile;
        $Complaint->serial = $request->serial;
        $Complaint->city_id = $request->city_id;
        $Complaint->state_id = $request->province_id;
//        $Complaint->ReceiveDeviceWithCost = $request->ReceiveDeviceWithCost;
        $Complaint->title_complaint_id = $request->title_complaint_id;
        $Complaint->description = $request->description;
        $Complaint->save();

        $data = [
            'message' => 'درخواست شما با موفقیت ثبت شد  ',
            'status'  => true,
        ];
        return response()->json($data, 200);


    }
}
