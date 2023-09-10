@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.insert_team')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.team')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.insert_team')}}</a>
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
                                    <h4 class="card-title">{{trans('langPanel.insert_team')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{route('Admin.teams.store')}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.fullname')}}</label>
                                                        <input type="text" class="form-control" name="fullname"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInputFile">{{trans('langPanel.select_the_file')}}
                                                            (360*310)</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input " name="file"
                                                                   id="inputGroupFile01">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{trans('langPanel.choose_file')}}</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="basicInput">{{trans('langPanel.designation')}}</label>
                                                        <input type="text" class="form-control" name="designation"
                                                               id="basicInput" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <div class="row mt-2">
                                                <div class="col-md-2 pull-right ">
                                                    <h4>شبکه های اجتماعی </h4>
                                                </div>
                                                <div class="col-md-3 pull-left ">
                                                    <button class="btn btn-primary btn-sm" type="button"
                                                            onclick="addSocial()"
                                                            title="افزودن شبکه اجتماعی"><i
                                                            class="feather icon-plus "></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-2 detailSocial">
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
    <script>
        function addSocial() {
            var tag = '\n' +
                '                                            <div class="row social">\n' +
                '                                                <div class="col-md-3 ">\n' +
                '                                                    <fieldset class="form-group">\n' +
                '                                                        <label for="basicInput">{!! trans('langPanel.title') !!}</label>\n' +
                '                                                        <input type="text" class="form-control" name="title[]"\n' +
                '                                                               id="title" required>\n' +
                '                                                    </fieldset>\n' +
                '                                                </div>\n' +
                '\n' +
                '                                                <div class="col-md-3 col-12">\n' +
                '                                                    <fieldset class="form-group">\n' +
                '                                                        <label\n' +
                '                                                            for="basicInput">{!! trans('langPanel.link') !!}</label>\n' +
                '                                                        <input type="text" class="form-control" name="link[]"\n' +
                '                                                               id="link" required>\n' +
                '                                                    </fieldset>\n' +
                '                                                </div>\n' +
                '\n' +
                '                                                <div class="col-md-3 col-12">\n' +
                '                                                    <fieldset class="form-group">\n' +
                '                                                        <label\n' +
                '                                                            for="basicInput">{!! trans('langFront.fontClass') !!}</label>\n' +
                '                                                        <input type="text" class="form-control" name="fontClass[]"\n' +
                '                                                               id="fontClass" required>\n' +
                '                                                    </fieldset>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-md-3 col-12 pt-2" >\n' +
                '                                                    <button onclick="parentsDelete(this)" class="btn btn-warning btn-sm pr-1 pl-1" style="font-size: 20px;"><i\n' +
                '                                                            class="feather icons-trash " ></i></button>\n' +
                '                                                </div>\n' +
                '                                            </div>';
            $('.detailSocial').append(tag);
        }
        function parentsDelete(th) {
            $(th).parents('.social').remove();
        }
    </script>
@endsection
