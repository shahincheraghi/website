<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TitleComplaints;
use App\Models\TitleComplaint;

class TitleComplaintController extends Controller
{
    public function index()
    {
        $TitleComplaint = TitleComplaint::getTitleComplaints();
        $all_data = ['TitleComplaint' => $TitleComplaint];
        return view('Admin.TitleComplaint.TitleComplaintList')->with('data', $all_data);
    }


    public function create()
    {
        return view('Admin.TitleComplaint.TitleComplaintInsert');
    }

    public function store(TitleComplaints $request)
    {
        $data['name'] = $request->name;
        $data['order'] = $request->order;
        $data['status'] = $request->status;

        $check = TitleComplaint::storeTitleComplaint($data);
        if ($check === true) {
            return redirect()->route('Admin.TitleComplaints.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        } else {
            return redirect()->route('Admin.TitleComplaints.create')->with('msgError', trans('langPanel.the_operation_failed'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $TitleComplaint = TitleComplaint::getTitleComplaint($id);
        $all_data = ['TitleComplaint' => $TitleComplaint];
        return view('Admin.TitleComplaint.TitleComplaintEdit')->with('data', $all_data);
    }

    public function update(TitleComplaints $request, $id)
    {

        $TitleComplaint = TitleComplaint::getTitleComplaint($id);
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        $data['order'] = $request->order;
        $check = TitleComplaint::updateTitleComplaint($data, $id);
        if ($check === true)
            return redirect()->route('Admin.TitleComplaints.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.TitleComplaints.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function destroy($id)
    {
        $check = TitleComplaint::TitleComplaintDelete($id);
        if ($check === true)
            return redirect()->route('Admin.TitleComplaints.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.TitleComplaints.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
