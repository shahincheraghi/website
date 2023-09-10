<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuitem extends Model
{
    use HasFactory;
    protected $fillable = ['label','link','parent','sort','class','menu','depth'];
}
