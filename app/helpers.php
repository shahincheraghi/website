<?php
//function storeFile($file, $path)
//{
//    $date = \Carbon\Carbon::now();
//    $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
//    $name = $date . '-' . Str::random(32);
//    $ext = $file->getClientOriginalExtension();
//    $full_name = $name . '.' . $ext;
//    $file->move($path, $full_name);
//    return $path . $full_name;
//}

function storeFile($file, $path, $arrResize = null, $private = 0)
{
    $date = \Carbon\Carbon::now();
    $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
    if (!Auth::check())
        $name = $date . '-' . Str::random(32);
    else {
        $user_id = Auth::id();
        $name = $user_id . $date . '-' . Str::random(32) . $user_id;
    }
    $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif', 'svg', 'pdf', 'xlsx', 'm4v', 'mp4'];
    $ext = $file->getClientOriginalExtension();
    $settingcheck = in_array($ext, $allowedfileExtension);
    $full_name = $name . '.' . $ext;
    if ($settingcheck) {
        if ($private == 0) {
            $file->move($path, $full_name);
            $full = $path . $full_name;
            $thumbnailpath = $full;
        } else {
            $file->storeAs($path, $full_name);
            $full = $path . '/' . $full_name;
            $thumbnailpath = $full;
        }
    }
    if ($arrResize != null and sizeof($arrResize) > 0) {
        foreach ($arrResize as $item) {
            $full = base_path() . '/public/' . $item['src'] . '/' . $full_name;
            $watterAddress = base_path() . '/public/' . \App\Model\Settings::getSettingName('logocopyright' . $item['w']);


            $img = \Intervention\Image\Facades\Image::make($thumbnailpath)->resize($item['w'], $item['h'])->save($full);
        }


        dd(\Illuminate\Support\Facades\File::exists(\App\Model\Settings::getSettingName('logocopyright')));
        if (\Illuminate\Support\Facades\File::exists(\App\Model\Settings::getSettingName('logocopyright'))) {
            $img = \Intervention\Image\Facades\Image::make($thumbnailpath)->insert(base_path() . '/public/' . \App\Model\Settings::getSettingName('logocopyright'), 'top-left', 5, 5)->save(base_path() . '/public/' . $thumbnailpath);
        } else {
            $img = \Intervention\Image\Facades\Image::make($thumbnailpath)->save(base_path() . '/public/' . $thumbnailpath);

        }

        return $full_name;
    }
    return $full;


}




function DateTimeTOTimeStamp($date, $time = null)
{
    if ($time) {
        $time = \Carbon\Carbon::parse($time)->addSeconds(0)->format('H:i:s');
        $ex_time = explode(':', $time);
    }

    $date = explode('/', $date);
    $date_time = (new \Morilog\Jalali\Jalalian(convertNumbers($date[0]), convertNumbers($date[1]), convertNumbers($date[2])))->getTimestamp();
    if ($time)
        $date_time = (new \Morilog\Jalali\Jalalian($date[2], $date[1], $date[0], $ex_time[0], $ex_time[1], $ex_time[2]))->getTimestamp();
    return $date_time;
}

function timestampDate($timestamp, $formatRtl = false)
{
    if ($formatRtl)
        $date = \Morilog\Jalali\Jalalian::forge($timestamp)->format('Y/m/d');
    else
        $date = \Morilog\Jalali\Jalalian::forge($timestamp)->format('d/m/Y');
    $time = \Morilog\Jalali\Jalalian::forge($timestamp)->format('H:i:s');
    return ['date' => $date, 'time' => $time];
}


function convertNumbers($srting, $toPersian = false)
{
    $en_num = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $fa_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    if ($toPersian) return str_replace($en_num, $fa_num, $srting);
    else return str_replace($fa_num, $en_num, $srting);
}

function get_client_ip_env()
{

    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function PriceCalculation($fi, $priceValue)
{
    return $fi - (($fi / 100) * $priceValue);
}

function CommpareNumber($number1, $number2)
{

    if ($number1 <= $number2)
        return true;
    else
        return false;

}

?>
