<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarrantyExtension extends Model
{
    use SoftDeletes ,HasFactory;

    protected $table ='warranty_extensions';

    protected $fillable =['id','fullName','mobile','nationalCode','address','city_id','province_id','serialDevice','description','category','model','color','product'];

}
