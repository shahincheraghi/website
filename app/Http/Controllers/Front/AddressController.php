<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index()
    {
        $Address = Address::getUserAddress();
        $city = City::getCitys();
        $all_data = ['address' => $Address,'city'=>$city];
        return view('Front.Account.Address')->with('data', $all_data);
    }


    public function editAddress($id)
    {
            $city = City::getCitys();
            $Address = Address::getOneAddress($id);
            $all_data = ['address' => $Address,'city'=>$city];
      return view('Front.Account.editAddress')->with('data', $all_data);
    }

    public function store(\App\Http\Requests\Front\Address $request)
    {

        $data['receiver'] = $request->receiver;
        $data['cel'] = $request->cel;
        $data['postal_code'] = $request->postal_code;
        $data['phone'] = $request->tel;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city_id;
        $data['user_id'] = Auth::id();
        $check = Address::storeAddress($data);

        if ($check == true)
            return redirect()->back();
        else
            return redirect()->back()->with('msgErrroe', trans('msg.msgError'));
    }


    public function update(\App\Http\Requests\Front\Address $request, $id)
    {
        $data['receiver'] = $request->receiver;
        $data['cel'] = $request->cel;
        $data['postal_code'] = $request->postal_code;
        $data['phone'] = $request->tel;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city_id;
        $data['user_id'] = Auth::id();
        $check = Address::updateAddress($id, $data);
        if ($check == true)
            return redirect()->back();
        else
            return redirect()->back()->with('msgErrroe', trans('msg.msgError'));
    }

    public function delete($id)
    {
        $check = Address::deleteAddress($id);
        return $check;
//        if ($check == true)
//            return redirect()->back();
//        else
//            return redirect()->back()->with('msgErrroe',trans('msg.msgError'));

    }

}
