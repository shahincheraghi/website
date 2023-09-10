<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;
class Settings extends Model
{
    protected $table = 'settings';
    protected $guarded = ['id'];

    public static function getSettingName($nameSettings){
        $setting = Settings::where('name', $nameSettings)->first();
        if ($setting != null)
            return $setting->value;
        else
            return '';
    }
    public static function getSettingCityPaymentOffline($nameSettings, $city_id)
    {
        $setting = Settings::where('value', 'like', '%' . $city_id . '%')->first();
        if ($setting != null)
            return 1;
        else
            return 0;
    }
    public static function getSetting($idSettings)
    {
        return Settings::find($idSettings);
    }

    public static function allSettings($paginate = false)
    {
        if ($paginate)
            $settings = Settings::paginate(9);
        else
            $settings = Settings::all();
        return $settings;
    }

    public static function updateSetting(array $data)
    {
        try {
         if (!isset($data['service'])) {
                $data['service'] = 0;
            }
            if (!isset($data['about'])) {
                $data['about'] = 0;
            }

            if (!isset($data['product'])) {
                $data['product'] = 0;
            }
               if (!isset($data['blog'])) {
                $data['blog'] = 0;
            }

            if (!isset($data['faq'])) {
                $data['faq'] = 0;
            }

            if (!isset($data['contact'])) {
                $data['contact'] = 0;
            }

            if (!isset($data['formService'])) {
                $data['formService'] = 0;
            }

            if (!isset($data['ListOfAgencies'])) {
                $data['ListOfAgencies'] = 0;
            }
            if (!isset($data['formInsurance'])) {
                $data['formInsurance'] = 0;
            }

            if (!isset($data['team'])) {
                $data['team'] = 0;
            }

             if (!isset($data['skill'])) {
                $data['skill'] = 0;
            }
              if (!isset($data['comment'])) {
                $data['comment'] = 0;
            }

            if (!isset($data['counter'])) {
                $data['counter'] = 0;
            }
              if (!isset($data['partner'])) {
                $data['partner'] = 0;
            }
            if (!isset($data['statusBannerSlide'])) {
                $data['statusBannerSlide'] = 0;
            }


     if (!isset($data['idpay_active'])) {
                $data['idpay_active'] = 0;
            }
            if (!isset($data['enable_on_site_payment'])) {
                $data['enable_on_site_payment'] = 0;
            }
            if (!isset($data['activate_zarrinPal_payment_gateway'])) {
                $data['activate_zarrinPal_payment_gateway'] = 0;
            }

            if (isset($data['google_analytics'])) {
                $file = $data['google_analytics'];
                $name = 'setin-300815-d621e65b8810';
                $ext = $file->getClientOriginalExtension();
                $full_name = $name . '.' . $ext;
                $file->move('../storage/app/analytics/', $full_name);
                unset($data['google_analytics']);
            }

            if(isset($data['view_id']))
            {
                DotenvEditor::setKey('ANALYTICS_VIEW_ID', $data['view_id'])->save();
            }
            foreach ($data as $key => $item) {
                $setting = Settings::where('name', $key)->first();
                if ($setting != null) {
                    if ($data[$key] instanceof UploadedFile) {
                        Settings::where('name', $key)->update(['value' => storeFile($item, 'File/setting/')]);
                    } elseif (is_array($data[$key])) {

                        Settings::where('name', $key)->update(['value' => json_encode($item)]);
                    } else {
                        Settings::where('name', $key)->update(['value' => $item]);
                    }
//                    $setting->update();
                } else {
                    $setting = new Settings();
                    $setting->name = $key;
                    if ($data[$key] instanceof UploadedFile) {
                        $setting->value = storeFile($item, 'File/setting/');
                    } elseif (is_array($data[$key])) {
                        $setting->value = json_encode($item);
                    } else {
                        $setting->value = $item;
                    }
                    $setting->save();
                }
            }
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public static function storeSetting($id, $data)
    {
        try {
            foreach ($data as $item) {
                $setting = new Settings();
                $setting->name = $item['name'];
                $setting->value = $item['value'];
                $setting->store();
            }
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
    public static function deleteSettingWithName($name)
    {
        try {
           Settings::where('name',$name)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public static function getSocial()
    {
        $arrayuSocial = ['twitter', 'facebook', 'instagram', 'github', 'codepen', 'telegram'];
        $social = Settings::whereIn('name', $arrayuSocial)->get()->pluck('value', 'name');
        return $social;
    }


    public static function getColorTheme()
    {
        $settingColor = Settings::where('name', ['color', 'them_box'])->pluck('value', 'name');
        if (isset($settingColor['color']) )
            $themColor = \Illuminate\Support\Facades\Config::get('colors')[$settingColor['color']]['href'];
        else
            $themColor = '#';
        return $themColor;
    }


    public static function getBackground()
    {
        $settingBackground = Settings::where('name', 'background')->first();
        if ($settingBackground != null)
            $background = 'background-image:url(' . \Illuminate\Support\Facades\Config::get('background')[$settingBackground->value]['src'] . ')';
        else
            $background = 'background-image:url(' . \Illuminate\Support\Facades\Config::get('background')[1]['src'] . ')';
        return $background;
    }

    public static function getTypePage()
    {
        $settingTypePage = Settings::where('name', 'them_box')->first();
        if ($settingTypePage != null)
            $type = $settingTypePage->value;
        else
            $type = 0;
        return $type;

    }


}
