@extends('Layouts.frontLayout')
@section('content')

<section class="contact-area ptb-100">
<div class="container">

<div class="row">
<div class="col-lg-8 col-md-12">
<div class="section-title">
<span>{{trans('langFront.login_to_profile')}}</span>
</div>

<div class="contact-form">
 @include('Layouts.msg')
<form   action="{{route('Auth.doLogin')}}" method="POST" >
 @CSRF
  <input name="routeBack" value="{{$routeBack}}" type="hidden">
<div class="row">

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="number" id="mobile" placeholder="{{trans('langFront.mobile')}}" autocomplete="mobile" name="mobile"  required data-error="{{trans('langFront.mobile')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="password" id="password" placeholder="{{trans('langFront.password')}}" autocomplete="password" name="password"  required data-error="{{trans('langFront.password')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>


<div class="col-lg-12 col-md-12">
<button type="submit" class="btn btn-primary">{{trans('langFront.login')}} <i class="flaticon-left-chevron"></i></button>
	<div class="text-right">  اکانت ندارید؟<a href="{{route('register')}} "> ‌ثبت نام کنید </a> </div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>
<div class="col-lg-4 login-left">
    <img src=" {{ asset('Front/img/login-banner.png')}}" class="img-fluid" >
	</div>
</div>
</div>
<div class="bg-map"><img src="{{ asset('Front/img/bg-map.png')}}" alt="image"></div>
</section>




@endsection
