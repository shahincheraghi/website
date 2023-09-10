<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\Partners;
use File;

class PartnersController extends Controller
{

    public function index()
    {
        $Partner = Partner::getPartners();
        return view('Admin.Partner.partnerList')->with('Partner', $Partner);
    }

    public function create()
    {
        return view('Admin.Partner.partnerInsert');
    }

    public function store(Partners $request)
    {
        $data['title'] = $request->title;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/partner/';
        $image = '';
        if ($hasFile) {
            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = Partner::store($data);
        if ($check === true)
            return redirect()->route('Admin.partners.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.partners.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public
    function show($id)
    {
        //
    }

    public
    function edit($id)
    {
        $Partner = Partner::getPartner($id);
        $all_data = ['Partner' => $Partner];
        return view('Admin.Partner.partnerUpdate')->with('data', $all_data);
    }

    public
    function update(Partners $request, $id)
    {
        $Partner = Partner::getPartner($id);
        $data['title'] = $request->title;
        if ($request->file('file')) {
            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/partner/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Partner->image)) {
                \Illuminate\Support\Facades\File::delete($Partner->image);
            }
        } else
            $data['image'] = $Partner->image;
        $check = Partner::updatePartner($data, $id);
        if ($check === true)
            return redirect()->route('Admin.partners.edit', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.partners.edit', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public
    function destroy($id)
    {
        $check = Partner::PartnerDelete($id);
        if ($check === true)
            return redirect()->route('Admin.partners.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.partners.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
