<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeContent extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'home_contents';

    protected $fillable = [
        'title','link' ,'description','path','type', 'status','icon','order'
    ];
    public function manageHomeContents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ManageHomeContent::class,'id');
    }

    public $timestamps  = true;

}
