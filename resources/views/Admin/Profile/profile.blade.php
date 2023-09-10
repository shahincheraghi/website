@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.account')}}
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
                                                class="d-none d-sm-block">{{trans('langPanel.account')}}</span>
                                        </a>
                                    </li>

                                    @if(Auth::user()->type==0)
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="social-tab"
                                               data-toggle="tab"
                                               href="#social" aria-controls="social" role="tab" aria-selected="false">
                                                <i class="feather icon-share-2 mr-25"></i><span
                                                    class="d-none d-sm-block">{{trans('langPanel.social')}}</span>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                         role="tabpanel">
                                        <!-- users edit media object start -->
                                        <div class="media mb-2">
                                            <a class="mr-2 my-25" href="#">
                                                <img src=" {{'/'.$data['user']->image}} "
                                                     alt="users avatar" class="users-avatar-shadow rounded" height="90"
                                                     width="90">
                                            </a>
                                            <div class="media-body mt-50">

                                            </div>
                                        </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form novalidate action="{{route('Admin.users.profile.update')}}" method="post"
                                              enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.name')}}</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="{{trans('langPanel.name')}}"
                                                                   value="{{$data['user']->name}}" name="name"
                                                                   required
                                                                   data-validation-required-message="{{trans('langPanel.please_enter_a_name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.email')}}</label>
                                                            <input type="email" class="form-control"
                                                                   placeholder="{{trans('langPanel.email')}}"
                                                                   value="{{$data['user']->email}}" required
                                                                   name="email"
                                                                   data-validation-required-message="{{trans('langPanel.please_enter_email')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.tel')}}</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="{{trans('langPanel.tel')}}" name="tel"
                                                                   value="{{$data['user']->tel}}" required
                                                                   data-validation-required-message="{{trans('langPanel.please_enter_the_phone_number')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label
                                                                for="basicInputFile">{{trans('langPanel.img')}}</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input "
                                                                       name="image" id="inputGroupFile01">
                                                                <label class="custom-file-label"
                                                                       for="inputGroupFile01">{{trans('langPanel.choose_file')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.family')}}</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="{{trans('langPanel.family')}}"
                                                                   value="{{$data['user']->family}}" required
                                                                   name="family"
                                                                   data-validation-required-message="{{trans('langPanel.please_enter_your_last_name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.birth_date')}}</label>
                                                            <input type="text" id="birth_date" class="form-control"
                                                                   placeholder="{{trans('langPanel.birth_date')}}"
                                                                   name="birth_date"
                                                                   value="{{$data['user']->birth_date}}" required
                                                                   data-validation-required-message="{{trans('langPanel.please_enter_the_date_of_birth')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.mobile')}}</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="{{trans('langPanel.mobile')}}"
                                                                   value="{{$data['user']->mobile}}" required
                                                                   name="mobile"
                                                                   data-validation-required-message="{{trans('langPanel.please_enter_your_mobile_number')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>{{trans('langPanel.password')}}</label>
                                                            <input type="password" class="form-control" name="password"
                                                                   placeholder="{{trans('langPanel.password')}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                            class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        {{trans('langPanel.save_information')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                        <!-- users edit socail form start -->
                                        <form novalidate action="{{route('Admin.users.profile.Social.update')}}"
                                              method="post">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <fieldset>
                                                        <label>{{trans('langPanel.twitter')}}</label>
                                                        <div class="input-group mb-75">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text feather icon-twitter"
                                                                      id="basic-addon3"></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   name="social[twitter]"
                                                                   value="{{(isset($data['social']['twitter']))?$data['social']['twitter']:''}}"
                                                                   placeholder="https://www.twitter.com/"
                                                                   aria-describedby="basic-addon3">
                                                        </div>
                                                        <label>{{trans('langPanel.facebook')}}</label>
                                                        <div class="input-group mb-75">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text feather icon-facebook"
                                                                      id="basic-addon4"></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   name="social[facebook]"
                                                                   value="{{(isset($data['social']['facebook']))?$data['social']['facebook']:''}}"
                                                                   placeholder="https://www.facebook.com/"
                                                                   aria-describedby="basic-addon4">
                                                        </div>
                                                        <label>{{trans('langPanel.instagram')}}</label>
                                                        <div class="input-group mb-75">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text feather icon-instagram"
                                                                      id="basic-addon5"></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   name="social[instagram]"
                                                                   value="{{(isset($data['social']['instagram']))?$data['social']['instagram']:''}}"
                                                                   placeholder="https://www.instagram.com/"
                                                                   aria-describedby="basic-addon5">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label>{{trans('langPanel.github')}}</label>
                                                    <div class="input-group mb-75">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text feather icon-github"
                                                                  id="basic-addon9"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="social[github]"
                                                               value="{{(isset($data['social']['github']))?$data['social']['github']:''}}"
                                                               placeholder="https://www.github.com/"
                                                               aria-describedby="basic-addon9">
                                                    </div>
                                                    <label>{{trans('langPanel.codepen')}}</label>
                                                    <div class="input-group mb-75">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text feather icon-codepen"
                                                                  id="basic-addon12"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="social[codepen]"
                                                               value="{{(isset($data['social']['codepen']))?$data['social']['codepen']:''}}"
                                                               placeholder="https://www.codepen.com/"
                                                               aria-describedby="basic-addon12">
                                                    </div>
                                                    <label>{{trans('langPanel.telegram')}}</label>
                                                    <div class="input-group mb-75">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text feather icon-send"
                                                                  id="basic-addon11"></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                               value="{{(isset($data['social']['telegram']))?$data['social']['telegram']:''}}"
                                                               name="social[telegram]"
                                                               placeholder="https://www.telegram.com/"
                                                               aria-describedby="basic-addon11">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                            class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{trans('langPanel.save_information')}}                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit socail form ends -->
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
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
@endsection
