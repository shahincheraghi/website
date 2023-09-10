<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Counters;
use Illuminate\Http\Request;
use App\Models\Counter;
use File;

class CountersController extends Controller
{

    public function index()
    {

        $Counters = Counter::getCounters();
        $all_data = ['Counters' => $Counters];
        return view('Admin.Counter.counterList')->with('data', $all_data);
    }


    public function create()
    {
        return view('Admin.Counter.counterInsert');
    }

    public function store(Counters $request)
    {

        $data['title'] = $request->title;
        $data['number'] = $request->number;
        $data['subTitle'] = $request->subTitle;
        $data['icon'] = $request->icon;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/counter/';

        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = Counter::store($data);
        if ($check === true)
            return redirect()->route('Admin.counters.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return $check;
//            return redirect()->route('Admin.counters.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Counter = Counter::getCounter($id);
        $all_data = ['Counter' => $Counter];
        return view('Admin.Counter.counterEdit')->with('data', $all_data);
    }

    public function update(Counters $request, $id)
    {
        $Counter = Counter::getCounter($id);
        $data['title'] = $request->title;
        $data['subTitle'] = $request->subTitle;
        $data['number'] = $request->number;
        $data['icon'] = $request->icon;
        if ($request->file('file')) {
            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/counter/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Counter->image)) {
                \Illuminate\Support\Facades\File::delete($Counter->image);
            }
        } else
            $data['image'] = $Counter->image;
        $check = Counter::updateCounter($data, $id);
        if ($check === true)
            return redirect()->route('Admin.counters.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.counters.index')->with('msgError', trans('langPanel.the_operation_failed'));

    }


    public function CounterDelete($id)
    {
        $check = Counter::CounterDelete($id);
        if ($check === true)
            return redirect()->route('Admin.counters.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.counters.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
