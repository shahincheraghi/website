<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ActiveCode;
use App\Models\FormModel;
use App\Models\FormProduct;
use App\Models\FormTrade;
use App\Models\Province;
use App\Models\Representative;
use App\Models\ServiceOnline;
use App\Models\WarrantyExtension;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Kavenegar\KavenegarApi;
use Yajra\DataTables\DataTables;


class RepresentativeController extends Controller
{
    //    =====================index FormModel========================
    public function index()
    {
        $provinces = Province::all();
        $Representative = Representative::all();
        return view('Admin.Representative.RepresentativeList')->with(['Representative'=> $Representative,'provinces'=> $provinces ]);
    }
//    =====================index FormModel========================

//    =====================store FormModel========================
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'filter' => 'required|max:255',
            'province' => 'required',
            'city' => 'required',
            'agency' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'timeWork' => 'required',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = new Representative;
        $category->filter = $request->filter;
        $category->province = $request->province;
        $category->city = $request->city;
        $category->agency = $request->agency;
        $category->phone = $request->phone;
        $category->address = $request->address;
        $category->timeWork = $request->timeWork;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store FormModel========================

//    =====================showDataFormModel======================
    public function show(Request $request): JsonResponse
    {
        $Form = Representative::where('id', '=', $request->id)->first();
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

        $category = Representative::findOrFail($request->id);

        $validator = Validator::make($request->all(), [
            'filter' => 'required|max:255',
            'province' => 'required',
            'city' => 'required',
            'agency' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'timeWork' => 'required',
            'status' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $category->filter = $request->filter;
        $category->province = $request->province;
        $category->city = $request->city;
        $category->agency = $request->agency;
        $category->phone = $request->phone;
        $category->address = $request->address;
        $category->timeWork = $request->timeWork;
        $category->status = $request->status;
        $category->save();

        return response()->json(['message' => 'Category updated successfully.'], 200);
    }
//    =====================updateFormModel========================


//    =====================destroyFormModel=======================
    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('representatives')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroyFormModel=======================


//    ===================== getAgencyList for website =======================
    public function getAgencyList(Request $request){
        $Representatives= Representative::all();
        if ($request->ajax()) {
            return Datatables::of($Representatives)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('nameProvince'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['filter'], $request->get('nameProvince')) ? true : false;
                        });
                    }
                })
                ->make(true);
        }
    }
//    ===================== getAgencyList for website =======================
}
