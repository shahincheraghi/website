<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormCategory extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'form_categories';

    protected $fillable = [

        'name','sort' ,'img','status'

    ];

    public $timestamps  = true;

}
