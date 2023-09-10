<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faqs;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Faq;
use File;

class FaqsController extends Controller
{

    public function index()
    {

        $Faq = Faq::getFaqs();
        $all_data = ['Faq' => $Faq];
        return view('Admin.Faq.faqList')->with('data', $all_data);
    }


    public function create()
    {

        $Categories=Category::getCategorysType(3);
        $all_data = ['Category'=>$Categories];
        return view('Admin.Faq.faqInsert')->with('data',$all_data);
    }

    public function store(Faqs $request)
    {
        $data['text'] = $request->text;
        $data['stateInHomePage'] = $request->stateInHomePage;
        $data['title'] = $request->title;
        $data['category'] = $request->category;

        $check = Faq::store($data);
        if ($check === true) {
            return redirect()->route('Admin.faqs.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        } else {
            return redirect()->route('Admin.faqs.create')->with('msgError', trans('langPanel.the_operation_failed'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Faq = Faq::getFaq($id);
        $Categories=Category::getCategorysType(3);
        $all_data = ['Faq' => $Faq,'Category'=>$Categories];

        return view('Admin.Faq.faqEdit')->with('data', $all_data);
    }

    public function update(Faqs $request, $id)
    {

        $Faq = Faq::getFaq($id);
        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['stateInHomePage'] = $request->stateInHomePage;
        $data['category'] = $request->category;

        $check = Faq::updateFaq($data, $id);
        if ($check === true)
            return redirect()->route('Admin.faqs.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.faqs.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function destroy($id)
    {
        $check = Faq::FaqDelete($id);
        if ($check === true)
            return redirect()->route('Admin.faqs.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.faqs.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
