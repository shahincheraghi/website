<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormBuilder extends Model
{
    use HasFactory;


    protected $table ='form_builders';

    protected $fillable = ['id','form_id','data'];


}
