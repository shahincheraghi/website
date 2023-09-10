<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:251',
            'password' => 'required|max:251',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        } else {
            if (Auth::attempt($request->only(["username", "password"]))) {
                $user = User::where('username', $request->username)->first();
                Auth::loginUsingId($user->id);
                return response()->json([
                    'status' => true,
                    'linkAdminPanel' => '/Admins',
                    'statusCode' => 200,
                    'message' => 'ورود با موقیت انجام شد.',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'statusCode' => 210,
                    'message' => 'کاربری با این مشخصات پیدا نشد.',
                ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/auth');
    }

}

