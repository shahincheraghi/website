<?php

namespace App\Http\Controllers\Front;

use App\Models\Services;
use App\Models\Settings;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;
use Morilog\Jalali\Jalalian;

class ServiceController extends Controller
{

    public function index($id = 0)
    {
        if ($id == 0)
            $Services = Services::allServices(true);
        else
            $Services = Services::serviceWithCategory($id);

        $settings = Settings::allSettings()->pluck('value', 'name');
        $all_data = ['settings' => $settings, 'services' => $Services];
        return view('Front.service')->with('data', $all_data);
    }

    public function serviceText($id)
    {
        $service = Services::getservice($id);
        $Category = Category::getCategorysType(2);
        $settings = Settings::allSettings()->pluck('value', 'name');
        $all_data = ['settings' => $settings, 'service' => $service, 'Category' => $Category];
        return view('Front.serviceSingle')->with('data', $all_data);
    }
}
