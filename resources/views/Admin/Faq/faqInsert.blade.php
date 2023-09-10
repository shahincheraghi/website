@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.faqInsert')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.faq')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.faqInsert')}}</a>
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
                                    <h4 class="card-title">{{trans('langPanel.faqInsert')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{route('Admin.faqs.store')}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.title')}}</label>
                                                        <input type="text" class="form-control" name="title"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>

{{--                                                <div class="col-md-6">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>{{trans('langPanel.category')}}</label>--}}
{{--                                                        <div class="controls">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <select class=" select2 form-control" name="category">--}}
{{--                                                                    @foreach($data['Category'] as $Category)--}}
{{--                                                                        <option--}}
{{--                                                                            value="{{$Category->id}}">{{$Category->title}}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                            </div>
                                              <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea"
                                                                  name="text"
                                                                  rows="3"></textarea>
                                                        <label
                                                            for="label-textarea">{{trans('langPanel.text')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="stateInHomePage">{{trans('langPanel.status')}}</label>
                                                        <select name="stateInHomePage" class="form-control" id="stateInHomePage">
                                                            <option value="1">فعال</option>
                                                            <option value="0">غیر فعال</option>
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
