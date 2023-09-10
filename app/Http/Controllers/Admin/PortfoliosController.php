<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolios;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;
use File;

class PortfoliosController extends Controller
{

    public function index()
    {

        $Portfolios = Portfolio::getPortfolios();
        $all_data = ['Portfolios' => $Portfolios];
        return view('Admin.Portfolio.portfolioList')->with('data', $all_data);
    }


    public function create()
    {
        $Category = Category::getCategorysType(0);
        $all_data = ['Categorys' => $Category];
        return view('Admin.Portfolio.portfolioInsert')->with('data', $all_data);
    }

    public function store(Portfolios $request)
    {
        $data['title'] = $request->title;
        $data['category_id'] = $request->category;
        $data['text'] = $request->text;
        $data['date'] = $request->date;
        $data['customer'] = $request->customer;
        $data['address'] = $request->address;
        $hasFile = $request->hasFile('file');
        $file = $request->file('file');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/portfolio/';
        $image = '';
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = Portfolio::store($data);

        if ($check === true)
            return redirect()->route('Admin.portfolios.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.portfolios.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $Portfolio = Portfolio::getPortfolio($id);
        $Portfolioc = $Portfolio->Category;
        $Category = Category::getCategorys();
        $all_data = ['Portfolio' => $Portfolio, 'Categorys' => $Category, 'Portfolioc' => $Portfolioc];
        return view('Admin.Portfolio.portfolioEdit')->with('data', $all_data);
    }

    public function update(Portfolios $request, $id)
    {

        $Portfolio = Portfolio::getPortfolio($id);
        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['date'] = $request->date;
        $data['customer'] = $request->customer;
        $data['address'] = $request->address;
        $data['category_id'] = $request->category;
        if ($request->file('file')) {
            $hasFile = $request->hasFile('file');
            $file = $request->file('file');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/portfolio/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);

            if (\Illuminate\Support\Facades\File::exists($Portfolio->image)) {
                \Illuminate\Support\Facades\File::delete($Portfolio->image);
            }
        } else
            $data['image'] = $Portfolio->image;

        $check = Portfolio::updatePortfolio($data, $id);
        if ($check === true)
            return redirect()->route('Admin.portfolios.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.portfolios.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function PortfolioDelete($id)
    {
        $check = Portfolio::PortfolioDelete($id);
        if ($check === true)
            return redirect()->route('Admin.portfolios.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.portfolios.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }
}
