<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeContentController extends Controller
{
//    =====================indexHomeContent=========================
//    =====================indexHomeContent=========================

    public function indexQuickAccess(){
        $QuickAccess = DB::table('home_contents')
            ->where('type' ,'=' , '6')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.QuickAccess.QuickAccessList')->with('QuickAccess', $QuickAccess);
    }

    public function indexCompetitiveAdvantage(){
        $CompetitiveAdvantage = DB::table('home_contents')
            ->where('type' ,'=' , '5')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.CompetitiveAdvantage.CompetitiveAdvantageList')->with('CompetitiveAdvantage', $CompetitiveAdvantage);
    }

    public function indexBox1(){
        $HomeContentBox1 = DB::table('home_contents')
            ->where('type' ,'=' , '1')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.HomeBox1.HomeContentList')->with('HomeContentBox1', $HomeContentBox1);

    }

    public function indexTextWithBackground(){
        $TextWithBackground = DB::table('home_contents')
            ->where('type' ,'=' , '1')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.TextWithBackground.TextWithBackgroundList')->with('TextWithBackground', $TextWithBackground);

    }

    public function indexBox2(){
        $HomeContentBox2 = HomeContent::
              where('type' ,'=' , '2')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.HomeBox2.HomeContentList')->with('HomeContentBox2', $HomeContentBox2);

    }

    public function indexBox3(){
        $HomeContentBox3 = HomeContent::
              where('type' ,'=' , '3')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.HomeBox3.HomeContentList')->with('HomeContentBox3', $HomeContentBox3);

    }

    public function indexBox4(){
        $HomeContentBox4 = HomeContent::
              where('type' ,'=' , '4')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.HomeBox4.HomeContentList')->with('HomeContentBox4', $HomeContentBox4);

    }

    public function indexBusinessProcess(){
        $BusinessProcess = HomeContent::
        where('type' ,'=' , '7')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.BusinessProcess.BusinessProcessList')->with('BusinessProcess', $BusinessProcess);

    }

    public function indexCustomersComment(){
        $CustomersComment = HomeContent::
        where('type' ,'=' , '8')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.CustomersComment.CustomersCommentList')->with('CustomersComment', $CustomersComment);

    }

    public function indexBigPicInLapTop(){
        $BigPicInLapTop = HomeContent::
        where('type' ,'=' , '9')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.BigPicInLapTop.BigPicInLapTopList')->with('BigPicInLapTop', $BigPicInLapTop);

    }

    public function indexTabBox(){
        $TabBox = HomeContent::
        where('type' ,'=' , '10')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.TabBox.TabBoxList')->with('TabBox', $TabBox);

    }

    public function indexQuestionAnswer(){
        $QuestionAnswer = HomeContent::
        where('type' ,'=' , '11')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.QuestionAnswer.QuestionAnswerList')->with('QuestionAnswer', $QuestionAnswer);

    }
    public function indexSliderMiniImg(){
        $SliderMiniImg = HomeContent::
        where('type' ,'=' , '12')
            ->where('status' ,'=' , '1')
            ->get();
        return view('Admin.SliderMiniImg.SliderMiniImgList')->with('SliderMiniImg', $SliderMiniImg);

    }
//    =====================indexHomeContent=========================
//    =====================indexHomeContent=========================



//    =====================createHomeContent=========================
//    =====================createHomeContent=========================

    public function createQuickAccess()
    {
        return view('Admin.QuickAccess.QuickAccessInsert');

    }

    public function createBox1()
    {
        return view('Admin.HomeBox1.HomeContentInsert');

    }

    public function createTextWithBackground()
    {
        return view('Admin.TextWithBackground.TextWithBackgroundInsert');

    }

    public function createCompetitiveAdvantage()
    {
        return view('Admin.CompetitiveAdvantage.CompetitiveAdvantageInsert');

    }

    public function createBox2()
    {
        return view('Admin.HomeBox2.HomeContentInsert');

    }

    public function createBox3()
    {
        return view('Admin.HomeBox3.HomeContentInsert');

    }

    public function createBox4()
    {
        return view('Admin.HomeBox4.HomeContentInsert');

    }

    public function createBusinessProcess()
    {
        return view('Admin.BusinessProcess.BusinessProcessInsert');

    }

    public function createCustomersComment()
    {
        return view('Admin.CustomersComment.CustomersCommentInsert');

    }

    public function createBigPicInLapTop()
    {
        return view('Admin.BigPicInLapTop.BigPicInLapTopInsert');

    }

    public function createTabBox()
    {
        return view('Admin.TabBox.TabBoxInsert');

    }

    public function createQuestionAnswer()
    {
        return view('Admin.QuestionAnswer.QuestionAnswerInsert');

    }
    public function createSliderMiniImg()
    {
        return view('Admin.SliderMiniImg.SliderMiniImgInsert');

    }

//    =====================createHomeContent=========================
//    =====================createHomeContent=========================



//    =====================storeHomeContent=========================
//    =====================storeHomeContent=========================

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('path')) {
            $destinationPath = 'File/HomeContent';
            $PathImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $PathImage);
            $input['path'] = "$PathImage";
        }
             HomeContent::create($input);
            return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }

