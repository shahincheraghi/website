<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Team extends Model
{
    protected $table = 'team';
    public $timestamps = true;

    public function socials()
    {
        return $this->hasMany(SocialNetworks::class, 'team_id', 'id');
    }


    public static function store($data)
    {
        try {
            $Team = new Team();
            $Team->image = $data['image'];
            $Team->fullname = $data['fullname'];
            $Team->designation = $data['designation'];
            $Team->save();
            return $Team;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getTeams()
    {
        $Team = Team::all();
        return $Team;
    }

    public static function getAllTeams()
    {
        return Team::with('socials')->paginate(9);

    }

    public static function getTeam($id)
    {

        $Team = Team::find($id);
        if ($Team != null)
            return $Team;
        else
            return "";

    }

    public static function TeamDelete($id)
    {
        try {
            $Team = Team::getTeam($id);
            if (\Illuminate\Support\Facades\File::exists($Team->image)) {
                \Illuminate\Support\Facades\File::delete($Team->image);
            }
            $Team->delete();

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateTeam($data, $id)
    {
        try {
            $Team = Team::find($id);
            $Team->fullname = $data['fullname'];
            $Team->image = $data['image'];
            $Team->designation = $data['designation'];
            $Team->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}

