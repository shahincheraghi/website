<?php

namespace App\Http\Controllers\Front;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Jobs\SendEmailWithQueueJOB;
use App\Mail\DemoEmail;
use App\Mail\SendEmailVieQueueMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Counter;
use App\Models\Faq;
use App\Models\ManageHomeContent;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\Settings;
use App\Models\Skills;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class IndexController extends Controller
{

    public function index()
    {
        $settings = Settings::allSettings()->pluck('value', 'name');
        if (isset($settings['descriptionSite'])){
            SEOMeta::setDescription($settings['descriptionSite']);
        }

//        ================for seo global==============

        if (isset($settings['titleSite'])){
            SEOMeta::setTitle($settings['titleSite']);
        }

//        elseif (isset($settings['descriptionSite'])){
//            SEOMeta::setDescription($settings['descriptionSite']);
//        }

        elseif (isset($settings['multiKeywordsSite'])){
            SEOMeta::setKeywords ([$settings['multiKeywordsSite']]);
        }
        SEOMeta::setCanonical(url()->current());
//        ================for seo global============

//        ================for google================
        $urlLogo=$settings['domainSite'] .'/'. $settings['loader'];
        if (isset($settings['descriptionSite'])){
            OpenGraph::setDescription($settings['descriptionSite']);
        }
        elseif (isset($settings['titleSite'])){
            OpenGraph::setTitle($settings['titleSite']);
        }
        elseif (isset($settings['nameSite'])){
            OpenGraph::addProperty('site_name', $settings['nameSite']);
        }
        OpenGraph::setUrl(url()->current());
        OpenGraph::addImage(['url' => $urlLogo, 'size' => 300]);
        OpenGraph::addImage($urlLogo, ['type'=>'image/jpg','height' => 150, 'width' => 49]);
//        ================for google================


        $homeItems = ManageHomeContent::where('status','=','1')->with(['manageHomeContentItem' => function($query) {$query->orderBy('sort', 'asc');}])->orderBy('sort', 'asc')->get();
        $Category = Category::getCategorysType(0);
        $Portfolio = Portfolio::getPortfolios();
        $Services = Services::allServices();
        $AllServicesSpecial = Services::allServicesSpecial();
        $Comment = Comment::getCommentsPanel();
        $blogs = Blog::getBlogs();
        $faqs = Faq::getFaqs();
        $page = Page::getPages();
        $sliders = Slider::getSliders();
        $Partner = Partner::getPartners();
        $Team = Team::getTeams();
        $skill = Skills::allSkill();
        $counters = Counter::getCounters();
        $TextWithBackground = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '1')->get();
        $SliderMiniImg = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '12')->get();
        $TabBox = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '10')->get();
        $QuestionAnswer = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '11')->get();
        $HomeBox2 = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '2')->get();
        $HomeBox3 = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '3')->get();
        $HomeBox4 = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '4')->get();
        $CompetitiveAdvantage = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '5')->get();
        $QuickAccess = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '6')->get();
        $BusinessProcess = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '7')->get();
        $CustomersComment = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '8')->get();
        $BigPicInLapTop = DB::table('home_contents')->where('status','=',1)->where('type' ,'=' , '9')->get();
        $footer = DB::table('footer')->get();
        $HomeContentInfo = DB::table('home_content_info')->where('status', '=', 1)->get();
        $menusFooter = DB::table('menus_footer')->where('status','=',1)->get();
        $forms = DB::table('menus_footer')->where('status','=',1)->get();
        $rowData = [];
        foreach ($HomeContentInfo as $row){$rowData[$row->keyHomeContent] = $row;}

        if (!isset($settings['titleSite']))
            $settings['titleSite'] = '';
            $all_data = [
                'homeItems' => $homeItems,
                'rowData' => $rowData,
                'HomeContentInfo'=>$HomeContentInfo,
                'QuestionAnswer'=>$QuestionAnswer,
                'SliderMiniImg'=>$SliderMiniImg,
                'TabBox'=>$TabBox,
                'BigPicInLapTop'=>$BigPicInLapTop,
                'CustomersComment'=>$CustomersComment,
                'faqs'=>$faqs,
                'BusinessProcess'=>$BusinessProcess,
                'QuickAccess'=>$QuickAccess,
                'menusFooter'=>$menusFooter,
                'footer'=>$footer[0],
                'TextWithBackground' => $TextWithBackground,
                'HomeBox2' => $HomeBox2,
                'HomeBox3' => $HomeBox3,
                'HomeBox4' => $HomeBox4,
                'CompetitiveAdvantage'=>$CompetitiveAdvantage,
                'settings' => $settings,
                'skill' => $skill,
                'blogs' => $blogs,
                'page' => $page,
                'Comment' => $Comment,
                'Category' => $Category,
                'Portfolio' => $Portfolio,
                'Services' => $Services,
                'AllServicesSpecial' => $AllServicesSpecial,
                'counters' => $counters,
                'sliders' => $sliders,
                'Partner' => $Partner,

                'Team' => $Team];

        return view('Front.index')->with('data', $all_data);
    }

    public function getCity(Request $request): \Illuminate\Http\JsonResponse
    {
        $id=$request->id;
        $city=DB::table('provinces')->select('cities.province', 'provinces.name as province_name ','provinces.id as province_val','cities.id as city_val','cities.name as city_name')
            ->leftJoin('cities', 'cities.province', '=', 'provinces.id')
            ->where('province','=',$id)
            ->get();
        return response()->json($city);

    }


}
