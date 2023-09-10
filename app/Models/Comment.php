<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\File;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function blog()
    {
        return $this->hasOne(Blog::class, 'id', 'commentable_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'commentable_id');
    }
    public static function store($data)
    {
        try {
            $Comment = new Comment();
            $Comment->fullname = $data['fullname'];
            $Comment->commentable_type = $data['commentable_type'];
            $Comment->commentable_id = $data['commentable_id'];
            $Comment->email = $data['email'];
            $Comment->image = $data['image'];
            $Comment->text = $data['text'];
            $Comment->status = $data['status'];
            $Comment->save();
            return true;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public static function getComments()
    {
        $Comment = Comment::with('blog')->get();
        return $Comment;
    }

    public static function getCommentsPanel()
    {
        $Comment = Comment::where('commentable_type', 0)->get();
        return $Comment;
    }

    public static function getCommentsBlog($id)
    {
        $Comment = Comment::where('commentable_id', $id)->where('status', 1)->get();
        return $Comment;
    }

    public static function getComment($id)
    {
        $Comment = Comment::with('blog')->find($id);
        if ($Comment != null)
            return $Comment;
        else
            return "";
    }


    public static function confirmation($id)
    {
        try {
            $Comment = Comment::find($id);
            $Comment->status = 1;
            $Comment->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function CommentDelete($id)
    {
        try {
            $Comment = Comment::getComment($id);
            if (\Illuminate\Support\Facades\File::exists($Comment->image)) {
                \Illuminate\Support\Facades\File::delete($Comment->image);
            }
            $Comment->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateComment($data, $id)
    {
        try {
            $Comment = Comment::find($id);
            $Comment->fullname = $data['fullname'];
            $Comment->commentable_type = $data['commentable_type'];
            $Comment->commentable_id = $data['commentable_id'];
            $Comment->email = $data['email'];
            $Comment->image = $data['image'];
            $Comment->status = $data['status'];
            $Comment->text = $data['text'];
            $Comment->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function countComment()
    {
        $Comment = Comment::count();
        return $Comment;
    }

}

