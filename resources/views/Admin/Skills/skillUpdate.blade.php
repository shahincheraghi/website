@extends('Layouts.adminLayout')
@section('title')
    | {{trans('langPanel.skill_editing')}}
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
                            <h2 class="content-header-title float-left mb-0">{{trans('langPanel.skill_editing')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('Admin.index')}}">{{trans('langPanel.dashboard')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{trans('langPanel.skill_editing')}}
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
                                    {{--                                    <h4 class="card-title">{{trans('langPanel.select_theme')}}</h4>--}}
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal"
                                              action="{{route('Admin.skills.update',$data['skill']->id)}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.title')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['skill']->title}}" name="title"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.icons')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['skill']->icon}}" name="icon"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.percent')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['skill']->percent}}" name="percent"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInput">{{trans('langPanel.description')}}</label>
                                                        <input type="text" class="form-control"
                                                               name="description" id="basicInput"
                                                               value="{{$data['skill']->description}}">
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
