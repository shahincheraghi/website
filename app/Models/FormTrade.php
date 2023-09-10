<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormTrade extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'form_trades';

    protected $fillable = [
        'id',
        'fullName',
        'mobile',
        'nationalCode',
        'city_id',
        'province_id',
        'address',
        'typeTrade',
        'category',
        'product',
        'model',
        'color',
        'serialDevice',
        'description'

    ];


}
