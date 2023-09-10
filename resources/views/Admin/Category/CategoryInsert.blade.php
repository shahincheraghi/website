@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.categoryInsert')}}
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
                                    <li class="breadcrumb-item"><a
                                            href="{{route('Admin.index')}}">{{trans('langPanel.panel')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.category')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.categoryInsert')}}</a>
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
                                    <h4 class="card-title">{{trans('langPanel.categoryInsert')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('Admin.categorys.store')}}"
                                              novalidate>
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>عنوان</label>
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
                                                        <label>{{trans('langPanel.typeCategory')}}</label>
                                                        <div class="controls">
                                                            <fieldset>
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="radio"
                                                                           id="checkboxblog" value="1" name="type">
                                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                                    <span class="">{{trans('langPanel.blog')}}</span>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="radio"
                                                                           id="checkboxblog" value="2" name="type">
                                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                                    <span class="">{{trans('langPanel.service')}}</span>
                                                                </div>
                                                            </fieldset>

                                                            <fieldset>
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="radio"
                                                                           id="checkboxblog" value="3" name="type">
                                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                                    <span class="">{{trans('langPanel.faq')}}</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
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

@endsection
