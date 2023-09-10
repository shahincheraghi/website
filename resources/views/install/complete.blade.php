@extends('install.layout')

@section('content')
    <h2>3. تکمیل شد</h2>

    <div class="box">
        <div class="installation-message text-center">
            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            <h3>سایت شما آماده است !</h3>
        </div>

        <div class="clearfix"></div>

        <div class="visit-wrapper text-center clearfix">
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ url('/') }}" class="visit text-center" style="text-align: center!important;" target="_blank">
                        <div class="icon">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                        </div>

                        <h5 style="text-align: center;">رفتن به سایت </h5>
                    </a>
                </div>

                <div class="col-sm-6">
                    <a href="{{ route('login') }}" class="visit text-center" style="text-align: center!important;" target="_blank">
                        <div class="icon">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>

                        <h5 style="text-align: center;">رفتن به پنل مدیریت</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
