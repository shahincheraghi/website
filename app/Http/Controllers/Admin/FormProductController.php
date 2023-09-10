<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\FormCategory;
use App\Models\FormProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FormProductController extends Controller
{
//    =====================index FormProduct========================
    public function index()
    {
        $FormProduct = FormProduct::all();
        $FormCategory = FormCategory::all();
        return view('Admin.FormProduct.FormProductList')->with(['FormProduct'=> $FormProduct,'FormCategory'=>$FormCategory]);
    }
//    =====================index FormProduct========================

//    =====================store FormProduct========================
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort' => 'required|numeric',
            'category_id' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/File/FormProduct'), $imageName);

        $category = new FormProduct;
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->img = $imageName;
        $category->status = $request->status;
        $category->category_id = $request->category_id;
        $category->save();

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store FormProduct========================

//    =====================showDataFormProduct======================
    public function show(Request $request): JsonResponse
    {
        $Form = FormProduct::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }
//    =====================showDataFormProduct======================

//    =====================updateFormProduct========================
    public function update(Request $request): JsonResponse
    {
        $category = FormProduct::findOrFail($request->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort' => 'required|numeric',
            'category_id' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/File/FormProduct'), $imageName);
            $category->img = $imageName;
        }

        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->category_id = $request->category_id;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category updated successfully.'], 200);
    }
//    =====================updateFormProduct========================

//    =====================destroyFormProduct=======================
    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('form_products')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroyFormProduct=======================
}
