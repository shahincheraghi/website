<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageHomeContent extends Model
{
    use  HasFactory;

    protected $table = 'main_page';

    protected $fillable = [

        'title','sort' ,'type','status','topTitle','description','image'

    ];



    public static function getManageHomeContents($txt = null, $paginate = false, $id = 0)
    {
        if ($paginate) {
            return ManageHomeContent::where(function ($query) use ($txt) {
                if ($txt != null)
                    return $query->where('title', 'LIKE', '%' . $txt . '%');
            });
        } else {
            return ManageHomeContent::all();
        }

    }




    public function homeContent(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HomeContent::class, 'type','type');
    }


    public function manageHomeContentItem(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ManageHomeContentItem::class, 'mainPageId');
    }


    public $timestamps  = true;

}
