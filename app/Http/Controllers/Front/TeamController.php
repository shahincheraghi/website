<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Settings;
class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::getAllTeams();
        $settings = Settings::allSettings()->pluck('value', 'name');
        $all_data = ['teams' => $teams,'settings' => $settings];
        return view('Front.team')->with('data', $all_data);

    }
}
