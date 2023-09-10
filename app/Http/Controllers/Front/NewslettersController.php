<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Newsletters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewslettersController extends Controller
{

    public function add(Request $request)
    {

        $email = $request->email;
        $validator = Validator::make($request->all(), ['email' => 'required|email']);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return 'error';
        } else {
            $check = Newsletters::add($email);
            return $check;
        }


    }

}
