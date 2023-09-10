<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='insurance_type';

    protected $fillable = ['id','name','description','type','status'];

    protected $dates = ['deleted_at'];
}
