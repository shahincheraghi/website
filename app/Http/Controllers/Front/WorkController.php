<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Settings;
use App\Models\Visitor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;
use Morilog\Jalali\Jalalian;

class WorkController extends Controller
{

    public function index()
    {
        $ip = get_client_ip_env();
        $dateTime = Jalalian::now()->getTimestamp();
        $datenow = timestampDate($dateTime, true);
        $date = $datenow['date'];
        $getVisitors = Visitor::getVisitorsIp($ip, $date);
        if ($getVisitors == null)
            Visitor::store();

        $Category = Category::getCategorysType(0);
        $Portfolio = Portfolio::getPortfolios();
        $settings = Settings::allSettings()->pluck('value', 'name');


        if (isset($settings['color']))
            $themColor = \Illuminate\Support\Facades\Config::get('colors')[$settings['color']]['index'];
        else
            $themColor = \Illuminate\Support\Facades\Config::get('colors')[1]['index'];


        if (isset($settings['themeDark']) and $settings['themeDark'] != 0)
            $themeDark = 'dark';
        else
            $themeDark = '';

        if (!isset($settings['titleSite']))
            $settings['titleSite'] = '';

        $all_data = ['settings' => $settings, 'Category' => $Category, 'Portfolio' => $Portfolio, 'color' => $themColor, 'themeDark' => $themeDark];
        return view('Front.work')->with('data', $all_data);
    }

}
