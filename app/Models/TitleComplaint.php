<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitleComplaint extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='title_complaints';

    protected $fillable = ['id','name','status'];

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public static function getTitleComplaints()
    {
        $TitleComplaint = TitleComplaint::orderBy('order','DESC')->get();
        return $TitleComplaint;
    }

    public static function storeTitleComplaint($data)
    {
        try {
            $TitleComplaint = new TitleComplaint();
            $TitleComplaint->name = $data['name'];
            $TitleComplaint->order = $data['order'];
            $TitleComplaint->status = $data['status'];
            $TitleComplaint->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getTitleComplaint($id)
    {
        $TitleComplaint = TitleComplaint::find($id);
        if ($TitleComplaint != null)
            return $TitleComplaint;
        else
            return "";
    }

    public static function TitleComplaintDelete($id)
    {
        try {
            $TitleComplaint = TitleComplaint::getTitleComplaint($id);
            $TitleComplaint->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateTitleComplaint($data, $id)
    {
        try {
            $TitleComplaint = TitleComplaint::find($id);
            $TitleComplaint->name = $data['name'];
            $TitleComplaint->order = $data['order'];
            $TitleComplaint->status = $data['status'];
            $TitleComplaint->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
