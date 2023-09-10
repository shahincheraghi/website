<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasPersianSlug;

    protected $table = 'pages';

    protected $guarded = [];

    public $timestamps = true;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public static function store($data)
    {
        try {
            $Page = new Page();
            $Page->text = $data['text'];
            $Page->title = $data['title'];
            $Page->titleEn = $data['titleEn'];
            $Page->forms = $data['forms'];
            $Page->short_description = $data['short_description'];
            $Page->image = $data['image'];
            $Page->category_id = $data['category_id'];
            $Page->keywords = $data['keywords'];
            $Page->multiKeywordsSeoPage = $data['multiKeywordsSeoPage'];
            $Page->titleSeoPage = $data['titleSeoPage'];
            $Page->descriptionSeoPage = $data['descriptionSeoPage'];
            $Page->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getPages($txt = null, $paginate = false, $id = 0)
    {
        if ($paginate) {
            return Page::where(function ($query) use ($txt) {
                if ($txt != null)
                    return $query->where('title', 'LIKE', '%' . $txt . '%');
            })->where(function ($query) use ($id) {
                if ($id != 0)
                    return $query->where('category_id', $id);
            });
        } else {
            return Page::all();
        }

    }

    public static function pagesPopular($txt = null)
    {
        return Page::orderBy('visit', 'DESC')->get()->take(4);
    }

    public static function getPagesTwo()
    {
        $Page = Page::orderBy('id', 'DESC')->paginate(2);
        return $Page;

    }

    public static function getPageswithCategory($id)
    {
        $Pages = Page::where('category_id', $id)->orderBy('id', 'DESC')->get();
        return $Pages;
    }

    public static function getPageAdmin($id)
    {
        $Page = Page::find($id);
        if ($Page != null)
            return $Page;
        else
            return "";
    }

    public static function getPage($id,$slug)
    {
        $Page = Page::where('id','=',$id)->first();
        if ($Page != null)
            return $Page;
        else
            return "";
    }

    public static function PageDeleteAdmin($id)
    {
        try {
            $Page = Page::getPageAdmin($id);
            if (\Illuminate\Support\Facades\File::exists($Page->image)) {
                \Illuminate\Support\Facades\File::delete($Page->image);
            }
            $Page->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function PageDelete($id)
    {
        try {
            $Page = Page::getPage($id);
            if (\Illuminate\Support\Facades\File::exists($Page->image)) {
                \Illuminate\Support\Facades\File::delete($Page->image);
            }
            $Page->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updatePage($data, $id)
    {
        try {
            $Page = Page::find($id);
            $Page->text = $data['text'];
            $Page->forms = $data['forms'];
            $Page->title = $data['title'];
            $Page->titleEn = $data['titleEn'];
            $Page->category_id = $data['category_id'];
            $Page->short_description = $data['short_description'];
            $Page->keywords = $data['keywords'];
            $Page->image = $data['image'];
            $Page->multiKeywordsSeoPage = $data['multiKeywordsSeoPage'];
            $Page->titleSeoPage = $data['titleSeoPage'];
            $Page->descriptionSeoPage = $data['descriptionSeoPage'];
            $Page->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function countPage()
    {
        $Page = Page::count();
        return $Page;
    }

}

