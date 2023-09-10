<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Address;
use App\Models\City;
use App\Models\Settings;
use App\Models\Shipment;
use App\Models\ShipmentTariff;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Session;

class CartController extends Controller
{



    public function payment()
    {

        $user_id = Auth::id();
        $getOrder = Order::getOrderWithUser($user_id, 1);
        $sizeof = sizeof($getOrder->Cart);
        if ($getOrder != null and $sizeof > 0) {
            $count = Dispatch::getDispatchsCount($getOrder->id);
            if ($count > 0)
                return redirect()->route('Front.index')->with('msgError', trans('langPanel.the_operation_failed'));

            $icon = Icon::getIcons();
            $sumPriceCart = Cart::sumPriceOrder($getOrder->id);
            $sumShipment = Dispatch::sumPriceOrder($getOrder->id);
            $settings = Settings::allSettings()->pluck('value', 'name');
            $conditions = $settings['conditions'];
            $enable_on_site_payment = $settings['enable_on_site_payment'];
            $zarrinpal_active = $settings['activate_zarrinPal_payment_gateway'];
            $idpay_active = $settings['idpay_active'];
            $city_on_site_payment = 0;
            $city_id = Address::getAddress($getOrder->address_id);
            if (isset($settings['city_on_site_payment']))
                $city_on_site_payment = $settings['city_on_site_payment'];
            $PaymentOffline = Settings::getSettingCityPaymentOffline($city_on_site_payment, $city_id);
            $orderPrice = $sumPriceCart + $sumShipment;
            $all_data = ['orderPrice' => $orderPrice, 'sumPriceCart' => $sumPriceCart, 'sumShipment' => $sumShipment, 'icons' => $icon, 'conditions' => $conditions, 'PaymentOffline' => $PaymentOffline, 'enable_on_site_payment' => $enable_on_site_payment, 'idpay_active' => $idpay_active, 'zarrinpal_active' => $zarrinpal_active];

            return view('Front.Shop.payment')->with('data', $all_data);
        } else
            return redirect()->route('Front.index')->with('msgError', trans('langPanel.the_title_failed'));

    }

    public function shipment($shipment_id, $city_id)
    {
        $user_id = Auth::id();
        $getOrder = Order::getOrderWithUser($user_id, 1);
        //dd($getOrder->Cart);
        $sizeof = sizeof($getOrder->Cart);
        if ($getOrder != null and $sizeof > 0) {
            if ($city_id != 0) {

                //$Carts = Cart::getAllCartWithOrder($getOrder->id,0);

                $Shipment = Shipment::getShipment($shipment_id);
                $weight = 0;
                $volume = 0;
                $price = 0;
                foreach ($getOrder->Cart as $cart) {
                    $price = (int)($cart->price_off * $cart->number) + $price;
                    $weight = (int)($cart->Product->weight * $cart->number) + $weight;
                    $volume = (int)(($cart->Product->length * $cart->Product->width * $cart->Product->height) * $cart->number) + $volume;
                }
                $settings = Settings::allSettings()->pluck('value', 'name');
                if ($city_id == $settings['store_city'])
                    $post_type = 1;
                else
                    $post_type = 2;
                if ($Shipment->minimum_order_cost != 0 and $Shipment->minimum_order_cost <= $price)
                    $shipping_cost = 0;
                else
                    $shipping_cost = ShipmentTariff::getShipmentPrice($shipment_id, $post_type, $volume, $weight);

                //$data = ['price' => $price, 'shipping_cost' => $shipping_cost, 'order_id' => $getOrder->id, 'dispatch_id' => $dispatch_id];
                $Dispatch = Order::updateOrderShippingCost($shipping_cost, $shipment_id, $getOrder->id);
                $sumPriceCart = Cart::sumPriceOrder($getOrder->id);
                $sumShipment = $shipping_cost;
                $orderPrice = $sumPriceCart + $sumShipment;


                $result = ['type' => '0', 'orderPrice' => $orderPrice, 'sumPriceCart' => $sumPriceCart, 'sumShipment' => $sumShipment, 'text' => ''];
            } else
                $result = ['type' => '1', 'orderPrice' => 0, 'sumPriceCart' => 0, 'sumShipment' => 0, 'text' => 'آدرس را انتخاب کنید'];

            return $result;
        } else
            return redirect()->route('Front.index')->with('msgError', trans('langPanel.the_title_failed'));
    }

