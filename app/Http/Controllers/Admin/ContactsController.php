<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Requests\Contacts;
use App\Models\Contact;

class ContactsController extends Controller
{

    public function index()
    {

        $Contacts = Contact::getContacts();
        $all_data = ['Contacts' => $Contacts];
        return view('Admin.Contact.contactList')->with('data', $all_data);
    }

    public function indexSubscribe()
    {

        $Subscribes = Contact::getSubscribes();
        $all_data = ['Subscribes' => $Subscribes];
        return view('Admin.Subscribe.subscribeList')->with('data', $all_data);
    }

    public function indexCounseling()
    {

        $Counseling = Contact::getCounseling();
        $all_data = ['Counseling' => $Counseling];
        return view('Admin.Counseling.CounselingList')->with('data', $all_data);
    }

    public function store(Contacts $request)
    {
        $data['text'] = $request->text;
        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;

        $check = Contact::store($data);

        if ($check === true)
            return redirect()->route('Admin.contacts.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.contacts.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        $Contact = Contact::getContact($id);
        $all_data = ['Contact' => $Contact];
        return view('Admin.Contact.contactShow')->with('data', $all_data);
    }

    public function edit($id)
    {
        $Contact = Contact::getContact($id);
        $all_data = ['Contact' => $Contact];
        return view('Admin.Contact.contactEdit')->with('data', $all_data);
    }

    public function update(Contacts $request, $id)
    {

        $Contact = Contact::getContact($id);
        $data['text'] = $request->text;
        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;

        $check = Contact::updateBlog($data, $id);
        if ($check === true)
            return redirect()->route('Admin.contacts.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.contacts.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function ContactDelete($id)
    {
        $check = Contact::ContactDelete($id);
        if ($check === true)
            return redirect()->route('Admin.contacts.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.contacts.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
