@extends('Layouts.adminLayout')
@section('title')
    | {{trans('langPanel.service_editing')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.service')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.service_editing')}}</a>
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
                                    <h4 class="card-title">{{trans('langPanel.service_editing')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal"
                                              action="{{route('Admin.services.update',$data['service']->id)}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.title')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['service']->title}}" name="title"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.icons')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['service']->icon}}" name="icon"
                                                               placeholder="fa fa-clock"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.category')}}</label>
                                                        <div class="controls">
                                                            <div class="form-group">
                                                                <select class="select2 form-control" name="category"
                                                                        id="category">
                                                                    @foreach($data['Categorys'] as $Category)

                                                                        <option
                                                                            value="{{$Category->id}}">{{$Category->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">{{trans('langPanel.select_the_file')}}
                                                            (555*408)
                                                            <img src="/{{$data['service']->image}}" width="36px"
                                                                 height="36px">
                                                        </label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input " name="image"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{trans('langPanel.choose_file')}}</label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.Display_as_a_special_home_top_service')}}</label>
                                                        <div class="controls">
                                                            <fieldset>
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox"
                                                                           id="checkbox1" {{($data['service']->special_service==1)?'checked=checked':''}} value="1" name="special_service">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                           <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">{{trans('langPanel.yes')}}</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                       <textarea id="full-featured-non1" class="fullpremium"
                                                 name="text">
{{$data['service']->text}}
                                       </textarea>
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
