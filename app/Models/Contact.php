<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Contact extends Model
{
    protected $table = 'contacts';
    public $timestamps = true;


    public static function store($data)
    {
        try {
            $Contact = new Contact();
            $Contact->text = $data['text'];
            $Contact->fullname = $data['fullname'];
            $Contact->title = $data['title'];
            $Contact->email = $data['email'];
            $Contact->subject = $data['subject'];
            $Contact->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getContacts()
    {
        $Contacts = Contact::all();
        return $Contacts;
    }
    public static function getSubscribes()
    {
        $Subscribes = Subscribe::all();
        return $Subscribes;
    }
    public static function getCounseling()
    {
        $Counseling = Counseling::all();
        return $Counseling;
    }

    public static function getContact($id)
    {
        $Contact = Contact::find($id);
        if ($Contact != null)
            return $Contact;
        else
            return "";
    }

    public static function ContactDelete($id)
    {
        try {
            $Contact = Contact::destroy($id);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateContact($data, $id)
    {
        try {
            $Contact = Contact::find($id);
            $Contact->text = $data['text'];
            $Contact->fullname = $data['fullname'];
            $Contact->title = $data['title'];
            $Contact->email = $data['email'];
            $Contact->subject = $data['subject'];
            $Contact->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function countContact()
    {
        $Contact = Contact::count();
        return $Contact;
    }

}

