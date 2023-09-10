<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'colors';

    protected $fillable = [

        'name','sort' ,'img','status'

    ];

    public $timestamps  = true;

}
