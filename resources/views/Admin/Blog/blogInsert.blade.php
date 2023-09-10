@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.blogInsert')}}
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/bootstrap-tagsinput.css') }}"/>
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.blog')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">{{trans('langPanel.blogInsert')}}</a>
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
                                    <h4 class="card-title">{{trans('langPanel.blogInsert')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('Admin.blogs.store')}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.title')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="title" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.inputTitle')}}"
                                                                   placeholder="{{trans('langPanel.inputTitle')}}"
                                                                   required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.author_name')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="author_name" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.inputauthor_name')}}"
                                                                   placeholder="{{trans('langPanel.inputauthor_name')}}"
                                                                   required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.category')}}</label>
                                                        <div class="controls">
                                                            <div class="form-group">
                                                                <select class=" select2 form-control" name="category">
                                                                    @foreach($data['Category'] as $Category)
                                                                        <option
                                                                            value="{{$Category->id}}">{{$Category->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
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

                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                        <label>{{trans('langPanel.keywords')}}</label>
                                                        <div class="controls">
                                                        <input class="form-control " type="text"id="keywords" data-role="tagsinput" name="keywords">
                                                        </div>
                                                    </div>

                                                                           </div>

                                                <div class="col-md-12">
                                                    <label
                                                        for="basicInputFile">{{trans('langPanel.short_description')}}</label>
                                                    <div class="custom-file">

                                       <textarea type="text" name="short_description" class="form-control"
                                                 data-validation-required-message="{{trans('langPanel.short_description_valid')}}"
                                                 placeholder="{{trans('langPanel.short_description')}}"
                                                 required>
                                       </textarea>
                                                    </div>

                                                </div>


                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                       <textarea id="full-featured-non1" class="fullpremium"
                                                 name="text">
                                       </textarea>
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
@section('script')
<script src="{{ asset('Admin/assets/js/bootstrap-tagsinput.js')}}"></script>
    <script>
    $('form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    </script>
@endsection

