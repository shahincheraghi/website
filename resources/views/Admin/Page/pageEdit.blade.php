@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.pageEdit')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.page')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">{{trans('langPanel.pageEdit')}}</a>
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
                            <form class="form-horizontal" method="POST"
                                  action="{{route('Admin.pages.update',$data['Page']->id)}}"
                                  enctype="multipart/form-data" novalidate>
                                @CSRF
                                <div class="card">
                                @include('Layouts.msg')

                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.pageEdit')}}</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.title')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="title" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.inputTitle')}}"
                                                                   placeholder="{{trans('langPanel.inputTitle')}}"
                                                                   required value="{{$data['Page']->title}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.titleEn')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="titleEn" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.inputTitleEn')}}"
                                                                   placeholder="{{trans('langPanel.inputTitleEn')}}"
                                                                   required
                                                                   value="{{$data['Page']->titleEn}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-7 col-md-6">
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
                                                    <a class="my-25">
                                                        <img src="/{{$data['Page']->image}}"
                                                             alt="{{$data['Page']->title}}"
                                                             class="users-avatar-shadow rounded" style="width: 100%; height: 100px">
                                                    </a>

                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.keywords')}}</label>
                                                        <div class="controls">
                                                            <input class="form-control " type="text" id="keywords"
                                                                   data-role="tagsinput"
                                                                   value="{{$data['Page']->keywords}}" name="keywords">
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
                                                 required>{{$data['Page']->short_description}}</textarea>
                                                    </div>

                                                </div>


                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-12">
                                       <textarea id="full-featured-non1" class="fullpremium"
                                                 name="text">
												 {!!$data['Page']->text!!}
                                       </textarea>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-12">
                                                    <select class="select2 form-control" multiple name="forms[]" id="formsSelect2">
                                                        @foreach($data['Form'] as $form)
                                                            <option  value="{{$form->id}}">{{$form->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                                <div class="card p-4">
                                    <div class="row w-100">
                                        <div class="alert alert-success w-100 text-center justify-content-center" role="alert">
                                            توجه : برای بالا بردن رتبه سایت در موتور جستجو لطفا اطلاعات زیر (سئو سایت) را تکمیل نمایید.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 justify-content-center d-flex my-2">
                                            <h4 class="text-bold">سئو سایت</h4>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label
                                                    for="titleSeoPage">{{trans('langPanel.titleSeoPage')}}</label>
                                                <input type="text"
                                                       id="titleSeoPage"
                                                       class="form-control"
                                                       name="titleSeoPage"
                                                       value="{{$data['Page']->titleSeoPage}}"
                                                       aria-describedby="basic-addon12">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <label
                                                        for="keywords">{{trans('langPanel.multiKeywordsSeoPage')}}</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           data-role="tagsinput"
                                                           id="keywords"
                                                           name="multiKeywordsSeoPage"
                                                           value="{{$data['Page']->multiKeywordsSeoPage}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label
                                                for="descriptionSeoPage">{{trans('langPanel.descriptionSeoPage')}}</label>
                                            <input type="text"
                                                   id="descriptionSeoPage"
                                                   class="form-control"
                                                   name="descriptionSeoPage"
                                                   value="{{$data['Page']->descriptionSeoPage}}"
                                            >

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 offset-md-10">
                                    <button type="submit"
                                            class="btn btn-primary">{{trans('langPanel.update')}} </button>
                                </div>
                            </form>
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
        var selectedValuesTest = [{{$data['Page']->forms}}];
        $(document).ready(function() {
            $("#forms_select2").select2({
                multiple: true,
                dir: "ltr",
                dropdownAutoWidth: true,
            });
            $('#formsSelect2').val(selectedValuesTest).trigger('change');
        });


        @isset($data['Page']->category_id )
        var val = {!! $data['Page']->category_id !!};
        $('#category option[value=' + val + ']').attr('selected', 'selected');
        @endisset

        $('form').on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
    </script>
@endsection

