<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = ['id'];
    public $timestamps = true;


    public function Order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function Product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }





    public static function storeCart($data)
    {

       try {
               Cart::insert($data);
               return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function store($data)
    {
        try {
            $Cart = new Cart();
            $Cart->product_id = $data['product_id'];
            $Cart->number = $data['number'];
            $Cart->price = $data['price'];
            $Cart->price_off = $data['price_off'];
            $Cart->order_id = $data['order_id'];
            $Cart->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
      public static function getCarts()
    {
            return Cart::get();


    }
    public static function getCart($id)
    {
            return Cart::where('id', $id)->first();
    }

      public static function getCartWithWhereIn($ids)
    {
        $array=explode(',',$ids);
            return Cart::whereIn('id', $array)->with('Product')->get();
    }



       public static function CartWithOrderDistinct($order_id)
    {
            return Cart::where('order_id', $order_id)
            ->select(Cart::raw("(GROUP_CONCAT(DISTINCT  product_id)) as product_id"))
            ->first()->toArray();
    }



    public static function getCartWithOrder($order_id,$count)
    {
                   if($count==0)
                      return Cart::where('order_id', $order_id)->first();
                  else
                    return Cart::where('order_id', $order_id)->count();
    }

    public static function getAllCartWithOrder($order_id,$count)
    {
        if($count==0)
                      return Cart::where('order_id', $order_id)->get();
                  else
                    return Cart::where('order_id', $order_id)->count();
    }

    public static function updateCart($data,$id)
    {
        try {

            $Cart = Cart::find($id);
            $Cart->product_id = $data['product_id'];
            $Cart->number = $data['number'];
            $Cart->price = $data['price'];
            $Cart->price_off = $data['price_off'];
            $Cart->order_id = $data['order_id'];
            $Cart->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function unserializeCookie()
    {
                $cart_data=array();
        if(Cookie::get('foviashopOrder')!=null)
        {
        $cart_data_unserialize = (unserialize(Cookie::get('foviashopOrder')));
        $cart_data = json_decode($cart_data_unserialize, true);
        }
        return $cart_data;
    }


       public static function eventValueProduct($event,$count,$number)
    {
                     if($event==1)
                        $total=$count + $number;
                    else
                     $total= $number-$count;
         return $total;
    }


    public static function checkCart($product_id,$order_id)
    {
        $Cart = Cart::where('product_id', $product_id)
        ->where('order_id',$order_id)->first();
        return $Cart;

    }

    public static function updateCartNumber($cart_id, $number)
    {
    try {
            $Cart = Cart::find($cart_id);
            $Cart->number = $number;
            $Cart->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public static function deleteCart($cart_id,$order_id)
    {

          try {
            $Cart = Cart::where('id',$cart_id)->where('order_id',$order_id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

        public static function deleteCartWithOrder($product_id,$order_id)
    {

          try {
            $Cart = Cart::where('product_id',$product_id)->where('order_id',$order_id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

        public static function sumPriceOrder($order_id)
    {
        $price = 0;
        $keys = Cart::where('order_id', $order_id)
            ->get();
        foreach ($keys as $key) {
            $price = ($key->price_off * $key->number) + $price;

        }
        return $price;
    }


    public static function CheckInventory($order_id)
    {
        $response = array();
        $row_array = array();
      $carts=Cart::getAllCartWithOrder($order_id,0);

      foreach($carts as $cart )
      {
          $ProductPrice = Product::getProduct($cart->product_id);
          $count=$ProductPrice->count;
          if($count<$cart->number)
          {
               $row_array['number'] = $cart->number;
               $row_array['count'] = $count;
               $row_array['product'] = $ProductPrice->title;
               array_push($response, $row_array);
          }
      }
         return $response;

    }


        public static function updateInventory($order_id)
    {
      $response = array();
      $carts=Cart::getAllCartWithOrder($order_id,0);
      foreach($carts as $cart )
      {
          $Product = Product::getProduct($cart->product_id);
          $count=$Product->count;
          if($count>=$cart->number)
          {
           $number=$count-$cart->number;
           $response=ProductPrice::updateProductCount($number,$Product->id);
          }

      }
         return $response;

    }


    public static function deleteWithOrder($order_id)
    {

          try {
            $Cart = Cart::where('order_id',$order_id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




}

