{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    @php--}}
{{--        $keywords='';--}}
{{--            $type=\App\Models\Settings::getTypePage();--}}
{{--            $User=\App\Models\User::getUserAdmin();--}}
{{--            $blog=\App\Models\Blog::getBlogsTwo();--}}
{{--                $settings = \App\Models\Settings::allSettings()->pluck('value', 'name');--}}
{{--    @endphp--}}
{{--    @if(Route::currentRouteName()==='Front.blogSingle')--}}
{{--        @php $keywords=$data['blog']->keywords; @endphp--}}
{{--    @endif--}}
{{--    <meta charset="utf-8">--}}
{{--    <title>{{(isset($settings['titleSite']))?$settings['titleSite']:''}}  @yield('title')</title>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">--}}
{{--    <meta name="keywords" content="{{(isset($settings['keywords']))?$settings['keywords']:''}}">--}}
{{--    <meta name="keywords" content="{{$keywords}}">--}}
{{--    <link rel="icon" href="/{{(isset($settings['favicon']))?$settings['favicon']:''}}">--}}
{{--    <meta name="author" content="{{(isset($settings['titleSite']))?$settings['titleSite']:''}}"/>--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    @if(isset($settings['google_analytics']))--}}
{{--        {!!$settings['google_analytics']!!}--}}
{{--    @endif--}}
{{--    @if(isset($settings['metatag']))--}}
{{--        {!!$settings['metatag']!!}--}}
{{--    @endif--}}
{{--    <link rel="stylesheet" href="{{ asset('Front/css/bootstrap.min.css')}}">--}}

{{--    <link rel="stylesheet" href="{{asset('Front/Account/plugins/fontawesome/css/fontawesome.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('Front/Account/plugins/fontawesome/css/all.min.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/bootstrap-datepicker.min.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{asset('Front/css/nice-select.css')}}">--}}

{{--    @if(isset($_COOKIE['th']) and $_COOKIE['th']=='dark')--}}
{{--        <link rel="stylesheet" id="styleT" href="{{ asset('Front/css/dark_style.css')}}">--}}
{{--        <link rel="stylesheet" id="styleT" href="{{asset('Front/Account/css/style_dark.css')}}">--}}
{{--        <link rel="stylesheet" id="styleTN" href="{{asset('Front/Account/css/main_dark.css')}}">--}}
{{--    @else--}}
{{--        <link rel="stylesheet" id="styleT" href="{{asset('Front/Account/css/style.css')}}">--}}
{{--        <link rel="stylesheet" id="styleTN" href="{{asset('Front/Account/css/main.css')}}">--}}

{{--        <link rel="stylesheet" id="styleT" href="{{ asset('Front/css/style.css')}}">--}}
{{--    @endif--}}

{{--    <link rel="stylesheet" href="{{asset('Front/Account/css/style.css')}}">--}}
{{--    <link rel="stylesheet" href="{{ asset('Front/css/meanmenu.css')}}">--}}

{{--    <link rel="stylesheet" href="{{asset('Front/Account/css/main.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('Front/Account/css/main.css')}}">--}}
{{--    <link rel="stylesheet" href="{{ asset('Front/css/responsive.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/jquery.toast.css') }}"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('Front/vendors/css/toastr.css') }}"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('Front/vendors/css/sweetalert2.min.css') }}"/>--}}
{{--    @yield('css')--}}
{{--    --}}{{--    changetheme--}}
{{--    <style>--}}
{{--        :root {--}}
{{--            --darkbg: #251d29;--}}
{{--            --darkt: #ffd1f7;--}}
{{--            --lightbg: #fff;--}}
{{--            --lightt: #d43370;--}}

{{--            --toggleHeight: 16em;--}}
{{--            --toggleWidth: 30em;--}}
{{--            --toggleBtnRadius: 10em;--}}

{{--            --bgColor--night: #423966;--}}
{{--            --toggleBtn-bgColor--night: var(--bgColor--night);--}}
{{--            --mooncolor: #d9fbff;--}}
{{--            --bgColor--day: #9ee3fb;--}}
{{--            --toggleBtn-bgColor--day: var(--bgColor--day);--}}
{{--        }--}}

{{--        .light {--}}
{{--            background: var(--lightbg);--}}
{{--            color: var(--lightt);--}}
{{--        }--}}

{{--        .tdnn {--}}
{{--            margin: 0 auto;--}}
{{--            font-size: 9.5%;--}}
{{--            margin-top: 10em;--}}
{{--            float: right;--}}
{{--            position: relative;--}}
{{--            height: var(--toggleHeight);--}}
{{--            width: var(--toggleWidth);--}}
{{--            border-radius: var(--toggleHeight);--}}
{{--            transition: all 500ms ease-in-out;--}}
{{--            background: var(--bgColor--night);--}}
{{--            margin-left: 11px;--}}
{{--            margin-top: 16px;--}}
{{--        }--}}

{{--        .day {--}}
{{--            background: #ffbf71;--}}
{{--        }--}}

{{--        .moon {--}}
{{--            position: absolute;--}}
{{--            display: block;--}}
{{--            border-radius: 50%;--}}
{{--            transition: all 400ms ease-in-out;--}}

{{--            top: 3em;--}}
{{--            left: 3em;--}}
{{--            transform: rotate(-75deg);--}}
{{--            width: var(--toggleBtnRadius);--}}
{{--            height: var(--toggleBtnRadius);--}}
{{--            background: var(--bgColor--night);--}}
{{--            box-shadow: 3em 2.5em 0 0em var(--mooncolor) inset,--}}
{{--            rgba(255, 255, 255, 0.1) 0em -7em 0 -4.5em,--}}
{{--            rgba(255, 255, 255, 0.1) 3em 7em 0 -4.5em,--}}
{{--            rgba(255, 255, 255, 0.1) 2em 13em 0 -4em,--}}
{{--            rgba(255, 255, 255, 0.1) 6em 2em 0 -4.1em,--}}
{{--            rgba(255, 255, 255, 0.1) 8em 8em 0 -4.5em,--}}
{{--            rgba(255, 255, 255, 0.1) 6em 13em 0 -4.5em,--}}
{{--            rgba(255, 255, 255, 0.1) -4em 7em 0 -4.5em,--}}
{{--            rgba(255, 255, 255, 0.1) -1em 10em 0 -4.5em;--}}
{{--        }--}}

{{--        .sun {--}}
{{--            top: 4.5em;--}}
{{--            left: 18em;--}}
{{--            transform: rotate(0deg);--}}
{{--            width: 7em;--}}
{{--            height: 7em;--}}
{{--            background: #fff;--}}
{{--            box-shadow: 3em 3em 0 5em #fff inset, 0 -5em 0 -2.7em #fff,--}}
{{--            3.5em -3.5em 0 -3em #fff, 5em 0 0 -2.7em #fff, 3.5em 3.5em 0 -3em #fff,--}}
{{--            0 5em 0 -2.7em #fff, -3.5em 3.5em 0 -3em #fff, -5em 0 0 -2.7em #fff,--}}
{{--            -3.5em -3.5em 0 -3em #fff;--}}
{{--        }--}}

{{--    </style>--}}



{{--</head>--}}


{{--<body>--}}

{{--<div class="preloader">--}}
{{--    <div class="loader">--}}
{{--        @if(isset($settings['loader']))--}}
{{--            <img src="/{{$settings['loader']}}">--}}
{{--        @else--}}
{{--            <div class="loader-outter"></div>--}}
{{--            <div class="loader-inner"></div>--}}
{{--            <svg width="16px" height="12px">--}}
{{--                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>--}}
{{--                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>--}}
{{--            </svg>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}

{{--<header class="header-area">--}}
{{--    <div class="top-header">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <ul class="header-contact-info">--}}
{{--                        <li><i class="far fa-clock"></i> {{trans('langFront.phone')}} <a href="#">--}}
{{--                                : {{(isset($settings['phone']))?$settings['phone']:''}}</a></li>--}}
{{--                        <li><i class="fas fa-phone"></i> {{trans('langFront.mobile')}}: <a href="#">--}}
{{--                                {{(isset($settings['mobile']))?$settings['mobile']:''}} </a></li>--}}
{{--                        <li><i class="far fa-paper-plane"></i> <a href="#"><span class="__cf_email__" data-cfemail="">{{trans('langFront.email')}}--}}
{{--                                : {{(isset($settings['email']))?$settings['email']:''}}</span></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="header-right-content">--}}
{{--                        <ul class="top-header-social">--}}

{{--                            @if(isset($settings['facebook'])  and !empty($settings['facebook']))--}}
{{--                                <li>--}}
{{--                                    <a href="{{$settings['facebook']}}"><i class="fab fa-facebook-f"></i></a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if(isset($settings['twitter']) and !empty($settings['twitter']))--}}
{{--                                <li>--}}
{{--                                    <a href="{{$settings['twitter']}}"><i class="fab fa-twitter"></i></a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if(isset($settings['github']) and !empty($settings['github']))--}}
{{--                                <li>--}}
{{--                                    <a href="{{$settings['github']}}"><i class="fab fa-github"></i></a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if(isset($settings['instagram']) and !empty($settings['instagram']))--}}
{{--                                <li>--}}
{{--                                    <a href="{{$settings['instagram']}}"><i class="fab fa-instagram"></i></a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if(isset($settings['telegram']) and !empty($settings['telegram']))--}}
{{--                                <li>--}}
{{--                                    <a href="{{$settings['telegram']}}"><i class="fab fa-telegram"></i></a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if(isset($settings['linkedin']) and !empty($settings['linkedin']))--}}
{{--                                <li>--}}
{{--                                    <a href="{{$settings['linkedin']}}"><i class="fab fa-linkedin-in"></i></a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="navbar-area">--}}
{{--        <div class="fovia-responsive-nav">--}}
{{--            <div class="container">--}}
{{--                <div class="fovia-responsive-menu">--}}
{{--                    <div class="logo">--}}
{{--                        <a href="/">--}}
{{--                            <img src="/{{$settings['favicon']}}"--}}
{{--                                 alt="{{(isset($settings['titleSite']))?$settings['titleSite']:''}}">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="fovia-nav">--}}
{{--            <div class="container">--}}
{{--                <nav class="navbar navbar-expand-md navbar-light">--}}
{{--                    <a class="navbar-brand" href="/">--}}
{{--                        <img src="/{{$settings['favicon']}}"--}}
{{--                             alt="{{(isset($settings['titleSite']))?$settings['titleSite']:''}}">--}}
{{--                    </a>--}}
{{--                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">--}}
{{--                        <ul class="navbar-nav">--}}
{{--                            <li class="nav-item"><a href="/" class="nav-link ">{{trans('langFront.home')}}</a></li>--}}
{{--                            @if(isset($settings['service']) and $settings['service']==1)--}}
{{--                                <li class="nav-item"><a class="nav-link"--}}
{{--                                                        href="{{route('Front.service') }}">{{trans('langFront.service')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if(isset($settings['product']) and $settings['product']==1)--}}
{{--                                <li class="nav-item"><a class="nav-link"--}}
{{--                                                        href="{{route('Front.product') }}">{{trans('langFront.products')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if(isset($settings['blog']) and $settings['blog']==1)--}}
{{--                                <li class="nav-item"><a class="nav-link"--}}
{{--                                                        href="{{route('Front.blogs') }}">{{trans('langFront.blog')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if(isset($settings['team']) and $settings['team']==1)--}}
{{--                                <li class="nav-item"><a class="nav-link"--}}
{{--                                                        href="{{route('Front.team') }}">{{trans('langFront.team')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if(isset($settings['faq']) and $settings['faq']==1)--}}
{{--                                <li class="nav-item"><a class="nav-link"--}}
{{--                                                        href="{{route('Front.faq') }}">{{trans('langFront.faq')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if(isset($settings['about']) and $settings['about']==1)--}}
{{--                                <li class="nav-item"><a class="nav-link"--}}
{{--                                                        href="{{route('Front.about') }}">{{trans('langFront.about')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}


{{--                        </ul>--}}
{{--                        <div class="others-options">--}}



{{--                            @if(isset($_COOKIE['th']) and $_COOKIE['th']=='dark')--}}
{{--                                <div class="tdnn">--}}
{{--                                    <div id="th" class="moon">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            @else--}}
{{--                                <div class="tdnn day">--}}

{{--                                    <div id="th" class="moon sun">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                            <a href="{{route('Front.carts.index')}}" class="cart-btn"><i--}}
{{--                                    class=" fas fa-shopping-bag "></i></a>--}}



{{--                            @if(Auth::id())--}}
{{--                                <a href="{{route('Front.account.index')}}" class="cart-btn"><i--}}
{{--                                        class="fas fa-user-injured"></i></a>--}}
{{--                            @else--}}
{{--                                <a href="{{route('login')}}" class="cart-btn"><i class="fas fa-lock"></i></a>--}}
{{--                            @endif--}}
{{--                            @if(isset($settings['contact']) and $settings['contact']==1)--}}
{{--                                <a class="btn btn-primary"--}}
{{--                                   href="{{route('Front.contact') }}">{{trans('langFront.contact')}}</a>--}}
{{--                            @endif--}}




{{--                        </div>--}}
{{--                    </div>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</header>--}}

{{--@yield('content')--}}


{{--<section class="footer-area">--}}
{{--    <div class="container">--}}

{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="single-footer-widget">--}}
{{--                    <div class="logo">--}}
{{--                        <a href="/"><img src="/{{$settings['favicon']}}" alt="image"></a>--}}
{{--                        <p>{{$settings['aboutInfo']}}</p>--}}
{{--                    </div>--}}
{{--                    <ul class="social">--}}
{{--                        @if(isset($settings['facebook'])  and !empty($settings['facebook']))--}}
{{--                            <li>--}}
{{--                                <a href="{{$settings['facebook']}}"><i class="fab fa-facebook-f"></i></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['twitter']) and !empty($settings['twitter']))--}}
{{--                            <li>--}}
{{--                                <a href="{{$settings['twitter']}}"><i class="fab fa-twitter"></i></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['github']) and !empty($settings['github']))--}}
{{--                            <li>--}}
{{--                                <a href="{{$settings['github']}}"><i class="fab fa-github"></i></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['instagram']) and !empty($settings['instagram']))--}}
{{--                            <li>--}}
{{--                                <a href="{{$settings['instagram']}}"><i class="fab fa-instagram"></i></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['telegram']) and !empty($settings['telegram']))--}}
{{--                            <li>--}}
{{--                                <a href="{{$settings['telegram']}}"><i class="fab fa-telegram"></i></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['linkedin']) and !empty($settings['linkedin']))--}}
{{--                            <li>--}}
{{--                                <a href="{{$settings['linkedin']}}"><i class="fab fa-linkedin-in"></i></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="single-footer-widget pl-5">--}}
{{--                    <h3>{{trans('langFront.blog')}}</h3>--}}

{{--                    <ul class="links-list">--}}
{{--                        @if(isset($settings['blog']) and $settings['blog']==1)--}}
{{--                            @foreach($blog as $value)--}}
{{--                                <li><a href="{{route('Front.blogSingle',$value->id) }}">{{$value->title}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="single-footer-widget pl-5">--}}
{{--                    <h3>{{trans('langFront.important_link')}}</h3>--}}
{{--                    <ul class="departments-list">--}}
{{--                        @if(isset($settings['service']) and $settings['service']==1)--}}
{{--                            <li><a href="{{route('Front.service') }}">{{trans('langFront.service')}}</a></li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['product']) and $settings['product']==1)--}}
{{--                            <li><a href="{{route('Front.product') }}">{{trans('langFront.products')}}</a></li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['blog']) and $settings['blog']==1)--}}
{{--                            <li><a href="{{route('Front.blogs') }}">{{trans('langFront.blog')}}</a></li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['team']) and $settings['team']==1)--}}
{{--                            <li><a href="{{route('Front.team') }}">{{trans('langFront.team')}}</a></li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['faq']) and $settings['faq']==1)--}}
{{--                            <li><a href="{{route('Front.faq') }}">{{trans('langFront.faq')}}</a></li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['contact']) and $settings['contact']==1)--}}
{{--                            <li><a href="{{route('Front.contact') }}">{{trans('langFront.contact')}}</a></li>--}}
{{--                        @endif--}}
{{--                        @if(isset($settings['about']) and $settings['about']==1)--}}
{{--                            <li><a href="{{route('Front.about') }}">{{trans('langFront.about')}}</a></li>--}}
{{--                        @endif--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="single-footer-widget">--}}
{{--                    <h3>{{trans('langFront.about_us')}}</h3>--}}
{{--                    <ul class="opening-hours">--}}
{{--                        <li>{{trans('langFront.contact_form')}}</li>--}}
{{--                        <li><i class="fa fa-phone"></i>{{(isset($settings['phone']))?$settings['phone']:''}} </li>--}}
{{--                        <li><i class="fa fa-envelope"></i>{{(isset($settings['email']))?$settings['email']:''}} </li>--}}
{{--                        <li><i class="fa fa-map-marker"></i> {{(isset($settings['address']))?$settings['address']:''}}--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="copyright-area">--}}
{{--            <p> {{trans('langFront.copy-right')}} <i--}}
{{--                    class="far fa-copyright"></i> {{(isset($settings['titleSite']))?$settings['titleSite']:'setin'}}--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<div class="go-top"><i class="fas fa-chevron-up"></i></div>--}}


{{--<script src="{{ asset('Front/js/jquery.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/vendors/js/sweetalert2.all.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/vendors/js/toastr.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/popper.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/bootstrap-datepicker.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/bootstrap-datepicker.fa.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/slick.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/jquery.meanmenu.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/jquery.appear.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/odometer.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/parallax.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/jquery.magnific-popup.min.js')}}"></script>--}}

{{--<script src="{{ asset('Front/js/jquery.nice-select.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/Account/plugins/select2/js/select2.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/wow.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/jquery.ajaxchimp.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/form-validator.min.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/contact-form-script.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/jquery.toast.js')}}"></script>--}}
{{--<script src="{{ asset('Front/js/main.js')}}"></script>--}}
{{--<script>--}}
{{--    var url = window.location.href;--}}
{{--    $('#navbarSupportedContent  li').each(function () {--}}

{{--        var href = $(this).find('a').attr('href');--}}
{{--        if (url == href) {--}}
{{--            $(this).addClass('active');--}}
{{--        }--}}
{{--    });--}}



{{--// ----------------------------}}
{{--    $('.tdnn').click(function () {--}}
{{--        $("body").toggleClass('light');--}}
{{--        $(".moon").toggleClass('sun');--}}
{{--        $(".tdnn").toggleClass('day');--}}
{{--        // alert($('#th').hasClass('sun'))--}}
{{--        if ($('#th').hasClass('sun')) {--}}


{{--            $('#styleT').attr('href', '/Front/Account/css/style.css');--}}
{{--            $('#styleTN').attr('href', '/Front/Account/css/main.css');--}}
{{--            setCookie('th', 'light', 20000);--}}

{{--            // Cookies.set('th', 'sun');--}}
{{--        } else {--}}

{{--            $('#styleT').attr('href', '/Front/Account/css/style_dark.css');--}}
{{--            $('#styleTN').attr('href', '/Front/Account/css/main_dark.css');--}}
{{--            setCookie('th', 'dark', 20000);--}}

{{--        }--}}
{{--    });--}}

{{--    function setCookie(name, value, days) {--}}
{{--        var expires = "";--}}
{{--        if (days) {--}}
{{--            var date = new Date();--}}
{{--            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));--}}
{{--            expires = "; expires=" + date.toUTCString();--}}
{{--        }--}}
{{--        document.cookie = name + "=" + (value || "") + expires + "; path=/";--}}
{{--    }--}}

{{--    function getCookie(name) {--}}
{{--        var nameEQ = name + "=";--}}
{{--        var ca = document.cookie.split(';');--}}
{{--        for (var i = 0; i < ca.length; i++) {--}}
{{--            var c = ca[i];--}}
{{--            while (c.charAt(0) == ' ') c = c.substring(1, c.length);--}}
{{--            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);--}}
{{--        }--}}
{{--        return null;--}}
{{--    }--}}

{{--    function eraseCookie(name) {--}}
{{--        document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';--}}
{{--    }--}}



{{--</script>--}}

{{--@yield('script')--}}
{{--@yield('js')--}}

{{--</body>--}}

{{--</html>--}}
