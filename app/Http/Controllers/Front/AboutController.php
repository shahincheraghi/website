<?php

namespace App\Http\Controllers\Front;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;
use Morilog\Jalali\Jalalian;
use App\Models\Skills;
use App\Models\Services;
class AboutController extends Controller
{

    public function index()
    {
        $AllServicesSpecial = Services::allServicesSpecial();
        $settings = Settings::allSettings()->pluck('value', 'name');
        $skill = Skills::allSkill();
        $all_data = ['settings' => $settings, 'skill' => $skill,'AllServicesSpecial' => $AllServicesSpecial];
        return view('Front.about')->with('data', $all_data);
    }

}
