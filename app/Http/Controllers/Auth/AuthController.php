<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
class AuthController extends Controller
{


    public function loginFront()
    {
            $settings = Settings::allSettings()->pluck('value', 'name');
            if(isset($settings['registration_benefits']))
          $registration_benefits=$settings['registration_benefits'];
          else
          $registration_benefits='';
          $all_data=['registration_benefits'=>$registration_benefits];
        $routeBck=url()->previous();
        return view('Auth.Front.Login')->with('routeBack',$routeBck)->with('data', $all_data);
    }

     public function doLoginFront(Request $request)
    {

        $userdata = array(
            'mobile' => $request->mobile,
            'password' => $request->password,
            'delete' => 0,
            'status' =>0
        );
        if (Auth::attempt($userdata)) {
            if (Cookie::get('foviashopOrder') !== null) {
                $getOrder = Order::inserCart();
            }
            return redirect()->to($request->routeBack);
        } else {
            return redirect()->route('login')->with('errorMsg', trans('email_or_password_is_incorrect'));
        }
        return view('Auth.Front.Login');
    }


    public function registerFront()
    {
        if(Auth::check())
        {
            return \redirect()->route('Front.account.index');
        }
        $settings = Settings::allSettings()->pluck('value', 'name');

          if(isset($settings['site_membership_conditions']))
          $site_membership_conditions=$settings['site_membership_conditions'];
          else
          $site_membership_conditions='';

          $all_data=['site_membership_conditions'=>$site_membership_conditions];
        return view('Auth.Front.Register')->with('data', $all_data);
    }

    public function forget()
    {
        return view('Auth.Front.Forget');
    }

        public function doRegisterFront(Request $request)
    {

        $data = [];
        $data['name'] = $request->name;
        $data['family'] = $request->family;
        $data['mobile'] = $request->mobile;
        $data['email'] = $request->email;
        $data['pass'] = $request->password;
        $check = User::userCreate($data);

        if ($check == false) {
            return \redirect()->back()->with('msgError', 'این شماره موبایل قبلا ثبت شده است ');
        } else if ($check == true) {

            if (Cookie::get('foviashopOrder') !== null) {
                $getOrder = Order::inserCart();
            }

              return Redirect::route('Front.index');
            //return \redirect()->back();
        }
        return \redirect()->back()->with('msgError', 'مشکلی پیش آمده است بعدا تلاش فرمایید .');
    }


    public function login()
    {
        return view('Auth.Admin.login');

    }


    public function doLogin(Request $request)
    {

        $userdata = array(
            'email' => $request->email,
            'password' => $request->password,
            'delete' => 0,
            'status' =>0
        );
        if (Auth::attempt($userdata)) {
            return redirect()->route('Admin.index');
        } else {
            return redirect()->route('Admin.Auth.login')->with('errorMsg', trans('email_or_password_is_incorrect'));
        }
    }


    public function logoute()
    {
        Auth::logout();
        return Redirect::route('Front.index');
    }


}
