<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormData extends Model
{
    use SoftDeletes ,HasFactory;
    protected $table = 'form_data';
    protected $fillable =['id','formID','value'];
}
