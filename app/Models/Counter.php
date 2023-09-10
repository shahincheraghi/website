<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Counter extends Model
{
    protected $table = 'counter_title';
    public $timestamps = true;

    public static function store($data)
    {
        try {
            $Counter = new Counter();
            $Counter->number = $data['number'];
            $Counter->title = $data['title'];
            $Counter->icon = $data['icon'];
            $Counter->subTitle = $data['subTitle'];
            $Counter->image = $data['image'];
            $Counter->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getCounters()
    {
        $Counters = Counter::all();
        return $Counters;
    }

    public static function getCounter($id)
    {
        $Counter = Counter::find($id);
        if ($Counter != null)
            return $Counter;
        else
            return "";
    }

    public static function CounterDelete($id)
    {
        try {
            $Counter = Counter::getCounter($id);
            $Counter->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateCounter($data, $id)
    {
        try {
            $Counter = Counter::find($id);
            $Counter->number = $data['number'];
            $Counter->subTitle = $data['subTitle'];
            $Counter->title = $data['title'];
            $Counter->icon = $data['icon'];
            $Counter->image = $data['image'];
            $Counter->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

