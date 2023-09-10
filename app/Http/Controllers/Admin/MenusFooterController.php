<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenusFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusFooterController extends Controller
{
    public function index(){
        $MenusFooter = DB::table('menus_footer')->get();
        return view('Admin.MenusFooter.MenusFooterList')->with('MenusFooter', $MenusFooter);
    }
    public function create()
    {
        return view('Admin.MenusFooter.MenusFooterInsert');

    }
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        MenusFooter::create($input);
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }

    public function edit($id)
    {
        $MenusFooter = MenusFooter::find($id);
        $all_data = ['MenusFooter' => $MenusFooter];
        return view('Admin.MenusFooter.MenusFooterEdit')->with('data', $all_data);
    }

    public function update(Request $request, $id)
    {
        $MenusFooter = MenusFooter::find($id);
        $MenusFooter->title = $request->input('title');
        $MenusFooter->link = $request->input('link');
        $MenusFooter->boxPlace = $request->input('boxPlace');
        $MenusFooter->status = $request->input('status');

        $MenusFooter->update();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موفقیت انجام شد'));
    }

    public function destroy($id)
    {
        $task = DB::table('menus_footer')->where('id' ,'=' ,$id);
        $task->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }

}
