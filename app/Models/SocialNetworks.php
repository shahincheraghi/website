<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class SocialNetworks extends Model
{
    protected $table = 'social_networks';
    public $timestamps = true;


    public static function storeSocial($array)
    {
        try {
            $SocialNetworks = SocialNetworks::insert($array);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();

        }
    }

    public static function updateSocial($array, $id)
    {
        try {
            SocialNetworks::where('team_id', $id)->delete();
            $SocialNetworks = SocialNetworks::insert($array);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}

