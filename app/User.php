<?php

namespace App;

use App\Model\Services;
use App\Model\Settings;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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


    public static function getUserAdmin()
    {
        $user=User::all()->first();
        return $user;
    }

    public static function getUser()
    {
        return Auth::user();
    }


    public static function updateProfile(array $data)
    {
        try {
            $user = User::getUser();
            if (isset($data['imageInfo'])) {
                if (\Illuminate\Support\Facades\File::exists($user->imageInfo)) {
                    \Illuminate\Support\Facades\File::delete($user->imageInfo);
                }
                $user->image = $data['imageInfo'];
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

    public static function updateSocial(array $data)
    {
        try {
            foreach ($data as $key => $item) {
                $setting = Settings::where('name', $key)->first();
                if ($setting != null)
                {
                    $setting->value= $item;
                    $setting->update();
                }
                else {
                    $setting = new Settings();
                    $setting->name = $key;
                    $setting->value = $item;
                    $setting->save();
                }
            }
            return true;
        } catch (\Exception $e) {
            dd($e);
            return $e->getMessage();
        }

    }

}
