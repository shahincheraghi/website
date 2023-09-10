<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Faq extends Model
{
    protected $table = 'faq';
    public $timestamps = true;


    public static function store($data)
    {
        try {
            $Faq = new Faq();
            $Faq->title = $data['title'];
            $Faq->stateInHomePage = $data['stateInHomePage'];
            $Faq->text = $data['text'];
            $Faq->category_id = $data['category'];

            $Faq->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getFaqs()
    {
        $Faq = Faq::orderBy('category_id','DESC')->get();
        return $Faq;
    }

    public static function getFaq($id)
    {
        $Faq = Faq::find($id);
        if ($Faq != null)
            return $Faq;
        else
            return "";
    }

    public static function FaqDelete($id)
    {
        try {
            $Faq = Faq::getFaq($id);
            $Faq->delete();

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateFaq($data, $id)
    {
        try {
            $Faq = Faq::find($id);
            $Faq->title = $data['title'];
            $Faq->text = $data['text'];
            $Faq->stateInHomePage = $data['stateInHomePage'];
            $Faq->category_id = $data['category'];
            $Faq->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}

