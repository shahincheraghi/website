<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageHomeContentItem extends Model
{
    use  HasFactory;

    protected $table = 'main_page_items';

    protected $fillable = [

        'mainPageId','homeContentId' ,'sort'

    ];
    public function homeContent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HomeContent::class, 'id');
    }
    public function manageHomeContent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ManageHomeContent::class, 'id');
    }

    public $timestamps  = true;

}
