<?php

namespace App\Http\Controllers\Front;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Settings;
use App\Models\Visitor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Contacts;
use App\Http\Requests\Comments;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;
use Morilog\Jalali\Jalalian;

class ContactController extends Controller
{


    public function index()
    {
        $settings = Settings::allSettings()->pluck('value', 'name');
        $user = User::getUserAdmin();
        if (!isset($settings['titleSite']))
            $settings['titleSite'] = '';
        $all_data = ['settings' => $settings, 'user' => $user];
        return view('Front.contact')->with('data', $all_data);
    }

    public function contactStore(Contacts $request)
    {
        $data['text'] = $request->text;
        $data['fullname'] = $request->fullname;
        $data['title'] = $request->title;
        $data['mobile'] = $request->mobile;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $check = Contact::store($data);

        if ($check == true)
            return Redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return Redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));


    }


}
