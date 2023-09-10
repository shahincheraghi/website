@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.sliderInsert')}}
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
                                    <li class="breadcrumb-item">
                                        <a href="#">{{trans('langPanel.panel')}}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">{{trans('langPanel.slider')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">{{trans('langPanel.sliderInsert')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height row justify-content-center">
                        <div class=" col-md-10 col-12">
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.sliderInsert')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('Admin.sliders.store')}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <input type="text" name="title" class="form-control"
{{--                                                                   data-validation-required-message="{{trans('langPanel.titleInput')}}"--}}
                                                                   placeholder="{{trans('langPanel.titleInput')}}"
{{--                                                                   required--}}
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <input type="text" name="link" class="form-control"
                                                                   {{--                                                                   data-validation-required-message="{{trans('langPanel.titleInput')}}"--}}
                                                                   placeholder="{{trans('langPanel.link')}}"
                                                                {{--                                                                   required--}}
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <input type="text" id="" name="titleBtn" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.titleBtn')}}"
                                                                   placeholder="{{trans('langPanel.titleBtn')}}"
                                                                {{--                                                                   required--}}
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea" name="text"
                                                                  rows="3"
                                                                  placeholder="{{trans('langPanel.text')}}"></textarea>
                                                        <label for="label-textarea">{{trans('langPanel.text')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div  class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group"
                                                              style="margin-top: -20px;">
                                                        <label for="exampleColorInput" class="form-label">رنگ متن</label>
                                                        <input type="color"  class="form-control form-control-color" name="colorTextSlider" id="exampleColorInput" value="#0B0B0B" title="Choose your color">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <fieldset class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   id="inputGroupFile01" name="file">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">آپلود عکس اسلایدر</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-md-2 offset-md-10">
                                                <button type="submit"
                                                        class="btn btn-primary">{{trans('langPanel.insert')}}</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->
            </div>
        </div>
    </div>
@endsection
