<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProblemEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ProblemEventController extends Controller
{
//    =====================index ProblemEvent========================
    public function index()
    {
        $ProblemEvent = ProblemEvent::all();
        return view('Admin.ProblemEvent.ProblemEventList')->with('ProblemEvent', $ProblemEvent);
    }
//    =====================index ProblemEvent========================

//    =====================store ProblemEvent========================
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
        $image->move(public_path('/File/ProblemEvent'), $imageName);

        $category = new ProblemEvent;
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->img = $imageName;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store ProblemEvent========================

//    =====================showDataProblemEvent======================
    public function show(Request $request): JsonResponse
    {
        $Form = ProblemEvent::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }
//    =====================showDataProblemEvent======================

//    =====================updateProblemEvent========================
    public function update(Request $request): JsonResponse
    {
        $category = ProblemEvent::findOrFail($request->id);

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
            $image->move(public_path('/File/ProblemEvent'), $imageName);
            $category->img = $imageName;
        }

        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'ProblemEvent updated successfully.'], 200);
    }
//    =====================updateProblemEvent========================

//    =====================destroyProblemEvent=======================
    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('problems')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroyProblemEvent=======================
}
