<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Problem extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'problems';

    protected $fillable = [

        'name','sort' ,'img','status'

    ];

    public $timestamps  = true;

}
