<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categorys;
use Illuminate\Http\Request;
use App\Models\Category;
use File;

class CategorysController extends Controller
{

    public function index()
    {

        $Categorys = Category::getCategorys();
        $all_data = ['Category' => $Categorys];
        return view('Admin.Category.categoryList')->with('data', $all_data);
    }


    public function create()
    {
        return view('Admin.Category.CategoryInsert');
    }

    public function store(Categorys $request)
    {

        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $check = Category::store($data);
        if ($check === true)
            return redirect()->route('Admin.categorys.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.categorys.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Category = Category::getCategory($id);
        $all_data = ['Category' => $Category];
        return view('Admin.Category.categoryEdit')->with('data', $all_data);
    }

    public function update(Categorys $request, $id)
    {

        $Category = Category::getCategory($id);
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $check = Category::updateCategory($data, $id);
        if ($check === true)
            return redirect()->route('Admin.categorys.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.categorys.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function CategoryDelete($id)
    {
        $check = Category::CategoryDelete($id);
        if ($check === true)
            return redirect()->route('Admin.categorys.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.categorys.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
