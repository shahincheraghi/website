@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.insertTextWithBackground')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.TextWithBackground')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.insertTextWithBackground')}}</a>
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
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.insertTextWithBackground')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{route('Admin.TextWithBackground.store')}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.title')}}</label>
                                                        <input required type="text" class="form-control" name="title"
                                                               id="title" >
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div hidden class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label hidden for="basicInput">نوع محتوا</label>
                                                        <input required type="text"  value="1" hidden class="form-control" name="type"
                                                               id="type" >
                                                    </fieldset>
                                                </div>

                                            </div>

                                            <div class="row">
                                            <div class="col-md-12 col-12">
                                                <fieldset class="form-group">
                                                    <label
                                                        for="basicInputFile">{{trans('langPanel.image')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input w-100"
                                                               id="inputGroupFile01" name="path"/>
                                                        <label class="custom-file-label"
                                                               for="inputGroupFile01">عکس خود را انتخاب نمایید</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="link">{{trans('langPanel.link')}}</label>
                                                        <input type="text" class="form-control" name="link"
                                                               id="link" >
                                                    </fieldset>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="description"
                                                                  name="description"
                                                                  rows="3"></textarea>
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
                                                            <option value="1">فعال</option>
                                                            <option value="3">غیر فعال</option>
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
                <!-- Input Validation end -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
@endsection
