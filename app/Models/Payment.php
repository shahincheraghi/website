<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Payment extends Model
{
    protected $table = 'payment';
    public $timestamps = true;

    public static function store($data)
    {
        try {
            $Payment = new Payment();
            $Payment->user_id = $data['user_id'];
            $Payment->order_id = $data['order_id'];
            $Payment->price = $data['price'];
            $Payment->date = $data['date'];
            $Payment->status = $data['status'];
            $Payment->type_payment = $data['type_payment'];
            $Payment->tracking_code = $data['tracking_code'];
            $Payment->token = $data['token'];
            $Payment->refid = $data['refid'];
            $Payment->price_off = $data['price_off'];
            $Payment->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getPayments()
    {
         return Payment::get();
    }



    public static function getPayment($id)
    {
        return Payment::where('id', $id)->first();
    }

   public static function getPaymentWithOrder($order_id)
    {
        return Payment::where('order_id', $order_id)->first();
    }

    public static function updatePayment($data, $id)
    {
        try {
            $Payment = Payment::find($id);
            $Payment->user_id = $data['user_id'];
            $Payment->order_id = $data['order_id'];
            $Payment->price = $data['price'];
            $Payment->date = $data['date'];
            $Payment->status = $data['status'];
            $Payment->type_payment = $data['type_payment'];
            $Payment->tracking_code = $data['tracking_code'];
            $Payment->token = $data['token'];
            $Payment->refid = $data['refid'];
            $Payment->price_off = $data['price_off'];
            $Payment->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

        public static function deleteWithOrder($order_id)
    {
          try {
            $Payment = Payment::where('order_id',$order_id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

