<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Slider extends Model
{
    protected $table = 'sliders';
    public $timestamps = true;

    public static function store($data)
    {
        try {
            $Slider = new Slider();
            $Slider->text = $data['text'];
            $Slider->title = $data['title'];
            $Slider->titleBtn = $data['titleBtn'];
            $Slider->link = $data['link'];
            $Slider->image = $data['image'];
            $Slider->colorTextSlider = $data['colorTextSlider'];
            $Slider->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getSliders()
    {
        $Sliders = Slider::all();
        return $Sliders;
    }

    public static function getSlider($id)
    {
        $Slider = Slider::find($id);
        if ($Slider != null)
            return $Slider;
        else
            return "";
    }

    public static function SliderDelete($id)
    {
        try {
            $Slider = Slider::getSlider($id);
            if (\Illuminate\Support\Facades\File::exists($Slider->image)) {
                \Illuminate\Support\Facades\File::delete($Slider->image);
            }
            $Slider->delete();

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateSlider($data, $id)
    {
        try {
            $Slider = Slider::find($id);
            $Slider->text = $data['text'];
            $Slider->title = $data['title'];
            $Slider->link = $data['link'];
            $Slider->titleBtn = $data['titleBtn'];
            $Slider->image = $data['image'];
            $Slider->colorTextSlider = $data['colorTextSlider'];
            $Slider->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

