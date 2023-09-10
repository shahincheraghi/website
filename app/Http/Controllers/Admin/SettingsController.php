<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings;
use Illuminate\Http\Request;
use App\Models\City;
class SettingsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
//        return view('Admin.Settings.settings');
    }

    public function store(Settings $request)
    {
    }

    public function show($id = 0)
    {
//         $cities=City::getCitys();
        $settings = \App\Models\Settings::all()->pluck('value', 'name');
        return view('Admin.Settings.settings')->with('settings', $settings);
    }

    public function edit($id)
    {

    }

    public function update(Settings $request)
    {
        $check = \App\Models\Settings::updateSetting($request['setting'][0]);
        if ($check == true) {
            return redirect()->route('Admin.settings.show');
        }
    }


    public function destroy($id)
    {
        //
    }


    public function deleteImg($name){
        $check=\App\Models\Settings::deleteSettingWithName($name);
        if ($check == true)
            return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
