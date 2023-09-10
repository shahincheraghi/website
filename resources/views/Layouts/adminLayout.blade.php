<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta name="description"
          content=" پنل مدیرت{{(isset($settings['titleSite']))?$settings['titleSite']:''}}  @yield('title')"/>
    <meta name="keywords"
          content=" پنل مدیرت{{(isset($settings['titleSite']))?$settings['titleSite']:''}}  @yield('title')"/>
    <meta name="author"
          content=" پنل مدیرت {{(isset($settings['titleSite']))?$settings['titleSite']:''}}  @yield('title')"/>
    <title>{{\App\Models\Settings::getSettingName('persian_name_store')}}  @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('Admin/app-assets/images/ico/apple-icons-120.png') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Admin/app-assets/images/ico/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/vendors-rtl.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/persian-datepicker.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/vendors-rtl.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/spin.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/sweetalert.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/bootstrap-extended.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/colors.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/menu/treeview.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/components.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/themes/dark-layout.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/themes/semi-dark-layout.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/core/colors/palette-gradient.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('Admin/app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/jquery.nestable.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/jquery.nestable.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/spectrum.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/data-list-view.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/app-ecommerce-shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/custom-rtl.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/style-rtl.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/jquery.toast.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/bootstrap-tagsinput.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/invoice.css')}}">
    <!-- END: Vendor CSS-->
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

@php
    use App\Models\Settings;$settings = Settings::allSettings()->pluck('value', 'name')
@endphp