    public function setAddress($address_id)
    {
        $date = Jalalian::now()->getTimestamp();
        $user_id = Auth::id();
        $getOrder = Order::getOrderWithUser($user_id, 1);
        $data = ['address_id' => $address_id, 'user_id' => $user_id, 'active' => 1, 'date' => $date, 'tracking_code' => $date,'shipping_cost'=>0,'shipment_id'=>0];
        return Order::updateOrder($data, $getOrder->id);

    }

    public function shipping()
    {

        $user_id = Auth::id();
        $getOrder = Order::getOrderWithUser($user_id, 1);
        $settings = Settings::allSettings()->pluck('value', 'name');
        $sizeof = sizeof($getOrder->Cart);
        if ($getOrder != null and $sizeof > 0) {
            $city = City::getCitys();
            $sumPrice = Cart::sumPriceOrder($getOrder->id);
            $sumShipment = 0;
            $conditions = 0;
            $city_id = Address::getAddress($getOrder->address_id);
             if($getOrder->address_id==0 )
                $Shipments=Shipment::getShipmentsWithTypeProduct($getOrder->shipping_type);
                else
                $Shipments=Shipment::getShipmentsWithTypeProductAndCity($getOrder->shipping_type,$city_id);
              $address = Address::getUserAddress();
         if (isset($settings['conditions']))
            $conditions = $settings['conditions'];
            $enable_on_site_payment = $settings['enable_on_site_payment'];
            $zarrinpal_active = $settings['activate_zarrinPal_payment_gateway'];
            $idpay_active = $settings['idpay_active'];
            $city_on_site_payment = 0;
            if (isset($settings['city_on_site_payment']))
                $city_on_site_payment = $settings['city_on_site_payment'];
                $PaymentOffline = Settings::getSettingCityPaymentOffline($city_on_site_payment, $city_id);

            $all_data = ['order_id' => $getOrder->id, 'address' => $address, 'address_id' => $getOrder->address_id, 'city' => $city, 'city_id' => $city_id, 'sumPrice' => $sumPrice, 'sumShipment' => $sumShipment,'settings'=>$settings,'shipment_id'=>$getOrder->shipment_id,'Shipments'=>$Shipments,'Cart'=>$getOrder->Cart,'conditions' => $conditions, 'PaymentOffline' => $PaymentOffline, 'enable_on_site_payment' => $enable_on_site_payment, 'idpay_active' => $idpay_active, 'zarrinpal_active' => $zarrinpal_active];
            return view('Front.shipping')->with('data', $all_data);
        } else
            return redirect()->route('Front.index')->with('msgError', trans('langPanel.the_title_failed'));
    }


    public function index()
    {
        $settings = Settings::allSettings()->pluck('value', 'name');
        if (Auth::id() == 0) {
            $Order = Cart::unserializeCookie();
            $sizeof = sizeof($Order);
        } else {
            $user_id = Auth::id();
            $getOrder = Order::getOrderWithUser($user_id, 1);
            $Order = Order::getOrder($getOrder->id);
            $Order->Cart;
            $sizeof = sizeof($Order->Cart);
        }
        if ($Order != null and $sizeof > 0) {

            $all_data = ['order' => $Order,'settings'=>$settings];
            return view('Front.cart')->with('data', $all_data);
        } else
            return redirect()->route('Front.index')->with('msgError', trans('langPanel.the_title_failed'));
    }

