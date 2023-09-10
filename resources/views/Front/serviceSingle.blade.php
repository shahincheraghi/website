@extends('Layouts.frontLayout')
@section('content')

<section class="page-title-area " style="background-image: url(/{{(isset($data['settings']['breadcrumbImage']))?$data['settings']['breadcrumbImage']:''}})">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>{{trans('langFront.services')}}</h2>
<ul>
<li><a href="{{route('Front.index')}}">{{trans('langFront.home')}}</a></li>
<li>{{$data['service']->Category->title}}</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<section class="services-details-area ptb-100">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12">
<div class="services-details-desc">
<div class="services-details-image">
<img src="/{{$data['service']->image}}" alt="image">
</div>
<h3>{{$data['service']->title}}</h3>
<p>{!!$data['service']->text!!}</p>




</div>
</div>
<div class="col-lg-4 col-md-12">
<aside class="widget-area" id="secondary">

<section class="widget widget_services_list">
<h3 class="widget-title">{{trans('langFront.category')}}</h3>
<ul>
        @foreach($data['Category'] as $Category)
        <li><a href="{{route('Front.service',$Category->id) }}">{{$Category->title}} <i class="flaticon-left-arrow"></i></a>
                                        </li>
          @endforeach
</ul>
</section>

<section class="widget widget_appointment">
<h3 class="widget-title">{{trans('langFront.contact')}}</h3>
 @include('Layouts.msg')
<form class="appointment-form" method="POST" action="{{route('contacts.store')}}" >
@CSRF
<div class="form-group" >
<div class="icon">
<i class="flaticon-user"></i>
</div>
<label>{{trans('langFront.name')}}</label>
<input type="text" class="form-control" placeholder="{{trans('langFront.name')}}" id="fullname" name="fullname">
</div>
<div class="form-group">
<div class="icon">
<i class="flaticon-envelope"></i>
</div>
<label>{{trans('langFront.email')}}</label>
<input type="email" class="form-control" placeholder="{{trans('langFront.email')}}" id="email" name="email">
</div>
<div class="form-group">
<div class="icon">
<i class="flaticon-support"></i>
</div>
<label>{{trans('langFront.subject')}}</label>
<input type="text" class="form-control" placeholder="{{trans('langFront.subject')}}" id="subject" name="subject">
</div>

<div class="form-group">
<div class="icon">
<i class="fas fa-envelope"></i>
</div>
<label>{{trans('langFront.text')}}</label>
 <textarea type="textarea"  class="form-control" placeholder="{{trans('langFront.text')}}" id="text" name="text"> </textarea>
</div>

<button class="btn btn-primary">{{trans('langFront.send')}} <i class="flaticon-left-chevron"></i></button>
</form>
</section>
</aside>
</div>
</div>
</div>
</section>


@endsection


