<?php

namespace App\Models;

use App\Models\UserPerm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;
use App\Models\Services;
use App\Models\Settings;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function perms()
    {
        return $this->hasMany(UserPerm::class, 'user_id', 'id');
    }

    public function activeCode(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ActiveCode::class);
    }

    public static function getUserAdmin()
    {
        $user = User::all()->first();
        return $user;
    }

    public static function getUser()
    {
        return Auth::user();
    }


    public static function getArrayRolePerm()
    {
        $userId = Auth::id();
        return UserPerm::where('user_id', $userId)->pluck('perm_route_name')->toArray();
    }

    public static function checkUsername($username, $id)
    {
        if ($id == 0)
            $User = User::where('username', $username)->where('delete', 0)->count();
        else
            $User = User::where('username', $username)->where('id', '!=', $id)->where('delete', 0)->count();
        return $User;
    }

    public static function checkMobile($mobile, $id)
    {
        if ($id == 0)
            $User = User::where('mobile', $mobile)->where('delete', 0)->count();
        else
            $User = User::where('mobile', $mobile)->where('id', '!=', $id)->where('delete', 0)->count();
        return $User;
    }

    public static function checkNationalIdentity($national_identity, $id)
    {
        if ($id == 0)
            $User = User::where('national_identity', $national_identity)->where('delete', 0)->count();
        else
            $User = User::where('national_identity', $national_identity)->where('id', '!=', $id)->where('delete', 0)->count();
        return $User;
    }

    public static function store($data)
    {
        try {
            $User = new User();
            $User->name = $data['name'];
            $User->email = $data['email'];
            $User->family = $data['family'];
            $User->mobile = $data['mobile'];
            $User->national_identity = $data['national_identity'];
            $User->username = $data['username'];
            $User->password = $data['password'];
            $User->birth_date = $data['birth_date'];
            $User->status = $data['status'];
            $User->type = $data['type'];
            $User->delete = $data['delete'];
            $User->image = $data['image'];
            $User->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getUsers($type)
    {
        return User::where('delete', 0)->where('type', $type)->get();


    }

    public static function getUserD($id)
    {
        return User::where('delete', 0)->where('id', $id)->first();


    }


    public static function UserDelete($id)
    {
        try {
            $User = User::find($id);
            $User->delete = 1;
            $User->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateUser($data, $id)
    {
        try {

            $User = User::find($id);
            $User->name = $data['name'];
            $User->email = $data['email'];
            $User->family = $data['family'];
            $User->mobile = $data['mobile'];
            $User->national_identity = $data['national_identity'];
             if(isset($data['username']))
            $User->username = $data['username'];
            //$User->password = $data['password'];
            $User->birth_date = $data['birth_date'];
            if(isset($data['status']))
            $User->status = $data['status'];
             if(isset($data['type']))
            $User->type = $data['type'];
            if(isset($data['delete']))
            $User->delete = $data['delete'];
           if(isset($data['image']))
            $User->image = $data['image'];
            $User->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function updateProfile(array $data)
    {
        try {
            $user = User::getUser();
            if (isset($data['imageInfo'])) {
                if (\Illuminate\Support\Facades\File::exists($user->imageInfo)) {
                    \Illuminate\Support\Facades\File::delete($user->imageInfo);
                }
                $user->imageInfo = $data['imageInfo'];
            }
            if (isset($data['password']))
                $user->password = $data['password'];
            $user->name = $data['name'];
            $user->family = $data['family'];
            $user->email = $data['email'];
            $user->birth_date = $data['birth_date'];
            $user->tel = $data['tel'];
            $user->mobile = $data['mobile'];
            $user->update();
            return true;
        } catch (\Exception $e) {
            dd($e);
            return $e->getMessage();
        }

    }
    public static function userCreate(array $data)
    {
        try {

            $User = User::where('mobile', $data['mobile'])->first();
            if ($User == null) {
                $User = new User();
                $User->name = $data['name'];
                $User->email = $data['email'];
                $User->family = $data['family'];
                $User->password = Hash::make($data['pass']);
                $User->mobile = $data['mobile'];
                $User->email = $data['email'];
                $User->status = 0;
                $User->delete = 0;
                $User->type = 2;
                $User->save();
                Auth::login($User);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
//            dd($e);
            return $e->getMessage();
        }
    }
    public static function updateSocial(array $data)
    {
        try {
            foreach ($data as $key => $item) {
                $setting = Settings::where('name', $key)->first();
                if ($setting != null) {
                    $setting->value = $item;
                    $setting->update();
                } else {
                    $setting = new Settings();
                    $setting->name = $key;
                    $setting->value = $item;
                    $setting->save();
                }
            }
            return true;
        } catch (\Exception $e) {

            return $e->getMessage();
        }

    }

}
