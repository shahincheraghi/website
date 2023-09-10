<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Page;
use App\Models\Settings;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;
use Morilog\Jalali\Jalalian;
use App\Http\Requests\Comments;

class BlogController extends Controller
{

    public function index(Request $request, $id = 0)
    {

        $txt = $request->search;
        $blogs = Blog::getBlogs($txt, true, $id);
        $settings = Settings::allSettings()->pluck('value', 'name');
        $blogsPopular = Blog::blogsPopular();
        $category = Category::getCategorysType(1);
        $all_data = ['blogs' => $blogs, 'blogsPopular' => $blogsPopular, 'settings' => $settings, 'category' => $category];
        return view('Front.blog')->with('data', $all_data);
    }

    public function blogText($id)
    {
        $page = Page::getPages();
        $category = Category::getCategorysType(1);
        $blog = Blog::getblog($id);
        $settings = Settings::allSettings()->pluck('value', 'name');
        $blog->update(['visit' => $blog->visit + 1]);
        $blogsPopular = Blog::blogsPopular();
        $comments = $blog->comments()->where('status',1)->where('commentable_type',1)->paginate(5);
        $all_data = ['blog' => $blog, 'comments' => $comments, 'blogsPopular' => $blogsPopular, 'category' => $category,'settings' => $settings];
        return view('Front.blogSingle')->with('data', $all_data);
    }

    public function commentsStore(Comments $request, $id)
    {
        $data['text'] = $request->text;
        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['commentable_id'] = $id;
        $data['commentable_type'] = 1;
        $data['image'] = '';
        $data['status'] = 0;
        $check = Comment::store($data);
        if ($check == true)
            return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));


    }
}
