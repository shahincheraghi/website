<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ActivationHamta;
use App\Models\ActivationHamtaUssd;
use App\Models\ActiveCode;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Kavenegar;
use Kavenegar\KavenegarApi;

class ActivationHamtaController extends Controller
{
    public function index(): string
    {
        return view('Front.ActivationHamta');
    }

    /**
     * @throws GuzzleException
     */
    public function checkModelDeviceActivationHamta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Imei' => 'required|numeric|digits:15',
        ]);
        if ($validator->fails()) {
            $data = [
                'status' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($data, 200);
        }
        $imei = $request->Imei;
        $client = new Client();
        $api = $client->request('POST', 'https://app.mediapardazesh.com/api/check-hamta-code', [
            'form_params' => [
                'imei' => $imei,
            ]
        ]);
        $response = json_decode($api->getBody(), true);
        if ($response['status'] == 200) {
            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'message' => $response['data']['model'],
            ], 200);
        } elseif ($response['status'] == 420) {
            return response()->json([
                'status' => true,
                'statusCode' => 420,
                'message' => 'خظا در دریافت اطلاعات ، لطفا با شرکت تماس حاصل فرمایید',
            ], 200);

        } elseif ($response['status'] == 404) {
            return response()->json([
                'status' => true,
                'statusCode' => 404,
                'message' => 'سریال وارد شده نا معتبر میباشد',
            ], 200);

        }
    }
    public function sendOtpActivationHamta(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'NationalCode' => 'required|numeric|digits:10',
            'Mobile' => 'required|numeric|digits:11',
            'Imei' => 'required|numeric|digits:15',
            'province_id' => 'required|max:100',
            'city_id' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            $data = [
                'status' => true,
                'errors' => $validator->errors(),
            ];
            return response()->json($data, 200);
        }
        $data = [
            'success' => true,
            'successCode' => '200',
            'message' => 'درخواست موفقیت آمیز'
        ];
        return response()->json($data);
    }
    public function checkAndSaveOtpActivationHamta(Request $request): JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'mobileCheckOtpActivationHamta' => 'required|numeric|digits:11',
            'activationHamtaOtpCode' => 'required|numeric|digits:4',
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'NationalCode' => 'required|numeric|digits:10',
            'Mobile' => 'required|numeric|digits:11',
            'Imei' => 'required|numeric|digits:15',
            'province_id' => 'required|max:100',
            'city_id' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $check = ActiveCode::where('phoneNumber', '=', $request['mobileCheckOtpActivationHamta'])
            ->where('code', '=', $request['activationHamtaOtpCode'])
            ->where('expired_at', '>', now())
            ->first();
        if ($check) {
            $imei = $request->Imei;
            $client = new Client();
            $api = $client->request('POST',
                'https://app.mediapardazesh.com/api/check-hamta-code', [
                    'form_params' => [
                        'imei' => $imei,
                    ]
                ]);
            $response = json_decode($api->getBody(), true);
            if ($response['status'] == 200) {
                $ActiveCode = new ActivationHamta();
                $ActiveCode->FirstName = $request->FirstName;
                $ActiveCode->LastName = $request->LastName;
                $ActiveCode->NationalCode = $request->NationalCode;
                $ActiveCode->Mobile = $request->Mobile;
                $ActiveCode->Imei = $request->Imei;
                $ActiveCode->province_id = $request->province_id;
                $ActiveCode->city_id = $request->city_id;
                $ActiveCode->save();
                $api = new KavenegarApi(config('kavenegar.apikey'));
                $fullName = $request->FirstName . ' ' . $request->LastName;
                $api->send(100001445, $request['mobileCheckOtpActivationHamta'],
                    $fullName . " عزیز\n" .
                    "اطلاعات شما با موفقیت ثبت شد.\n" .
                    "کد فعال سازی شما: " . $response['data']['registrationcode'] . "\n" .
                    "تجربه خدمات عالی با مدیا جی");
                $data = [
                    'success' => true,
                    'statusCode' => 200,
                    'code' => $response['data']['registrationcode'],
                    'name' => $fullName,
                    'message' => 'با مووفقیت ثبت شد'
                ];
                return response()->json($data);
            }
            elseif ($response['status'] == 420) {
                return response()->json([
                    'status' => true,
                    'statusCode' => 420,
                    'message' => 'خظا در دریافت اطلاعات سریال  ، لطفا با شرکت تماس حاصل فرمایید',
                ], 200);

            }
            elseif ($response['status'] == 404) {
                return response()->json([
                    'status' => true,
                    'statusCode' => 404,
                    'message' => 'سریال وارد شده نا معتبر میباشد',
                ], 200);

            }
        } else {
            $data = [
                'message' => 'کد تایید نا معتبر میباشد',
                'status' => 'falseInvalidSms',
                'statusCode' => 210,
            ];
            return response()->json($data, 200);
        }
        $data = [
            'message' => 'خطا در ثبت اطلاعات !',
            'status' => 'errorSaveSerialDevice',
            'statusCode' => 220,
        ];
        return response()->json($data, 200);
    }
    public function resendSms(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'Mobile' => 'required|numeric|digits:11',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => true,
                'errors' => $validator->errors(),
            ];
            return response()->json($data, 200);
        }
        $phoneNumberUser = $request->Mobile;
        ActiveCode::where('phoneNumber', '=', $phoneNumberUser)->delete();
        $code = ActiveCode::generateCode4($phoneNumberUser);
        // Todo Send Sms
        $receptor = $phoneNumberUser;
        $template = 'mediaGInsurance';
        Kavenegar::VerifyLookup($receptor, $code, "", "", $template, "sms");
        $data = [
            'success' => true,
            'successCode' => '200',
            'message' => 'پیامک  با مووفقیت ارسال شد'
        ];
        return response()->json($data);
    }
    /**
     * @throws Exception|GuzzleException
     */
    public function ussdHamta(Request $request)
    {
        $client = new Client();
        header('Content-Type: text/plain; charset=utf-8');
        $inputArr = explode('*', $request['call']);
        if ($request['call'] == '6655*42940') { echo ' 1- نام و نام خوانوادگی خود را به لاتین وارد نمایید'; }
        elseif (count($inputArr) === 3 && $inputArr[0] === '6655' && $inputArr[1] === '42940' && $inputArr[2]) {
            echo '2 - کد ملی خود را وارد نمایید';
        }
        elseif (count($inputArr) === 4 && $inputArr[0] === '6655' && $inputArr[1] === '42940'&& $inputArr[2] && $inputArr[3]) {
            echo 'لطفا سریال گوشی خود را وارد نمایید';
        }
        elseif (count($inputArr) === 5 && $inputArr[0] === '6655' && $inputArr[1] === '42940'&& $inputArr[2] && $inputArr[3] && $inputArr[4]) {
            echo 'اطلاعات  ثبت شد، نتیجه اطلاع رسانی خواهد شد';
                $mobile = $request->mobile;
                $fullName = $inputArr[2];
                $nationalCode = $inputArr[3];
                $imei = $inputArr[4];
                $api = $client->request('POST',
                    'https://app.mediapardazesh.com/api/check-hamta-code', [
                        'form_params' => [
                            'imei' => $imei,
                        ]
                    ]);
                $response = json_decode($api->getBody(), true);
                if ($response['status'] == 200) {
                $ActivationHamtaUssd = new ActivationHamtaUssd();
                $ActivationHamtaUssd->fullName = $fullName;
                $ActivationHamtaUssd->NationalCode = $nationalCode;
                $ActivationHamtaUssd->Mobile = $mobile;
                $ActivationHamtaUssd->Imei = $imei;
                $ActivationHamtaUssd->status = 1;
                $ActivationHamtaUssd->save();
                    $api = new KavenegarApi(config('kavenegar.apikey'));
                    $api->send(100001445, $request->mobile,
                        "کاربر گرامی \n" .
                        "اطلاعات شما با موفقیت ثبت شد.\n" .
                        "کد فعال سازی شما: " . $response['data']['registrationcode'] . "\n" .
                        "تجربه خدمات عالی با مدیا جی .");
                }
                else  {
                    $ActivationHamtaUssd = new ActivationHamtaUssd();
                    $ActivationHamtaUssd->fullName = $fullName;
                    $ActivationHamtaUssd->NationalCode = $nationalCode;
                    $ActivationHamtaUssd->Mobile = $mobile;
                    $ActivationHamtaUssd->Imei = $imei;
                    $ActivationHamtaUssd->status = 0;
                    $ActivationHamtaUssd->save();
                    $api = new KavenegarApi(config('kavenegar.apikey'));
                    $api->send(100001445, $request->mobile,
                        "سریال دستگاه وارد شده نا معتبر میباشد \n" .
                                "تجربه خدمات عالی با مدیا جی .\n"
                );
                    }

        }
    }
}
//350264720327343
