<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Representative extends Model
{
    use  HasFactory;

    protected $table = 'representatives';

    protected $fillable = ['id','filter', 'province', 'city', 'agency', 'phone', 'address', 'timeWork', 'status'];

    public $timestamps  = true;

}
