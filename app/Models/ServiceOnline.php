<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOnline extends Model
{
    use SoftDeletes ,HasFactory;

    protected $table ='service_online';

    protected $fillable =['id','fullName','mobile','nationalCode','address','serialDevice','descriptionProblem','category','model','color','problemEvent','descriptionProblemEvent'];


    public static function getServiceOnline()
    {
        $ServiceOnline = ServiceOnline::orderBy('id','DESC')->get();
        return $ServiceOnline;
    }

    public function setCatAttribute($value)
    {
        $this->attributes['problemType'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['problemType'] = json_decode($value);
    }
}
