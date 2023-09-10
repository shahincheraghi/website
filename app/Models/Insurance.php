<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use HasFactory;

    protected $table ='insurances';

    protected $fillable = ['id','imei','fullName','mobile','nationalCode','city','province','address'];

    public static function getInsurance($txt = null, $paginate = false, $id = 0)
    {
        if ($paginate) {
            return Insurance::where(function ($query) use ($txt) {
                if ($txt != null)
                    return $query->where('imei', 'LIKE', '%' . $txt . '%');
            })->where(function ($query) use ($id) {
                if ($id != 0)
                    return $query->where('imei', $id);
            });
        } else {
            return Insurance::all();
        }

    }


}
