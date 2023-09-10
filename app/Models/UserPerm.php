<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPerm extends Model
{

    protected $table = 'user_perm';
    protected $guarded=['id'];


    public static function checkRouteNameUser($routeName, $userId)
    {
        try {
            $cheke = UserPerm::where('user_id', $userId)->where('perm_route_name', $routeName)->first();
            if ($cheke != null) {
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            return false;

        }
    }






}
