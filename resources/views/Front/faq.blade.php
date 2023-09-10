@extends('Layouts.frontLayout')
@section('content')
    <section class="bg-half d-table w-100" style="background-image: url(/{{(isset($data['settings']['faqImage']))?$data['settings']['faqImage']:''}})">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> {{trans('langFront.faq')}} </h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="/"> صفحه اصلی</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('langFront.faq')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section>
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <style>

        .panel {
            margin-top: 0px !important;
            border-radius: 0px !important;
            border: none;
            border-bottom-color: #D7D8DC;
            box-shadow: 0 0px 0px 0 transparent !important;
            -moz-box-shadow: 0 0px 0px 0 transparent !important;
            -webkit-box-shadow: 0 0px 0px 0 transparent !important;
            -o-box-shadow: 0 0px 0px 0 transparent !important;
        }
        .panel .panel-heading {
            border-radius: 0px !important;
            background: #f5f6f8;
            padding: 0px !important;
            border-bottom: 0px solid #DDDEE2;
        }
        .panel .panel-heading .panel-title a {
            text-decoration: none;
            font-weight: bold;
            display: block;
            padding: 23px 15px;
            font-size: large;
            font-weight: 300;
            color: #60626d;
            background-color: #ffffff;
            line-height: 29px;
            position: relative;
        }
        .panel .panel-heading .panel-title a:hover,
        .panel .panel-heading .panel-title a:active {
            text-decoration: none;
            cursor: pointer;
            transition: all 0.4s;
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            color: #9a4a5a;
        }
        .panel .panel-heading .panel-title a span {
            float: right;
            margin-top: 15px;
            margin-left: 30px;
            transition: all 0.4s;
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
        }
        .panel .panel-heading .panel-title a .bar,
        .panel .panel-heading .panel-title a .bar:after {
            border-width: 1px;
            border-style: solid;
            width: 21px;
            border-radius: 10px;
            transition: all 0.4s;
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
        }
        .panel .panel-heading .panel-title a .bar:after {
            content: "";
            height: 0;
            position: absolute;
            top: 38px;
            right: 15px;
        }
        .panel .panel-heading .panel-title a.collapsed {

            position: relative;
            transition: all 0.4s;
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
        }
        .panel .panel-heading .panel-title a.collapsed .bar {
            border-color: #75767F;
        }
        .panel .panel-heading .panel-title a.collapsed .bar:after {
            transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            border-color: #75767F;
            transition: all 0.4s;
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
        }
        .panel-collapse {
            background-color: #ffffff;
        }
        .panel-collapse .panel-body {
            background-color: #ffffff;
            border: 0px solid !important;
            line-height: 26px;
            font-weight: 300;
            margin: 0 25px;
            text-align: justify;
            padding-bottom: 20px;
            padding-top: 0px;
            color: #60626d;
        }
        @media screen and (max-width: 768px){
            .panel .panel-heading .panel-title a{
                font-size: small;
            }
        }


    </style>
    <section class="collapse-area">
        <div class="container my-5">
            <div class="row">
                <div class="collapse-tab col-xs-12">
                    <div class="panel-group" id="accordion">
                        @foreach($data['Faq'] as $key=>$faq)
                        <div class="panel panel-default" id="{{$faq->title}}">
                            <!-- Start: Tab-1 -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" class="">
                                        {{$faq->title}}
                                        <span class="bar hidden-xs"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$faq->id}}" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{$faq->text}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        var url = window.location.href;
        $('#navbarSupportedContent  li').each(function () {
            var href = $(this).find('a').attr('href');
            if (url === href) {
                $(this).addClass('active');
            }
        });


        $('.tdnn').click(function () {
            $("body").toggleClass('light');
            $(".moon").toggleClass('sun');
            $(".tdnn").toggleClass('day');
            // alert($('#th').hasClass('sun'))
            if ($('#th').hasClass('sun')) {
                $('#styleT').attr('href', 'Front/css/style.css');
                setCookie('th', 'light', 20000);

                // Cookies.set('th', 'sun');
            } else {
                $('#styleT').attr('href', 'Front/css/dark_style.css');
                setCookie('th', 'dark', 20000);

            }
        });

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
    </script>
@endsection
