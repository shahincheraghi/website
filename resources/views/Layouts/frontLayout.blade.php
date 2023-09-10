<!DOCTYPE html>
<html dir="rtl" lang="fa-IR">
@php
    use App\Models\Menu;use Illuminate\Support\Facades\DB;$keywords='';
        $type=\App\Models\Settings::getTypePage();
        $User=\App\Models\User::getUserAdmin();
        $blog=\App\Models\Blog::getBlogsTwo();
        $page=\App\Models\Page::getPagesTwo();
        $settings = \App\Models\Settings::allSettings()->pluck('value', 'name');
         $footer = DB::table('footer')->first();
         $menusFooter1 = DB::table('menus_footer')->where('status','=',1)
         ->where('boxPlace','=',1)
         ->get();
          $menusFooter2 = DB::table('menus_footer')->where('status','=',1)
         ->where('boxPlace','=',2)
         ->get();
                $page=\App\Models\Page::getPages();
                $menus = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();
@endphp
@if(Route::currentRouteName()==='Front.blogSingle')
    @php $keywords=$data['blog']["keywords"]; @endphp
@endif
@if(Route::currentRouteName()==='Front.pageSingle')
    @php $keywords=$data['page']["keywords"]; @endphp
@endif
@include('FrontLayout.head')

<style>
    #loader {
        width: 12em;
        height: 12em;
        font-size: 10px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #IranMap .map .province path:active {
        border: unset !important;
    }
    #loader .face {
        position: absolute;
        border-radius: 50%;
        border-style: solid;
        animation: animate 3s linear infinite;
    }

    #loader .face:nth-child(1) {
        width: 100%;
        height: 100%;
        color: #3ec1cf;
        border-color: currentColor transparent transparent currentColor;
        border-width: 0.2em 0.2em 0em 0em;
        --deg: -45deg;
        animation-direction: normal;
    }

    #loader .face:nth-child(2) {
        width: 70%;
        height: 70%;
        color: #3ec1cf;
        border-color: currentColor currentColor transparent transparent;
        border-width: 0.2em 0em 0em 0.2em;
        --deg: -135deg;
        animation-direction: reverse;
    }

    #loader .face .circle {
        position: absolute;
        width: 50%;
        height: 0.1em;
        top: 50%;
        left: 50%;
        background-color: transparent;
        transform: rotate(var(--deg));
        transform-origin: left;
    }

    #loader .face .circle::before {
        position: absolute;
        top: -0.5em;
        right: -0.5em;
        content: '';
        width: 1em;
        height: 1em;
        background-color: currentColor;
        border-radius: 50%;
        box-shadow: 0 0 2em,
        0 0 2em, 0 0 4em, 0 0 6em, 0 0 8em, 0 0 10em, 0 0 0 0.5em rgb(0 126 255 / 10%)
    }

    @keyframes animate {
        to {
            transform: rotate(1turn);
        }
    }

    .preLoader{
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 1;
        background-color: white;
        z-index: 9999999;
    }

</style>
<div class="preLoader" id="preloader">
    <div class="loader" id="loader">
        <div class="face">
            <div class="circle"></div>
        </div>
        <div class="face">
            <div class="circle"></div>
        </div>

        @isset($settings['loader'])
            <img src="/{{$settings['loader']}}" class="l-dark" height="50px"  alt="">
        @endisset
    </div>
</div>

<body id="bodyFront">

@include('FrontLayout.header')

<div  class="main-content">

    @yield('content')

</div>

@include('FrontLayout.footer')

<a href="#" class="back-to-top c3-bg"><i class="fa fa-angle-up"></i></a>

</body>

@include('FrontLayout.script')

</html>
