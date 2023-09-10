<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ActiveCode;
use App\Models\FormModel;
use App\Models\FormProduct;
use App\Models\FormTrade;
use App\Models\ServiceOnline;
use App\Models\WarrantyExtension;
use Illuminate\Http\Request;
use Kavenegar\KavenegarApi;


class FormTradeController extends Controller
{
    public function getStep3FormTrade(Request $request): \Illuminate\Http\JsonResponse
    {
        $formProduct=FormProduct::where('category_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formProduct,
        ]);
   }
    public function getStep4FormTrade(Request $request): \Illuminate\Http\JsonResponse
   {
        $formModel=FormModel::where('product_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formModel,
        ]);
   }
    public function OtpFormTrade     (Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'typeTradeRes' => 'required|max:255',
            'CategoryFormTradeRes' => 'required|max:255',
            'ProductFormTrade' => 'required|max:255',
            'ModelFormTrade' => 'required|max:255',
            'ColorFormTradeRes' => 'required|max:255',


        ]);
        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $phoneNumberUser=$request->mobile;
        $code = ActiveCode::generateCode($phoneNumberUser);
        // Todo Send Sms
        $receptor = $phoneNumberUser;
        $template = 'mediaGInsurance';
        \Kavenegar::VerifyLookup($receptor,$code,"","",$template,"sms");
        $data = [
            'success' => true,
            'successCode' => '200',
            'message'=> 'پیامک  با مووفقیت ارسال شد'
        ];
        return response()->json($data);
    }
    public function checkOtpFormTrade(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'phoneNumberCheckOtp' => 'required|numeric|digits:11',
            'FormTradeOtpCode' => 'required|numeric|digits:6',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $check= ActiveCode::where('phoneNumber','=',$request['phoneNumberCheckOtp'])
            ->where('code','=',$request['FormTradeOtpCode'])
            ->where('expired_at' , '>' , now())
            ->first();
        if($check){
            $data = [
                'message' => 'درخواست شما با موفقیت ثبت شد  ',
                'status'  => true,
                'statusCode'  => "200",
            ];
            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'کد تایید نا معتبر میباشد',
                'status'  => 'falseInvalidSms',
                'statusCode'  => '210',
            ];
            return response()->json($data, 200);
        }
    }
    public function saveFormTrade    (Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'typeTradeRes' => 'required|max:255',
            'CategoryFormTradeRes' => 'required|max:255',
            'ProductFormTrade' => 'required|max:255',
            'ModelFormTrade' => 'required|max:255',
            'ColorFormTradeRes' => 'required|max:255',


        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $FormTrade = new FormTrade();
        $FormTrade->fullName = $request->fullName;
        $FormTrade->mobile = $request->mobile;
        $FormTrade->nationalCode = $request->nationalCode;
        $FormTrade->mobile = $request->mobile;
        $FormTrade->city_id = $request->city_id;
        $FormTrade->province_id = $request->province_id;
        $FormTrade->address = $request->address;
        $FormTrade->typeTrade = $request->typeTradeRes;
        $FormTrade->category = $request->CategoryFormTradeRes;
        $FormTrade->product = $request->ProductFormTrade;
        $FormTrade->model = $request->ModelFormTrade;
        $FormTrade->color = $request->ColorFormTradeRes;
        $FormTrade->serialDevice = $request->SerialFormTradeRes;
        $FormTrade->description = $request->description;

        $FormTrade->save();

        $receptor = $request->mobile;
        $api = new KavenegarApi(config('kavenegar.apikey'));
        $api->send(100001445,
            $receptor,
            "کاربر گرامی فرم درخواست خرید / فروش  شما ثبت شد ، همکاران ما با شما تماس خواهند گرفت .(کد پیگیری :MGFT". $FormTrade->id . ") مدیا جی "
        );


        $data = [
            'success' => true,
            'message'=> 'با مووفقیت ثبت شد'
        ];
        return response()->json($data);

    }
}
