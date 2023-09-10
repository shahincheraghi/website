<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;use Illuminate\Support\Collection;


class Menu extends Model
{
    protected $fillable = [
        'title', 'slug', 'order', 'parent_id'
    ];
    protected $table = 'menus';


    public function buildMenu($menu, $parentid = 0): ?string
    {
        $result = null;
        foreach($menu as $item)

            if ($item->parent_id == $parentid) {
                $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
	<div class='dd-handle nested-list-handle'>
      <div class='nested-list-content'>
	{$item->title}-{$item->slug}

	</div>
	</div>
	<div class='nested-list-content'>

	`
	  <div class='float-right'>
	     <a href='#menuModalUpdate' id='editMenuDynamic'  data-id='$item->id' type='button'
              class='showEditMenu  mr-1 mb-1 '> ویرایش </a>|
                   <a data-id='$item->id' id='destroyMenuDynamic'
              type='button'
              class='destroyMenuDynamic  mr-1 mb-1 '>حذف</a>
	  </div>
	</div>".$this->buildMenu($menu, $item->id) . "</li>";
            }
        return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }
// Getter for the HTML menu builder
    public function getHTML($items): ?string
    {
        return $this->buildMenu($items);
    }

    public static function updateMenus(Collection $menus)
    {
        $ids = $menus->pluck('id');

        $currentMenus = self::whereIn('id', $ids)->get();
        $currentMenusById = $currentMenus->keyBy('id');

        foreach ($menus as $menu) {
            $currentMenu = $currentMenusById[$menu['id']];

            if (isset($menu['parent_id'])) {
                $currentMenu->parent_id = $menu['parent_id'];
            }

            if (isset($menu['order'])) {
                $currentMenu->order = $menu['order'];
            }

            $currentMenu->save();
        }
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }


}
