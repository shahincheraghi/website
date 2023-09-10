<?php

namespace App\Http\Controllers;

use App\Models\InsuranceSerial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsuranceSerialController extends Controller
{
    public function checkSerial(Request $request)
    {
        $imei=$request->imei;
        $check=DB::table('v_insurance_serials')-> where('IMEI1','=',$imei)
            ->orWhere('IMEI2','=',$imei)
            ->where('status','=',1)
            ->get();

        if($check->isNotEmpty()){
            if ($check[0]->statusCode === 1){
                $displayBtnGotoStep2='d-block';
            }else{
                $displayBtnGotoStep2='d-none';
            }
            $data = [
                'message' => 'مشخصات بیمه نامه شما به شرح زیر می باشد',
                'statusDisplay'  =>       true,
                'displayBtnGotoStep2'=> $displayBtnGotoStep2,
                'status'  =>        $check[0]->status,
                'IMEI1'=>           $check[0]->IMEI1,
                'IMEI2'=>           $check[0]->IMEI2,
                'Brand'=>           $check[0]->Brand,
                'Model'=>           $check[0]->Model,
                'DeviceValue'=>     $check[0]->DeviceValue,
                'InsuranceDate'=>   $check[0]->InsuranceDate,
                'Duration'=>        $check[0]->Duration,
                'TypeName'=>        $check[0]->TypeName,
                'TypeCode'=>        $check[0]->TypeCode,
                'Insurer'=>         $check[0]->Insurer,
                'statusCode'=>      $check[0]->statusCode,
            ];
            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'این سریال در بانک اطلاعاتی بیمه مدیاجی وجود ندارد .',
                'statusDisplay'  => false,

            ];
            return response()->json($data, 200);

        }
    }
}