    public function insertCart($product_id, $count)
    {
        $event=1;
        $date = Jalalian::now()->getTimestamp();
        $Product = Product::getProduct($product_id);

        $min_order = $Product->min_order;
        $countProduct = $Product->count;
        $discount_percent = $Product->discount_percent;

        if ($Product != null) {
            if ($Product->discount_percent > 0) {
                $price_off = PriceCalculation($Product->price, $Product->discount_percent);
                $price = $Product->price;
            } else {
                $price_off = $Product->price;
                $price = $Product->price;
            }
        }

        $index_key_cart = '-1';
        if (Auth::id() == 0) {


            if (Cookie::get('foviashopOrder') !== null) {
                $cart_data = array();
                $cart_data = Cart::unserializeCookie();

                foreach ($cart_data as $keys => $values) {

                    if ($cart_data[$keys]["product_id"] == $product_id ) {
                        $index_key_cart = $keys;
                        $count_product_inarray = Cart::eventValueProduct($event, $count, $cart_data[$keys]["number"]);
                    } else
                        $count_product_inarray = Cart::eventValueProduct($event, $count, 0);
                }
            } else {
                $count_product_inarray = Cart::eventValueProduct($event, $count, 0);
            }


            $commpare_min_order = CommpareNumber($min_order, $count_product_inarray);
            if ($commpare_min_order == false) {
                $result = ['cart' => 0, 'text' => 'حداقل سفارش را رعایت کنید'];
                return $result;
                exit();
            }
            $commpare_count = CommpareNumber($count_product_inarray, $countProduct);

            if ($commpare_count == false) {
                $result = ['cart' => 0, 'text' => 'عدم موجودی کافی'];
                return $result;
                exit();
            }
            if ($index_key_cart != '-1') {
                $cart_data[$index_key_cart]["number"] = $count_product_inarray;

                $item_data = json_encode($cart_data);
                Cookie::queue('foviashopOrder', serialize($item_data), 1256200);
                return $result = ['cart' => 1, 'text' => 'به سبد خرید اضافه شد'];
            } else {


                $item_array = array(
                    'product_id' => (int)$product_id,
                    'order_id' => 1,
                    'title' => $Product->title,
                    'price_off' => $price_off,
                    'price' => $price,
                    'image' => $Product->image,
                    'number' => $count_product_inarray,
                    'discount_percent' => $Product->discount_percent,
                    'shipping_type' => $Product->type,
                );
                $cart_data[] = $item_array;
                $item_data = json_encode($cart_data);
                Cookie::queue('foviashopOrder', serialize($item_data), 1256200);
                $result = ['cart' => 1, 'text' => 'به سبد خرید اضافه شد'];
                return $result;
            }


        } else {

            $user_id = Auth::id();

            $Order = Order::getOrderWithUser($user_id, 1);
            $date = ['user_id' => $user_id, 'date' => $date, 'active' => 1, 'address_id' => 0, 'tracking_code' => $date,'shipping_type' => $Product->type, 'shipping_cost' => 0,'shipment_id'=>0];
            if ($Order == null)
                $order_id = Order::insertOrder($date);
            else
                $order_id = $Order->id;
            $cart = Cart::checkCart($product_id,$order_id);

            if ($cart == null)
                $cart_number = 0;
            else
                $cart_number = $cart->number;

            $count_product_inarray = Cart::eventValueProduct($event, $count, $cart_number);

            $commpare_min_order = CommpareNumber($min_order, $count_product_inarray);
            if ($commpare_min_order == false) {
                $result = ['cart' => 0, 'text' => 'حداقل سفارش را رعایت کنید'];
                return $result;
                exit();
            }
            $commpare_count = CommpareNumber($count_product_inarray, $countProduct);

            if ($commpare_count == false) {
                $result = ['cart' => 0, 'text' => 'عدم موجودی کافی'];
                return $result;
                exit();
            }

            if ($cart == null) {

               // $data = ['order_id' => $order_id, 'shipping_type' => $Product->type, 'shipping_cost' => 0];
                $item_array = array(
                    'product_id' => (int)$product_id,
                    'order_id' => $order_id,
                    'price' => $price,
                    'price_off' => $price_off,
                    'number' => $count_product_inarray,
                );
                $item_data = Cart::store($item_array);
            } else {
                $item_data = Cart::updateCartNumber($cart->id, $count_product_inarray);
            }
            $result = ['cart' => 1, 'text' => 'به سبد خرید اضافه شد'];

            return $result;


        }
    }


