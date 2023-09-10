<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ProblemController extends Controller
{
//    =====================index Problem========================
    public function index()
    {
        $Problem = Problem::all();
        return view('Admin.Problem.ProblemList')->with('Problem', $Problem);
    }
//    =====================index Problem========================

//    =====================store Problem========================
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
        $image->move(public_path('/File/Problem'), $imageName);

        $category = new Problem;
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->img = $imageName;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store Problem========================

//    =====================showDataProblem======================
    public function show(Request $request): JsonResponse
    {
        $Form = Problem::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }
//    =====================showDataProblem======================

//    =====================updateProblem========================
    public function update(Request $request): JsonResponse
    {
        $category = Problem::findOrFail($request->id);

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
            $image->move(public_path('/File/Problem'), $imageName);
            $category->img = $imageName;
        }

        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Problem updated successfully.'], 200);
    }
//    =====================updateProblem========================

//    =====================destroyProblem=======================
    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('problems')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroyProblem=======================
}