<body class="vertical-layout vertical-menu-modern 2-columns ecommerce-application navbar-floating footer-static"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item">

                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            @php
                                use Illuminate\Support\Facades\Auth;$img=Auth::user()->image;
                                $userName=Auth::user()->username

                            @endphp
                            <span><img class="round" src="{{($img!=null)?'/'.$img : '/File/default/user.png'}}"
                                       alt="avatar" height="40" width="40"/></span>

                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{\Illuminate\Support\Facades\Auth::user()->name}} - {{\Illuminate\Support\Facades\Auth::user()->family}}</span><span
                                    class="user-status">{{($userName!=null)?$userName:''}}</span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dir-rtl">
                            <a class="dropdown-item"
                               href="{{route('Admin.users.profile.edit')}}"><i
                                    class="feather icon-user"></i>{{trans('langPanel.profile')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logoute')}}"><i class="feather icon-power"></i>
                                {{trans('langPanel.logout')}}</a>
                        </div>
                    </li>

                </ul>

                <div class="ml-auto float-left bookmark-wrapper d-flex align-items-center">

                    <ul class="nav navbar-nav bookmark-icons mr-2">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icons-menu-->
                        <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                                  target="_blank"
                                                                  href="/"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('langPanel.home')}}"><i
                                    class="ficon feather icon-home"></i></a></li>

                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{route('Admin.blogs.index')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('langPanel.blogList')}}"><i
                                    class="ficon feather icon-clipboard"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                                  href="{{route('Admin.comments.index')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('langPanel.comment')}}"><i
                                    class="ficon feather icon-message-circle"></i></a></li>

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>

                    </ul>

                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                                            href="/">
                    <div class="brand-logo"
                         style="background: url(/{{\Illuminate\Support\Facades\Auth::user()->image}}) no-repeat;background-size: 27px 27px;"></div>
                    <h2 class="brand-text mb-0">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->family}}</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                       data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    @php

        use App\Models\User;$arrayPerm=User::getArrayRolePerm()
    @endphp


    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item">
                <a href="{{route('Admin.index')}}">
                    <i class="feather icon-monitor"></i>
                    <span class="menu-title"
                          data-i18n="{{trans('langPanel.dashboard')}}">{{trans('langPanel.dashboard')}}</span>
                </a>
            </li>

            <li class=" nav-item my">
                <a href="#">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="{{trans('langPanel.HomePage')}}">
                        {{trans('langPanel.HomePage')}}
                    </span>
                </a>

                <ul class="menu-content">

                    @if(Auth::user()->type==0 or in_array('Admin.manageHomeContent.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.manageHomeContent.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="{{trans('langPanel.manageHomeContent')}}">{{trans('langPanel.manageHomeContent')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.sliders.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.sliders.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.sliderList')}}">{{trans('langPanel.sliderList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.TextWithBackground.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.TextWithBackground.index',1)}}"><i
                                    class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listTextWithBackground')}}">{{trans('langPanel.listTextWithBackground')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.CompetitiveAdvantage.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.CompetitiveAdvantage.index',1)}}"><i
                                    class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listCompetitiveAdvantage')}}">{{trans('langPanel.listCompetitiveAdvantage')}}</span></a>
                        </li>
                    @endif

                        @if(Auth::user()->type==0 or in_array('Admin.TabBox.index',$arrayPerm))
                            <li class="">
                                <a href="{{route('Admin.TabBox.index',1)}}"><i class="feather icon-circle"></i><span
                                        class="menu-item"
                                        data-i18n="{{trans('langPanel.listTabBox')}}">{{trans('langPanel.listTabBox')}}</span></a>
                            </li>
                        @endif

                        @if(Auth::user()->type==0 or in_array('Admin.QuestionAnswer.index',$arrayPerm))
                            <li class="">
                                <a href="{{route('Admin.QuestionAnswer.index',1)}}"><i class="feather icon-circle"></i><span
                                        class="menu-item"
                                        data-i18n="{{trans('langPanel.listQuestionAnswer')}}">{{trans('langPanel.listQuestionAnswer')}}</span></a>
                            </li>
                        @endif

                        @if(Auth::user()->type==0 or in_array('Admin.SliderMiniImg.index',$arrayPerm))
                            <li class="">
                                <a href="{{route('Admin.SliderMiniImg.index',1)}}"><i class="feather icon-circle"></i><span
                                        class="menu-item"
                                        data-i18n="{{trans('langPanel.listSliderMiniImg')}}">{{trans('langPanel.listSliderMiniImg')}}</span></a>
                            </li>
                        @endif

                    @if(Auth::user()->type==0 or in_array('Admin.HomeBox2.index',$arrayPerm))
                        <li class="">
                            <a href="{{route('Admin.HomeBox2.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listHomeBox2')}}">{{trans('langPanel.listHomeBox2')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.QuickAccess.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.QuickAccess.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listQuickAccess')}}">{{trans('langPanel.listQuickAccess')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.HomeContentInfo.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.HomeContentInfo.index',1)}}"><i
                                    class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listHomeContentInfo')}}">{{trans('langPanel.listHomeContentInfo')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.BusinessProcess.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.BusinessProcess.index',1)}}"><i
                                    class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listBusinessProcess')}}">{{trans('langPanel.listBusinessProcess')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.CustomersComment.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.CustomersComment.index',1)}}"><i
                                    class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listCustomersComment')}}">{{trans('langPanel.listCustomersComment')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.BigPicInLapTop.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.BigPicInLapTop.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listBigPicInLapTop')}}">{{trans('langPanel.listBigPicInLapTop')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.HomeBox3.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.HomeBox3.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listHomeBox3')}}">{{trans('langPanel.listHomeBox3')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.HomeBox4.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.HomeBox4.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listHomeBox4')}}">{{trans('langPanel.listHomeBox4')}}</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.comments.index',$arrayPerm))

                        <li>
                            <a href="{{route('Admin.comments.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.commentList')}}">{{trans('langPanel.commentList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.counters.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.counters.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.counterList')}}">{{trans('langPanel.counterList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.faqs.index',$arrayPerm))

                        <li>
                            <a href="{{route('Admin.faqs.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.faqList')}}">{{trans('langPanel.faqList')}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class=" nav-item my">
                <a href="#"><i class="feather icon-list"></i><span class="menu-title"
                                                                   data-i18n="{{trans('langPanel.footer')}}">{{trans('langPanel.footer')}}</span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->type==0 or in_array('Admin.footer.index',$arrayPerm))

                        <li class=" nav-item">
                            <a href="{{route('Admin.footer.index')}}">
                                <i class="feather icon-home"></i>
                                <span class="menu-title"
                                      data-i18n="{{trans('langPanel.footer')}}">{{trans('langPanel.footer')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.MenusFooter.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.MenusFooter.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listMenusFooter')}}">{{trans('langPanel.listMenusFooter')}}</span></a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item my"><a href="#"><i class="feather icon-edit"></i><span class="menu-title"
                                                                                       data-i18n="{{trans('langPanel.forms')}}">{{trans('langPanel.forms')}}</span></a>
                <ul class="menu-content">
                    @if(isset($settings['formInsurance']) and $settings['formInsurance']==1)
                        @if(Auth::user()->type==0 or in_array('Admin.Insurance.index',$arrayPerm))

                            <li class=" nav-item">
                                <a href="{{route('Admin.Insurance.index')}}">
                                    <i class="feather icon-layout"></i>
                                    <span class="menu-title"
                                          data-i18n="{{trans('langPanel.Insurance')}}">{{trans('langPanel.Insurance')}}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.FormBuilder.index',$arrayPerm))
                        <li class=" nav-item">
                            <a href="{{route('Admin.FormBuilder.index')}}">
                                <i class="feather icon-layout"></i>
                                <span class="menu-title" data-i18n="{{trans('langPanel.FormBuilder')}}">
                                            {{trans('langPanel.FormBuilder')}}
                                    </span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.contacts.index',$arrayPerm))
                        <li class=" nav-item">
                            <a href="{{route('Admin.contacts.index')}}">
                                <i class="feather icon-layout"></i>
                                <span class="menu-title"
                                      data-i18n="{{trans('langPanel.contacts')}}">{{trans('langPanel.contacts')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.serviceOnline.index',$arrayPerm))

                        <li class=" nav-item">
                            <a href="{{route('Admin.serviceOnline.index')}}">
                                <i class="feather icon-layout"></i>
                                <span class="menu-title"
                                      data-i18n="{{trans('langPanel.serviceOnline')}}">{{trans('langPanel.serviceOnline')}}</span>
                            </a>

                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.subscribes.index',$arrayPerm))

                        <li class=" nav-item">
                            <a href="{{route('Admin.subscribes.index')}}">
                                <i class="feather icon-layout"></i>
                                <span class="menu-title"
                                      data-i18n="{{trans('langPanel.subscribes')}}">{{trans('langPanel.subscribes')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.Counseling.index',$arrayPerm))

                        <li class=" nav-item">
                            <a href="{{route('Admin.Counseling.index')}}">
                                <i class="feather icon-layout"></i>
                                <span class="menu-title"
                                      data-i18n="{{trans('langPanel.Counseling')}}">{{trans('langPanel.Counseling')}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item my"><a href="#"><i class="feather icon-grid"></i><span class="menu-title"
                                                                                       data-i18n="{{trans('langPanel.managementSite')}}">{{trans('langPanel.managementSite')}}</span></a>
                <ul class="menu-content">
                    @if(\Illuminate\Support\Facades\Auth::user()->type==0 or in_array('Admin.menus.index',$arrayPerm))

                        <li class=" nav-item"><a href="{{route('Admin.menus.index')}}"><i
                                    class="feather icon-menu"></i><span
                                    class="menu-title"
                                    data-i18n="منو ها">منو ها</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.pages.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.pages.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.pageList')}}">{{trans('langPanel.pageList')}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item my"><a href="#"><i class="feather icon-book"></i><span class="menu-title"
                                                                                       data-i18n="{{trans('langPanel.reports')}}">{{trans('langPanel.reports')}}</span></a>
                <ul class="menu-content">

                </ul>

            </li>

            <li class="nav-item my"><a href="#"><i class="feather icon-folder"></i><span class="menu-title"
                                                                                         data-i18n="{{trans('langPanel.crud')}}">{{trans('langPanel.crud')}}</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->type==0 or in_array('Admin.categorys.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.categorys.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.categoryList')}}">{{trans('langPanel.categoryList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.TitleComplaints.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.TitleComplaints.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.TitleComplaintList')}}">{{trans('langPanel.TitleComplaintList')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.FormCategoryController.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.FormCategoryController.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.FormCategoryList')}}">{{trans('langPanel.FormCategoryList')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.FormProductController.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.FormProductController.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.FormProductList')}}">{{trans('langPanel.FormProductList')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.FormModelController.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.FormModelController.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.FormModelList')}}">{{trans('langPanel.FormModelList')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.ColorController.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.ColorController.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.ColorList')}}">{{trans('langPanel.ColorList')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.ProblemController.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.ProblemController.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.ProblemList')}}">{{trans('langPanel.ProblemList')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type==0 or in_array('Admin.ProblemListController.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.ProblemEventController.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.ProblemEventList')}}">{{trans('langPanel.ProblemEventList')}}</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </li>

            <li class=" nav-item my"><a href="#"><i class="feather icon-shopping-bag"></i>
                    <span class="menu-title" data-i18n="{{trans('langPanel.shop')}}">{{trans('langPanel.shop')}}</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->type==0 or in_array('Admin.products.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.products.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.listProduct')}}">{{trans('langPanel.listProduct')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.shipments.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.shipments.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.listShipment')}}" >
                                      {{trans('langPanel.listShipment')}}
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item my">
                        <a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title"
                                                                                    data-i18n="{{trans('langPanel.Order')}}">{{trans('langPanel.Order')}}</span></a>
                        <ul class="menu-content">
                            @if(Auth::user()->type==0 or in_array('Admin.orders.index',$arrayPerm))
                                <li>
                                    <a href="{{route('Admin.orders.index')}}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-item"
                                              data-i18n="{{trans('langPanel.Allorders')}}">{{trans('langPanel.Allorders')}}</span>
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->type==0 or in_array('Admin.orders.new',$arrayPerm))
                                <li>
                                    <a href="{{route('Admin.orders.new')}}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-item"
                                              data-i18n="{{trans('langPanel.Neworders')}}">{{trans('langPanel.Neworders')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->type==0 or in_array('Admin.orders.confirmed',$arrayPerm))

                                <li>
                                    <a href="{{route('Admin.orders.confirmed')}}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-item"
                                              data-i18n="{{trans('langPanel.confirmedOrders')}}">{{trans('langPanel.confirmedOrders')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->type==0 or in_array('Admin.orders.posted',$arrayPerm))

                                <li>
                                    <a href="{{route('Admin.orders.posted')}}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-item"
                                              data-i18n="{{trans('langPanel.postedOrder')}}">{{trans('langPanel.postedOrder')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->type==0 or in_array('Admin.orders.delivered',$arrayPerm))
                                <li>
                                    <a href="{{route('Admin.orders.delivered')}}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-item"
                                              data-i18n="{{trans('langPanel.deliveredOrders')}}">{{trans('langPanel.deliveredOrders')}}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>

            <li class=" nav-item my">
                <a href="#"><i class="feather icon-more-horizontal">
                    </i><span class="menu-title"
                              data-i18n="{{trans('langPanel.others')}}">{{trans('langPanel.others')}}</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->type==0 or in_array('Admin.services.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.services.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.serviceList')}}">{{trans('langPanel.serviceList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.partners.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.partners.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.partnerList')}}">{{trans('langPanel.partnerList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.teams.index',$arrayPerm))

                        <li>
                            <a href="{{route('Admin.teams.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.teamList')}}">{{trans('langPanel.teamList')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.skills.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.skills.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.skillsList')}}">{{trans('langPanel.skillsList')}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class=" nav-item my"><a href="#">
                    <i class="feather icon-file-text"></i><span class="menu-title"
                                                                data-i18n="{{trans('langPanel.blog')}}">{{trans('langPanel.blog')}}</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->type==0 or in_array('Admin.blogs.create',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.blogs.create')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.blogInsert')}}">{{trans('langPanel.blogInsert')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.blogs.index',$arrayPerm))
                        <li>
                            <a href="{{route('Admin.blogs.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item"
                                      data-i18n="{{trans('langPanel.blogList')}}">{{trans('langPanel.blogList')}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item my">
                <a href="#">
                    <i class="feather icon-settings">
                    </i><span class="menu-title"
                              data-i18n="{{trans('langPanel.setting')}}">{{trans('langPanel.setting')}}</span>
                </a>
                <ul class="menu-content">
                    @if(\Illuminate\Support\Facades\Auth::user()->type==0 or in_array('Admin.users.profile.edit',$arrayPerm))

                        <li class=" nav-item"><a href="{{route('Admin.users.profile.edit')}}"><i
                                    class="feather icon-user"></i><span
                                    class="menu-title"
                                    data-i18n="{{trans('langPanel.profile')}}">{{trans('langPanel.profile')}}</span></a>

                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.settings.show',$arrayPerm))

                        <li class=" nav-item">
                            <a href="{{route('Admin.settings.show')}}">
                                <i class="feather icon-settings"></i>
                                <span class="menu-title"
                                      data-i18n="{{trans('langPanel.setting_old')}}">{{trans('langPanel.setting_old')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type==0 or in_array('Admin.users.index',$arrayPerm))

                        <li class="">
                            <a href="{{route('Admin.users.index',1)}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="{{trans('langPanel.listUser')}}">{{trans('langPanel.listUser')}}</span></a>
                        </li>
                    @endif
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->

@yield('content')
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
        opacity: 0.7;
        background-color: #ffffff36;
        z-index: 9999999;
    }

</style>
<div class="preLoader d-none" id="preloader">
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

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-right d-none d-md-block">طراحی و توسعه
            {{(isset($settings['titleSite']))?$settings['titleSite']:''}}
            <i class="feather icon-heart pink"></i> </span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->
<!-- BEGIN: Vendor JS-->

<script src="{{ asset('Admin/app-assets/vendors/js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/sweetalert.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/core/app.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/components.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/ui/data-list-view.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/spin.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/pages/invoice.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/axios.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/tinymce.min.js')}}"></script>
<script src="{{ asset('Admin/assets/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{ asset('Admin/assets/js/jquery.toast.js')}}"></script>
<script src="{{ asset('Admin/assets/js/spectrum.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/script.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/persian-datepicker.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/persian-date.min.js')}}"></script>


<script type="text/javascript">

    $(document).ajaxStart(function () {
        $('#preloader').removeClass('d-none');
    });

    $(document).ajaxStop(function () {
        $('#preloader').addClass('d-none');
    });
    $(document).ajaxError(function () {
        $('#preloader').addClass('d-none');
    });
</script>
<script type="text/javascript">

    $(".my").each(function () { // Check every "nested" class
        var th = this;
        if ($(th).find('.menu-content').children().length == 0) { // If this nested class has no children
            $(th).remove();
            // This will hide it, but not alter the layout
            // $(this).css("display", "none"); // This will alter the layout
        }
    });

    var url = window.location.href;
    $('.navigation  li').each(function () {

        var href = $(this).find('a').attr('href');
        if (url == href) {
            $(this).parents("li").addClass('sidebar-group-active open');
            $(this).addClass('active');
        }
    });


    function deleteRecord(urlSuccess) {
        Swal.fire({
            title: '{{trans('langPanel.are_you_sure?')}}',
            text: "{{trans('langPanel.you_will_not_be_able_to_restore_after_deletion')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{trans('langPanel.yes')}}',
            cancelButtonText: '{{trans('langPanel.cancel_operations')}}'
        }).then((result) => {
            if (result.value) {
                window.location.replace(urlSuccess)
            }
        })
    }

    function confirmation(urlSuccess) {
        Swal.fire({
            title: '{{trans('langPanel.are_you_sure?')}}',
            text: "{{trans('langPanel.Do_you_agree')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{trans('langPanel.yes')}}',
            cancelButtonText: '{{trans('langPanel.cancel_operations')}}'
        }).then((result) => {
            if (result.value) {
                window.location.replace(urlSuccess)
            }
        })
    }


    @if(!empty(session()->getOldInput()))
    var oldValus =
        {!!  json_encode(session()->getOldInput()) !!}

        $("[name='" + i + "']").val(oldValus[i]);
    @endif

    @isset($errors)
    var errors = {!! $errors !!};
    $.each(errors, function (index, value) {
        $("[name='" + index + "']").css('border-color', 'red');
        $("[data-id='" + index + "']").css('border-color', 'red');
    });
    @endisset
    //$(".tagsinput").tagsinput('items');
    tagBootstrap();

    function tagBootstrap() {
        $(".tagsinput").tagsinput({
            cancelConfirmKeysOnEmpty: true,
            confirmKeys: [13, 44]
        });
    }


</script>
<script type="text/javascript">
    function submitResult(e, id) {

        e.preventDefault();
        Swal.fire({
            title: 'آیا اطمینان دارید ؟',
            text: "در صورت تایید رکورد حذف خواهد شد",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'حذف',

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('Admin.menus.delete')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function (data) {
                        Swal.fire(
                            'با موفقیت حذف گردید!',
                            '',
                            'success'
                        )
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".Datepick").persianDatepicker({
            observer: true,
            format: "YYYY/MM/DD",
            initialValueType: "persian",
        });
    });

</script>
@yield("script")
</body>
<!-- END: Body-->
</html>
