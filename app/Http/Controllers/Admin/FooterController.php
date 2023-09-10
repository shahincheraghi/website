<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function show($id = 0)
    {
        $footers = \App\Models\Footer::where('id','=','1')->get();
        return view('Admin.Footer.index')->with('footers', $footers);
  }

    public function save(Request $request)
    {
        $pay=Footer::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'description' => $request->description,
                'titleSubscribe' => $request->titleSubscribe,
                'telegram' => $request->telegram,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'whatsapp' => $request->whatsapp,
                'aparat' => $request->aparat,
                'statusTopFooter' => $request->statusTopFooter,
                'topFooterTitle' => $request->topFooterTitle,
                'topFooterDescription' => $request->topFooterDescription,
                'topFooterIcon' => $request->topFooterIcon,
                'topFooterTitleBtnOne' => $request->topFooterTitleBtnOne,
                'topFooterLinkBtnOne' => $request->topFooterLinkBtnOne,
                'topFooterTitleBtnTow' => $request->topFooterTitleBtnTow,
                'topFooterLinkBtnTow' => $request->topFooterLinkBtnTow,
                'titleCopyRightBottomFooter' => $request->titleCopyRightBottomFooter,
                'titleDevelopBottomFooter' => $request->titleDevelopBottomFooter,
                'status' => 1
            ]);

        return Response()->json($pay);
  }
}
