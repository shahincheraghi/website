<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Partner extends Model
{
    protected $table = 'partner';
    public $timestamps = true;


    public static function store($data)
    {
        try {
            $Partner = new Partner();
            $Partner->title = $data['title'];
            $Partner->image = $data['image'];
            $Partner->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getPartners()
    {
        $Partner = Partner::all();
        return $Partner;
    }

    public static function getPartner($id)
    {
        $Partner = Partner::find($id);
        if ($Partner != null)
            return $Partner;
        else
            return "";
    }

    public static function PartnerDelete($id)
    {
        try {
            $Partner = Partner::getPartner($id);
            if (\Illuminate\Support\Facades\File::exists($Partner->image)) {
                \Illuminate\Support\Facades\File::delete($Partner->image);
            }
            $Partner->delete();

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updatePartner($data, $id)
    {
        try {
            $Partner = Partner::find($id);
            $Partner->title = $data['title'];
            $Partner->image = $data['image'];
            $Partner->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

