@extends('Layouts.frontLayout')
@section('content')

<section class="page-title-area" style="background-image: url(/{{(isset($data['settings']['breadcrumbImage']))?$data['settings']['breadcrumbImage']:''}})">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>{{trans('langFront.team')}}</h2>
<ul>
<li><a href="{{route('Front.index')}}">{{trans('langFront.home')}}</a></li>
<li>{{trans('langFront.leaders')}}</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<section class="doctor-area ptb-100">
<div class="container">
<div class="section-title">
<span>{{trans("langFront.leaders")}}</span>
<h2>{{trans('langFront.creative_team')}}</h2>
<p>{{trans('langFront.Our_expert_leaders_are_waiting_for_you.')}}</p>
</div>
<div class="row">
@foreach($data['teams'] as $item)
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-doctor-box">
<div class="doctor-image">
<img src="/{{$item->image}}" alt="{{$item->fullname}}">
<a href="#" class="details-btn"><i class="fas fa-plus"></i></a>
</div>
<div class="doctor-content">
<h3><a href="#">{{$item->fullname}}</a></h3>
<span>{{$item->designation}}</span>
<ul class="social">
 @foreach($item->socials as $social)
    <li><a href="{{$social->link}}" title="{{$social->title}}" ><i class="{{$social->class_font}}"></i></a></li>
@endforeach

</ul>
</div>
</div>
</div>
 @endforeach
</div>
</div>
<div class="shape3"><img src="{{ asset('Front/img/shape/3.png')}}" class="wow fadeInLeft" alt="image"></div>
</section>
@endsection

