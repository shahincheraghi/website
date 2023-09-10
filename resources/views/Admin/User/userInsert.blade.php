@extends('Layouts.adminLayout') @section('content')
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.user')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{trans('langPanel.insert')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        @include('Layouts.msg')
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab"
                                           data-toggle="tab" href="#account" aria-controls="account" role="tab"
                                           aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span
                                                class="d-none d-sm-block">{{trans('langPanel.insertUser')}}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                         role="tabpanel">
                                        <!-- users edit media object start -->


                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form novalidate method="POST"
                                              action="{{route('Admin.users.store')}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.name')}}</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="{{trans('langPanel.name')}}" required
                                                                   data-validation-required-message="{{trans('langPanel.enterNameUser')}}"
                                                                   name="name"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.family')}}</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="{{trans('langPanel.family')}}" required
                                                                   data-validation-required-message="{{trans('langPanel.enter_family_user')}}"
                                                                   name="family"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.mobile')}}</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="{{trans('langPanel.mobile')}}"
                                                                   data-validation-required-message="{{trans('langPanel.enter_mobile_user')}}"
                                                                   required name="mobile"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.national_identity')}}</label>
                                                            <input type="number" class="form-control" required
                                                                   placeholder="{{trans('langPanel.national_identity')}}"
                                                                   data-validation-required-message="{{trans('langPanel.enter_national_identity')}}"
                                                                   name="national_identity"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.email')}}</label>
                                                            <input type="email" class="form-control"
                                                                   placeholder="{{trans('langPanel.email')}}"
                                                                   data-validation-required-message="{{trans('langPanel.enter_email')}}"
                                                                   name="email"/>
                                                        </div>
                                                    </div>
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">{{trans('langPanel.image')}}</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   id="inputGroupFile01" name="imageInfo"/>
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{trans('langPanel.image')}}</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12 col-sm-6">


                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.username')}}</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="{{trans('langPanel.username')}}"
                                                                   data-validation-required-message="{{trans('langPanel.enter_username_user')}}"
                                                                   name="username"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.password')}}</label>
                                                            <input type="password" class="form-control"
                                                                   placeholder="{{trans('langPanel.password')}}"
                                                                   data-validation-required-message="{{trans('langPanel.enter_password_user')}}"
                                                                   name="password"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.birth_date')}}</label>
                                                            <input type="text"
                                                                   class="form-control Datepick birthdate-picker"
                                                                   placeholder="{{trans('langPanel.birth_date')}}"
                                                                   name="birth_date"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.status')}}</label>
                                                        <select class="form-control"
                                                                data-validation-required-message="{{trans('langPanel.enter_status_user')}}"
                                                                required name="status">
                                                            <option value="0">{{trans('langPanel.active')}}</option>
                                                            <option value="1">{{trans('langPanel.blocked')}}</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.type_user')}}</label>
                                                        <select class="form-control"
                                                                data-validation-required-message="{{trans('langPanel.enter_type_user')}}"
                                                                required name="type">
                                                            <option value="1">{{trans('langPanel.system')}}</option>
{{--                                                            <option value="2">{{trans('langPanel.customer')}}</option>--}}
                                                        </select>
                                                    </div>


                                                </div>

                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                            class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{trans('langPanel.save')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
            </div>
        </div>
    </div>
@endsection
