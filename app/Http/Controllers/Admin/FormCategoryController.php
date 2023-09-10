<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\requestProduct;
use App\Models\Form;
use App\Models\FormCategory;
use App\Models\FormData;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FormCategoryController extends Controller
{
//    =====================index FormCategory========================
    public function index()
    {
        $FormCategory = FormCategory::all();
        return view('Admin.FormCategory.FormCategoryList')->with('FormCategory', $FormCategory);
    }
//    =====================index FormCategory========================

//    =====================store FormCategory========================
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/File/FormCategory'), $imageName);

        $category = new FormCategory;
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->img = $imageName;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store FormCategory========================

//    =====================showDataFormCategory======================
    public function show(Request $request): JsonResponse
    {
        $Form = FormCategory::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }
//    =====================showDataFormCategory======================

//    =====================updateFormCategory========================
    public function update(Request $request): JsonResponse
    {
        $category = FormCategory::findOrFail($request->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/File/FormCategory'), $imageName);
            $category->img = $imageName;
        }

        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category updated successfully.'], 200);
    }
//    =====================updateFormCategory========================

//    =====================destroyFormCategory=======================
    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('form_categories')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroyFormCategory=======================
}
