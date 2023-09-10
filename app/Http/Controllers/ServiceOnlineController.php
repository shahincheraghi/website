<?php

namespace App\Http\Controllers;

use App\Models\ActiveCode;
use App\Models\FormModel;
use App\Models\FormProduct;
use App\Models\Insurance;
use App\Models\ServiceOnline;
use Illuminate\Http\Request;
use Kavenegar;
use Kavenegar\KavenegarApi;

class ServiceOnlineController extends Controller
{

    public function index() {

        $ServiceOnline= ServiceOnline::getServiceOnline();
        $all_data = ['ServiceOnline' => $ServiceOnline];
        return view('Admin.serviceOnline.serviceOnlineList')->with('data', $all_data);

    }

    public function getFormStep2Service(Request $request)
    {
     $formProduct=FormProduct::where('category_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formProduct,
        ]);
    }
    public function getFormStep3Service(Request $request)
    {
     $formProduct=FormModel::where('product_id','=',$request->id)->orderBy('sort', 'ASC')->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $formProduct,
        ]);
    }
    public function OtpServiceOnline(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'CategoryFormService' => 'required|max:255',
            'ModelFormService' => 'required|max:255',
            'ColorFormServiceRes' => 'required|max:255',
            'SerialDeviceFormServiceRes' => 'required|digits:15',
            'ProblemEventFormServiceRes' => 'required|max:255',
            'ProblemDeviceFormService' => 'required|max:255'
        ]);
        if ($validator->fails())
        {
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
    public function checkOtpServiceOnline(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'phoneNumberCheckOtp' => 'required|numeric|digits:11',
            'formServiceOtpCode' => 'required|numeric|digits:6',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $check= ActiveCode::where('phoneNumber','=',$request['phoneNumberCheckOtp'])
            ->where('code','=',$request['formServiceOtpCode'])
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
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',
            'nationalCode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
            'CategoryFormService' => 'required|max:255',
            'ModelFormService' => 'required|max:255',
            'ColorFormServiceRes' => 'required|max:255',
            'SerialDeviceFormServiceRes' => 'required|digits:15',
            'ProblemEventFormServiceRes' => 'required|max:255'
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $orders = new ServiceOnline();
        $orders->fullName = $request->fullName;
        $orders->address = $request->address;
        $orders->nationalCode = $request->nationalCode;
        $orders->mobile = $request->mobile;
        $orders->state_id = $request->province_id;
        $orders->city_id = $request->city_id;
        $orders->serialDevice = $request->SerialDeviceFormServiceRes;
        $orders->category = $request->CategoryFormService;
        $orders->model = $request->ModelFormService;
        $orders->color = $request->ColorFormServiceRes;
        $orders->problemEvent = $request->ProblemEventFormServiceRes;
        $orders->descriptionProblemEvent = $request->descriptionProblemPrevStep;
        $orders->descriptionProblem = $request->descriptionProblem;
        $orders->save();

        $receptor = $request->mobile;
        $api = new KavenegarApi(config('kavenegar.apikey'));
        $api->send(100001445,
            $receptor,
            "کاربر گرامی فرم درخواست تعمییرات شما ثبت شد ، همکاران ما با شما تماس خواهند گرفت .(کد پیگیری :MGR". $orders->id . ") مدیا جی "
        );


        $data = [
            'success' => true,
            'message'=> 'با مووفقیت ثبت شد'
        ];
        return response()->json($data);

    }
}
