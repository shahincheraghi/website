<?php

namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Settings;
use Morilog\Jalali\Jalalian;
use Session;
use SoapClient;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{


    public function verifyZarinpal()
    {

        $Authority = $_GET['Authority'];
        $date = Jalalian::now()->getTimestamp();
        $user_id=Auth::id();
        $getOrder = Order::getOrderWithUser($user_id,1);
        $order_id=$getOrder->id;

        $settings = Settings::allSettings()->pluck('value', 'name');
        $merchant=$settings['merchant_zarinpal'];
        $Payment=Payment::getPaymentWithOrder($order_id);
        $MerchantID = $merchant;
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $result = $client->PaymentVerification([
            'MerchantID'     => $MerchantID,
            'Authority'      => $Authority,
            'Amount'         => $Payment->price,
        ]);

        if ($_GET['Status'] == 'OK') {


            if ($result->Status == 100) {

                $data=array("user_id" => $Payment->user_id,"order_id" =>$Payment->order_id,"price"=>$Payment->price,"date" =>$Payment->date,"status"=>1,"type_payment"=>2,"tracking_code"=>$Payment->date,"refid"=>$result['data']['ref_id'],"token"=>$Payment->token,"price_off"=>$Payment->price_off);
                $Payments = Payment::updatePayment($data);

                $data=array("discount_code"=>$DiscountCode,"active"=>0);
                $Order = Order::updateOrderActive($data,$order_id);
                Cart::updateInventory($order_id);
                $Check_inventory=[];
                $text='سفارش با موفقیت ثبت شد';
                $all_data = ['text' => $text,'factorPrice'=>$Payment->price,'order_id'=>$order_id,'code_tracking'=>$Payment->date,'type'=>'3','response'=>$Check_inventory,'status'=>'success'];
                return view('Front.confirm')->with('data',$all_data);
            }
            else {

                $Check_inventory=[];
                $all_data = ['text' => 'پرداخت انجام نشد','factorPrice'=>$Payment->price,'order_id'=>$order_id,'code_tracking'=>$Payment->date,'type'=>'3','response'=>$Check_inventory,'status'=>'error'];
                return view('Front.confirm')->with('data',$all_data);
            }

        } else {


            $Check_inventory=[];
            $all_data = ['text' => 'پرداخت انجام نشد','factorPrice'=>$Payment->price,'order_id'=>$order_id,'code_tracking'=>$Payment->date,'type'=>'3','response'=>$Check_inventory,'status'=>'error'];
            return view('Front.confirm')->with('data',$all_data);

        }
    }
    public function verify($payType)
    {

        $date = Jalalian::now()->getTimestamp();
        $user_id=Auth::id();
        $getOrder = Order::getOrderWithUser($user_id,1);
        $order_id=$getOrder->id;
        $settings = Settings::allSettings()->pluck('value', 'name');
        $merchant=$settings['merchant_idpay'];
        $Payment=Payment::getPaymentWithOrder($order_id);

        $params = array(
            'id' => $Payment->refid,
            'order_id' => $order_id,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY:'.$merchant,
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($result, true);
        if($json['status']=='100')
        {
            $data=array("user_id" => $Payment->user_id,"order_id" =>$Payment->order_id,"price"=>$Payment->price,"date" =>$Payment->date,"status"=>1,"type_payment"=>2,"tracking_code"=>$Payment->date,"refid"=>$Payment->refid,"token"=>$Payment->token,"price_off"=>$Payment->price_off);
            $Payments = Payment::updatePayment($data);

            $data=array("active"=>0);
            $Order = Order::updateOrderActive($data,$order_id);
            Cart::updateInventory($order_id);

            $Check_inventory=[];
            $text='سفارش با موفقیت ثبت شد';
            $all_data = ['text' => $text,'factorPrice'=>$Payment->price,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'2','response'=>$Check_inventory,'status'=>'success'];
            return view('Front.confirm')->with('data',$all_data);

        }
        else
        {
            $text='سفارش شما ثبت نشد';
            $all_data = ['text' => $json['error_message'],'factorPrice'=>$Payment->price,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'2','response'=>'','status'=>'error'];
            return view('Front.confirm')->with('data',$all_data);
        }
    }
    public function paymentPrice($payType)
    {


        if($payType==1)
        {
            $date = Jalalian::now()->getTimestamp();
            $user_id=Auth::id();
            $getOrder = Order::getOrderWithUser($user_id,1);
            $order_id=$getOrder->id;
            $tracking_code=$getOrder->tracking_code;
            $Check_inventory = Cart::CheckInventory($order_id);
            $DiscountCodePrice=0;
            $factorPrice=0;
            $DiscountCode=null;
            if(sizeof($Check_inventory)==0)
            {



                $sumPriceCart=Cart::sumPriceOrder($order_id);
                $sumShipment=$getOrder->shipping_cost;
                $factorPrice=$sumPriceCart+$sumShipment+$DiscountCodePrice;

                $data=array("user_id" => $user_id,"order_id" =>$order_id,"price"=>$sumPriceCart+$sumShipment,"date" =>$date,"status"=>1,"type_payment"=>1,"tracking_code"=>$date,"refid"=>0,"token"=>'',"price_off"=>$factorPrice);
                $Payments = Payment::store($data);
                $data=array("active"=>0);
                $Order = Order::updateOrderActive($data,$order_id);
                Cart::updateInventory($order_id);

                $Check_inventory=[];
                $text='سفارش با موفقیت ثبت شد';
                $all_data = ['text' => $text,'factorPrice'=>$factorPrice,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'1','response'=>$Check_inventory,'status'=>'success'];
                return view('Front.confirm')->with('data',$all_data);
            }
            else
            {
                $text='سفارش شما ثبت نشد';
                $all_data = ['text' => $text,'factorPrice'=>$factorPrice,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'1','response'=>$Check_inventory,'status'=>'error'];
                return view('Front.confirm')->with('data',$all_data);
            }
        }
        elseif($payType==2){
            $date = Jalalian::now()->getTimestamp();
            $user_id=Auth::id();
            $getOrder = Order::getOrderWithUser($user_id,1);
            $order_id=$getOrder->id;
            $tracking_code=$getOrder->tracking_code;
            $Check_inventory = Cart::CheckInventory($order_id);
            $DiscountCodePrice=0;
            $factorPrice=0;
            $DiscountCode=null;
            if(sizeof($Check_inventory)==0)
            {


                $sumPriceCart=Cart::sumPriceOrder($order_id);
                $sumShipment=$getOrder->shipping_cost;
                $settings = Settings::allSettings()->pluck('value', 'name');
                $merchant=$settings['merchant_idpay'];

                $factorPrice=$sumPriceCart+$sumShipment+$DiscountCodePrice;

                $params = array(
                    'order_id' => $order_id,
                    'amount' => $factorPrice,
                    'name' => 'کاربر ',
                    'phone' => '0',
                    'mail' => 'my@site.com',
                    'desc' => 'خرید',
                    'callback' => '/carts/verify',
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-API-KEY:'.$merchant,
                ));

                $result = curl_exec($ch);
                curl_close($ch);
                $json = json_decode($result, true);

                if(isset($json['error_code']))
                {
                    $Check_inventory=[];
                    $text='سفارش شما ثبت نشد';
                    $all_data = ['text' => $json['error_message'],'factorPrice'=>$factorPrice,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'2','response'=>$Check_inventory,'status'=>'error'];
                    return view('Front.confirm')->with('data',$all_data);


                }
                else
                {

                    Payment::deleteWithOrder($order_id);
                    $data=array("user_id" => $user_id,"order_id" =>$order_id,"price"=>$sumPriceCart+$sumShipment,"date" =>$date,"status"=>0,"type_payment"=>2,"tracking_code"=>$date,"refid"=>$json['id'],"token"=>$json['link'],"price_off"=>$factorPrice);
                    $Payments = Payment::store($data);
                    return redirect()->to($json['link']);
                }
            }
            else
            {

                $text='سفارش شما ثبت نشد';
                $all_data = ['text' => $text,'factorPrice'=>$factorPrice,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'2','response'=>$Check_inventory,'status'=>'error'];
                return view('Front.confirm')->with('data',$all_data);
            }

        }
        elseif($payType==3)
        {
            $date = Jalalian::now()->getTimestamp();
            $user_id=Auth::id();
            $getOrder = Order::getOrderWithUser($user_id,1);
            $order_id=$getOrder->id;
            $tracking_code=$getOrder->tracking_code;
            $Check_inventory = Cart::CheckInventory($order_id);
            $DiscountCodePrice=0;
            $factorPrice=0;
            $DiscountCode=null;
            if(sizeof($Check_inventory)==0)
            {

                $sumPriceCart=Cart::sumPriceOrder($order_id);
                $sumShipment=$getOrder->shipping_cost;

                $settings = Settings::allSettings()->pluck('value', 'name');
                $merchant=$settings['merchant_zarinpal'];
                $factorPrice=$sumPriceCart+$sumShipment+$DiscountCodePrice;

                $MerchantID = $merchant;  //Required
                $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

                $result = $client->PaymentRequest([
                    'MerchantID' => $MerchantID,
                    'Amount' => $factorPrice,
                    'Description' => 'خرید اینترنتی',
                    'Email' => '',
                    'Mobile' => '',
                    'CallbackURL' =>(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://'.$_SERVER['HTTP_HOST'].'/carts/verifyZarinpal',
                ]);

                if ($result->Status == 100) {
                    Payment::deleteWithOrder($order_id);
                    $data=array("user_id" => $user_id,"order_id" =>$order_id,"price"=>$sumPriceCart+$sumShipment,"date" =>$date,"status"=>0,"type_payment"=>3,"tracking_code"=>$date,"refid"=>0,"token"=> $result->Authority,"price_off"=>$factorPrice);
                    $Payments = Payment::store($data);

                    return redirect()->to('https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
                }
                else
                {
                    $Check_inventory=[];

                    $all_data = ['text' => $result->Status,'factorPrice'=>$factorPrice,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'3','response'=>$Check_inventory,'status'=>'error'];

                    return view('Front.confirm')->with('data',$all_data);
                }


            }

            else
            {
                $text='سفارش شما ثبت نشد';
                $all_data = ['text' => $text,'factorPrice'=>$factorPrice,'order_id'=>$order_id,'code_tracking'=>$tracking_code,'type'=>'3','response'=>$Check_inventory,'status'=>'error'];
                return view('Front.confirm')->with('data',$all_data);
            }

        }
    }


}
