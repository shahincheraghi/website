<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormProduct extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'form_products';

    protected $fillable = [

        'name','sort' ,'img','status','category_id'

    ];

    public $timestamps  = true;

}
