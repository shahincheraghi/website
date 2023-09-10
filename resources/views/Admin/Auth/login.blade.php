@extends('Layouts.loginLayout')
@section('title')
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
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="/Admin/app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">

                                    @include('Layouts.msg')
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{trans('langPanel.login')}}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2"></p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{route('doLogin')}}" method="post">
                                                    @CSRF
                                                    <fieldset
                                                        class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="email" class="form-control" name="email" id="email"
                                                               placeholder="{{trans('langPanel.email')}}" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="email">{{trans('langPanel.email')}}</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" name="password"
                                                               id="user-password"
                                                               placeholder="{{trans('langPanel.password')}}" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label
                                                            for="user-password">{{trans('langPanel.password')}}</label>
                                                    </fieldset>
                                                    <button type="submit"
                                                            class="btn btn-primary float-right btn-inline">{{trans('langPanel.login')}}</button>
                                                </form>
                                            </div>
                                        </div>

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
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
@endsection
