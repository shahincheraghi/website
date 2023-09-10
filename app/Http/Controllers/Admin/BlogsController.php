<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletters;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\Blogs;
use File;
use Illuminate\Support\Facades\Mail;

class BlogsController extends Controller
{

    public function index()
    {

        $Blogs = Blog::getBlogs();
        $all_data = ['Blogs' => $Blogs];
        return view('Admin.Blog.blogList')->with('data', $all_data);
    }


    public function create()
    {
        $Category = Category::getCategorysType(1);
        $all_data = ['Category' => $Category];
        return view('Admin.Blog.blogInsert')->with('data', $all_data);
    }

    public function store(Blogs $request)
    {

        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['author_name'] = $request->author_name;
        $data['category_id'] = $request->category;
        $data['keywords'] = $request->keywords;
        $data['short_description'] = $request->short_description;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/blog/';
        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = Blog::store($data);

        if ($check === true)
            return redirect()->route('Admin.blogs.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.blogs.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Category = Category::getCategorysType(1);
        $Blog = Blog::getBlog($id);
        $all_data = ['Blog' => $Blog, 'Category' => $Category];
        return view('Admin.Blog.blogEdit')->with('data', $all_data);
    }

    public function update(Blogs $request, $id)
    {
        $Blog = Blog::getBlog($id);
        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['category_id'] = $request->category;
        $data['keywords'] = $request->keywords;
        $data['short_description'] = $request->short_description;
        $data['author_name'] = $request->author_name;

        if ($request->file('file')) {

            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/blog/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Blog->image)) {
                \Illuminate\Support\Facades\File::delete($Blog->image);
            }
        } else
            $data['image'] = $Blog->image;

        $check = Blog::updateBlog($data, $id);
        if ($check === true)
            return redirect()->route('Admin.blogs.index', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.blogs.index', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function BlogDelete($id)
    {
        $check = Blog::BlogDelete($id);
        if ($check === true)
            return redirect()->route('Admin.blogs.index', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.blogs.index', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }



}
