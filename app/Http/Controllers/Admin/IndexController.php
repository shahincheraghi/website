<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;
use Spatie\Analytics\Period;

use Analytics;


class IndexController extends Controller
{

    public function index()
    {
        $allData = [];
        $allData['blog'] = Blog::countBlog();
        $allData['comment'] = Comment::countComment();
        $allData['message'] = Contact::countContact();
        $allData['visit'] = Visitor::getVisitorsCount();


        $y = 0;
        try {
            $analyticsTotalView = Analytics::fetchTotalVisitorsAndPageViews(Period::months(1));
            $arrayTotalAnalyticsTotalView = ["data" => [], "visitors" => [], "pageViews" => []];

            $allData["sumVisitors"] = 0;
            $allData["sumPageViews"] = 0;
            foreach ($analyticsTotalView as $item) {
                $d = Jalalian::forge($item["date"]->toArray()['timestamp']);
                $arrayTotalAnalyticsTotalView["data"][] = $d->getMonth() . '/' . $d->getDay();
                $arrayTotalAnalyticsTotalView["visitors"][] = $item["visitors"];
                $allData["sumVisitors"] += $item["visitors"];
                $allData["sumPageViews"] += $item["pageViews"];
                $arrayTotalAnalyticsTotalView["pageViews"][] = $item["pageViews"];
            }
            $arrayTotalAnalyticsTotalView["data"] = json_encode($arrayTotalAnalyticsTotalView["data"]);
            $arrayTotalAnalyticsTotalView["visitors"] = json_encode($arrayTotalAnalyticsTotalView["visitors"]);
            $arrayTotalAnalyticsTotalView["pageViews"] = json_encode($arrayTotalAnalyticsTotalView["pageViews"]);

            $allData['arrayTotalAnalyticsTotalView'] = $arrayTotalAnalyticsTotalView;


            $allData['fetchTopBrowsers'] = Analytics::fetchTopBrowsers(Period::months(1));

            $sum = $allData['fetchTopBrowsers']->sum('sessions');
            $arrTopB = [];
            foreach ($allData['fetchTopBrowsers'] as $key => $item) {
//            dd($allData['fetchTopBrowsers'][0]);
                $arrTopB[$key]['browser'] = $item['browser'];
                $arrTopB[$key]["sessions"] = round((($item['sessions'] / $sum) * 100), 2);
//            dd($allData['fetchTopBrowsers']);
            }

//      --------------------------
//
//return view('Admin.index')->with('data', $allData);

        } catch (\Exception $e) {
            $allData['sumVisitors'] = 0;
            $allData['sumPageViews'] = 0;
            $allData['arrayTotalAnalyticsTotalView'] = [];
            $allData['fetchTopBrowsers'] = [];
            return view('Admin.index')->with('data', $allData);
        }


        return view('Admin.index')->with('data', $allData);
    }


}
