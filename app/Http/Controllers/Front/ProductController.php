<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;
use Morilog\Jalali\Jalalian;

class ProductController extends Controller
{

    public function index()
    {

        $Product = Product::getProductsPaginate();
        $settings = Settings::allSettings()->pluck('value', 'name');
        $all_data = ['Product' => $Product, 'settings' => $settings, ];
        return view('Front.product')->with('data', $all_data);
    }

    public function productText($id)
    {
        $Product = Product::getProduct($id);

        $Similar = Product::getProductWithName($Product->title);
        $settings = Settings::allSettings()->pluck('value', 'name');
        $comments = $Product->comments()->where('status',1)->where('commentable_type',2)->paginate(10);
        $all_data = ['Product' => $Product, 'settings' => $settings,'comments' => $comments,'Similar'=>$Similar];
        return view('Front.productSingle')->with('data', $all_data);
    }

    public function commentsStoreProduct(request $request, $id)
    {
        $data['text'] = $request->text;
        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['commentable_id'] = $id;
        $data['commentable_type'] = 2;
        $data['image'] = '';
        $data['status'] = 0;
        $check = Comment::store($data);
        if ($check == true)
            return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));


    }

}
