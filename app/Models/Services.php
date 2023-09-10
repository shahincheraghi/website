<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $guarded = ['id'];

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public static function getService($idService)
    {
        return Services::find($idService);
    }

    public static function allServices($paginate = false, $fromPanel = 0)
    {
        if ($paginate)
            $services = Services::where(function ($query) use ($fromPanel) {
                $settings = Settings::getSettingName('specialservice');
                if ($settings != null and $settings != '' and $settings != 0  and $fromPanel==0) {
                    return $query->where('special_service', 0);
                }
            })->paginate(9);
        else
            $services = Services::where(function ($query) use ($fromPanel) {
                $settings = Settings::getSettingName('specialservice');
                if ($settings != null and $settings != '' and $fromPanel == 0 and $settings != 0)
                    return $query->where('special_service', 0);
            })->get();
        return $services;
    }

    public static function allServicesSpecial($paginate = false)
    {
        if ($paginate)
            $services = Services::where('special_service', 1)->paginate(9);
        else
            $services = Services::where('special_service', 1)->get();
        return $services;
    }

    public static function updateServices($idService, array $data)
    {
        try {
            $service = Services::getService($idService);
            if (isset($data['image'])) {
                if (\Illuminate\Support\Facades\File::exists($service->image)) {
                    \Illuminate\Support\Facades\File::delete($service->image);
                }
                $service->image = $data['image'];
            }
            $service->title = $data['title'];
            $service->icon = $data['icons'];
            $service->category_id = $data['category_id'];
            $service->text = $data['text'];
            $service->special_service = $data['special_services'];

            $service->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public static function storeService(array $data)
    {
        try {
            $service = new Services();
            $service->title = $data['title'];
            $service->text = $data['text'];
            $service->image = $data['image'];
            $service->icon = $data['icons'];
            $service->category_id = $data['category_id'];
            $service->special_service = $data['special_services'];
            $service->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function destroy($id)
    {
        try {
            $service = Services::getService($id);
            if (\Illuminate\Support\Facades\File::exists($service->image)) {
                \Illuminate\Support\Facades\File::delete($service->image);
            }
            $service->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function serviceWithCategory($category_id)
    {
        return Services::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(9);
    }


}
