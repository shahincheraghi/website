@extends('Layouts.frontLayout')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="" crossorigin=""/>
    <link rel="stylesheet" href="{{ asset('Front/css/leaflet.css') }}">
@endsection
@php
    $settings = \App\Models\Settings::allSettings()->pluck('value', 'name');
@endphp


@section('content')

    <section class="bg-half d-table w-100" style="background: url(/{{(isset($data['settings']['videoImage']))?$data['settings']['videoImage']:''}}) center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> {{trans('langFront.contact')}} </h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="/"> صفحه اصلی</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('langFront.contact')}} </li>
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

    <section class="section pb-0">

        <div class="container ">

            <div class="text-right row align-items-center">

                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                    @include('Layouts.msg')
                    <div class="dirRtl pt-5 pb-5 p-4 bg-light shadow rounded">
                        <h4>در ارتباط باشید </h4>
                        <div class="custom-form mt-4">
                            <div id="message"></div>
                            <form class="dirRtl" method="POST" action="{{route('contacts.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>نام و نام خانوادگی <span class="text-danger">*</span></label>
                                            <i class="mdi mdi-account ml-3 icons"></i>
                                            <input name="fullname" id="fullname" data-error="{{trans('langFront.fullname')}}"  type="text" class="form-control pr-5" placeholder="نام و نام خانوادگی :" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>ایمیل  <span class="text-danger">*</span></label>
                                            <i class="mdi mdi-email ml-3 icons"></i>
                                            <input name="email" id="email" data-error="{{trans('langFront.email')}}"  type="email" class="form-control pr-5" placeholder="ایمیل  :" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>موضوع</label>
                                            <i class="mdi mdi-book ml-3 icons"></i>
                                            <input name="subject" id="subject"  data-error="{{trans('langFront.subject')}}" class="form-control pr-5" placeholder="موضوع  :">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>پیام</label>
                                            <i class="mdi mdi-comment-text-outline ml-3 icons"></i>
                                            <textarea name="text" id="text"  rows="4" class="form-control pr-5"  data-error="{{trans('langFront.text')}}" placeholder="پیام  :" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div><!--end row-->
                                <div class="row pt-5">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" id="submitContactForm" class="submitBnt btn btn-danger ">{{trans('langFront.send')}}</button>
                                        <div id="simple-msg"></div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div><!--end custom-form-->
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    <img  src="{{asset('Front/img/new/picFormContact2.jpeg')}}" class=" imgForm img-fluid" alt="">
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12947.855992370678!2d51.413483600000006!3d35.776260699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f5d42673a86a212!2sSayeh%20Tower!5e0!3m2!1sen!2s!4v1659894402710!5m2!1sen!2s" width="600" height="370" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

@endsection


