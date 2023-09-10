@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.sliderEdit')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.slider')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">{{trans('langPanel.sliderEdit')}}</a>
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
                                    <h4 class="card-title">{{trans('langPanel.sliderEdit')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('Admin.sliders.update',$data['Slider']->id)}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.title')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="title" class="form-control"
{{--                                                                   data-validation-required-message="{{trans('langPanel.titleInput')}}"--}}
                                                                   placeholder="{{trans('langPanel.titleInput')}}"
{{--                                                                   required --}}
                                                                   value="{{$data['Slider']->title}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.link')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="link" class="form-control"
{{--                                                                   data-validation-required-message="{{trans('langPanel.titleInput')}}"--}}
                                                                   placeholder="{{trans('langPanel.link')}}"
{{--                                                                   required --}}
                                                                   value="{{$data['Slider']->link}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.titleBtn')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="titleBtn" class="form-control"
                                                                   {{--                                                                   data-validation-required-message="{{trans('langPanel.titleInput')}}"--}}
                                                                   placeholder="{{trans('langPanel.titleBtn')}}"
                                                                   {{--                                                                   required --}}
                                                                   value="{{$data['Slider']->titleBtn}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-12">
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">{{trans('langPanel.choose_file')}}</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   id="inputGroupFile01" name="file">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{trans('langPanel.upload')}}</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="media mb-2">
                                                    <a class="mr-2 my-25">
                                                        <img src="/{{$data['Slider']->image}}"
                                                             alt="{{$data['Slider']->title}}"
                                                             class="users-avatar-shadow rounded" height="90" >
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-label-group">
                                                        <textarea class="form-control" id="label-textarea" name="text"
                                                                  rows="3"
                                                                  placeholder="{{trans('langPanel.text')}}">{{$data['Slider']->text}}</textarea>
                                                        <label for="label-textarea">{{trans('langPanel.text')}}</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group"
                                                              style="margin-top: -20px;">
                                                        <label for="exampleColorInput" class="form-label">رنگ متن</label>
                                                        <input type="color" class="form-control form-control-color" name="colorTextSlider" id="exampleColorInput" value="#563d7c" title="Choose your color">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-2 offset-md-10">
                                                <button type="submit"
                                                        class="btn btn-primary">{{trans('langPanel.update')}}</button>
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

@section('script')


@endsection

