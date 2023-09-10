<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = true;
    protected $guarded = ['id'];


    public function Portfolio()
    {
        return $this->hasMany(Portfolio::class, 'category_id', 'id');
    }


    public static function store($data)
    {
        try {
            $Category = new Category();
            $Category->title = $data['title'];
            $Category->type = $data['type'];
            $Category->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getCategorysType($type)
    {
        $Category = Category::where('type', $type)->get();
        return $Category;
    }

    public static function getCategorys()
    {
        $Category = Category::all();
        return $Category;
    }

    public static function getCategorysPortfolio()
    {
        $Category = Category::with('Portfolio')->get();
        return $Category;
    }

    public static function getCategory($id)
    {
        $Category = Category::find($id);
        if ($Category != null)
            return $Category;
        else
            return "";
    }

    public static function CategoryDelete($id)
    {
        try {
            $Category = Category::destroy($id);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateCategory($data, $id)
    {
        try {
            $Category = Category::find($id);
            $Category->title = $data['title'];
            $Category->type = $data['type'];
            $Category->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

