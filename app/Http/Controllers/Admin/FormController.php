<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\requestProduct;
use App\Models\Form;
use App\Models\FormData;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FormController extends Controller
{

    public function formBuilderData (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data=FormData::where('formID','=',$request->id)->get();
        if (isset($data)){
            return response()->json([
                'status' => true,
                'message' => 'درخواست موفقیت آمیز',
                'data' => $data,
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'رکوردی با این شناسه پیدا نشد ',
        ]);
    }



    public function index()
    {
        $Form = Form::all();
        return view('Admin.FormBuilder.index')->with('Form', $Form);
    }

    //    =====================store form builder dynamic========================
    public function store(Request $request): JsonResponse
    {
        $formId = $request->id;
        if (isset($formId)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'status' => 'required|numeric',
                'code' => 'required|unique:forms,code,' . $formId,
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'status' => 'required|numeric',
                'code' => 'required|unique:forms',
            ]);
        }


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $pay = Form::updateOrCreate(
            [
                'id' => $formId
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'code' => $request->code,
                'status' => $request->status,
            ]);

        return Response()->json($pay);

    }
    //    =====================store form builder dynamic========================


    //    =====================store form dynamic========================
    public function save(Request $request)
    {
//==================================validation================
        $formId = $request->input('formId');
        $Form = Form::where('id', '=', $formId)->first();

        if ($Form) {
            // get the form data and decode it
            $formData = json_decode($Form->fields, true);

            // create an array of required field names
            $requiredFields = array_filter($formData, function ($field) {
                return isset($field['required']) && $field['required'] === true;
            });
            $requiredFieldNames = array_map(function ($field) {
                return $field['name'];
            }, $requiredFields);
            $requiredFieldNames = array_values($requiredFieldNames);

            // create a validation rule for each required field
            $rules = [];
            foreach ($requiredFields as $field) {
                $rules[$field['name']] = 'required';
            }

            // validate the request
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors());
            }
//=============================validation==========================

//============================store form dynamic========================
            $fieldNames = array();

// loop through the data and add the name of each input field to the array
            foreach ($formData as $item) {
                if (isset($item['name'])) {
                    // exclude button inputs
                    if ($item['type'] === 'button') {
                        continue;
                    }
                    // handle file inputs with multiple attribute
                    if ($item['type'] === 'file' && isset($item['multiple']) && $item['multiple'] === true) {
                        $fieldNames[] = $item['name'];
                    } else {
                        $fieldNames[] = $item['name'] . (isset($item['multiple']) && $item['multiple'] === true ? '[]' : '');
                    }
                }
            }
            $value= json_encode($request->input());
            $orders = new FormData();
            $orders->formId = $request->formId;
            $orders->value =$value;
            $orders->save();
            return redirect()->back()->with('saveForm', 'اطلاعات با موفقیت ثبت شد !');
        } else {
            return redirect()->back()->with('errorExistForm', 'چنین فرمی وجود ندارد !');
        }

//
    }

    //    =====================store form dynamic========================


    public function show(Request $request)
    {
        $Form = Form::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }


    //    =====================save field for form dynamic========================
    public function updateFieldsForm(Request $request): JsonResponse
    {
        $formData = $request->input('formData');
        $formId = $request->input('formId');
        $updateFieldsForm = Form::updateOrCreate(
            ['id' => $formId],
            ['fields' => $formData,]
        );
        return response()->json([
            'success' => true,
            'message' => 'داده های فرم با موفقیت ذخیره شدند.',
            'data' => $updateFieldsForm,
        ]);

    }
    //    =====================save field for form dynamic========================


//    =====================destroyHomeContent=========================
//    =====================destroyHomeContent=========================

    public function destroy($id): RedirectResponse
    {
        $forms = DB::table('forms')->where('id', '=', $id);
        $forms->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }

//    =====================destroyHomeContent=========================
//    =====================destroyHomeContent=========================


//    =====================destroyHomeContent=========================
//    =====================destroyHomeContent=========================

    public function edit(Request $request): JsonResponse
    {
        $Form = Form::where('id', '=', $request->id)->first();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'data' => $Form,
        ]);
    }

//    =====================destroyHomeContent=========================
//    =====================destroyHomeContent=========================
}
