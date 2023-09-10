<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialNetworks;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\Teams;
use File;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Team = Team::getTeams();
        return view('Admin.Team.teamList')->with('Team', $Team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response=>
     */
    public function create()
    {
        return view('Admin.Team.teamInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Teams $request)
    {
        $data['fullname'] = $request->fullname;
        $data['designation'] = $request->designation;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/team/';
        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        // dd($request->all(),$data);

        $check = Team::store($data);
        $social = [];
        if (isset($request->title)) {
            foreach ($request->title as $key => $item) {
                if ($item == null || $request->link[$key] == null || $request->fontClass[$key] == null) {
                    continue;
                }
                array_push($social, ['title' => $item, 'link' => $request->link[$key], 'class_font' => $request->fontClass[$key], 'team_id' => $check->id]);
            }
        }
        $A = SocialNetworks::storeSocial($social);
        if ($check instanceof Team)
            return redirect()->route('Admin.teams.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.teams.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $Team = Team::getTeam($id);
        $socials = $Team->socials;
        $all_data = ['Team' => $Team, 'socials' => $socials];
        return view('Admin.Team.teamUpdate')->with('data', $all_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Teams $request, $id)
    {
        $Team = Team::getTeam($id);
        $data['fullname'] = $request->fullname;
        $data['designation'] = $request->designation;
        if ($request->file('file')) {
            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/team/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Team->image)) {
                \Illuminate\Support\Facades\File::delete($Team->image);
            }
        } else
            $data['image'] = $Team->image;
        $check = Team::updateTeam($data, $id);

        $social = [];
        if (isset($request->title)) {
            foreach ($request->title as $key => $item) {
                if ($item == null || $request->link[$key] == null || $request->fontClass[$key] == null) {
                    continue;
                }
                array_push($social, ['title' => $item, 'link' => $request->link[$key], 'class_font' => $request->fontClass[$key], 'team_id' => $id]);
            }
        }
        $A = SocialNetworks::updateSocial($social, $id);


        if ($check === true)
            return redirect()->route('Admin.teams.edit', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.teams.edit', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $check = Team::TeamDelete($id);
        if ($check === true)
            return redirect()->route('Admin.teams.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.teams.index')->with('msgError', trans('langPanel.the_operation_failed'));

    }
}
