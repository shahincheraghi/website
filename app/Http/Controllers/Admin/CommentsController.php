<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use File;

class CommentsController extends Controller
{

    public function index()
    {
        $Comments = Comment::getComments();
        $all_data = ['Comments' => $Comments];
        return view('Admin.Comment.commentList')->with('data', $all_data);
    }

    public function create()
    {
        $Blogs = Blog::getBlogs();
        $all_data = ['Blogs' => $Blogs];
        return view('Admin.Comment.commentInsert')->with('data', $all_data);
    }

    public function store(Comments $request)
    {
        $data['fullname'] = $request->fullname;
        if (isset($request->type)) {
            $data['commentable_type'] = $request->type;
            $data['commentable_id'] = $request->blog;
        } else {
            $data['commentable_type'] = 0;
            $data['commentable_id'] = 0;
        }

        $data['email'] = $request->email;
        $data['text'] = $request->text;
        $data['status'] = 1;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/comment/';
        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;

        $check = Comment::store($data);

        if ($check === true)
            return redirect()->route('Admin.comments.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.comments.create')->with('msgError', trans('langPanel.the_operation_failed'));

    }

    public function show($id)
    {
        $Comment = Comment::getComment($id);
        $all_data = ['Comment' => $Comment];
        return view('Admin.Comment.commentShow')->with('data', $all_data);
    }

    public function edit($id)
    {
        $Blogs = Blog::getBlogs();
        $Comment = Comment::getComment($id);
        $all_data = ['Blogs' => $Blogs, 'Comment' => $Comment];
        return view('Admin.Comment.commentEdit')->with('data', $all_data);
    }

    public function update(Comments $request, $id)
    {
        $Comment = Comment::getComment($id);
        $data['fullname'] = $request->fullname;
        if (isset($request->type)) {
            $data['commentable_type'] = $request->type;
            $data['commentable_id'] = $request->blog;
        } else {
            $data['commentable_type'] = 0;
            $data['commentable_id'] = 0;
        }
        $data['status'] = 1;
        if ($request->file('file')) {
            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/comment/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);

            if (\Illuminate\Support\Facades\File::exists($Comment->image)) {
                \Illuminate\Support\Facades\File::delete($Comment->image);
            }
        } else
            $data['image'] = $Comment->image;
        $data['status'] = 1;
        $data['email'] = $request->email;
        $data['text'] = $request->text;
        $check = Comment::updateComment($data, $id);
        if ($check === true)
            return redirect()->route('Admin.comments.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.comments.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function confirmation($id)
    {
        $check = Comment::confirmation($id);
        if ($check === true)
            return redirect()->route('Admin.comments.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.comments.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function destroy($id)
    {
        $check = Comment::CommentDelete($id);
        if ($check === true)
            return redirect()->route('Admin.comments.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.comments.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
