<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Dispatch;
use Morilog\Jalali\Jalalian;

class Order extends Model
{
    protected $table = 'order';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function Cart()
    {
        return $this->hasMany(Cart::class, 'order_id', 'id')->with('Product');
    }

    public function Payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }
   public function Shipment()
    {
        return $this->hasOne(Shipment::class, 'id', 'shipment_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }




    public static function store($data)
    {
        try {
            $Order = new Order();
            $Order->user_id = $data['user_id'];
            $Order->date = $data['date'];
            $Order->tracking_code = $data['tracking_code'];
            $Order->address_id = 0;
            $Order->active = $data['active'];
            $Order->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getOrders($active)
    {

        if($active==1)
            return Order::where('active',$active)->get();
        else
            return Order::where('active',$active)->with('Payment')->with('User')->get();
    }


    public static function getOrdersFillter($payment,$mobile,$dateEnd,$dateStart,$user_id,$status)
    {


        return Order::where('active',0)->with('Payment')->with('User')->with('Address')
            ->where(function ($query) use ($payment,$mobile,$dateEnd,$dateStart,$user_id,$status) {

                $query->whereHas('Payment', function ($query) use ($payment) {
                    if ($payment != 0)
                        return $query->where('Payment.type_payment', $payment);
                });

                $query->whereHas('Address', function ($query) use ($mobile) {
                    if ($mobile != 0)
                        return $query->where('Address.cel', $mobile);
                });


                if ($dateStart != 0 and $dateEnd != 0 )
                    return $query->whereBetween('date', [$dateStart, $dateEnd]);

                if ($user_id != 0)
                    return $query->where('user_id', $user_id);

                if ($status !== null)
                    return $query->where('status',$status );
            })->get();
    }

    public static function getOrder($id)
    {
        return Order::where('id', $id)->first();
    }

    public static function getOrderWithUser($user_id, $active)
    {
        return Order::where('user_id', $user_id)->where('active', $active)->first();
    }

    public static function getAllOrderWithUser($user_id, $active)
    {
        return Order::where('user_id', $user_id)->where('active', $active)->get();
    }


  public static function updateOrderShippingCost($shipping_cost, $shipment_id, $id)
    {
        try {

            $Order = Order::find($id);
            $Order->shipping_cost = $shipping_cost;
            $Order->shipment_id = $shipment_id;
            $Order->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateOrderStatus($id,$status)
    {
        try {

            $Order = Order::find($id);
            $Order->status = $status;
            $Order->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateOrderActive($data,$id)

    {
        try {

            $Order = Order::find($id);
            $Order->active = $data['active'];
            $Order->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateOrder($data, $id)
    {
        try {

            $Order = Order::find($id);
            $Order->user_id = $data['user_id'];
            $Order->date = $data['date'];
            $Order->tracking_code = $data['tracking_code'];
            $Order->address_id = $data['address_id'];
            $Order->shipping_cost = $data['shipping_cost'];
            $Order->shipment_id = $data['shipment_id'];
            if(isset($data['shipping_type']))
            $Order->shipping_type = $data['shipping_type'];
            $Order->active = $data['active'];
            $Order->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function insertOrder($data)
    {

        return Order::insertGetId($data);
    }

    public static function countCart()
    {
        $count = 0;
        if (Auth::id() == 0) {
            $cart_data = Cart::unserializeCookie();
            $count = count($cart_data);
        } else {
            $user_id = Auth::id();
            $getOrder = Order::getOrderWithUser($user_id, 1);
            if ($getOrder != null) {
                $Order = Order::getOrder($getOrder->id);
                $Order = $Order->Cart;
                $count = count($Order);
            }
        }
        return $count;
    }

    public static function inserCart()
    {

        $foviashopOrder = (Cookie::get('foviashopOrder'));

        if ($foviashopOrder != 0 or $foviashopOrder != null) {
            $cart_datas = (unserialize(Cookie::get('foviashopOrder')));
            $cart_data = json_decode($cart_datas, true);
            $user_id = Auth::id();
            $checkOrder = Order::getOrderWithUser($user_id, 1);
            $nowTime = Jalalian::now()->getTimestamp();
            if ($checkOrder == null or empty($checkOrder)) {
                $data = ['user_id' => $user_id, 'date' => $nowTime, 'active' => 1, 'address_id' => 0, 'tracking_code' => $nowTime,'shipping_type' => $cart_data[0]['shipping_type'], 'shipping_cost' => 0,'shipment_id'=>0];
                $order_id = Order::insertOrder($data);
            } else {
                $order_id = $checkOrder->id;
            }
            $row_array = array();
            $response = array();
            foreach ($cart_data as $key) {
                Cart::deleteCartWithOrder((int)$key['product_id'], $order_id);
                $row_array['product_id'] = $key['product_id'];
                $row_array['price_off'] = $key['price_off'];
                $row_array['price'] = $key['price'];
                $row_array['number'] = $key['number'];
                $row_array['order_id'] = $order_id;
                array_push($response, $row_array);
            }

            $cart = Cart::storeCart($response);

        }
        Cookie::queue(Cookie::forget('foviashopOrder'));
    }

    public static function deleteWithOrder($order_id)
    {
        try {
            $Order = Order::where('id',$order_id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function getOrdersUser($user_id)
    {
        return Order::where('active',0)->with('Payment')->with('User')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
    }


    public static function getOrderWithUserAndOrder($id,$user_id)
    {
        return Order::where('id', $id)->where('user_id', $user_id)->with('Payment')->with('User')->with('Address')->with('Cart')->first();
    }


}

