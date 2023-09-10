<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $guarded = ['id'];

    public $timestamps = true;

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'commentable_id', 'id')->where('commentable_type', 1);
    }

    public static function store($data)
    {
        try {
            $Blog = new Blog();
            $Blog->text = $data['text'];
            $Blog->title = $data['title'];
            $Blog->author_name = $data['author_name'];
            $Blog->short_description = $data['short_description'];
            $Blog->image = $data['image'];
            $Blog->category_id = $data['category_id'];
            $Blog->keywords = $data['keywords'];
            $Blog->save();
            //            Newsletters::sendEmailStoreBlog($data['title'],'/'.$data['image'],$Blog->id);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getBlogs($txt = null, $paginate = false, $id = 0)
    {
        if ($paginate) {
            return Blog::where(function ($query) use ($txt) {
                if ($txt != null)
                    return $query->where('title', 'LIKE', '%' . $txt . '%');
            })->where(function ($query) use ($id) {
                if ($id != 0)
                    return $query->where('category_id', $id);
            })->with('comments')->orderBy('created_at', 'DESC')->paginate(6);
        } else {
            return Blog::orderBy('created_at', 'DESC')->get();
        }

    }

    public static function blogsPopular($txt = null)
    {
        return Blog::orderBy('visit', 'DESC')->get()->take(4);
    }

    public static function getBlogsTwo()
    {
        $Blogs = Blog::orderBy('created_at', 'DESC')->paginate(2);
        return $Blogs;

    }

    public static function getBlogswithCategory($id)
    {
        $Blogs = Blog::where('category_id', $id)->orderBy('id', 'DESC')->get();
        return $Blogs;
    }

    public static function getBlog($id)
    {
        $Blog = Blog::with('comments')->find($id);
        if ($Blog != null)
            return $Blog;
        else
            return "";
    }

    public static function BlogDelete($id)
    {
        try {
            $Blog = Blog::getBlog($id);
            if (\Illuminate\Support\Facades\File::exists($Blog->image)) {
                \Illuminate\Support\Facades\File::delete($Blog->image);
            }
            $Blog->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateBlog($data, $id)
    {
        try {
            $Blog = Blog::find($id);
            $Blog->text = $data['text'];
            $Blog->title = $data['title'];
            $Blog->category_id = $data['category_id'];
            $Blog->short_description = $data['short_description'];
            $Blog->author_name = $data['author_name'];
            $Blog->keywords = $data['keywords'];
            $Blog->image = $data['image'];
            $Blog->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function countBlog()
    {
        $Blog = Blog::count();
        return $Blog;
    }

}

