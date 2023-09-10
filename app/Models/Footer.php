<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footer';
    protected $fillable =['id','address','phone','email','description','titleSubscribe','status','telegram','aparat','linkedin',
        'instagram','youtube','whatsapp','topFooterTitle','topFooterDescription','topFooterIcon','topFooterTitleBtnOne',
        'topFooterLinkBtnOne','topFooterTitleBtnTow','topFooterLinkBtnTow','titleCopyRightBottomFooter','titleDevelopBottomFooter','statusTopFooter'];
}
