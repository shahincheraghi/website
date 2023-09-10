<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $guarded = ['id'];


    public static function getUserAddress()
    {
        $userId = Auth::id();
        return Address::where('user_id', $userId)->where('delete', 0)->get();
    }

    public static function getAddress($id)
    {
      $Address=Address::where('delete', 0)->where('id', $id)->first();
      if($Address!=null)
     return $Address->city_id;
     else
      return 0;

    }

    public static function getOneAddress($id)
    {
      $Address=Address::where('delete', 0)->where('id', $id)->first();
     return $Address;


    }

    public static function storeAddress(array $data)
    {
        try {
            Address::create($data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateAddress(int $id,array $data)
    {
        try {
            $address=Address::find($id);
            $address->update($data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public static function deleteAddress(int $id)
    {
        try {
            $address=Address::find($id);
            $address->update(['delete'=>1]);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
