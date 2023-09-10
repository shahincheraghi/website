<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='serials';

    protected $fillable = ['id','imei','name','type','insert_time'];

    protected $dates = ['deleted_at'];

}
