<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';
    protected $guarded = ['id'];

    public static function allSkill()
    {
        return Skills::all();
    }

    public static function getSkill($idSkill)
    {
        return Skills::find($idSkill);
    }

    public static function allSkills($paginate = false)
    {
        if ($paginate)
            $skills = Skills::paginate(9);
        else
            $skills = Skills::all();
        return $skills;
    }

    public static function updateSkills($idSkill, array $data)
    {
        try {
            $skill = Skills::getSkill($idSkill);
            $skill->title = $data['title'];
            $skill->icon = $data['icons'];
            $skill->percent = $data['percent'];
            $skill->description = $data['description'];
            $skill->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function storeSkill(array $data)
    {
        try {
            $skill = new Skills();
            $skill->title = $data['title'];
            $skill->icon = $data['icons'];
            $skill->percent = $data['percent'];
            $skill->description = $data['description'];
            $skill->save();
            return true;
        } catch (\Exception $e) {
            dd($e);
            return $e->getMessage();
        }
    }


    public static function destroy($id)
    {
        try {
            $skill = Skills::getSkill($id);
            $skill->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
