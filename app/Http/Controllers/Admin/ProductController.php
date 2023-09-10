<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\requestProductPrice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\requestProduct;
use File;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::getProducts();
        $all_data = ['products' => $products];
        return view('Admin.Product.productList')->with('data', $all_data);
    }

    public function storeImage(Request $request, $id)
    {
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/product/image/';
        $image = '';
        if ($hasFile) {
            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $data['product_id'] = $id;
        $check = ProductImage::storeImage($data);
    }

    public function create()
    {
        return view('Admin.Product.productInsert');
    }

    public function store(requestProduct $request)
    {
        $data['title'] = $request->title;
        $data['english_title'] = $request->english_title;
        $data['code'] = $request->code;
        $data['discount_percent'] = $request->discount_percent;
        $data['price'] = $request->price;
        $data['seo'] = $request->seo;
        $data['count'] = $request->count;
        $data['min_order'] = $request->min_order;
        $data['accounting_code'] = $request->accounting_code;
        $data['guarantee'] = $request->guarantee;
        $data['weight'] = $request->weight;
        $data['length'] = $request->length;
        $data['width'] = $request->width;
        $data['height'] = $request->height;
        $data['type'] = $request->type;
        $data['short_description'] = $request->short_description;
        $data['description'] = $request->description;
        $data['delete'] = 0;
        $hasFile = $request->hasFile('image');
        $file = $request->file('image');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/product/';
        $image = '';
        $checkTitle = Product::checkTitle($request->title, 0);
        if ($checkTitle > 0)
            return redirect()->route('Admin.products.create')->with('msgError', trans('langPanel.the_title_failed'));

        if ($hasFile) {
            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;

        $check = Product::store($data);

        if ($check === true)
            return redirect()->route('Admin.products.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.products.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $product = Product::getProduct($id);
        $all_data = [ 'product' => $product];
        return view('Admin.Product.productEdit')->with('data', $all_data);

    }

    public function update(requestProduct $request, $id)
    {
        $Product = Product::getProduct($id);
        $data['title'] = $request->title;
        $data['english_title'] = $request->english_title;
        $data['code'] = $request->code;
        $data['accounting_code'] = $request->accounting_code;
        $data['seo'] = $request->seo;
        $data['discount_percent'] = $request->discount_percent;
        $data['price'] = $request->price;
        $data['count'] = $request->count;
        $data['min_order'] = $request->min_order;
        $data['guarantee'] = $request->guarantee;
        $data['weight'] = $request->weight;
        $data['length'] = $request->length;
        $data['width'] = $request->width;
        $data['height'] = $request->height;
        $data['type'] = $request->type;
        $data['short_description'] = $request->short_description;
        $data['description'] = $request->description;
        $data['delete'] = 0;


        if ($request->file('image')) {
            $hasFile = $request->hasFile('image');
            $file = $request->file('image');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/product/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Product->image)) {
                \Illuminate\Support\Facades\File::delete($Product->image);
            }
        } else
            $data['image'] = $Product->image;

        $check = Product::updateProduct($data, $id);
        if ($check === true)
            return redirect()->route('Admin.products.edit', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.products.edit', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function destroy($id)
    {
        $check = Product::ProductDelete($id);
        if ($check === true)
            return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));
    }



}
