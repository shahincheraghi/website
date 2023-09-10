<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resumes;
use Illuminate\Http\Request;
use App\Models\Resume;
use File;

class ResumesController extends Controller
{

    public function index()
    {

        $Resumes = Resume::getResumes();
        $all_data = ['Resumes' => $Resumes];
        return view('Admin.Resume.resumeList')->with('data', $all_data);
    }


    public function create()
    {
        return view('Admin.Resume.resumeInsert');
    }

    public function store(Resumes $request)
    {

        $data['text'] = $request->text;
        $data['title'] = $request->title;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['type'] = $request->type;
        $check = Resume::storeResume($data);
        if ($check === true) {
            return redirect()->route('Admin.resumes.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        } else {
            return redirect()->route('Admin.resumes.create')->with('msgError', trans('langPanel.the_operation_failed'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Resume = Resume::getResume($id);
        $all_data = ['Resume' => $Resume];
        return view('Admin.Resume.resumeEdit')->with('data', $all_data);
    }

    public function update(Resumes $request, $id)
    {

        $Resume = Resume::getResume($id);
        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['end_date'] = $request->end_date;
        $data['start_date'] = $request->start_date;
        $data['type'] = $request->type;
        $check = Resume::updateResume($data, $id);
        if ($check === true)
            return redirect()->route('Admin.resumes.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.resumes.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function ResumeDelete($id)
    {
        $check = Resume::ResumeDelete($id);
        if ($check === true)
            return redirect()->route('Admin.resumes.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.resumes.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
