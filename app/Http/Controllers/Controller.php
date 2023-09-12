<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getAgencylist(Request $request){
        $collection2 = collect([
            [
                "filter"=>"markazi",
                "province"=> "مرکزی",
                "city"=> "ساوه",
                "agency"=> "موبایل حافظ",
                "phone"=> "08642222522",
                "address"=> "میدان شهدا، کوچه امام خمینی 14، خیابان پیاده راه امام خمینی، پاساژ رضا، پلاک 60، طبقه همکف کدپستی:3913934778",
                "timeWork"=> "شنبه تا پنج شنبه ساعت کاری 10 الی 13 - 17 الی21"
            ],
            [
                "filter"=>"hormozgan",
                "province"=> "هرمزگان",
                "city"=> "بندرعباس",
                "agency"=> "موبایل پلاس",
                "phone"=> "07632235189",
                "address"=> "بلوار طالقانی،مجتمع ستاره جنوب، طبقه دوم،پلاک 3،21",
                "timeWork"=> "شنبه تا پنج شنبه 9 الی 13-بعد از ظهر 17 الی 21:30"
            ],
            [
                "filter"=>"hamadan",
                "province"=> "همدان",
                "city"=> "همدان",
                "agency"=> "پاپ موبایل",
                "phone"=> "08132533427",
                "address"=> "خیابان استادان ،نبش 18 متری میلاد ، مارکت موبایل 08138241530",
                "timeWork"=> "شنبه تا پنج شنبه 9:30الی 14-بعداز ظهر 16:30 الی 20-جمعه ها 9:30الی 14"
            ],
            [
                "filter"=>"hamadan",
                "province"=> "همدان",
                "city"=> "همدان",
                "agency"=> "مرکز خدمات داده پردازش نوین",
                "phone"=> "06516633631",
                "address"=> "خیابان بوعلی جنوبی ، روبه روی هتل بوعلی ، کوچه شریف ، پلاک 17 طبقه اول",
                "timeWork"=> "شنبه تا چهارشنبه ساعت کاری 9 الی13:30 - 16:30 الی 19:30-پنج شنبه ها 9 الی 13:30"
            ],
            [
                "filter"=>"yazd",
                "province"=> "یزد",
                "city"=> "یزد",
                "agency"=> "پارس موبایل",
                "phone"=> "03536283234 - 03536242489",
                "address"=> "خیابان کاشانی،جنب مجتمع شهاب ، پارس موبایل کد پستی :8915633447",
                "timeWork"=> "شنبه تا چهارشنبه 9 الی 14- بعد ازظهر 17:30 الی 22"
            ],
            [
                "filter"=>"krmanshah",
                "province"=> "کرمانشاه",
                "city"=> "کرمانشاه",
                "agency"=> "موبایل طاها",
                "phone"=> "08338253387",
                "address"=> "میدان ایثار 200 متر به سمت میدان  امام حسین ع پشت عوارض خودرو شهرداری",
                "timeWork"=> "شنبه تا چهارشنبه 10 الی 17- پنج شنبه ها : 10 الی 14"
            ],
        ]);
        $collection2->toArray();
        if ($request->ajax()) {
            return Datatables::of($collection2)
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
}

