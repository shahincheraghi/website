<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceSerial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='insurance_serials';

    protected $fillable = ['id','IMEI1','IMEI2','Brand','Model','DeviceValue','InsuranceDate','Duration','TypeName','TypeCode','Insurer','status'];

    protected $dates = ['deleted_at'];
}
