<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\requestProduct;
use App\Models\Form;
use App\Models\FormModel;
use App\Models\FormData;
use App\Models\FormProduct;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FormModelController extends Controller
{
//    =====================index FormModel========================
    public function index()
    {
        $FormModel = FormModel::all();
        $FormProduct = FormProduct::all();
        return view('Admin.FormModel.FormModelList')->with(['FormModel'=> $FormModel,'FormProduct'=>$FormProduct]);
    }
//    =====================index FormModel========================

//    =====================store FormModel========================
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort' => 'required|numeric',
            'product_id' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/File/FormModel'), $imageName);

        $category = new FormModel;
        $category->name = $request->name;
        $category->product_id = $request->product_id;
        $category->sort = $request->sort;
        $category->img = $imageName;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store FormModel========================

//    =====================showDataFormModel======================
    public function show(Request $request): JsonResponse
    {
        $Form = FormModel::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }
//    =====================showDataFormModel======================

//    =====================updateFormModel========================
    public function update(Request $request): JsonResponse
    {
        $category = FormModel::findOrFail($request->id);

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
            $image->move(public_path('/File/FormModel'), $imageName);
            $category->img = $imageName;
        }
        $category->product_id = $request->product_id;
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category updated successfully.'], 200);
    }
//    =====================updateFormModel========================

//    =====================destroyFormModel=======================
    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('form_models')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroyFormModel=======================
}
