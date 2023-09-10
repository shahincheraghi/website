@extends('Layouts.adminLayout')
@section('title')
    | تنظیمات
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
@endsection
@section('content')
    @php $arrayCity=[]@endphp
    @isset($settings['city_on_site_payment'])
        @php
            $arrayCity=json_decode($settings['city_on_site_payment'])
        @endphp
    @endisset
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{trans('langPanel.setting')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('Admin.index')}}">{{trans('langPanel.dashboard')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{trans('langPanel.setting')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12">

                            <form class="form-horizontal" action="{{route('Admin.settings.update')}}" method="POST" novalidate enctype="multipart/form-data">
                                @CSRF
                                <div class="container-fluid">
                                    <div style="justify-content: left" class="row  d-flex mb-3">
                                        <button type="submit"
                                                class="btn btn-primary">{{trans('langPanel.save_information')}}</button>
                                    </div>
                                </div>
                                <div class="card p-4">
                                    <div class="row w-100">
                                        <div class="alert alert-success w-100 text-center justify-content-center" role="alert">
                                            توجه : برای بالا بردن رتبه سایت در موتور جستجو لطفا اطلاعات زیر (درباره سایت) را تکمیل نمایید.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4 class="text-bold">درباره سایت</h4>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label
                                                for="nameSite">{{trans('langPanel.nameSite')}}</label>
                                            <input type="text" id="nameSite"
                                                   class="form-control"
                                                   name="setting[0][nameSite]"
                                                   value="{{(isset($settings['nameSite']))?$settings['nameSite']:''}}">

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label
                                                    for="titleSite">{{trans('langPanel.titleSite')}}</label>
                                                <input type="text"
                                                       id="titleSite"
                                                       class="form-control"
                                                       name="setting[0][titleSite]"
                                                       value="{{(isset($settings['titleSite']))?$settings['titleSite']:''}}"
                                                       aria-describedby="basic-addon12">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label
                                                for="domainSite">{{trans('langPanel.domainSite')}}</label>
                                            <input type="text"
                                                   id="domainSite"
                                                   class="form-control"
                                                   name="setting[0][domainSite]"
                                                   value="{{(isset($settings['domainSite']))?$settings['domainSite']:''}}">

                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <label
                                                        for="multiKeywordsSite">{{trans('langPanel.multiKeywordsSite')}}</label>
                                                    <input type="text"
                                                           id="multiKeywordsSite"
                                                           class="form-control"
                                                           data-role="tagsinput"
                                                           id="keywords"
                                                           name="setting[0][multiKeywordsSite]"
                                                           value="{{(isset($settings['multiKeywordsSite']))?$settings['multiKeywordsSite']:''}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label
                                                for="descriptionSite">{{trans('langPanel.descriptionSite')}}</label>
                                            <input type="text"
                                                   id="descriptionSite"
                                                   class="form-control"
                                                   name="setting[0][descriptionSite]"
                                                   value="{{(isset($settings['descriptionSite']))?$settings['descriptionSite']:''}}">

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="row m-3">
                                        <div class="col-12 justify-content-center d-flex ">
                                            <h4>فرم ها</h4>
                                        </div>
                                        <div
                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                            <p class="mb-0">{{trans('langPanel.formService')}}</p>
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="formService" value="1"
                                                   name="setting[0][formService]">
                                            <label class="custom-control-label"
                                                   for="formService">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                <span class="switch-icon-right"><i
                                                        class="feather icon-check"></i></span>
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                            <p class="mb-0">{{trans('langPanel.ListOfAgencies')}}</p>
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="ListOfAgencies" value="1"
                                                   name="setting[0][ListOfAgencies]">
                                            <label class="custom-control-label"
                                                   for="ListOfAgencies">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                <span class="switch-icon-right"><i
                                                        class="feather icon-check"></i></span>
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                            <p class="mb-0">{{trans('langPanel.formInsurance')}}</p>
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="formInsurance" value="1"
                                                   name="setting[0][formInsurance]">
                                            <label class="custom-control-label"
                                                   for="formInsurance">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                <span class="switch-icon-right"><i
                                                        class="feather icon-check"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4>فونت</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="changeFont">{{ trans('langPanel.CustomFont') }}</label>
                                                <select class="form-control" name="setting[0][CustomFont]" data-validation-required-message="" id="CustomFont">
                                                    <option value="IRANSansfanum" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'IRANSansfanum') selected @endif>IRANSansfanum</option>
                                                    <option value="dana" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'dana') selected @endif>dana</option>
                                                    <option value="Vazir" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'Vazir') selected @endif>Vazir</option>
                                                    <option value="yekan" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'yekan') selected @endif>yekan</option>
                                                    <option value="Sahel" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'Sahel') selected @endif>Sahel</option>
                                                    <option value="iranyekan" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'iranyekan') selected @endif>iranyekan</option>
                                                    <option value="iransansdn" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'iransansdn') selected @endif>iransansdn</option>
                                                    <option value="Shabnam" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'Shabnam') selected @endif>Shabnam</option>
                                                    <option value="Tanha" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'Tanha') selected @endif>Tanha</option>
                                                    <option value="aviny" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'aviny') selected @endif>aviny</option>
                                                    <option value="anjoman" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'anjoman') selected @endif>anjoman</option>
                                                    <option value="Koodak" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'Koodak') selected @endif>Koodak</option>
                                                    <option value="Nahid" @if(isset($settings['CustomFont']) && $settings['CustomFont'] == 'Nahid') selected @endif>Nahid</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4>اسکریپت</h4>
                                        </div>
                                        <div class="col-12">
                                            <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][scripts]"
                                                                  rows="3">{{(isset($settings['scripts']))?$settings['scripts']:''}}</textarea>
                                                <label
                                                    for="label-textarea">{{trans('langPanel.scripts')}}</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4>بنر تبلیغاتی</h4>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label
                                                for="linkBannerSlide">{{trans('langPanel.linkBannerSlide')}}</label>
                                            <input type="text" id="view_id"
                                                   class="form-control"
                                                   name="setting[0][linkBannerSlide]"
                                                   value="{{(isset($settings['linkBannerSlide']))?$settings['linkBannerSlide']:''}}">

                                        </div>
                                        <div class="d-flex align-items-end col-md-6 col-12">
                                            <div
                                                class="custom-control d-flex custom-switch custom-switch-success mr-2 mb-1">
                                                <p class="mb-0 pr-3"
                                                   style="width: fit-content">{{trans('langPanel.status')}}</p>
                                                <input type="checkbox"
                                                       value="1"
                                                       class="custom-control-input"
                                                       id="statusBannerSlide"
                                                       name="setting[0][statusBannerSlide]">
                                                <label class="custom-control-label"
                                                       for="statusBannerSlide">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                    <span class="switch-icon-right"><i
                                                            class="feather icon-check"></i></span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12 my-1">
                                            @isset($settings['imgBannerSlide'])
                                                <img src="/{{$settings['imgBannerSlide']}}" width="95%"
                                                     height="80px">
                                                <a href="{{route('Admin.settings.deleteImg','imgBannerSlide')}}">
                                                    <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                            type="button"><i class="fa fa-close"></i></button>
                                                </a>
                                            @endisset
                                        </div>
                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label
                                                    for="imgBannerSlide">{{trans('langPanel.imgBannerSlide')}}</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input "
                                                           name="setting[0][imgBannerSlide]"
                                                           id="imgBannerSlide">
                                                    <label class="custom-file-label"
                                                           for="imgBannerSlide">{{trans('langPanel.imgBannerSlide')}}</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                </div>
                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4>دکمه ویژه منو</h4>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label
                                                for="linkBannerSlide">{{trans('langPanel.titleBtnMenu')}}</label>
                                            <input type="text" id="view_id"
                                                   class="form-control"
                                                   name="setting[0][titleBtnMenu]"
                                                   value="{{(isset($settings['titleBtnMenu']))?$settings['titleBtnMenu']:''}}">

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label
                                                for="linkBannerSlide">{{trans('langPanel.linkBannerSlide')}}</label>
                                            <input type="text" id="view_id"
                                                   class="form-control"
                                                   name="setting[0][linkBtnMenu]"
                                                   value="{{(isset($settings['linkBtnMenu']))?$settings['linkBtnMenu']:''}}">

                                        </div>

                                    </div>

                                </div>
                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4>آیکن های سایت</h4>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-12">
                                                @isset($settings['faviconTop'])
                                                    <img src="/{{$settings['faviconTop']}}" width="100px" height="50px"
                                                         alt="favIcon">
                                                @endisset
                                                <fieldset class="form-group">
                                                    <label
                                                        for="faviconTop">{{trans('langPanel.faviconTop')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input "
                                                               name="setting[0][faviconTop]"
                                                               id="faviconTop">
                                                        <label class="custom-file-label"
                                                               for="inputGroupFile01">{{trans('langPanel.choose_file')}}</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-12">
                                                @isset($settings['loader'])
                                                    <img src="/{{$settings['loader']}}" width="50px" height="50px">

                                                @endisset
                                                <fieldset class="form-group">
                                                    <label
                                                        for="basicInputFile">{{trans('langPanel.loader')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input "
                                                               name="setting[0][loader]"
                                                               id="loader">
                                                        <label class="custom-file-label"
                                                               for="loader">{{trans('langPanel.choose_file')}}</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-12">
                                                @isset($settings['favicon'])
                                                    <img src="/{{$settings['favicon']}}" width="100px" height="50px">

                                                @endisset
                                                <fieldset class="form-group">
                                                    <label
                                                        for="basicInputFile">{{trans('langPanel.favicon')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input "
                                                               name="setting[0][favicon]"
                                                               id="inputGroupFile01">
                                                        <label class="custom-file-label"
                                                               for="inputGroupFile01">{{trans('langPanel.choose_file')}}</label>
                                                    </div>
                                                </fieldset>
                                            </div>

                                                <div class="col-md-4 col-lg-4 col-12">
                                                @isset($settings['favicon_second'])
                                                    <img src="/{{$settings['favicon_second']}}" width="100px"
                                                         height="50px">
                                                @endisset
                                                <fieldset class="form-group">
                                                    <label
                                                        for="basicInputFile">{{trans('langPanel.favicon_second')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input "
                                                               name="setting[0][favicon_second]"
                                                               id="inputGroupFile01">
                                                        <label class="custom-file-label"
                                                               for="inputGroupFile01">{{trans('langPanel.choose_file')}}</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">

                                        </div>


                                    </div>
                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4>قالب سایت</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-12 d-flex justify-content-center">
                                            <nav class="navButton">
                                                <input type="radio" id="cyan" value="cyan" name="setting[0][themeColorSite]"/>
                                                <label class="cyan" for="cyan"><i class="fa fa-check"></i></label>

                                                <input type="radio" id="default" value="default" name="setting[0][themeColorSite]"/>
                                                <label class="default" for="default"><i class="fa fa-check"></i></label>

                                                <input type="radio" id="green" value="green" name="setting[0][themeColorSite]"/>
                                                <label class="green" for="green"><i class="fa fa-check"></i></label>

                                                <input type="radio" value="purple" id="purple" name="setting[0][themeColorSite]"/>
                                                <label class="purple" for="purple"><i class="fa fa-check"></i></label>


                                                <input type="radio" id="red" name="setting[0][themeColorSite]" value="red"/>
                                                <label class="red" for="red"><i class="fa fa-check"></i></label>


                                                <input type="radio" id="skobleoff" value="skobleoff" name="setting[0][themeColorSite]"/>
                                                <label class="skobleoff" for="skobleoff"><i class="fa fa-check"></i></label>


                                                <input type="radio" value="skyblue" id="skyblue" name="setting[0][themeColorSite]"/>
                                                <label class="skyblue" for="skyblue"><i class="fa fa-check"></i></label>


                                                <input type="radio" id="slateblue" value="slateblue" name="setting[0][themeColorSite]"/>
                                                <label class="slateblue" for="slateblue"><i class="fa fa-check"></i></label>


                                                <input type="radio" id="yellow" value="yellow" name="setting[0][themeColorSite]"/>
                                                <label class="yellow" for="yellow"><i class="fa fa-check"></i></label>

                                                <!-- as many choices as you like -->
                                            </nav>
                                        </div>

                                    </div>

                                    <div class="row">

                                    </div>

                                </div>
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header">
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <p>{{trans('langPanel.color_selection')}}</p>


                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">{{trans('langPanel.show_special_services_in_the_list_of_services')}}
                                                        </label>
                                                        <select class="form-control" name="setting[0][specialservice]"
                                                                data-validation-required-message=""
                                                                id="specialservice">
                                                            <option value="0">{{trans('langPanel.yes')}}
                                                            </option>
                                                            <option value="1">{{trans('langPanel.no')}}
                                                            </option>
                                                        </select>
                                                    </fieldset>




                                                    @isset($settings['slideImg'])
                                                        <img src="/{{$settings['slideImg']}}" width="50px"
                                                             height="50px">

                                                        <a href="{{route('Admin.settings.deleteImg','slideImg')}}">
                                                            <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                                    type="button"><i class="fa fa-close"></i></button>
                                                        </a>

                                                    @endisset


                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">عکس صفحه درباره ما</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input "
                                                                   name="setting[0][slideImg]"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">عکس صفحه درباره ما</label>
                                                        </div>
                                                    </fieldset>

                                                    @isset($settings['infoImage'])
                                                        <img src="/{{$settings['infoImage']}}" width="50px"
                                                             height="50px">
                                                        <a href="{{route('Admin.settings.deleteImg','infoImage')}}">
                                                            <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                                    type="button"><i class="fa fa-close"></i></button>
                                                        </a>
                                                    @endisset
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">پس زمینه صفحه همه محصولات</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input "
                                                                   name="setting[0][infoImage]"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">پس زمینه صفحه همه
                                                                محصولات</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">


                                                    @isset($settings['faqImage'])
                                                        <img src="/{{$settings['faqImage']}}" width="50px"
                                                             height="50px">
                                                        <a href="{{route('Admin.settings.deleteImg','faqImage')}}">
                                                            <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                                    type="button"><i class="fa fa-close"></i></button>
                                                        </a>
                                                    @endisset
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">{{trans('langPanel.image_faqs')}}</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input "
                                                                   name="setting[0][faqImage]"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{trans('langPanel.image_faqs')}}</label>
                                                        </div>
                                                    </fieldset>
                                                    @isset($settings['videoImage'])
                                                        <img src="/{{$settings['videoImage']}}" width="50px"
                                                             height="50px">
                                                        <a href="{{route('Admin.settings.deleteImg','videoImage')}}">
                                                            <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                                    type="button"><i class="fa fa-close"></i></button>
                                                        </a>
                                                    @endisset
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">عکس پس زمینه تماس با ما</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input "
                                                                   name="setting[0][videoImage]"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">تماس با ما</label>
                                                        </div>
                                                    </fieldset>

                                                    @isset($settings['breadcrumbImage'])
                                                        <img src="/{{$settings['breadcrumbImage']}}" width="50px"
                                                             height="50px">
                                                        <a href="{{route('Admin.settings.deleteImg','breadcrumbImage')}}">
                                                            <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                                    type="button"><i class="fa fa-close"></i></button>
                                                        </a>
                                                    @endisset
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">{{trans('langPanel.breadcrumbImage')}}</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input "
                                                                   name="setting[0][breadcrumbImage]"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{trans('langPanel.breadcrumbImage')}}</label>
                                                        </div>
                                                    </fieldset>


                                                    @isset($settings['skillImage'])
                                                        <img src="/{{$settings['skillImage']}}" width="50px"
                                                             height="50px">
                                                        <a href="{{route('Admin.settings.deleteImg','skillImage')}}">
                                                            <button class="btn btn-warning btn-sm pr-1 pl-1 "
                                                                    type="button"><i class="fa fa-close"></i></button>
                                                        </a>
                                                    @endisset
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">عکس پس زمینه درباره ما</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input "
                                                                   name="setting[0][skillImage]"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">عکس پس زمینه درباره ما</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][skillInfo]"
                                                                  rows="3">{{(isset($settings['skillInfo']))?$settings['skillInfo']:''}}</textarea>
                                                        <label for="label-textarea">
                                                            متن پارالاکس در صفحه اصلی
                                                        </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][serviceInfo]"
                                                                  rows="3">{{(isset($settings['serviceInfo']))?$settings['serviceInfo']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.serviceInfo')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][commentInfo]"
                                                                  rows="3">{{(isset($settings['commentInfo']))?$settings['commentInfo']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.commentInfo')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][teamInfo]"
                                                                  rows="3">{{(isset($settings['teamInfo']))?$settings['teamInfo']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.teamInfo')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][blogInfo]"
                                                                  rows="3">{{(isset($settings['blogInfo']))?$settings['blogInfo']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.blogInfo')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][contactInfo]"
                                                                  rows="3">{{(isset($settings['contactInfo']))?$settings['contactInfo']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.contactInfo')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][aboutInfo]"
                                                                  rows="3">{{(isset($settings['aboutInfo']))?$settings['aboutInfo']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.aboutInfo')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][metatag]"
                                                                  rows="3">{{(isset($settings['metatag']))?$settings['metatag']:''}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.metaTag')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="setting[0][keywords]"
                                                                  rows="3">{{ (isset($settings['keywords']))?$settings['keywords']:'' }}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.keyWords')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                        >{{trans('langPanel.mobile')}}</label>
                                                        <input type="number" class="form-control"
                                                               name="setting[0][mobile]"
                                                               value="{{(isset($settings['mobile']))?$settings['mobile']:''}}"
                                                               aria-describedby="basic-addon12">
                                                    </fieldset>
                                                </div>

                                                <div class="col-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                        >{{trans('langPanel.phone')}}</label>
                                                        <input type="number" class="form-control"
                                                               name="setting[0][phone]"
                                                               value="{{(isset($settings['phone']))?$settings['phone']:''}}"
                                                               aria-describedby="basic-addon12">
                                                    </fieldset>
                                                </div>

                                                <div class="col-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                        >{{trans('langPanel.email')}}</label>
                                                        <input type="email" class="form-control"
                                                               name="setting[0][email]"
                                                               value="{{(isset($settings['email']))?$settings['email']:''}}"
                                                               aria-describedby="basic-addon12">
                                                    </fieldset>
                                                </div>
                                                <div class="col-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                        >{{trans('langPanel.address')}}</label>
                                                        <input type="text" class="form-control"
                                                               name="setting[0][address]"
                                                               value="{{(isset($settings['address']))?$settings['address']:''}}"
                                                               aria-describedby="basic-addon12">
                                                    </fieldset>
                                                </div>

{{--                                                                                                <div class="col-md-6 ">--}}
{{--                                                                                                    <fieldset class="form-group"--}}
{{--                                                                                                              style="margin-top: -20px;">--}}
{{--                                                                                                        <label--}}
{{--                                                                                                            for="store_city">{{trans('langPanel.store_city')}}--}}
{{--                                                                                                        </label>--}}
{{--                                                                                                        <select class="form-control select2"--}}
{{--                                                                                                                name="setting[0][store_city]"--}}

{{--                                                                                                                id="store_city">--}}
{{--                                                                                                            @foreach($cities as $city)--}}
{{--                                                                                                                <option--}}
{{--                                                                                                                    value="{{$city->id}}">{{$city->province}}--}}
{{--                                                                                                                    - {{$city->name}}</option>--}}
{{--                                                                                                            @endforeach--}}
{{--                                                                                                        </select>--}}
{{--                                                                                                    </fieldset>--}}
{{--                                                                                                </div>--}}

                                                <div class="col-md-6 ">
                                                    <div class="form-label-group">
                                                        <input type="text"
                                                               id="store_zip_code"
                                                               class="form-control"
                                                               name="setting[0][store_zip_code]"
                                                               value="{{(isset($settings['store_zip_code']))?$settings['store_zip_code']:''}}">
                                                        <label
                                                            for="store_zip_code">{{trans('langPanel.store_zip_code')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-label-group">
                                                        <input type="text" id="store_fax"
                                                               class="form-control"
                                                               name="setting[0][store_fax]"
                                                               value="{{(isset($settings['store_fax']))?$settings['store_fax']:''}}">
                                                        <label
                                                            for="store_fax">{{trans('langPanel.store_fax')}}</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6 ">
                                                    <div class="form-label-group">
                                                        <input type="text" id="instagram"
                                                               class="form-control"
                                                               name="setting[0][instagram]"
                                                               value="{{(isset($settings['instagram']))?$settings['instagram']:''}}">
                                                        <label
                                                            for="instagram">{{trans('langPanel.instagram')}}</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <div class="form-label-group">
                                                        <input type="text" id="telegram"
                                                               class="form-control"
                                                               name="setting[0][telegram]"
                                                               value="{{(isset($settings['telegram']))?$settings['telegram']:''}}">
                                                        <label
                                                            for="telegram">{{trans('langPanel.telegram')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-label-group">
                                                        <input type="text" id="lat"
                                                               class="form-control"
                                                               name="setting[0][lat]"
                                                               value="{{(isset($settings['lat']))?$settings['lat']:''}}">
                                                        <label
                                                            for="lat">{{trans('langPanel.lat')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-label-group">
                                                        <input type="text" id="lng"
                                                               class="form-control"
                                                               name="setting[0][lng]"
                                                               value="{{(isset($settings['lng']))?$settings['lng']:''}}">
                                                        <label
                                                            for="lng">{{trans('langPanel.lng')}}</label>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 col-12">

                                                    <div
                                                        class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                        <p class="mb-0">{{trans('langPanel.activate_zarrinPal_payment_gateway')}}</p>
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               id="activate_zarrinPal_payment_gateway"
                                                               value="1"
                                                               name="setting[0][activate_zarrinPal_payment_gateway]">
                                                        <label class="custom-control-label"
                                                               for="activate_zarrinPal_payment_gateway"></label>
                                                    </div>

                                                </div>
                                                <div class="col-md-9 col-12">
                                                    <div class="form-label-group">
                                                        <input type="text"
                                                               id="merchant_zarinpal"
                                                               class="form-control"
                                                               name="setting[0][merchant_zarinpal]"
                                                               value="{{(isset($settings['merchant_zarinpal']))?$settings['merchant_zarinpal']:''}}">
                                                        <label
                                                            for="merchant_zarinpal">{{trans('langPanel.merchant_zarinpal')}}</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-12">

                                                    <div
                                                        class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                        <p class="mb-0">{{trans('langPanel.activate_idpay_payment_gateway')}}</p>
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               id="idpay_active" value="1"
                                                               name="setting[0][idpay_active]">
                                                        <label class="custom-control-label"
                                                               for="idpay_active"></label>
                                                    </div>

                                                </div>

                                                <div class="col-md-9 col-12">
                                                    <div class="form-label-group">
                                                        <input type="text" id="merchant"
                                                               class="form-control"
                                                               name="setting[0][merchant_idpay]"
                                                               value="{{(isset($settings['merchant_idpay']))?$settings['merchant_idpay']:''}}">
                                                        <label
                                                            for="merchant">{{trans('langPanel.merchant')}}</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-3 col-12">

                                                    <div
                                                        class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                        <p class="mb-0">{{trans('langPanel.enable_on_site_payment')}}</p>
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               id="enable_on_site_payment"
                                                               value="1"
                                                               name="setting[0][enable_on_site_payment]">
                                                        <label class="custom-control-label"
                                                               for="enable_on_site_payment"></label>
                                                    </div>

                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-label-group">
                                                        <input type="text"
                                                               id="minimum_orde_amount_paid_spot"
                                                               class="form-control"
                                                               name="setting[0][minimum_orde_amount_paid_spot]"
                                                               value="{{(isset($settings['minimum_orde_amount_paid_spot']))?$settings['minimum_orde_amount_paid_spot']:''}}">
                                                        <label
                                                            for="minimum_orde_amount_paid_spot">{{trans('langPanel.minimum_orde_amount_paid_spot')}}</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group"
                                                              style="margin-top: -20px;">
                                                        <label
                                                            for="city_on_site_payment">{{trans('langPanel.city_on_site_payment')}}
                                                        </label>
                                                        <select class="form-control select2"
                                                                name="setting[0][city_on_site_payment][]"
                                                                multiple
                                                                id="city_on_site_payment">
                                                            {{--                                                            @foreach($cities as $city)--}}
                                                            {{--                                                                <option--}}
                                                            {{--                                                                    value="{{$city->id}}" {{(in_array($city->id,$arrayCity) ? 'selected':'')}} >{{$city->province}}--}}
                                                            {{--                                                                    - {{$city->name}}</option>--}}
                                                            {{--                                                            @endforeach--}}
                                                        </select>
                                                    </fieldset>
                                                </div>

                                            </div>


                                            <section id="switch-icons">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="d-flex justify-content-start flex-wrap">

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.service')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   value="1" name="setting[0][service]"
                                                                                   id="service">
                                                                            <label class="custom-control-label"
                                                                                   for="service">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.about')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="about" value="1"
                                                                                   name="setting[0][about]">
                                                                            <label class="custom-control-label"
                                                                                   for="about">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>


                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.product')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="product" value="1"
                                                                                   name="setting[0][product]">
                                                                            <label class="custom-control-label"
                                                                                   for="product">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.blog')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="blog" value="1"
                                                                                   name="setting[0][blog]">
                                                                            <label class="custom-control-label"
                                                                                   for="blog">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.faq')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input" id="faq"
                                                                                   value="1" name="setting[0][faq]">
                                                                            <label class="custom-control-label"
                                                                                   for="faq">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.contact')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="contact" value="1"
                                                                                   name="setting[0][contact]">
                                                                            <label class="custom-control-label"
                                                                                   for="contact">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.team')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="team" value="1"
                                                                                   name="setting[0][team]">
                                                                            <label class="custom-control-label"
                                                                                   for="team">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.skills')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="skill" value="1"
                                                                                   name="setting[0][skill]">
                                                                            <label class="custom-control-label"
                                                                                   for="skill">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.comment')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="comment" value="1"
                                                                                   name="setting[0][comment]">
                                                                            <label class="custom-control-label"
                                                                                   for="comment">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.counter')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="counter" value="1"
                                                                                   name="setting[0][counter]">
                                                                            <label class="custom-control-label"
                                                                                   for="counter">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                                            <p class="mb-0">{{trans('langPanel.partner')}}</p>
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   id="partner" value="1"
                                                                                   name="setting[0][partner]">
                                                                            <label class="custom-control-label"
                                                                                   for="partner">
                                                                                <span class="switch-icon-left"><i
                                                                                        class="feather icon-check"></i></span>
                                                                                <span class="switch-icon-right"><i
                                                                                        class="feather icon-check"></i></span>
                                                                            </label>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <div class="row">
                                                <div class="col-md-6 col-12"
                                                     style="    margin-top: 20px;">
                                                    <div class="form-label-group">
                                                        <input type="text" id="view_id"
                                                               class="form-control"
                                                               name="setting[0][view_id]"
                                                               value="{{(isset($settings['view_id']))?$settings['view_id']:''}}">
                                                        <label
                                                            for="view_id">{{trans('langPanel.view_id')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-label-group">

                                                        <fieldset class="form-group">
                                                            <label
                                                                for="basicInputFile">{{trans('langPanel.google_analytics')}}</label>
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                       class="custom-file-input "
                                                                       name="setting[0][google_analytics]"
                                                                       id="google_analytics">
                                                                <label
                                                                    class="custom-file-label"
                                                                    for="google_analytics">{{trans('langPanel.google_analytics')}}</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">


                                <button type="submit" class="btn btn-primary">{{trans('langPanel.save_information')}}</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                <!-- Input Validation end -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript">
        // =======================statusBannerTopMenu=========================
        @isset($settings['statusBannerSlide'] )
        const statusBannerSlide = {!! $settings['statusBannerSlide'] !!};
        if (statusBannerSlide === 1)
            $('#statusBannerSlide').attr('checked', true);
        @endisset
        // =======================statusBannerTopMenu=========================


        // =======================formService=========================
        @isset($settings['formService'] )
        const formService = {!! $settings['formService'] !!};
        if (formService === 1)
            $('#formService').attr('checked', true);
        @endisset
        // =======================formService=========================


        // =======================ListOfAgencies=========================
        @isset($settings['ListOfAgencies'] )
        const ListOfAgencies = {!! $settings['ListOfAgencies'] !!};
        if (ListOfAgencies === 1)
            $('#ListOfAgencies').attr('checked', true);
        @endisset
        // =======================ListOfAgencies=========================


        // =======================formInsurance=========================
        @isset($settings['formInsurance'] )
        const formInsurance = {!! $settings['formInsurance'] !!};
        if (formInsurance === 1)
            $('#formInsurance').attr('checked', true);
        @endisset
        // =======================formInsurance=========================


        @isset($settings['color'] )
        var val = {!! $settings['color'] !!};
        $('#colors option[value=' + val + ']').attr('selected', 'selected');
        @endisset

        @isset($settings['specialservice'] )
        var val = {!! $settings['specialservice'] !!};
        $('#specialservice option[value=' + val + ']').attr('selected', 'selected');
        @endisset


        @isset($settings['changeFont'] )
        var val = {!! $settings['changeFont'] !!};
        $('#changeFont option[value=' + val + ']').attr('selected', 'selected');
        @endisset


        @isset($settings['them_box'] )
        var val = {!! $settings['them_box'] !!};
        $('#them_box option[value=' + val + ']').attr('selected', 'selected');
        @endisset

        @isset($settings['bg_box'] )
        var bg_box = {!! $settings['bg_box'] !!};
        $('#bg_box_' + val).attr('checked', true);
        @endisset

        @isset($settings['service'] )
        const service = {!! $settings['service'] !!};
        if (service === 1)
            $('#service').attr('checked', true);
        @endisset


        @isset($settings['about'] )
        const about = {!! $settings['about'] !!};
        if (about === 1)
            $('#about').attr('checked', true);
        @endisset


        @isset($settings['product'] )
        const product = {!! $settings['product'] !!};
        if (product === 1)
            $('#product').attr('checked', true);
        @endisset




        @isset($settings['blog'] )
        const blog = {!! $settings['blog'] !!};
        if (blog === 1)
            $('#blog').attr('checked', true);
        @endisset


        @isset($settings['faq'] )
        const faq = {!! $settings['faq'] !!};
        if (faq === 1)
            $('#faq').attr('checked', true);
        @endisset

        @isset($settings['contact'] )
        const contact = {!! $settings['contact'] !!};
        if (contact === 1)
            $('#contact').attr('checked', true);
        @endisset

        @isset($settings['team'] )
        const team = {!! $settings['team'] !!};
        if (team === 1)
            $('#team').attr('checked', true);
        @endisset

        @isset($settings['skill'] )
        const skill = {!! $settings['skill'] !!};
        if (skill === 1)
            $('#skill').attr('checked', true);
        @endisset


        @isset($settings['comment'] )
        const comment = {!! $settings['comment'] !!};
        if (comment === 1)
            $('#comment').attr('checked', true);
        @endisset


        @isset($settings['counter'] )
        const counter = {!! $settings['counter'] !!};
        if (counter === 1)
            $('#counter').attr('checked', true);
        @endisset


        @isset($settings['partner'] )
        const partner = {!! $settings['partner'] !!};
        if (partner == 1)
            $('#partner').attr('checked', true);
        @endisset

        @isset($settings['store_city'] )
        var store_city = {!! $settings['store_city']!!};
        $('#store_city option[value=' + store_city + ']').attr('selected', 'selected');
        @endisset

        @isset($settings['enable_on_site_payment'] )
        const enable_on_site_payment = {!! $settings['enable_on_site_payment'] !!};
        if (enable_on_site_payment === 1)
            $('#enable_on_site_payment').attr('checked', true);
        @endisset


        @isset($settings['idpay_active'] )
        const idpay_active = {!! $settings['idpay_active'] !!};
        if (idpay_active === 1)
            $('#idpay_active').attr('checked', true);
        @endisset


        @isset($settings['activate_zarrinPal_payment_gateway'] )
        const activate_zarrinPal_payment_gateway = {!! $settings['activate_zarrinPal_payment_gateway'] !!};
        if (activate_zarrinPal_payment_gateway === 1)
            $('#activate_zarrinPal_payment_gateway').attr('checked', true);
        @endisset

    </script>
    <script type="text/javascript">
        $('form').on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
    </script>
@endsection