    public function deleteCart($product_id = 0)
    {

        if (Auth::id() == 0) {
            $cart_datas = (unserialize(Cookie::get('foviashopOrder')));
            $cart_data = json_decode($cart_datas, true);
            foreach ($cart_data as $keys => $values) {

                if ($cart_data[$keys]["product_id"] == $product_id)
                    unset($cart_data[$keys]);
                $array_values = array_values($cart_data);
                $item_data = json_encode($array_values);
                Cookie::queue(Cookie::make('foviashopOrder', serialize($item_data), 1256200));
                if (count($array_values) == 0)
                    Cookie::queue(Cookie::forget('foviashopOrder'));
            }
        } else {
            $user_id = Auth::id();
            $Order = Order::getOrderWithUser($user_id, 1);

            $order_id = $Order->id;
            $Cart = Cart::checkCart($product_id, $order_id);
            $Cart = Cart::deleteCart($Cart->id, $order_id);

        }

        return redirect()->route('Front.carts.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
    }

    public function updateCart($product_id, $event)
    {
        $count = 1;
        $index_key_cart = '-1';

        $date = Jalalian::now()->getTimestamp();
        $Product = Product::getProduct($product_id);
        $min_order = $Product->min_order;
        $countProduct = $Product->count;
        $discount_percent = $Product->discount_percent;

        if ($Product != null) {
            if ($Product->discount_percent > 0) {
                $price_off = PriceCalculation($Product->price, $Product->discount_percent);
                $price = $Product->price;
            } else {
                $price_off = $Product->price;
                $price = $Product->price;
            }
        }

        if (Auth::id() == 0) {
            if (Cookie::get('foviashopOrder') !== null) {
                $cart_data = array();
                $cart_data = Cart::unserializeCookie();

                foreach ($cart_data as $keys => $values) {

                    if ($cart_data[$keys]["product_id"] == $product_id ) {

                        $index_key_cart = $keys;
                        $count_product_inarray = Cart::eventValueProduct($event, $count, $cart_data[$keys]["number"]);
                    }

                }


                $commpare_min_order = CommpareNumber($min_order, $count_product_inarray);
                if ($commpare_min_order == false) {
                    $result = ['cart' => 0, 'text' => 'حداقل سفارش را رعایت کنید'];
                    return $result;
                    exit();
                }
                $commpare_count = CommpareNumber($count_product_inarray, $countProduct);
                if ($commpare_count == false) {
                    $result = ['cart' => 1, 'text' => 'عدم موجودی کافی'];
                    return $result;
                    exit();
                }

                if ($index_key_cart != '-1') {
                    $cart_data[$index_key_cart]["number"] = $count_product_inarray;

                    $item_data = json_encode($cart_data);
                    Cookie::queue('foviashopOrder', serialize($item_data), 1256200);
                    return $result = ['cart' => $cart_data, 'text' => 'عملیات با موفقیت انجام شد', 'type' => 1];
                }

            }


        } else {
            $user_id = Auth::id();
            $Order = Order::getOrderWithUser($user_id, 1);
            $date = ['user_id' => $user_id, 'date' => $date, 'active' => 1, 'address_id' => 0, 'tracking_code' => $date];
            if ($Order == null)
                $order_id = Order::insertOrder($date);
            else
                $order_id = $Order->id;
            $cart = Cart::checkCart($product_id, $order_id);

            if ($cart == null)
                $cart_number = 0;
            else
                $cart_number = $cart->number;

            $count_product_inarray = Cart::eventValueProduct($event, $count, $cart_number);

            $commpare_min_order = CommpareNumber($min_order, $count_product_inarray);
            if ($commpare_min_order == false) {
                $result = ['cart' => 0, 'text' => 'حداقل سفارش را رعایت کنید'];
                return $result;
                exit();
            }

            $commpare_count = CommpareNumber($count_product_inarray, $countProduct);
            if ($commpare_count == false) {
                $result = ['cart' => 1, 'text' => 'عدم موجودی کافی'];
                return $result;
                exit();
            }

            if ($cart == null) {

                $data = ['order_id' => $order_id, 'shipping_type' => $Product->type, 'shipping_cost' => 0];

                $item_array = array(
                    'product_id' => (int)$product_id,
                    'order_id' => $order_id,
                    'price' => $price,
                    'price_off' => $price_off,
                    'number' => $count_product_inarray,
                );
                $item_data = Cart::store($item_array);
            } else {
                $item_data = Cart::updateCartNumber($cart->id, $count_product_inarray);
            }

            $getOrder = Order::getOrderWithUser($user_id, 1);
            $Order = Order::getOrder($getOrder->id);
            $result = ['cart' => $Order->Cart, 'text' => 'عملیات با موفقیت انجام شد', 'type' => 2];
            return $result;
        }

    }


}
