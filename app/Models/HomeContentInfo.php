<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContentInfo extends Model
{
    use HasFactory;

    protected $table = 'home_content_info';

    protected $fillable =['id','subTitle','title','description','status','keyHomeContent'];

    public $timestamps = true;

    public static function store($data)
    {
        try {
            $HomeContentInfo = new HomeContentInfo();
            $HomeContentInfo->subTitle = $data['subTitle'];
            $HomeContentInfo->title = $data['title'];
            $HomeContentInfo->description = $data['description'];
            $HomeContentInfo->status = $data['status'];
            $HomeContentInfo->keyHomeContent = $data['keyHomeContent'];
            $HomeContentInfo->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getHomeContentInfos()
    {
        $HomeContentInfo= HomeContentInfo::all();
        return $HomeContentInfo;
    }

    public static function getHomeContentInfo($id)
    {
        $HomeContentInfo = HomeContentInfo::find($id);
        if ($HomeContentInfo != null)
            return $HomeContentInfo;
        else
            return "";
    }

    public static function HomeContentInfoDelete($id)
    {
        try {
            $HomeContentInfo = HomeContentInfo::getHomeContentInfo($id);
            $HomeContentInfo->delete();

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public static function updateHomeContentInfo($data, $id)
    {
        try {
            $HomeContentInfo = HomeContentInfo::find($id);
            $HomeContentInfo->subTitle = $data['subTitle'];
            $HomeContentInfo->title = $data['title'];
            $HomeContentInfo->description = $data['description'];
            $HomeContentInfo->status = $data['status'];
            $HomeContentInfo->keyHomeContent = $data['keyHomeContent'];
            $HomeContentInfo->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
