<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{


    public function showLogin()
    {
        return view('Admin.Auth.login');
    }

    public function doLogin(Request $request)
    {
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($userdata)) {
            return redirect()->route('Admin.index');
        } else {
            return redirect()->route('login')->with('errorMsg', trans('email_or_password_is_incorrect'));
        }
    }
}
