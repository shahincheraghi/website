<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{

    public function index()
    {

        $listOrder = Order::getOrdersUser(Auth::id())->take(5);
        $data = ['orders' => $listOrder];
        return view('Front.Account.index')->with('data', $data);
    }


    public function editProfile()
    {
        return view('Front.Account.editAccount');
    }


    public function updateProfile(Request $request)
    {

        $rules = array(
            'name' => 'required',
            'family' => 'required|min:3',
            'email' => 'nullable|email',
            'tel' => 'nullable|numeric',
            'mobile' => 'required|iran_mobile',
            'birth_date' => 'nullable',
            'national_identity' => 'nullable',
            'password' => 'nullable|min:6',
            'password_confirm' => 'required_with:password|same:password|min:6'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->route('Front.account.editProfile')
                ->withErrors($validator);
        } else {

            $data =
                [
                    'name' => $request->name,
                    'family' => $request->family,
                    'email' => $request->email,
                    'tel' => $request->tel,
                    'mobile' => $request->mobile,
                    'national_identity' => $request->national_identity
                ];

            if (isset($request->birth_date)) {
                $date = explode('/', $request->birth_date);
                $data['birth_date'] = DateTimeTOTimeStamp($date[2] . '/' . $date[1] . '/' . $date[0]);
            }

            if (isset($request->pass))
                $data['password'] = Hash::make($request->password);
       $check=User::updateUser($data, Auth::id());
 if ($check == true)
           return \redirect()->route('Front.account.editProfile');
        else
            return redirect()->back()->with('msgErrroe', trans('msg.msgError'));


        }
    }


    public function listOrder()
    {
        $listOrder = Order::getOrdersUser(Auth::id());
//        dd(Auth::id());
        $data = ['orders' => $listOrder];
        return view('Front.Account.orders')->with('data', $data);
    }


    public function detailOrder($orderId)
    {
        $orders = Order::getOrderWithUserAndOrder($orderId, Auth::id());
//        $payment = $orders->Payment;
//        $dispatch = $orders->Dispatch;
//        $user = $orders->User;
//        $address = $orders->Address;
//
//        $DispatchCount = Dispatch::getDispatchs($orderId);
//        $count = $DispatchCount->count();
//        $Dispatch_ids = $DispatchCount->pluck('id')->toArray();
//        $DispatchStatus = DispatchStatus::getCountDispatch($Dispatch_ids, 1);
//        //dd($DispatchStatus,$count);
        //$DispatchStatus=Dispatch::dispatch_ids();
//        dd($orders);
        $all_data = ['orders' => $orders];


        return view('Front.Account.orderDetail')->with('data', $all_data);
    }


    public static function getInfoHeaderAccount()
    {
        $Address = Address::getUserAddress()->count();
        $listOrder = Order::getOrdersUser(Auth::id())->count();
        $all_data=['listOrder'=>$listOrder,'Address'=>$Address];
        return $all_data;
    }

}
