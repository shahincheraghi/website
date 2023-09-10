@extends('Layouts.frontLayout')
@section('content')
    @php
        use App\Models\Province;$provinces = Province::all()
    @endphp
    <style>
        .ActivationHamtaError {
            font-size: 11px !important;
            font-weight: bolder;
        }

        .is-invalid > .select2-container > .selection > .select2-selection--single {
            background-color: #fff;
            border: 1px solid #dc3545 !important;
            border-radius: 4px;
        }

        #FormActivationHamta {
            max-width: 750px !important;
        }

        .form-control::placeholder {
            font-size: 12px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            font-size: 12px !important;
        }

        .required:after {
            content: " *";
            color: red !important;
        }

        .text-size-14 {
            font-size: 14px !important;
        }

        .send-sms-countdown{
            width: 135px !important;
            margin-right: 5px;
            border: 1px solid #ced4da;
            text-align: center;
            justify-content: center;
            display: flex;
            align-items: center;
            border-radius: 3px;
            padding: 10px;
        }
        .btn-send-sms{
            color: #545454;
            font-weight: 600;
            font-size: 13px !important;
        }
        .divider {
            text-align: center;
            margin: 1rem 0;
        }

        .divider {
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }

        .divider .divider-text {
            position: relative;
            display: inline-block;
            font-size: .9375rem;
        }

        .divider .divider-text {
            padding: 0 1rem !important;
        }

        .divider .divider-text {
            position: relative;
            display: inline-block;
            font-size: .9375rem;
        }

        .divider .divider-text:after {
            left: 100%;
        }

        .divider .divider-text:after, [dir] .divider .divider-text:before {
            border-top: 1px solid #ebe9f1;
        }

        .divider .divider-text:after, .divider .divider-text:before {
            content: "";
            position: absolute;
            top: 50%;
            width: 150px !important;
        }

        .divider .divider-text i, .divider .divider-text svg {
            height: 1rem;
            width: 1rem;
            font-size: 1rem;
        }

        .divider .divider-text:after, .divider .divider-text:before {
            content: "";
            position: absolute;
            top: 50%;
            width: 9999px;
        }

        .divider .divider-text:after, [dir] .divider .divider-text:before {
            border-top: 1px solid #ebe9f1;
        }


        .auth-inner:before {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPQAAADzCAMAAACG9Mt0AAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAA9KADAAQAAAABAAAA8wAAAADhQHfUAAAAyVBMVEUAAAD///+AgP+AgP9mZv+AgNWAgP9tbf9gYP+AgP9xcf9mZv+AZuaAgP9dXf90dOhiYv92dv9mZu5mZv93d+53d/9paf94afCAcfFrXvJra/9mZvJzZvJzc/JoaP96b/Rqav91aupsYvV2bOt2bPVxaPZ7cfZqavZyau1waPd4aO9xafBxafh4afB1bfh4avFuZ/F2afJzZvJzZ/N0aPN0bvN3bPR0ae5yZ/R3be93bfR1au9zafBxbPVzavV0a/F0a/ZyafFwaPKZm3nTAAAAQ3RSTlMAAQIEBQYGBwgICQoKCgsLDQ0PDw8PERESExMUFBQWFxgYGhoaGxsdHSAgIiIiIyQlJygqLCwtLi8vLzAzNDU3Nzg7h9vbHgAAA9RJREFUeNrt3ftS2kAUx/Fc1gSyWsErtuJdRDQiiteolb7/QzUoTm07k4AzObuu3/MCez45yWbzT36eZ6b8erO1e1B97baadd+zocJWmg0HaXe/+uqmg2GWtkLT5Lle1m9LdhG2+1lvzuiUO1knEF81yFc1N+35m15kZOGodz1vyLx+v2Lseq/erxtZd/NuweCTtfiwaWLOD5FnsqI7+VnP3y8afnEs3Es/1+H1qvETwuq18B7e6VlwLup1ZM8kWWQBOsrmHL7GVtxvYRZYgQ4ywae61ffsqH5Lbq20bQm6ncp9P2ehJegwE/u+rl95ttSwLrVSc2ANetAU28dSa9Cp2E623bUG3d2VWmn/wBq0XCugQYMGLdVKoOJaoiuok1NdXSW1WAUfRPtRUllflaJf5ZE/O9pXVbZUPTov5c+IDqvtRwStdTgLutoxy6GnGfYb2o+1I2gd+1OiqzfLocvVE7TSDqG1mgodaqfQZbvZC9rXjqG1X45WzqFVKVpk0LLo4lGP0ZGD6KgMnTiITkrQgXYQrYNitHISrYrRsZPouBhdcxJdK0YnTqKTYrR2Eq1BgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRoh9DH59ag86ACoSYOL61B55EUQk1s3VqDzsNHhJpYe7QGncfMSHUxaliCHgcKSXVxeWQJehwdJdXF4dAS9DgkTKqLxuibFeiXODixNi7OrEC/BP+JtbE0WrYA/RrxKNfH2YUF6NegSbk+Gk87xtErN6EsWm88fzeMXpwE9EruLns/l42io4dJFLPo2/Po1w+D6IW7t9Bt2SPx3vOOMfS7eHVZtN54ulg2go56138Ct4XRunE2Ovsmjg46WeddUoUWr6WL0fCoIYgO2/2s91fstDZQjcPL0ePt5flpdXUwqW46uMrS1j95JNpQrW0dHp9UV/uT2m416/8HVGg3qzhpBjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KBBgwYNGjRo0KC/FDpx0pwUo2tOomvF6NhJdFyMVk6iVTE6cBIdeF9vJyvZx/I/AzuIjsrQvoNovwzt4FamSs0Ojrp80PmvoB0zh940pb7azf1yg7t0LIt978uppzbnalfucDW92ZndLPRmKweGPduYJ+zoM5/Dk+gD5NdvLhXXPp88qcUqmEH5G5JZRs6cuxwIAAAAAElFTkSuQmCC)
        }

        .auth-inner:after {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARAAAAEQCAMAAABP1NsnAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAABEKADAAQAAAABAAABEAAAAAAQWxS2AAAAwFBMVEUAAAD///+AgICAgP9VVaqqVf+qqv+AgL+AgP9mZsxmZv+ZZv+AgNWAgP9tbdttbf+Sbf+AYN+AgN+AgP9xceNmZv+AZuaAZv90dOh0dP9qav+AauqAav+AgP92dv9tbf+Abe2Abf93Zu53d+6AcO94afCAcfF5a+R5a/JzZuaAZvKAc/J5bed5bfOAaPN6b/R1auqAavR6ZvV6cPV2bOuAbPV7aPZ2be2AbfZ7au17avZ3Zu53b+57a+97a/d4aO9J6CoeAAAAQHRSTlMAAQICAwMDBAQFBQUGBgcHBwgICAkKCgoLCwwMDAwNDg4ODw8QERITExQUFBUVFhcYGBkZGhobHBwdHR4eHx8gJ5uMWwAAA/FJREFUeNrt2G1XEkEYxvHZNk2xHGzdbKFl0cTwgdSkCKzu7/+t4pw6sAjtjIueE/f8r3fMO35nZnbuy5gVGcvfzJe0rnTfGI+MggGJRUZnbpPIhJKt88nU53JnFULvyISY6KAv8vPj0vr2rYwiE2Z2B9J+uNYcyyQxwWZvaeGH3G4bMjsvI/kcwTC/V+7kLoahlITzQojP3ZFgsJCh7IJQzpX0QFj4uMiY18eDMZ9bZCF9OQahnK6cm/Y7js0sh/LF3Auv1PlQd3MxbdXYIQspV44EEEAAAWTNDAYYkKdJbNMsLzYueZbaZ2iM46RVbHBaiZ9Js+nHEdli42N9XuSen5hGp1CQTuOJQDRsD99N4gMSpYWapNH6IJo83CIeILZQFesEaber79NCWRoukOpNEnW0gXQqD81w6ACxhbrYde7VuFCYeA2QRCNIsgZISyNIqz6IyhPjOjNVIFYniK3dmKU6QdLaJUimEySrDZLrBMlrgxRKU7sxCw/EMe0CAggggADySJCqxixIkKpNEh6IozELD8RxjQACCCCAAPJIkKrGLEgQXqqAAEJjxrQLCCCAAEJjRmNGY8a0CwgggABCYwYIfQgggNCYMe0CAggggNCY0ZjRmDHtAgIIIIAAQmNGHwIIIDRmTLuAAAIIIDRmNGY0Zky7gAACCCCA0JjRhwACCI0Z0y4ggAACCI0ZjRmNGdMuIIAAAgggNGb0IYAAQmPGtAsIIIAAQmNGY0ZjxrQLCCCAAAIIjRl9CCCA0Jgx7QICCCCA0JjRmNGYMe0CAggggABCY0YfAgggNGZMu4AAAgggNGY0ZjRmTLuAAAIIIIDQmNGHAAIIjRnTLiCAAAIIjRmNGY0ZIEy7gAACCCA0ZvQhgABCY8a0CwgggABCY0ZjBgiNGdMuIIAAAgiN2f/Sh+Q6PfLaIJlOkKw2SKoTJK3dmFmdILb2tBvrBIlrg5iWRo+WqQ+SaARJ1gCJAzsxThCN16p1vNurGjNjoo42j07kAHFskoY2kEbl33U0ZgoPjXW+Rl0gkarnahqtDaJKxMPDDWIiNafGenh4gExvVhXfmk7Da6L1AVGxSby2h6MxK79Zk42ea1pJbJ48sU2zDezQ8iy1z6BBwoyjMQsvXp8YQAAhgADilRfyy+wf8WqZZUfGZihvgZiB3FybC+kCUU5XLkAo50C+gbBQdUzkAIVyejIAYfFTI1solHP2HgNCnHn5AYNy4jvpoVB6fVzL91cwzLJ9Lfd7S0jhehxO5H5/yePr1W6gHonI7fJ5ORSR/n6Q2yQanq763zuXU5LJZRKiyD/W9/pjkdPZz0/yJ8fqVyry+qQZDMjJKoDfy8bRVhHhQTwAAAAASUVORK5CYII=)
        }

        input::placeholder {
            color: rgba(0, 0, 0, 0.53) !important;
            font-weight: bolder !important;
        }


        .formCustom {
            box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%);
            max-width: 100%;
            width: 100%;
            padding: 30px 15px;
            border-radius: 7px;
            background-color: white;
            position: inherit;
            z-index: initial
        }

        @media screen and (max-width: 992px) {
            .auth-inner:after {
                width: 272px;
                height: 272px;
                content: " ";
                position: absolute;
                bottom: -55px;
                left: 0;
                z-index: -1;
            }

            .auth-inner:before {
                width: 244px;
                right: 0;
                height: 243px;
                content: " ";
                position: absolute;
                top: -54px;
                z-index: -1;
            }
        }

        @media screen and (min-width: 992px) {
            .auth-inner:before {
                width: 244px;
                right: -100px;
                height: 243px;
                content: " ";
                position: absolute;
                top: -54px;
                z-index: -1;
            }

            .auth-inner:after {
                width: 272px;
                height: 272px;
                content: " ";
                position: absolute;
                bottom: -55px;
                left: -70px;
                z-index: -1;
            }
        }
        .jconfirm.jconfirm-white .jconfirm-box .jconfirm-buttons, .jconfirm.jconfirm-light .jconfirm-box .jconfirm-buttons {
            float: unset !important;
            justify-content: center !important;
            text-align: center;
            display: flex;
        }
    </style>
    <section class="bg-half d-table w-100"
             style="background-image: url('/Front/images/hamtaBanner.png')">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> {{trans('langFront.ActivationHamta')}} </h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="/"> صفحه اصلی</a></li>
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{trans('langFront.hamta')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section>
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="collapse-area" style="margin: 80px 0 !important;">
        <div class=" page justify-content-center">
            <div class=" flex-row-fluid wrapper" id="kt_wrapper">
                <div class="container">
                    <div class="row justify-content-center mt-5">

                        <form class="form auth-inner" id="FormActivationHamta" action="javascript:void(0)">
                            <div class="formCustom">
                                <!--begin::Title-->
                                <div class="text-center pb-5">
                                    <h6 class="font-weight-bolder text-dark font-size-h6 font-size-h4-lg text-size-14 text-bold">
                                        برای دریافت کد فعال سازی همتا فرم زیر را تکمیل نمایید.</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="Firstname_activation_hamta" class="form-label required">نام</label>
                                        <input type="text" class="form-control FirstName_activation_hamta"
                                               id="FirstName_activation_hamta" name="FirstName"
                                               placeholder="نام خود را وارد کنید">
                                        <span class="text-danger error-text ActivationHamtaError FirstName_err"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName_activation_hamta" class="form-label required">نام
                                            خانوادگی</label>
                                        <input type="text" class="form-control LastName_activation_hamta"
                                               name="LastName" id="lastName_activation_hamta"
                                               placeholder="نام خانوادگی خود را وارد کنید">
                                        <span class="text-danger error-text ActivationHamtaError LastName_err"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="NationalCode_activation_hamta" class="form-label required">کد
                                            ملی</label>
                                        <input type="number" oninput="validateNationalId()"
                                               class="form-control NationalCode_activation_hamta"
                                               id="NationalCode_activation_hamta" name="NationalCode"
                                               placeholder="کد ملی خود را وارد کنید">
                                        <span
                                            class="text-danger error-text ActivationHamtaError NationalCode_err"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Mobile_activation_hamta" class="form-label required">شماره
                                            موبایل</label>
                                        <input type="number" name="Mobile" class="form-control Mobile_activation_hamta"
                                               id="Mobile_activation_hamta" placeholder="شماره موبایل خود را وارد کنید">
                                        <span class="text-danger error-text ActivationHamtaError Mobile_err"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 ">
                                            <label class="form-label required"
                                                   for="province_id">استان
                                            </label>
                                            <select
                                                class="form-control select2 changeProvince province_id_activation_hamta"
                                                name="province_id" id="province_id">
                                                <option></option>
                                                @foreach($provinces as $province)
                                                    <option
                                                        value="{{$province->id}}">{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-danger error-text ActivationHamtaError province_id_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 ">
                                            <label class="form-label required"
                                                   for="city_id">شهر
                                            </label>
                                            <select
                                                class="form-control select2 changeCity conditionCityTehran city_id_activation_hamta"
                                                name="city_id" id="city_id">
                                                <option></option>
                                            </select>
                                            <span
                                                class="text-danger error-text ActivationHamtaError city_id_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label for="Imei_activation_hamta" class="form-label required">سریال موبایل
                                            (IMEI)</label>
                                        <input type="number" class="form-control Imei_activation_hamta " name="Imei"
                                               id="Imei_activation_hamta" oninput="checkInputLength()"
                                               placeholder="سریال موبایل (IMEI) را وارد کنید">
                                        <span class="text-danger error-text ActivationHamtaError Imei_err"></span>
                                    </div>
                                    <div
                                        class="alert alert-success alertSuccessCheckActivationHamta d-none w-100 mr-2 ml-2"
                                        role="alert">
                                        <span>مدل دستگاه :</span>
                                        <span class="ContentSuccessCheckActivationHamta"></span>
                                    </div>
                                    <div class="alert alert-danger alertNotFoundCheckActivationHamta d-none w-100"
                                         role="alert">
                                        <span class="ContentNotFoundCheckActivationHamta"></span>
                                    </div>
                                    <div class="alert alert-danger alertErrorCheckActivationHamta d-none w-100"
                                         role="alert">
                                        <span class="ContentErrorCheckActivationHamta"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row ">
                                    <div class="col-md-12 mt-2 pr-2 mb-2 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="rememberFormHamta">
                                            <label style="font-weight: bolder;padding-right: 5px"
                                                   class="form-check-label" for="remember">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#modalTerms">قوانین دریافت کد فعال سازی همتا</a>
                                                را مطالعه کرده و قبول دارم.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-2">
                                    <button type="submit" disabled
                                            class="btn btn btn-primary font-weight-bolder font-size-h6 px-8 py-2 btnSaveActivationHamta">
                                        ثبت درخواست
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="modalActivationHamtaOtp" style="padding-right: 0 !important;" tabindex="-1"
                     aria-labelledby="modalActivationHamtaOtp"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="otpActivationHamta" action="javascript:void(0)">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalActivationHamtaOtpLabel">احراز هویت</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body mb-0">
                                    <div class="container">
                                        <div class="row">
                                            <label for="activationHamtaOtpCode" class="form-label required">کد
                                                تایید</label>
                                            <div class="mb-3 d-inline-flex">
                                                <input type="text" hidden id="mobileCheckOtpActivationHamta"
                                                       name="mobileCheckOtpActivationHamta">

                                                <input type="number" class="form-control" name="activationHamtaOtpCode"
                                                       id="activationHamtaOtpCode"
                                                       placeholder="کد تایید 4 رقمی را وارد کنید">
                                                <div class="send-sms-countdown mr-2" >
                                                    <a href="javascript:void(0)"  class="btn-send-sms ">ارسال کد</a>
                                                    <span class="countdown"></span>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="w-100 alert alert-danger-check-otp-activation_hamta "
                                                 style="display:none"></div>
                                            <br/>
                                        </div>
                                        <div class="row">
                                            <div
                                                class=" w-100 alert alert-danger alert-danger-error-opt-activation_hamta d-none my-2"
                                                role="alert">
                                                کد تایید نا معتبر میباشد.
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalTerms" tabindex="-1" aria-labelledby="modalTerms" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">شرایط و قوانین سایت</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-justify">
                                    در طرح رجیستری گوشی برای هر دستگاه (آکبند، انتقال مالکیت داده شده، دارای درخواست
                                    مسافری تأیید شده)، باید فرآیند فعال‌سازی گوشی (رجیستری گوشی) در سامانه همتا از طریق
                                    وارد کردن شماره IMEI، شماره سیم کارت و کد فعال‌سازی همتا، برای سیم کارت مورد نظر
                                    انجام شود.

                                    استعلام همزمان طرح رجیستری و سرقتی بودن موبایل، تبلت و لپ تاپ در سامانه کشوری همیاب
                                    ۲۴

                                    کد فعال‌سازی گوشی را چگونه به دست آوریم؟
                                    کد فعال‌سازی گوشی یک عدد ۶ رقمی است که با صفر شروع نمی شود. بسته به نوع دستگاهی
                                    (آکبند، انتقال مالکیت داده شده، دارای درخواست مسافری تأیید شده) که قصد فعال‌سازی آن
                                    را دارید از سه روش زیر می توانید کد فعال‌سازی گوشی را بدست آورید.

                                    1- کد فعال‌سازی برای دستگاه‌های آکبند قانونی
                                    برای دستگاه‌های آکبند قانونی، کد فعال‌سازی بر روی جعبه یا کارت گارانتی دستگاه، ثبت
                                    شده است. در غیر این ‌صورت می‌توانید ضمن تماس با شرکت وارد کننده که در استعلام اصالت
                                    یا رجیستری گوشی در سامانه همتا یا سامانه همیاب 24 نمایش داده می‌شود، نسبت به مطالبه
                                    در خصوص عدم وجود کد فعال‌سازی بر روی کارت گارانتی اقدام نمایید. برای مشاهده شماره
                                    تماس شرکت‌های واردکننده به صفحه اطلاعات گارانتی ثبت شده در سامانه جامع گارانتی
                                    بروید.

                                    2- کد فعال‌سازی برای دستگاه‌های کارکرده (دست دوم)
                                    کد فعال‌سازی رجیستری گوشی دست دوم پس از انجام فرآیند انتقال مالکیت، در پیامک با
                                    سرشماره HAMTA برای خریدار ارسال می‌شود.

                                    3- کد فعال‌سازی برای دستگاه‌های ثبت مسافری شده
                                    کد فعال‌سازی گوشی های مسافری پس از ثبت قانونی شناسه دستگاه در گمرک و ارسال اطلاعات
                                    به سامانه همتا، در پیامک تأیید درخواست و کارتابل مسافر در قسمت “اطلاعات ثبت مسافری”
                                    وجود دارد.

                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')

            <script type="text/javascript">
                $(document).ready(function () {


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });
            </script>

            <script type="text/javascript">

                function validateNationalId() {
                    const nationalId = document.getElementById("NationalCode_activation_hamta").value;

                    if (nationalId.length !== 10) {
                        $('.NationalCode_activation_hamta').addClass('is-invalid');
                        $('.NationalCode_activation_hamta').removeClass('is-valid');
                        return;
                    }
                    // بررسی اعتبار کد ملی با الگوریتم عمومی
                    const check = parseInt(nationalId[9]);
                    let sum = 0;
                    for (let i = 0; i < 9; i++) {
                        sum += parseInt(nationalId[i]) * (10 - i);
                    }
                    const remainder = sum % 11;
                    if ((remainder < 2 && check === remainder) || (remainder >= 2 && check === 11 - remainder)) {
                        $('.NationalCode_activation_hamta').addClass('is-valid');
                        $('.NationalCode_activation_hamta').removeClass('is-invalid');
                    } else {
                        $('.NationalCode_activation_hamta').addClass('is-invalid');
                        $('.NationalCode_activation_hamta').removeClass('is-valid');
                    }
                }

                function checkInputLength() {
                    $('.btnSaveActivationHamta').prop('disabled', true);

                    $('.ContentSuccessCheckActivationHamta').empty();
                    $('.alertSuccessCheckActivationHamta').addClass('d-none')

                    $('.ContentNotFoundCheckActivationHamta').empty();
                    $('.alertNotFoundCheckActivationHamta').addClass('d-none')

                    $('.ContentErrorCheckActivationHamta').empty();
                    $('.alertErrorCheckActivationHamta').addClass('d-none')

                    var input = document.getElementById("Imei_activation_hamta").value;
                    if (input.length === 15) {
                        var dataString = 'imei=' + input;
                        $.ajax({
                            type: "POST",
                            url: "/checkModelDeviceActivationHamta",
                            data: {Imei: input},

                            beforeSend: function () {
                                $('#loading').removeClass('d-none');
                            },
                            complete: function () {
                                $('#loading').addClass('d-none');
                            },

                            success: function (data) {
                                if (data.statusCode == 200) {
                                    $('.ContentSuccessCheckActivationHamta').append(data.message);
                                    $('.alertSuccessCheckActivationHamta').removeClass('d-none');
                                    $('.btnSaveActivationHamta').prop('disabled', false);
                                }
                                if (data.statusCode == 404) {
                                    $('.ContentNotFoundCheckActivationHamta').append(data.message)
                                    $('.alertNotFoundCheckActivationHamta').removeClass('d-none')
                                    $('.btnSaveActivationHamta').prop('disabled', true);
                                }
                                if (data.statusCode == 420) {
                                    $('.ContentErrorCheckActivationHamta').append(data.message)
                                    $('.alertErrorCheckActivationHamta').removeClass('d-none')
                                    $('.btnSaveActivationHamta').prop('disabled', true);
                                }
                            },
                            error: function (data) {
                                Swal.fire(
                                    '',
                                    'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                                    'error'
                                )
                                    .then(function (isConfirm) {
                                        if (isConfirm) {
                                            location.reload();
                                        }
                                    });
                            }
                        });
                    }
                }

                $('#FormActivationHamta').submit(function (e) {
                    e.preventDefault();
                    var form_data = new FormData(document.getElementById("FormActivationHamta"));

                    if ($('#NationalCode_activation_hamta').hasClass('is-valid')){
                        if ($('#rememberFormHamta').is(':checked')) { // Check if the checkbox is checked
                            $.ajax({
                                url: '/sendOtpActivationHamta',
                                method: 'POST',
                                data: form_data, // تغییر اینجا
                                processData: false,
                                contentType: false,
                                beforeSend: function () {
                                    $('#loading').removeClass('d-none');
                                },
                                complete: function () {
                                    $('#loading').addClass('d-none');
                                },
                                success: function(data) {
                                    if ($.isEmptyObject(data.errors)) {
                                        $('#mobileCheckOtpActivationHamta').val($('#Mobile_activation_hamta').val())
                                        $('#modalActivationHamtaOtp').appendTo("body").modal('show');
                                    }else {
                                        printErrorMsgCheckActivationHamta(data.errors);
                                    }
                                },
                                error: function (data) {
                                    Swal.fire(
                                        '',
                                        'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                                        'error'
                                    )
                                        .then(function (isConfirm) {
                                            if (isConfirm) {
                                                location.reload();
                                            } else {
                                                //if no clicked => do something else
                                            }
                                        });
                                }
                            });
                        } else {
                            $.confirm({
                                title: '',
                                content: `لطفا تیک "قوانین دریافت کد فعال سازی همتا را مطالعه کرده و قبول دارم" را بزنید!`,
                                type: 'red',
                                buttons: {
                                    تایید: {
                                        btnClass: 'btn-red',
                                    }
                                },
                                buttonsAlign: 'center',
                                onOpenBefore: function() {
                                    $('.jconfirm-content').css('text-align', 'center');
                                    $('.jconfirm-buttons').css('justify-content', 'center');
                                }
                            });
                        }
                    }
                    else {
                        $.confirm({
                            title: '',
                            content: `کد ملی وارد شده نامعتبر میباشد !`,
                            type: 'red',
                            buttons: {
                                تایید: {
                                    btnClass: 'btn-red',
                                }
                            },
                            buttonsAlign: 'center',
                            onOpenBefore: function() {
                                $('.jconfirm-content').css('text-align', 'center');
                                $('.jconfirm-buttons').css('justify-content', 'center');
                            }
                        });
                    }
                });

                function printErrorMsgCheckActivationHamta(msg) {
                    $("#myTextBox").addClass('errorClass');
                    $.each(msg, function (key, value) {
                        $('.' + key + '_err').text(value);
                        $('.' + key + '_activation_hamta').addClass('is-invalid');
                    });
                }

                $('#otpActivationHamta').submit(function (e) {
                    e.preventDefault();

                    var form = $('#FormActivationHamta')[0]; // You need to use standard javascript object here
                    var formData = new FormData(form);
                    formData.append('mobileCheckOtpActivationHamta', $('#mobileCheckOtpActivationHamta').val());
                    formData.append('activationHamtaOtpCode', $('#activationHamtaOtpCode').val());
                    $.ajax({
                        method: 'POST',
                        url: "/checkAndSaveOtpActivationHamta",
                        data: formData,
                        cache: false,
                        beforeSend: function () {
                            $('#loading').removeClass('d-none');
                        },
                        complete: function () {
                            $('#loading').addClass('d-none');
                        },
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            if (data.errors) {
                                jQuery('.alert-danger-check-otp-activation_hamta').hide()
                                jQuery.each(data.errors, function (key, value) {
                                    jQuery('.alert-danger-check-otp-activation_hamta').show();
                                    jQuery('.alert-danger-check-otp-activation_hamta').append('<div style="font-size:14px;padding: 5px 15px" class="alert alert-danger w-100 each-alert-error-validation">' + value + '</div');
                                });
                                setTimeout(function (e) {
                                    jQuery('.each-alert-error-validation').hide()
                                }, 6000);
                            }
                            if (data.statusCode == 210) {
                                jQuery('.alert-danger-error-opt-activation_hamta').removeClass("d-none")
                                setTimeout(function (e) {
                                    jQuery('.alert-danger-error-opt-activation_hamta').addClass("d-none")
                                }, 6000);
                            }
                            if (data.statusCode == 200) {
                                $('#modalActivationHamtaOtp').modal('hide');
                                $.confirm({
                                    title: '',
                                    content: ` ${data.name} عزیز<br>اطلاعات شما با موفقیت ثبت شد. <br>کد فعال سازی شما: ${data.code}<br>تجربه خدمات عالی با مدیاجی`,
                                    type: 'green',
                                    buttons: {
                                        تایید: {
                                            btnClass: 'btn-green',
                                            action: function() {
                                                location.reload();
                                            }
                                        }
                                    },
                                    onClose: function() {
                                        location.reload();
                                    },
                                    buttonsAlign: 'center',
                                    onOpenBefore: function() {
                                        $('.jconfirm-content').css('text-align', 'center');
                                        $('.jconfirm-buttons').css('justify-content', 'center');
                                    }
                                });
                            }
                        },
                        error: function (data) {
                            Swal.fire(
                                'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                                '',
                                'error'
                            )
                                .then(function (isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    } else {
                                        //if no clicked => do something else
                                    }
                                });
                        }
                    });
                });

                $(document).ready(function() {
                    let sendSmsCountdown = $('.send-sms-countdown');
                    let sendSmsBtn = sendSmsCountdown.find('.btn-send-sms');
                    let countdown = sendSmsCountdown.find('.countdown');
                    let phoneInput = $('#mobileCheckOtpActivationHamta');
                    let countdownInterval = null;
                    let countdownTime = 3 * 60;

                    function smsCountdown() {
                        sendSmsBtn.addClass('disabled');
                        countdown.addClass('disabled');
                        countdown.html(formatTime(countdownTime));
                        countdownInterval = setInterval(function() {
                            countdownTime--;
                            countdown.html(formatTime(countdownTime));
                            if (countdownTime < 0) {
                                clearInterval(countdownInterval);
                                countdown.html('');
                                sendSmsBtn.html('ارسال مجدد').removeClass('disabled');
                                countdownTime = 3 * 60;
                            }
                        }, 1000);
                    }

                    function sendSms() {
                        let phoneNumber = phoneInput.val();
                        if (phoneNumber) {
                            $.ajax({
                                url: '/hamta/send-sms',
                                method: 'POST',
                                data: {
                                    Mobile: phoneNumber
                                },
                                beforeSend: function() {
                                    sendSmsBtn.addClass('disabled');
                                    countdown.removeClass('disabled');
                                    countdown.html('');
                                    sendSmsBtn.html('در حال ارسال...');
                                },
                                success: function(response) {
                                    if (response.success) {
                                        sendSmsBtn.html('');
                                        smsCountdown();
                                    } else {
                                        alert(response.error);
                                        sendSmsBtn.html('ارسال مجدد').removeClass('disabled');
                                        countdown.addClass('disabled');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    alert('خطا در ارتباط با سرور رخ داده است.');
                                    sendSmsBtn.html('ارسال مجدد').removeClass('disabled');
                                    countdown.addClass('disabled');
                                }
                            });
                        } else {
                            alert('لطفاً شماره تلفن خود را وارد کنید.');
                        }
                    }

                    function formatTime(seconds) {
                        let min = Math.floor(seconds / 60);
                        let sec = seconds % 60;
                        return (min < 10 ? '0' + min : min) + ':' + (sec < 10 ? '0' + sec : sec);
                    }

                    sendSmsCountdown.on('click', '.btn-send-sms', function() {
                        if (!$(this).hasClass('disabled')) {
                            sendSms();
                        }
                    });
                });

            </script>

            <script type="text/javascript">
                $(".changeProvince").change(function () {
                    $('.changeCity').empty();
                    var id = $(this).val();
                    var dataString = 'id=' + id;
                    $.ajax({
                        type: "POST",
                        url: "/getCity",
                        data: dataString,
                        cache: false,
                        success: function (data) {
                            data.forEach(function (key, index) {
                                $('.changeCity').append($("<option></option>").attr("value", key.city_val).text(key.city_name));

                            })
                        }
                    });
                });
                $("#province_id").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    height: '40px',
                    placeholder: 'استان خود را وارد کنید',
                    allowClear: true
                });
                $("#city_id").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    height: '40px',
                    placeholder: 'شهر خود را وارد کنید',
                    allowClear: true
                });
            </script>
@endsection
