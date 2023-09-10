<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionHomeContentInfo extends Model
{
    use  HasFactory;

    protected $table = 'section_home_content_info';

    protected $fillable = [

        'title','homeContentId' ,'description','img','status'

    ];

    public $timestamps  = true;

}
