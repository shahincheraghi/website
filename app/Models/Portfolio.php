<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    public $timestamps = true;
    protected $guarded = ['id'];


    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public static function store($data)
    {
        try {
            $Portfolio = new Portfolio();
            $Portfolio->title = $data['title'];
            $Portfolio->category_id = $data['category_id'];
            $Portfolio->text = $data['text'];
            $Portfolio->image = $data['image'];
            $Portfolio->date = $data['date'];
            $Portfolio->customer = $data['customer'];
            $Portfolio->address = $data['address'];
            $Portfolio->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getPortfolios()
    {
        $Portfolios = Portfolio::with('Category')->get();
        return $Portfolios;
    }

    public static function getPortfolio($id)
    {
        $Portfolio = Portfolio::find($id);
        if ($Portfolio != null)
            return $Portfolio;
        else
            return "";
    }

    public static function PortfolioDelete($id)
    {
        try {
            $Portfolio = Portfolio::getPortfolio($id);
            if (\Illuminate\Support\Facades\File::exists($Portfolio->image)) {
                \Illuminate\Support\Facades\File::delete($Portfolio->image);
            }
            $Portfolio->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updatePortfolio($data, $id)
    {
        try {
            $Portfolio = Portfolio::find($id);
            $Portfolio->title = $data['title'];
            $Portfolio->category_id = $data['category_id'];
            $Portfolio->text = $data['text'];
            $Portfolio->image = $data['image'];
            $Portfolio->date = $data['date'];
            $Portfolio->customer = $data['customer'];
            $Portfolio->address = $data['address'];
            $Portfolio->update();
            return true;
        } catch (\Exception $e) {
            dd($e);
            return $e->getMessage();
        }
    }


}

