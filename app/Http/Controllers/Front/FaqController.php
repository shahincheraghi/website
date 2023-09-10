<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faqs;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Settings;
use File;

class FaqController extends Controller
{

    public function index()
    {

        $Faq = Faq::getFaqs();
        $settings = Settings::allSettings()->pluck('value', 'name');
        $all_data = ['Faq' => $Faq, 'settings' => $settings];
        return view('Front.Faq')->with('data', $all_data);
    }


}
