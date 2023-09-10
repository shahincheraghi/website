<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContentInfoRequest;
use App\Models\Footer;

use App\Models\HomeContentInfo;
use Illuminate\Http\Request;

class HomeContentInfoController extends Controller
{
    public function index()
    {
        $HomeContentInfo  = HomeContentInfo::getHomeContentInfos();
        $all_data = ['HomeContentInfo' => $HomeContentInfo];
        return view('Admin.HomeContentInfo.HomeContentInfoList',compact('HomeContentInfo'));
    }

    public function create()
    {
        return view('Admin.HomeContentInfo.HomeContentInfoInsert');
    }

    public function store(HomeContentInfoRequest $request)
    {
        $data['subTitle'] = $request->subTitle;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['keyHomeContent'] = $request->keyHomeContent;
        $data['status'] = $request->status;

        $check = HomeContentInfo::store($data);
        if ($check === true)
            return redirect()->route('Admin.HomeContentInfo.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.HomeContentInfo.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $HomeContentInfo = HomeContentInfo::getHomeContentInfo($id);
        $all_data = ['HomeContentInfo' => $HomeContentInfo];
        return view('Admin.HomeContentInfo.HomeContentInfoEdit')->with('data', $all_data);
    }



    public function update(HomeContentInfoRequest $request, $id)
    {
        $HomeContentInfo = HomeContentInfo::getHomeContentInfo($id);
        $data['subTitle'] = $request->subTitle;
        $data['title'] = $request->title;
        $data['status'] = $request->status;
        $data['description'] = $request->description;
        $data['keyHomeContent'] = $request->keyHomeContent;

        $check = HomeContentInfo::updateHomeContentInfo($data, $id);
        if ($check === true)
            return redirect()->route('Admin.HomeContentInfo.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.HomeContentInfo.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function HomeContentInfoDelete($id)
    {
        $check = HomeContentInfo::HomeContentInfoDelete($id);
        if ($check === true)
            return redirect()->route('Admin.HomeContentInfo.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.HomeContentInfo.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
