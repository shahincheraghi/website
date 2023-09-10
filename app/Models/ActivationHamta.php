<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationHamta extends Model
{
    use HasFactory;
    protected $table = 'register_codes';
    protected $fillable =['id','FirstName','LastName','Mobile','Imei','city_id','province_id'];
}
