<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusFooter extends Model
{
    use HasFactory;
    protected $table = 'menus_footer';
    protected $fillable =['id','title','link','boxPlace','status'];
}
