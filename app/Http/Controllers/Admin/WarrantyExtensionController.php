<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ActiveCode;
use App\Models\FormModel;
use App\Models\FormProduct;
use App\Models\ServiceOnline;
use App\Models\WarrantyExtension;
use Illuminate\Http\Request;
use Kavenegar\KavenegarApi;


class WarrantyExtensionController extends Controller
{
    public function getStep2WarrantyExtension(Request $request)
    {
        $formProduct=FormProduct::where('category_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formProduct,
        ]);
   }
   public function getStep3WarrantyExtension(Request $request)
    {
        $formProduct=FormModel::where('product_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formProduct,
        ]);
   }

    public function OtpWarrantyExtension(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'CategoryWarrantyExtension' => 'required|max:255',
            'ProductWarrantyExtension' => 'required|max:255',
            'ModelWarrantyExtension' => 'required|max:255',
            'ColorWarrantyExtensionRes' => 'required|max:255',
            'SerialDeviceWarrantyExtensionRes' => 'required|max:255',
//            'descriptionWarrantyExtension' => 'required|max:255',

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
    public function checkOtpWarrantyExtension(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'phoneNumberCheckOtp' => 'required|numeric|digits:11',
            'WarrantyExtensionOtpCode' => 'required|numeric|digits:6',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $check= ActiveCode::where('phoneNumber','=',$request['phoneNumberCheckOtp'])
            ->where('code','=',$request['WarrantyExtensionOtpCode'])
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
    public function saveWarrantyExtension(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'CategoryWarrantyExtension' => 'required|max:255',
            'ProductWarrantyExtension' => 'required|max:255',
            'ModelWarrantyExtension' => 'required|max:255',
            'ColorWarrantyExtensionRes' => 'required|max:255',
            'SerialDeviceWarrantyExtensionRes' => 'required|max:255',
//            'descriptionWarrantyExtension' => 'required|max:255',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $orders = new WarrantyExtension();
        $orders->fullName = $request->fullName;
        $orders->address = $request->address;
        $orders->nationalCode = $request->nationalCode;
        $orders->mobile = $request->mobile;
        $orders->province_id = $request->province_id;
        $orders->city_id = $request->city_id;
        $orders->category = $request->CategoryWarrantyExtension;
        $orders->model = $request->ModelWarrantyExtension;
        $orders->color = $request->ColorWarrantyExtensionRes;
        $orders->product = $request->ProductWarrantyExtension;
        $orders->serialDevice = $request->SerialDeviceWarrantyExtensionRes;
        $orders->description = $request->descriptionWarrantyExtension;

        $orders->save();

        $receptor = $request->mobile;
        $api = new KavenegarApi(config('kavenegar.apikey'));
        $api->send(100001445,
            $receptor,
            "کاربر گرامی فرم درخواست تمدید گارانتی شما ثبت شد ، همکاران ما با شما تماس خواهند گرفت .(کد پیگیری :MGWE". $orders->id . ") مدیا جی "
        );


        $data = [
            'success' => true,
            'message'=> 'با مووفقیت ثبت شد'
        ];
        return response()->json($data);

    }
}
