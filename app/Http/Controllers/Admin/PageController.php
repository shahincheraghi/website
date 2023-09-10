<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Newsletters;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Http\Requests\Pages;
use File;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function index()
    {
        $Form=Form::all();
        $Pages = Page::getPages();
        $settings = \App\Models\Settings::all()->pluck('value', 'name');
        $all_data = ['Pages' => $Pages,'Form'=>$Form,'settings'=>$settings];
        return view('Admin.Page.pageList')->with('data', $all_data);
    }

    public function create()
    {
        $Form=Form::all();
        $Category = Category::getCategorysType(1);
        $all_data = ['Category' => $Category,'Form'=>$Form];
        return view('Admin.Page.pageInsert')->with('data', $all_data);
    }

    public function store(Pages $request)
    {
        $selectedIds = isset($request['forms']) && is_array($request['forms']) ? $request['forms'] : [];
        $FormId =implode(',', $selectedIds);

        $data['title'] = $request->title;
        $data['titleEn'] = $request->titleEn;
        $data['text'] = $request->text;
        $data['forms'] =$FormId;
        $data['category_id'] = $request->category;
        $data['keywords'] = $request->keywords;
        $data['short_description'] = $request->short_description;
        $data['multiKeywordsSeoPage'] = $request->multiKeywordsSeoPage;
        $data['titleSeoPage'] = $request->titleSeoPage;
        $data['descriptionSeoPage'] = $request->descriptionSeoPage;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/page/';
        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = Page::store($data);

        if ($check === true)
            return redirect()->route('Admin.pages.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.pages.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Form=Form::all();
        $Category = Category::getCategorysType(1);
        $Page = Page::getPageAdmin($id);
            $all_data = ['Page' => $Page, 'Category' => $Category , 'Form'=> $Form];
        return view('Admin.Page.pageEdit')->with('data', $all_data);
    }

    public function update(Pages $request, $id)
    {
        $selectedIds = isset($request['forms']) && is_array($request['forms']) ? $request['forms'] : [];
        $FormId =implode(',', $selectedIds);
        $Page = Page::getPageAdmin($id);
        $data['title'] = $request->title;
        $data['titleEn'] = $request->titleEn;
        $data['text'] = $request->text;
        $data['forms'] = $FormId;
        $data['category_id'] = $request->category;
        $data['keywords'] = $request->keywords;
        $data['multiKeywordsSeoPage'] = $request->multiKeywordsSeoPage;
        $data['titleSeoPage'] = $request->titleSeoPage;
        $data['descriptionSeoPage'] = $request->descriptionSeoPage;
        $data['short_description'] = $request->short_description;

        if ($request->file('file')) {

            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/page/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Page->image)) {
                \Illuminate\Support\Facades\File::delete($Page->image);
            }
        } else
            $data['image'] = $Page->image;

        $check = Page::updatePage($data, $id);
        if ($check === true)
            return redirect()->route('Admin.pages.index', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.pages.index', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function PageDelete($id)
    {
        $check = Page::PageDeleteAdmin($id);
        if ($check === true)
            return redirect()->route('Admin.pages.index', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.pages.index', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }


}
