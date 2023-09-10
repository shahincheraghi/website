@extends('Layouts.adminLayout')
@section('title')
    | {{trans('langPanel.editHomeContentInfo')}}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.panel')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.HomeContentInfo')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.editHomeContentInfo')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.editHomeContentInfo')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <form class="form-horizontal"
                                              action="{{route('Admin.HomeContentInfo.update',$data['HomeContentInfo']->id)}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.title')}}</label>
                                                        <input type="text" class="form-control" name="title"
                                                               id="title"
                                                               value="{{$data['HomeContentInfo']->title}}"
                                                        >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.subTitle')}}</label>
                                                        <input type="text" class="form-control" name="subTitle"
                                                               id="subTitle"
                                                               value="{{$data['HomeContentInfo']->subTitle}}"
                                                        >
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="keyHomeContent">{{trans('langPanel.keyHomeContent')}}</label>
                                                        <select name="keyHomeContent" class="form-control" id="keyHomeContent">
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'TextWithBackground' ? 'selected' : '' }} value="TextWithBackground">باکس متن با پشت زمینه</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'HomeBox2' ? 'selected' : '' }} value="HomeBox2">باکس ۳ قسمته</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'HomeBox3' ? 'selected' : '' }} value="HomeBox3">باکس متنی باعکس</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'HomeBox4' ? 'selected' : '' }} value="HomeBox4">اسلایدر لوگو</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'CompetitiveAdvantage' ? 'selected' : '' }} value="CompetitiveAdvantage"> مزیت رقابتی</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'QuickAccess' ? 'selected' : '' }} value="QuickAccess">دسترسی سریع</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'BusinessProcess' ? 'selected' : '' }} value="BusinessProcess">فرآیند کار</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'CustomersComment' ? 'selected' : '' }} value="CustomersComment">نظرات مشتریان</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'BigPicInLapTop' ? 'selected' : '' }} value="BigPicInLapTop">عکس با فریم لپتاپ</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'faq' ? 'selected' : '' }} value="faq">سوالات متداول</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'counter' ? 'selected' : '' }} value="counter">شمارنده</option>
                                                            <option {{ $data['HomeContentInfo']->keyHomeContent  == 'blog' ? 'selected' : '' }} value="blog">دانستنی ها</option>

                                                        </select>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="description"
                                                                  name="description"
                                                                  rows="3">{{$data['HomeContentInfo']->description}}</textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.text')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.status')}}</label>
                                                        <select name="status" class="form-control" id="basicInput">
                                                            <option value="1" {{ $data['HomeContentInfo']->status  == 1 ? 'selected' : '' }}>فعال</option>
                                                            <option value="3" {{ $data['HomeContentInfo']->status  == 3 ? 'selected' : '' }}>غیر فعال</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <button type="submit"
                                                    class="btn btn-primary">{{trans('langPanel.save_information')}}</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>

    <script>
            @isset($data['Faq']->category_id )
        var val ={!! $data['Faq']->category_id !!};
        $('#category option[value=' + val + ']').attr('selected', 'selected');
        @endisset
    </script>

@endsection
