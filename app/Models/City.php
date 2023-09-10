<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use  HasFactory;

    protected $table ='cities';

    protected $fillable = ['province','name','name_en','latitude','longitude'];

    public function province(){

        return $this->belongsTo('App\Models\Province');

    }
    public $timestamps = false;
}
