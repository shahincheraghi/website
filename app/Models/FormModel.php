<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormModel extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'form_models';

    protected $fillable = [

        'name','sort' ,'img','status','product_id'

    ];

    public $timestamps  = true;

}
