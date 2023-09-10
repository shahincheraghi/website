<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service;
use App\Models\Services;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Services::allServices(false,1);
        return view('Admin.Services.serviceList')->with('services', $services);
    }

    public function create()
    {
        $Category = Category::getCategorysType(2);
        $all_data = ['Categorys' => $Category];
        return view('Admin.Services.serviceInsert')->with('data', $all_data);
    }


    public function store(Service $request)
    {
        $special_service=(isset($request->special_service))?1:0;
        $check = Services::storeService(['title' => $request->title,
            'text' => $request->text,
            'icons' => $request->icon,
            'category_id' => $request->category,
            'image' => storeFile($request->image, 'File/service/'),'special_services'=>$special_service
        ]);
        if ($check === true)
            return redirect()->route('Admin.services.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.services.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public
    function show($id)
    {
        //
    }

    public
    function edit($id)
    {
        $service = Services::getService($id);
        $Category = Category::getCategorysType(2);
        $all_data = ['service' => $service, 'Categorys' => $Category];
        return view('Admin.Services.serviceUpdate')->with('data', $all_data);
    }

    public
    function update(Service $request, $id)
    {
        $special_service=(isset($request->special_service))?1:0;
        $data = ['title' => $request->title, 'text' => $request->text, 'icons' => $request->icon, 'category_id' => $request->category,'special_services'=>$special_service];
        if (isset($request->image))
            $data['image'] = storeFile($request->image, 'File/service/');
        $check = Services::updateServices($id, $data);
        if ($check === true)
            return redirect()->route('Admin.services.edit', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.services.edit', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public
    function destroy($id)
    {
        $check = Services::destroy($id);
        if ($check === true)
            return redirect()->route('Admin.services.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.services.index')->with('msgError', trans('langPanel.the_operation_failed'));

    }
}
