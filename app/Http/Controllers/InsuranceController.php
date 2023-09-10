<?php

namespace App\Http\Controllers;

use App\Models\ActiveCode;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kavenegar;
class InsuranceController extends Controller
{
    public function index()
    {
        $Contacts = Insurance::getInsurance();
        $all_data = ['Contacts' => $Contacts];
        return view('Admin.Insurance.insuranceList')->with('data', $all_data);
    }
    public function checkAndSmsInsurance (Request $request)
    {
        $phoneNumberUser = $request['mobile'];
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'province_id' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'city_id' => 'required|max:255',
            'mobile' => 'required|numeric|digits:11',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $code = ActiveCode::generateCode($phoneNumberUser);
        // Todo Send Sms
        $receptor = $phoneNumberUser;
        $template = 'mediaGInsurance';
        \Kavenegar::VerifyLookup($receptor,$code,"","",$template,"sms");

        return true;
    }
   public function saveRecordInsurance(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'province_id' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'city_id' => 'required|max:255',
            'mobile' => 'required|numeric|digits:11',
            'code' => 'required|numeric|digits:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $imei=$request->imei;
        $checkImei=DB::table('v_insurance_serials')-> where('IMEI1','=',$imei)
            ->orWhere('IMEI2','=',$imei)
            ->where('status','=',1)
            ->get();

        if ($checkImei[0]->statusCode === 1) {

            $check= ActiveCode::where('phoneNumber','=',$request['mobile'])
                ->where('code','=',$request['code'])
                ->where('expired_at' , '>' , now())
                ->first();

            if($check){
                $Insurances = new Insurance();
                $Insurances->imei = $request->imei;
                $Insurances->fullName = $request->fullName;
                $Insurances->address = $request->address;
                $Insurances->nationalCode = $request->nationalCode;
                $Insurances->city = $request->city_id;
                $Insurances->province = $request->province_id;
                $Insurances->mobile = $request->mobile;
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
                    'status'  => 'falseInvalidSms',
                ];
                return response()->json($data, 200);
            }
        }else{
            $data = [
                'message' => 'درخواست شما با موفقیت ثبت شد',
                'status'  => true,
            ];
            return response()->json($data, 200);
        }
   }
}
