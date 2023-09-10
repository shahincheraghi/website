@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.footer')}}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css"  href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
    <link href="{{ asset('Admin/app-assets/plugins/fontawesome-icon-browser-picker/fontawesome-browser.css')}}" rel="stylesheet">

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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.footer')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.footer')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form id="formFooter">
                <div class="content-body">
                    <!-- Input Validation start -->
                    <section class="input-validation">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header">
                                        <h4 class="card-title"> قسمت بالای فوتر</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label
                                                            for="changeFont">{{trans('langPanel.status')}}
                                                        </label>
                                                        <select class="form-control" name="statusTopFooter"
                                                                data-validation-required-message=""
                                                                id="statusTopFooter">
                                                            <option value="1">{{trans('langPanel.on')}}
                                                            </option>
                                                            <option value="0">{{trans('langPanel.off')}}
                                                            </option>

                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-16">
                                                    <fieldset class="form-group">
                                                        <label for="address">{{trans('langPanel.topFooterTitle')}}</label>
                                                        <input  type="text" value="{{$footers[0]->topFooterTitle}}" class="form-control" name="topFooterTitle"
                                                                id="topFooterTitle" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="topFooterDescription">{{trans('langPanel.topFooterDescription')}}</label>
                                                        <input  type="text" value="{{$footers[0]->topFooterDescription}}" class="form-control" name="topFooterDescription"
                                                                id="topFooterDescription" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="topFooterIcon">{{trans('langPanel.topFooterIcon')}}</label>
                                                        <input type="text" class="form-control" placeholder="Select icon" value="{{$footers[0]->topFooterIcon}}" name="topFooterIcon" id="topFooterIcon" data-fa-browser />
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="topFooterDescription">{{trans('langPanel.topFooterTitleBtnOne')}}</label>
                                                        <input  type="text" value="{{$footers[0]->topFooterTitleBtnOne}}" class="form-control" name="topFooterTitleBtnOne"
                                                                id="topFooterTitleBtnOne" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="topFooterLinkBtnOne">{{trans('langPanel.topFooterLinkBtnOne')}}</label>
                                                        <input  type="text" value="{{$footers[0]->topFooterLinkBtnOne}}" class="form-control" name="topFooterLinkBtnOne"
                                                                id="topFooterLinkBtnOne" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="topFooterDescription">{{trans('langPanel.topFooterTitleBtnTow')}}</label>
                                                        <input  type="text" value="{{$footers[0]->topFooterTitleBtnTow}}" class="form-control" name="topFooterTitleBtnTow"
                                                                id="topFooterTitleBtnTow" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="topFooterLinkBtnTow">{{trans('langPanel.topFooterLinkBtnTow')}}</label>
                                                        <input  type="text" value="{{$footers[0]->topFooterLinkBtnTow}}" class="form-control" name="topFooterLinkBtnTow"
                                                                id="topFooterLinkBtnTow" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Input Validation end -->
                </div>

                <div class="content-body">
                    <!-- Input Validation start -->
                    <section class="input-validation">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header">
                                        <h4 class="card-title"> ارتباط با ما</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="address">{{trans('langPanel.address')}}</label>
                                                        <input  type="text" value="{{$footers[0]->address}}" class="form-control" name="address"
                                                               id="address" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="phone">{{trans('langPanel.phone')}}</label>
                                                        <input  type="text" value="{{$footers[0]->phone}}" class="form-control" name="phone"
                                                               id="phone" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="email">{{trans('langPanel.email')}}</label>
                                                        <input  type="text" value="{{$footers[0]->email}}" class="form-control" name="email"
                                                               id="email" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="description">{{trans('langPanel.description')}}</label>
                                                        <textarea id="description" class="form-control"  name="description"> {{$footers[0]->description}}"</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Input Validation end -->
                </div>

                <div class="content-body">
                    <!-- Input Validation start -->
                    <section class="input-validation" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header">
                                        <h4 class="card-title"> شبکه های مجازی</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="telegram">{{trans('langPanel.telegram')}}</label>
                                                        <input  type="text" value="{{$footers[0]->telegram}}" class="form-control" name="telegram"
                                                               id="telegram" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="instagram">{{trans('langPanel.instagram')}}</label>
                                                        <input  type="text" value="{{$footers[0]->instagram}}" class="form-control" name="instagram"
                                                               id="instagram" >
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="linkedin">{{trans('langPanel.linkedin')}}</label>
                                                        <input  type="text" value="{{$footers[0]->linkedin}}" class="form-control" name="linkedin"
                                                               id="linkedin" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="aparat">{{trans('langPanel.aparat')}}</label>
                                                        <input  type="text" value="{{$footers[0]->aparat}}" class="form-control" name="aparat"
                                                               id="aparat" >
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="whatsapp">{{trans('langPanel.whatsapp')}}</label>
                                                        <input  type="text" value="{{$footers[0]->whatsapp}}" class="form-control" name="whatsapp"
                                                               id="whatsapp" >
                                                    </fieldset>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Input Validation end -->
                </div>

                <div class="content-body">
                    <!-- Input Validation start -->
                    <section class="input-validation" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header">
                                        <h4 class="card-title"> خبرنامه</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="titleSubscribe">{{trans('langPanel.titleSubscribe')}}</label>
                                                        <input  type="text" value="{{$footers[0]->titleSubscribe}}" class="form-control" name="titleSubscribe"
                                                               id="titleSubscribe" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Input Validation end -->
                </div>

                <div class="content-body">
                    <!-- Input Validation start -->
                    <section class="input-validation" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header">
                                        <h4 class="card-title"> پایین فوتر</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="titleCopyRightBottomFooter">{{trans('langPanel.titleCopyRightBottomFooter')}}</label>
                                                        <input  type="text" value="{{$footers[0]->titleCopyRightBottomFooter}}" class="form-control" name="titleCopyRightBottomFooter"
                                                                id="titleCopyRightBottomFooter" >
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="titleDevelopBottomFooter">{{trans('langPanel.titleDevelopBottomFooter')}}</label>
                                                        <input  type="text" value="{{$footers[0]->titleDevelopBottomFooter}}" class="form-control" name="titleDevelopBottomFooter"
                                                                id="titleDevelopBottomFooter" >
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Input Validation end -->
                </div>

                <div class="row ">
                    <div class="col-12 text-center">
                        <button type="submit"
                                class="btn btn-primary">{{trans('langPanel.save_information')}}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
    <script>
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


        $('#formFooter').submit(function(e) {
            e.preventDefault();
            setTimeout(function() {
                jQuery('.alert-danger').css("display", "none");
            },6000);
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: '/Admins/saveFooter',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.errors){
                        jQuery.each(data.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>'+value+'</p>');
                        });
                    }else {
                        Swal.fire(
                            'با موفقیت ثبت شد!',
                            '',
                            'success'
                        )
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    }
                },
                error: function(data){

                    Swal.fire(
                        'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                        '',
                        'error'
                    )
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                }
            });
        });



    </script>
    <script src="{{ asset('Admin/app-assets/plugins/fontawesome-icon-browser-picker/fontawesome-browser.js')}}"></script>
    <script>
        $(function($) {

            $.fabrowser();

        });

    </script>
@endsection
