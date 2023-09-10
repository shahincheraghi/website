<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sliders;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SlidersController extends Controller
{

    public function index()
    {
        $Sliders = Slider::getSliders();
        $all_data = ['Sliders' => $Sliders];
        return view('Admin.Slider.sliderList')->with('data', $all_data);
    }


    public function create()
    {
        return view('Admin.Slider.sliderInsert');
    }

    public function store(Sliders $request)
    {

        $data['title'] = $request->title;
        $data['colorTextSlider'] = $request->colorTextSlider;
        $data['link'] = $request->link;
        $data['titleBtn'] = $request->titleBtn;
        $data['text'] = $request->text;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/slider/';
        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = Slider::store($data);
        if ($check === true)
            return redirect()->route('Admin.sliders.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.sliders.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Slider = Slider::getSlider($id);
        $all_data = ['Slider' => $Slider];
        return view('Admin.Slider.sliderEdit')->with('data', $all_data);
    }

    public function update(Sliders $request, $id)
    {
        $Slider = Slider::getSlider($id);
        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['titleBtn'] = $request->titleBtn;
        $data['link'] = $request->link;
        $data['colorTextSlider'] = $request->colorTextSlider;
        if ($request->file('file')) {
            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/slider/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Slider->image)) {
                \Illuminate\Support\Facades\File::delete($Slider->image);
            }
        } else
            $data['image'] = $Slider->image;
        $check = Slider::updateSlider($data, $id);
        if ($check === true)
            return redirect()->route('Admin.sliders.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.sliders.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function SliderDelete($id)
    {
        $check = Slider::SliderDelete($id);
        if ($check === true)
            return redirect()->route('Admin.sliders.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.sliders.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
