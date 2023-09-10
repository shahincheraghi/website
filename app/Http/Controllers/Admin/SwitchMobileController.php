<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ActiveCode;
use App\Models\FormModel;
use App\Models\FormProduct;
use App\Models\SwitchMobile;
use Illuminate\Http\Request;
use Kavenegar\KavenegarApi;


class SwitchMobileController extends Controller
{
    public function getStep2SwitchMobile(Request $request): \Illuminate\Http\JsonResponse
    {
        $formProduct=FormProduct::where('category_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formProduct,
        ]);
   }
    public function getStep3SwitchMobile(Request $request): \Illuminate\Http\JsonResponse
   {
        $formModel=FormModel::where('product_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formModel,
        ]);
   }
    public function OtpSwitchMobile     (Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName'                    => 'required|max:255',
            'address'                     => 'required|max:255',
            'nationalCode'                => 'required|numeric|digits:10',
            'mobile'                      => 'required|numeric|digits:11',
            'city_id'                     => 'required|numeric',
            'province_id'                 => 'required|numeric',
            'categorySellSwitchMobileRes' => 'required|max:255',
            'productSellSwitchMobileRes'  => 'required|max:255',
            'modelSellSwitchMobileRes'    => 'required|max:255',
            'ColorSellSwitchMobileRes'    => 'required|max:255',
            'serialSellSwitchMobileRes'   => 'required|max:255',
            'categoryBuySwitchMobileRes'  => 'required|max:255',
            'productBuySwitchMobileRes'   => 'required|max:255',
            'modelBuySwitchMobileRes'     => 'required|max:255',
            'ColorBuySwitchMobileRes'     => 'required|max:255',
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
    public function checkOtpSwitchMobile(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'phoneNumberCheckOtpSwitchMobile' => 'required|numeric|digits:11',
            'SwitchMobileOtpCode' => 'required|numeric|digits:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $check= ActiveCode::where('phoneNumber','=',$request['phoneNumberCheckOtpSwitchMobile'])
            ->where('code','=',$request['SwitchMobileOtpCode'])
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
    public function saveSwitchMobile   (Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName'                    => 'required|max:255',
            'address'                     => 'required|max:255',
            'nationalCode'                => 'required|numeric|digits:10',
            'mobile'                      => 'required|numeric|digits:11',
            'city_id'                     => 'required|numeric',
            'province_id'                 => 'required|numeric',
            'categorySellSwitchMobileRes' => 'required|max:255',
            'productSellSwitchMobileRes'  => 'required|max:255',
            'modelSellSwitchMobileRes'    => 'required|max:255',
            'ColorSellSwitchMobileRes'    => 'required|max:255',
            'serialSellSwitchMobileRes'   => 'required|max:255',
            'categoryBuySwitchMobileRes'  => 'required|max:255',
            'productBuySwitchMobileRes'   => 'required|max:255',
            'modelBuySwitchMobileRes'     => 'required|max:255',
            'ColorBuySwitchMobileRes'     => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $SwitchMobile = new SwitchMobile();
        $SwitchMobile->fullName = $request->fullName;
        $SwitchMobile->mobile = $request->mobile;
        $SwitchMobile->nationalCode = $request->nationalCode;
        $SwitchMobile->mobile = $request->mobile;
        $SwitchMobile->city_id = $request->city_id;
        $SwitchMobile->province_id = $request->province_id;
        $SwitchMobile->address = $request->address;
        $SwitchMobile->categorySellSwitchMobile = $request->categorySellSwitchMobileRes;
        $SwitchMobile->productSellSwitchMobile = $request->productSellSwitchMobileRes;
        $SwitchMobile->modelSellSwitchMobile = $request->modelSellSwitchMobileRes;
        $SwitchMobile->ColorSellSwitchMobile = $request->ColorSellSwitchMobileRes;
        $SwitchMobile->serialSellSwitchMobile = $request->serialSellSwitchMobileRes;
        $SwitchMobile->categoryBuySwitchMobile = $request->categoryBuySwitchMobileRes;
        $SwitchMobile->productBuySwitchMobile = $request->productBuySwitchMobileRes;
        $SwitchMobile->modelBuySwitchMobile = $request->modelBuySwitchMobileRes;
        $SwitchMobile->ColorBuySwitchMobile = $request->ColorBuySwitchMobileRes;
        $SwitchMobile->descriptionSellSwitchMobile = $request->descriptionSellSwitchMobileRes;
        $SwitchMobile->descriptionBuySwitchMobile = $request->descriptionBuySwitchMobileRes;


        $SwitchMobile->save();

        $receptor = $request->mobile;
        $api = new KavenegarApi(config('kavenegar.apikey'));
        $api->send(100001445,
            $receptor,
            "کاربر گرامی فرم درخواست تعویض موبایل کارکرده با نو  شما ثبت شد ، همکاران ما با شما تماس خواهند گرفت .(کد پیگیری :MGSM". $SwitchMobile->id . ") مدیا جی "
        );


        $data = [
            'success' => true,
            'message'=> 'با مووفقیت ثبت شد'
        ];
        return response()->json($data);

    }
}
