<?php

namespace App\Models;

use App\Mail\DemoEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class Newsletters extends Model
{
    protected $table = 'newsletters';

    public static function add($email)
    {
        try {
            $check = Newsletters::where('email', $email)->first();
            if ($check == null) {
                $new = new Newsletters();
                $new->email = $email;
                $new->save();
                return 'true';
            }
            return 'before';

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function sendEmailStoreBlog($title = "", $img = '',$blogId)
    {
        $emails = Newsletters::all()->pluck('email')->toArray();
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = '!';
        $objDemo->receiver = '';
        $objDemo->title = $title;
        $objDemo->img = Request::root().$img;
        $objDemo->blogId = $blogId;
        Mail::to($emails)->send(new DemoEmail($objDemo));

    }
}
