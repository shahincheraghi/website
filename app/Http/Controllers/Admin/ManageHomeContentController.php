<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\ManageHomeContent;
use App\Models\ManageHomeContentItem;
use App\Models\SectionHomeContentInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ManageHomeContentController extends Controller
{
//    =====================index MangeHomeContent========================
    public function index()
    {
        $ManageHomeContent = DB::table('main_page')
            ->select('main_page.id', 'main_page.title', 'main_page.sort', 'main_page.type', 'main_page.status', 'main_page.topTitle', 'main_page.description', 'section_home_content_info.title as HomeContentTitle')
            ->leftJoin('section_home_content_info', 'main_page.type', '=', 'section_home_content_info.homeContentId')
            ->get();

        $ManageHomeContent = ManageHomeContent::getManageHomeContents();
        $SectionHomeContentsInfo = SectionHomeContentInfo::select('title', 'homeContentId')->distinct()->get();
        return view('Admin.manageHomeContent.index', compact(['SectionHomeContentsInfo', 'ManageHomeContent']));
    }

//    =====================index MangeHomeContent========================


    public function getHomeContent(): JsonResponse
    {
        $SectionHomeContentsInfo = SectionHomeContentInfo::select('title', 'homeContentId')->distinct()->get();

        $data = [];
        foreach ($SectionHomeContentsInfo as $SectionHomeContentInfo) {
            $data[] = [
                'id' => $SectionHomeContentInfo->homeContentId,
                'text' => $SectionHomeContentInfo->title
            ];
        }

        return response()->json($data);
    }

    public function getDetailHomeContentById(Request $request): JsonResponse
    {
        $rowHomeContents = HomeContent::where('type', '=', $request->id)->get();

        $data = [];
        foreach ($rowHomeContents as $rowHomeContent) {
            $data[] = [
                'id' => $rowHomeContent->id,
                'text' => $rowHomeContent->title
            ];
        }

        return response()->json($data);
    }

//    =====================index MangeHomeContent========================


//    =====================store MangeHomeContent========================
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'sort' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('File/MainPage'), $imageName);
            $imagePath = 'File/MainPage/' . $imageName;
        }

        $ManageHomeContent = new ManageHomeContent();
        $ManageHomeContent->title = $request->title;
        $ManageHomeContent->topTitle = $request->topTitle;
        $ManageHomeContent->description = $request->description;
        $ManageHomeContent->sort = $request->sort;
        $ManageHomeContent->type = $request->typeHomeContent;
        $ManageHomeContent->status = $request->status;
        $ManageHomeContent->image = $imagePath; // ذخیره مسیر تصویر در دیتابیس
        $ManageHomeContent->save();

        if (isset($request->sortItems)) {
            foreach ($request->sortItems as $key => $sortItem) {
                $homeContentId = $request->homeContentId[$key];
                $ManageHomeContentItem = new ManageHomeContentItem();
                $ManageHomeContentItem->mainPageId = $ManageHomeContent->id;
                $ManageHomeContentItem->sort = $sortItem;
                $ManageHomeContentItem->homeContentId = $homeContentId;
                $ManageHomeContentItem->save();
            }
        }

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================store MangeHomeContent========================


//    =====================showDataMangeHomeContent======================
    public function show(Request $request): JsonResponse
    {
        $ManageHomeContent = ManageHomeContent::where('id', '=', $request->id)->first();
        $ManageHomeContentItems = ManageHomeContentItem::where('mainPageId', '=', $request->id)->get();
        $rowHomeContents = HomeContent::where('type', '=', $ManageHomeContent->type)->get();
        return response()->json([
            'success' => true,
            'message' => 'درخواست موفقیت آمیز',
            'ManageHomeContent' => $ManageHomeContent,
            'ManageHomeContentItems' => $ManageHomeContentItems,
            'rowHomeContents' => $rowHomeContents,
        ]);
    }
//    =====================showDataMangeHomeContent======================


//    =====================update MangeHomeContent========================
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idUpdate' => 'required|numeric',
            'sort' => 'required|numeric',
            'typeHomeContent' => 'required|numeric',
            'status' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        ManageHomeContentItem::where('mainPageId', '=', $request->idUpdate)->delete();
        $ManageHomeContent = ManageHomeContent::findOrFail($request->idUpdate);
        $ManageHomeContent->title = $request->title;
        $ManageHomeContent->topTitle = $request->topTitle;
        $ManageHomeContent->description = $request->description;
        $ManageHomeContent->sort = $request->sort;
        $ManageHomeContent->type = $request->typeHomeContent;
        $ManageHomeContent->status = $request->status;
        $ManageHomeContent->save();
        if (isset($request->sortItems)) {
            foreach ($request->sortItems as $key => $sortItem) {
                $homeContentId = $request->homeContentId[$key];
                $ManageHomeContentItem = new ManageHomeContentItem();
                $ManageHomeContentItem->mainPageId = $ManageHomeContent->id;
                $ManageHomeContentItem->sort = $sortItem;
                $ManageHomeContentItem->homeContentId = $homeContentId;
                $ManageHomeContentItem->save();
            }
        }

        return response()->json(['message' => 'Category created successfully.'], 200);
    }
//    =====================update MangeHomeContent========================


//    =====================destroy MangeHomeContent=======================
    public function destroy($id): RedirectResponse
    {
        ManageHomeContentItem::where('mainPageId', '=', $id)->delete();
        ManageHomeContent::where('id', '=', $id)->delete();
        return redirect()->back()->with('msgSuccess', trans('درخواست شما با موقیت ثبت شد'));
    }
//    =====================destroy MangeHomeContent =======================

}
