<head>
<meta name="referrer" content="same-origin">
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link rel="icon" type="image/png" href="/{{(isset($settings['faviconTop']))?$settings['faviconTop']:''}}">
{!! SEO::generate() !!}
<link rel="shortcut icon" href="{{(isset($settings['faviconTop']))?$settings['faviconTop']:''}}">
<link href="{{asset('Front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/unicons.iconscout.com/release/v3.0.6/css/line.css')}}" rel="stylesheet">
@if(isset($settings['themeColorSite']))<link href="/Front/css/colors/{!!$settings['themeColorSite']!!}.css" rel="stylesheet" id="color-opt">@endif
<link href="{{asset('Front/css/swiper.min.css')}}" rel="stylesheet" type="text/css" />
<link href="/Front/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/css/style.min.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
<link href="{{asset('Front/css/slick-theme.min.css')}}" rel="stylesheet"/>
<link href="{{asset('Front/css/slick.min.css')}}" rel="stylesheet"/>
<link href="{{asset('Front/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/css/sweetalert1.1.3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/css/jquery-confirm_3.3.4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Front/css/tiny-slider.css')}}" rel="stylesheet" type="text/css" />
@if(isset($settings['CustomFont']))
<link href="{{ asset('Front/fonts/' . $settings['CustomFont'] . '/' . $settings['CustomFont'] . '.css') }}" rel="stylesheet" type="text/css" />
@endif
<link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.jqueryui.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@if(isset($settings['google_analytics'])){!!$settings['google_analytics']!!} @endif @if(isset($settings['metatag'])){!!$settings['metatag']!!} @endif
@yield('headSite')
</head>
