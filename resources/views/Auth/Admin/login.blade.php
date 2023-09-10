@php  use App\Models\Settings;$settings = Settings::allSettings()->pluck('value', 'name')  @endphp
@extends('Layouts.loginLayout')
@section('title')

@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
@endsection
@section('content')
    <style>
        .action-btn {
            text-transform: uppercase;
            transition: 0.3s;
            cursor: pointer;
            position: relative;
            display: block;
        }
        .py-btn-action-login{padding: 18px 0 !important;}

        .action-btn:focus {
            outline: 0.05em dashed;
            outline-offset: 0.05em;
        }

        .action-btn::after {
            content: '';
            display: block;
            width: 1.5em;
            height: 1.5em;
            position: absolute;
            left: calc(50% - 0.75em);
            top: calc(50% - 0.75em);
            border: 0.15em solid transparent;
            border-right-color: white;
            border-radius: 50%;
            animation: button-anim 0.7s linear infinite;
            opacity: 0;

        }

        @keyframes button-anim {
            from {
                transform: rotate(0);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .action-btn.loading {
            color: transparent;
        }

        .action-btn.loading::after {
            opacity: 1;
        }

    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="container">
                        <div class="row justify-content-center">
                            <form class="form auth-inner formCustom " id="loginForm">
                                @csrf
                                <div class="text-center pb-2">
                                    @if (isset($settings['loader']))
                                        <img alt="" width="60px" height="60px" src="/{{$settings['loader']}}">
                                    @endif
                                    <h6 class="text-bold mt-2">
                                        @if (isset($settings['nameSite']))
                                            {!!$settings['nameSite']!!}
                                        @endif
                                    </h6>
                                </div>
                                <!--begin::Title-->
                                <div class="text-center pb-2">
                                    <h6 class="font-weight-bolder text-dark font-size-h6 font-size-h3-lg">ورود به
                                        سامانه</h6>
                                </div>
                                <!--begin::Form group-->
                                <div class="form-row-input-auth">
                                    <div class="form-group row ">

                                        <div class="col-md-12">
                                            <label for="username">نام کاربری</label>
                                            <input id="username" placeholder="نام کاربری خود را وارد کنید"
                                                   type="text"
                                                   class="form-control input-auth" name="username" required
                                                   autocomplete="username" autofocus>
                                            <div class="invalid-feedback "></div>
                                        </div>


                                        <div class="col-md-12 mt-2">
                                            <label for="password">رمز عبور</label>
                                            <input id="password" placeholder="رمز عبور خود را وارد کنید"
                                                   type="password"
                                                   class="form-control input-auth" name="password" required
                                                   autocomplete="password" autofocus>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                </div>

                                <!--begin::اکشن-->
                                <div class="text-center pt-2">
                                    <button type="submit" id="login-btn"
                                            class=" w-100 btn btn btn-primary text-bold action-btn ">
                                        ورود
                                    </button>
                                </div>

                                <div class="alert alert-danger my-3 text-right d-none">
                                    <strong> خطا! </strong>
                                    کاربری با این مشخصات وجود ندارد.
                                </div>

                                <div class="divider mb-2 mt-4">
                                    <div class="divider-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <polyline points="19 12 12 19 5 12"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <!--end::اکشن-->
                                <div class="text-center">
                                    <span class="text-dodgerblue">سامانه </span>
                                    قدرت گرفته شده از
                                    <span class="text-dodgerblue">
                                            @if (isset($settings['nameSite']))
                                            {!!$settings['nameSite']!!}
                                        @endif
                                        </span>
                                </div>
                                <div class="text-center mt-1">
                                    <p class="">شماره نسخه : 1.0.0</p>
                                </div>
                            </form>
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
    <script>
        $(document).ready(function () {

            const loginBtn = document.getElementById("login-btn");


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // تابعی برای نمایش لودر
            function showLoader() {
                loginBtn.classList.add("py-btn-action-login");
                loginBtn.innerText = "";
                loginBtn.classList.add("loading");

            }

            // تابعی برای مخفی کردن لودر
            function hideLoader() {
                loginBtn.classList.remove("py-btn-action-login");
                loginBtn.classList.remove("loading")
                loginBtn.innerText = "ورود";
            }

            $('#loginForm').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                // نمایش لودر
                showLoader();
                $('input').removeClass('is-invalid');
                // پاک کردن محتوای پیام خطا
                $('.invalid-feedback').html('');
                $.ajax({
                    type: 'POST',
                    url: "{{route('panel.loginUser')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        // غیرفعال کردن دکمه ورود
                        $('button[type="submit"]').prop('disabled', true);
                    },
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            if (data.statusCode === 210) {
                                Swal.fire({
                                    title: 'خطا در احراز هویت',
                                    text: ' کاربری با این مشخصات پیدا نشد.',
                                    icon: 'error',
                                    confirmButtonText: 'تایید',
                                });
                            }
                            if (data.status === true) {
                                Swal.fire({
                                    title: 'ورود کاربر',
                                    text: 'ورود موفقیت آمیز',
                                    icon: 'success',
                                    confirmButtonText: 'تایید',
                                }).then(() => {
                                    // هدایت به ادرس ادمین بعد از یک ثانیه
                                    setTimeout(function () {
                                        location.href = data.linkAdminPanel;
                                    }, 1000);
                                });
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status == 422) {

                            // نمایش خطاهای ولیدیشن
                            var errors = xhr.responseJSON.errors;
                            console.log(errors)
                            Object.keys(errors).forEach(function (key) {
                                var input = $('input[name=' + key + ']');
                                input.addClass('is-invalid');
                                input.next('.invalid-feedback').html(errors[key][0]);
                            });
                        }
                    },
                    complete: function () {
                        // مخفی کردن لودر
                        hideLoader();
                        // فعال کردن دکمه ورود
                        $('button[type="submit"]').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
