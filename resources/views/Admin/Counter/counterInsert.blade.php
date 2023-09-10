@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.counterInsert')}}
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
                                    <li class="breadcrumb-item"><a href="">{{trans('langPanel.panel')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.counter')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.counterInsert')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height row justify-content-center">
                        <div class=" col-md-10 col-12">
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.counterInsert')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('Admin.counters.store')}}"
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
                                                        <label>{{trans('langPanel.subTitle')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="subTitle" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.inputSubTitle')}}"
                                                                   placeholder="{{trans('langPanel.inputTitle')}}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.number')}}</label>
                                                        <div class="controls">
                                                            <input type="number" name="number" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.numberInput')}}"
                                                                   placeholder="{{trans('langPanel.numberInput')}}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.icons')}}</label>
                                                        <input type="text" class="form-control" name="icon" placeholder="fa fa-clock"
                                                               id="basicInput" required>
                                                    </fieldset>
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
            </div>
        </div>
    </div>
@endsection

