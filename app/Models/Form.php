<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes ,HasFactory;
    protected $table = 'forms';
    protected $fillable =['id','name','description','code','status','fields'];
}