//    =====================storeHomeContent=========================
//    =====================storeHomeContent=========================



//    =====================editHomeContent=========================
//    =====================editHomeContent=========================

    public function editBox1($id)
    {
        $HomeContent = HomeContent::find($id);
        $all_data = ['HomeBox1' => $HomeContent];
        return view('Admin.HomeBox1.HomeContentEdit')->with('data', $all_data);
    }

    public function editTextWithBackground($id)
    {
        $TextWithBackground= HomeContent::find($id);
        $all_data = ['TextWithBackground' => $TextWithBackground];
        return view('Admin.TextWithBackground.TextWithBackgroundEdit')->with('data', $all_data);
    }

    public function editQuickAccess($id)
    {
        $QuickAccess= HomeContent::find($id);
        $all_data = ['QuickAccess' => $QuickAccess];
        return view('Admin.QuickAccess.QuickAccessEdit')->with('data', $all_data);
    }

    public function editCompetitiveAdvantage($id)
    {
        $CompetitiveAdvantage= HomeContent::find($id);
        $all_data = ['CompetitiveAdvantage' => $CompetitiveAdvantage];
        return view('Admin.CompetitiveAdvantage.CompetitiveAdvantageEdit')->with('data', $all_data);
    }

    public function editBox2($id)
    {
        $HomeContent = HomeContent::find($id);
        $all_data = ['HomeBox2' => $HomeContent];
        return view('Admin.HomeBox2.HomeContentEdit')->with('data', $all_data);
    }

    public function editBox3($id)
    {
        $HomeContent = HomeContent::find($id);
        $all_data = ['HomeBox3' => $HomeContent];
        return view('Admin.HomeBox3.HomeContentEdit')->with('data', $all_data);
    }

    public function editBox4($id)
    {
        $HomeContent = HomeContent::find($id);
        $all_data = ['HomeBox4' => $HomeContent];
        return view('Admin.HomeBox4.HomeContentEdit')->with('data', $all_data);
    }

    public function editBusinessProcess($id)
    {
        $BusinessProcess = HomeContent::find($id);
        $all_data = ['BusinessProcess' => $BusinessProcess];
        return view('Admin.BusinessProcess.BusinessProcessEdit')->with('data', $all_data);
    }

    public function editCustomersComment($id)
    {
        $CustomersComment = HomeContent::find($id);
        $all_data = ['CustomersComment' => $CustomersComment];
        return view('Admin.CustomersComment.CustomersCommentEdit')->with('data', $all_data);
    }

    public function editBigPicInLapTop($id)
    {
        $BigPicInLapTop = HomeContent::find($id);
        $all_data = ['BigPicInLapTop' => $BigPicInLapTop];
        return view('Admin.BigPicInLapTop.BigPicInLapTopEdit')->with('data', $all_data);
    }

    public function editTabBox($id)
    {
        $TabBox = HomeContent::find($id);
        $all_data = ['TabBox' => $TabBox];
        return view('Admin.TabBox.TabBoxEdit')->with('data', $all_data);
    }
    public function editQuestionAnswer($id)
    {
        $QuestionAnswer = HomeContent::find($id);
        $all_data = ['QuestionAnswer' => $QuestionAnswer];
        return view('Admin.QuestionAnswer.QuestionAnswerEdit')->with('data', $all_data);
    }

    public function editSliderMiniImg($id)
    {
        $SliderMiniImg = HomeContent::find($id);
        $all_data = ['SliderMiniImg' => $SliderMiniImg];
        return view('Admin.SliderMiniImg.SliderMiniImgEdit')->with('data', $all_data);
    }
//    =====================editHomeContent=========================
//    =====================editHomeContent=========================


//    =====================updateHomeContent=========================
//    =====================updateHomeContent=========================

    public function update(Request $request, $id)
    {
        $HomeContent = HomeContent::find($id);
        $HomeContent->title = $request->input('title');
        $HomeContent->description = $request->input('description');
        $HomeContent->link = $request->input('link');
        $HomeContent->status = $request->input('status');
        $HomeContent->order = $request->input('order');
        $HomeContent->icon = $request->input('icon');
        $HomeContent->type = $request->input('type');

        if($request->hasfile('path'))
        {
            $destination = 'File/HomeBox1/'.$HomeContent->path;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('path');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('File/HomeContent/', $filename);
            $HomeContent->path = $filename;
        }
        $HomeContent->update();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موفقیت انجام شد'));
    }

//    =====================updateHomeContent=========================
//    =====================updateHomeContent=========================


//    =====================destroyHomeContent=========================
//    =====================destroyHomeContent=========================

    public function destroy($id)
    {
        $task = DB::table('home_contents')->where('id' ,'=' ,$id);
        $task->delete();DB::table('home_contents');
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }

//    =====================destroyHomeContent=========================
//    =====================destroyHomeContent=========================
}
