<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skills;

use App\Http\Requests\Skill;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::allSkills();
        return view('Admin.Skills.skillList')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response=>
     */
    public function create()
    {
        return view('Admin.Skills.skillInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Skill $request)
    {

        $check = Skills::storeSkill(['title' => $request->title, 'icons' => $request->icon, 'percent' => $request->percent, 'description' => $request->description]);
        if ($check === true)
            return redirect()->route('Admin.skills.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.skills.create')->with('msgError', trans('langPanel.the_operation_failed'));
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
        $skill = Skills::getSkill($id);
        $all_data = ['skill' => $skill];
        return view('Admin.Skills.skillUpdate')->with('data', $all_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Skill $request, $id)
    {
        $data = ['title' => $request->title, 'icons' => $request->icon, 'percent' => $request->percent, 'description' => $request->description];
        $check = Skills::updateSkills($id, $data);
        if ($check === true)
            return redirect()->route('Admin.skills.edit', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.skills.edit', $id)->with('msgError', trans('langPanel.the_operation_failed'));
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
        $check = Skills::destroy($id);
        if ($check === true)
            return redirect()->route('Admin.skills.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.skills.index')->with('msgError', trans('langPanel.the_operation_failed'));

    }
}
