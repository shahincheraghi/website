@extends('Layouts.frontLayout')
@section('content')

<section class="contact-area ptb-100">
<div class="container">

<div class="row">
<div class="col-lg-8 col-md-12">
<div class="section-title">
<span>{{trans('langFront.info_register')}}</span>
</div>

<div class="contact-form">
 @include('Layouts.msg')
<form   action="{{route('Auth.doRegister')}}" method="POST" >
 @CSRF

<div class="row">

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="text" id="name" placeholder="{{trans('langFront.name')}}"  name="name"  required data-error="{{trans('langFront.name')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="text" id="family" placeholder="{{trans('langFront.family')}}"  name="family"  required data-error="{{trans('langFront.family')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="number" id="mobile" placeholder="{{trans('langFront.mobile')}}" autocomplete="mobile" name="mobile"  required data-error="{{trans('langFront.mobile')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="email" id="email" placeholder="{{trans('langFront.email')}}"  name="email"  required data-error="{{trans('langFront.email')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="password" id="password" placeholder="{{trans('langFront.password')}}"  name="password"  required data-error="{{trans('langFront.password')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-10 col-md-10">
<div class="form-group">
<input class="form-control" type="password" id="passwordConfirm" placeholder="{{trans('langFront.repeat_the_password')}}"  name="passwordConfirm"  required data-error="{{trans('langFront.repeat_the_password')}}" >
 <div class="help-block with-errors"></div>
</div>
</div>


<div class="col-lg-12 col-md-12">
<button type="submit" class="btn btn-primary"> {{trans('langFront.sending_information')}}  <i class="flaticon-left-chevron"></i></button>
	<div class="text-right">  حساب کاربری دارید؟<a href="{{route('login')}} "> {{trans('langFront.login')}} </a> </div>
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
