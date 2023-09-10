<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceOnline;
use Illuminate\Http\Request;

class ServiceOnlineController extends Controller
{

    public function index() {

        $ServiceOnline= ServiceOnline::getServiceOnline();
        $all_data = ['ServiceOnline' => $ServiceOnline];
        return view('Admin.serviceOnline.serviceOnlineList')->with('data', $all_data);

    }
}
