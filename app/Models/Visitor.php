<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;
use Faker\Provider\File;

class Visitor extends Model
{
    protected $table = 'visitor';
    public $timestamps = true;


    public static function store()
    {
        try {
            $ip = get_client_ip_env();
            $dateTime = Jalalian::now()->getTimestamp();
            $datenow = timestampDate($dateTime, true);
            $date = $datenow['date'];
            $Visitor = new Visitor();
            $Visitor->ip = $ip;
            $Visitor->date = $date;
            $Visitor->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function getVisitorsIp($ip, $date)
    {
        return Visitor::where('ip', $ip)->where('date', $date)->first();
    }

    public static function getVisitors()
    {
        $Visitor = Visitor::all();
        return $Visitor;
    }

    public static function getVisitorsCount()
    {
        $Visitor = Visitor::count();
        return $Visitor;
    }

}

