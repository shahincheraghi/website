<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $Insurance = Insurance::getInsurance();
        $all_data = ['Insurance' => $Insurance];
        return view('Admin.Insurance.insuranceList')->with('data', $all_data);
    }
    public function sms (Request $request)
    {
        $phoneNumberUser=$request['phoneNumber'];
        $validator = \Validator::make($request->all(), [
            'imei' => 'required|numeric|digits:15',
            'fullName' => 'required|max:255',
            'province' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'city' => 'required|max:255',
            'phoneNumber' => 'required|numeric|digits:11',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $code = ActiveCode::generateCode($phoneNumberUser);
        // Todo Send Sms
        $receptor =$phoneNumberUser;
        $template = 'paymentTowFactor';
//        \Kavenegar::VerifyLookup($receptor, $code, '', null, $template);
        return true;
   }
   public function saveRecordInsurance(Request $request)
    {
       $check= ActiveCode::where('phoneNumber','=',$request['phoneNumber'])
            ->where('code','=',$request['code'])
            ->where('expired_at' , '>' , now())
           ->first();
        if($check){


            $Insurances = new Insurance();
            $Insurances->imei = $request->imei;
            $Insurances->fullName = $request->fullName;
            $Insurances->address = $request->address;
            $Insurances->nationalCode = $request->nationalCode;
            $Insurances->city = $request->city;
            $Insurances->province = $request->province;
            $Insurances->mobile = $request->phoneNumber;
            $Insurances->save();

            $data = [
                'message' => 'درخواست شما با موفقیت ثبت شد  ',
                'status'  => true,
            ];
            return response()->json($data, 200);
       }
       else{
           $data = [
               'message' => 'کد تایید نا معتبر میباشد',
               'status'  => false,
           ];
           return response()->json($data, 200);
       }

   }
}
