<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\requestRating;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use File;
use Analytics;
use Spatie\Analytics\Period;

class OrderController extends Controller
{

    public function delete($order_id)
    {
        $orders = Order::getOrder($order_id);

        if ($orders->status == 0) {
            $user_id = Auth::id();
            $data['user_id'] = $user_id;
            $data['order'] = $orders->toJson();
            $data['payment'] = $orders->Payment()->get()->toJson();
            $data['dispatch'] = $orders->Dispatch()->get()->toJson();
            $check = DeleteOrder::store($data);

            if ($check === true) {
                $Dispatch_ids = $orders->Dispatch()->pluck('id')->toArray();
                Cart::deleteWithOrder($order_id);
                Dispatch::deleteWithOrder($order_id);
                DispatchStatus::deleteWithDispatch($Dispatch_ids);
                Payment::deleteWithOrder($order_id);
                Order::deleteWithOrder($order_id);
                return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
            } else
                return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));
        } else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));

    }

    public function new(Request $request)
    {
        $users = User::getUsers(1);
        if (!empty($request->dateStart) and !empty($request->dateEnd)) {
            $dateStart = DateTimeTOTimeStamp($request->dateStart, '00:00:00');
            $dateEnd = DateTimeTOTimeStamp($request->dateEnd, '23:59:00');
        } else {
            $dateStart = 0;
            $dateEnd = 0;
        }

        if ($request->mobile != null)
            $mobile = $request->mobile;
        else
            $mobile = 0;

        $status = 0;
        $payment = $request->payment;
        $user_id = $request->user;

        $orders = Order::getOrdersFillter($payment, $mobile, $dateEnd, $dateStart, $user_id, $status);

        $all_data = ['orders' => $orders, 'users' => $users];
        return view('Admin.Order.orders')->with('data', $all_data);
    }

    public function delivered(Request $request)
    {
        $users = User::getUsers(1);
        if (!empty($request->dateStart) and !empty($request->dateEnd)) {
            $dateStart = DateTimeTOTimeStamp($request->dateStart, '00:00:00');
            $dateEnd = DateTimeTOTimeStamp($request->dateEnd, '23:59:00');
        } else {
            $dateStart = 0;
            $dateEnd = 0;
        }

        if ($request->mobile != null)
            $mobile = $request->mobile;
        else
            $mobile = 0;

        $status = 3;
        $payment = $request->payment;
        $user_id = $request->user;

        $orders = Order::getOrdersFillter($payment, $mobile, $dateEnd, $dateStart, $user_id, $status);

        $all_data = ['orders' => $orders, 'users' => $users];
        return view('Admin.Order.orders')->with('data', $all_data);
    }

    public function posted(Request $request)
    {
        $users = User::getUsers(1);
        if (!empty($request->dateStart) and !empty($request->dateEnd)) {
            $dateStart = DateTimeTOTimeStamp($request->dateStart, '00:00:00');
            $dateEnd = DateTimeTOTimeStamp($request->dateEnd, '23:59:00');
        } else {
            $dateStart = 0;
            $dateEnd = 0;
        }

        if ($request->mobile != null)
            $mobile = $request->mobile;
        else
            $mobile = 0;

        $status = 2;
        $payment = $request->payment;
        $user_id = $request->user;

        $orders = Order::getOrdersFillter($payment, $mobile, $dateEnd, $dateStart, $user_id, $status);

        $all_data = ['orders' => $orders, 'users' => $users];
        return view('Admin.Order.orders')->with('data', $all_data);
    }

    public function confirmed(Request $request)
    {
        $users = User::getUsers(1);
        if (!empty($request->dateStart) and !empty($request->dateEnd)) {
            $dateStart = DateTimeTOTimeStamp($request->dateStart, '00:00:00');
            $dateEnd = DateTimeTOTimeStamp($request->dateEnd, '23:59:00');
        } else {
            $dateStart = 0;
            $dateEnd = 0;
        }

        if ($request->mobile != null)
            $mobile = $request->mobile;
        else
            $mobile = 0;

        $status = 1;
        $payment = $request->payment;
        $user_id = $request->user;

        $orders = Order::getOrdersFillter($payment, $mobile, $dateEnd, $dateStart, $user_id, $status);

        $all_data = ['orders' => $orders, 'users' => $users];
        return view('Admin.Order.orders')->with('data', $all_data);
    }


    public function index(Request $request)
    {
        $users = User::getUsers(1);
        if (!empty($request->dateStart) and !empty($request->dateEnd)) {
            $dateStart = DateTimeTOTimeStamp($request->dateStart, '00:00:00');
            $dateEnd = DateTimeTOTimeStamp($request->dateEnd, '23:59:00');
        } else {
            $dateStart = 0;
            $dateEnd = 0;
        }

        if ($request->mobile != null)
            $mobile = $request->mobile;
        else
            $mobile = 0;

        $status = $request->status;
        $payment = $request->payment;
        $user_id = $request->user;
        $orders = Order::getOrdersFillter($payment, $mobile, $dateEnd, $dateStart, $user_id, $status);
        $all_data = ['orders' => $orders, 'users' => $users];
        return view('Admin.Order.orderList')->with('data', $all_data);
    }


    public function detailsChange($order_id, $status)
    {
          $date = Jalalian::now()->getTimestamp();
            $check = Order::updateOrderStatus($order_id, $status);

        if ($check === true)
            return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function invoice($order_id)
    {
        $orders = Order::getOrder($order_id);
        $payment = $orders->Payment;
        $Cart = $orders->Cart;
        $user = $orders->User;
        $address = $orders->Address;
        $settings = Settings::allSettings()->pluck('value', 'name');
        $all_data = ['orders' => $orders, 'settings' => $settings];
        return view('Admin.Order.invoice')->with('data', $all_data);
    }

    public function show($order_id)
    {
        $orders = Order::getOrder($order_id);
        $payment = $orders->Payment;
        $Cart = $orders->Cart;
        $user = $orders->User;
        $address = $orders->Address;
        $all_data = ['orders' => $orders];
        return view('Admin.Order.details')->with('data', $all_data);
    }


}
