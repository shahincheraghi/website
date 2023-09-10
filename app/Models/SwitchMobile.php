<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SwitchMobile extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'switches_mobile';

    protected $fillable = [
        'id',
        'fullName',
        'mobile',
        'nationalCode',
        'city_id',
        'province_id',
        'address',
        'categorySellSwitchMobile',
        'productSellSwitchMobile',
        'modelSellSwitchMobile',
        'ColorSellSwitchMobile',
        'serialSellSwitchMobile',
        'descriptionSellSwitchMobile',
        'imgSellSwitchMobile',
        'categoryBuySwitchMobile',
        'productBuySwitchMobile',
        'modelBuySwitchMobile',
        'ColorBuySwitchMobile',
        'imgBuySwitchMobile',
        'descriptionBuySwitchMobile'
    ];


}
