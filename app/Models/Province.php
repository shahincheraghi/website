<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;

    protected $table ='provinces';

    protected $fillable = ['id','country','name','name_en','latitude','longitude'];

    public function cities(){

        return $this->hasMany('App\Models\City','province');
    }
    public function provinceUser(){

        return $this->belongsTo('App\Models\ProvinceUser','province_id');
    }
    public $timestamps = false;
}
