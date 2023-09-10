@extends('Layouts.frontLayout')
@section('content')

<section class="page-title-area"  style="background-image: url({{ asset('Front/img/page-title/5.jpg')}})" >
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>{{trans('langFront.home')}}</h2>
<ul>
<li><a href="{{route('Front.index')}}">{{trans('langFront.home')}}</a></li>
<li>{{trans('langFront.the_payment')}}</li>
</ul>
</div>
</div>
</div>
</div>
</section>


<section class="doctor-calendar-area ptb-100">
<div class="container">


        @if($data['status']=='success')
<div class="section-title">
 <span>{{trans('langFront.the_payment')}} {{trans('langFront.done_successfully')}}<br/>
<p class="">{{trans('langFront.your_tracking_code')}} : <span>{{$data['code_tracking']}} </span>{{trans('langFront.is')}} </span>
    <h2>{{trans('langFront.by_going_to_the_page')}}<a href="/account" class="">{{trans('langFront.Account')}}</a>
                 {{trans('langFront.you_can_view_your_order_history')}}</h2>
        <p>{{trans('langFront.thanks_for_your_purchase')}}</p>
    <a href="/"  class="breadcrumb-item nuxt-link-active">{{trans('langFront.to_go')}}  </a>
</div>
  @else
@if(sizeof($data['response'])>0)
    <div class="section-title">
<span>{{$data['text']}}</span>
<p><a href="/"  class="breadcrumb-item nuxt-link-active">{{trans('langFront.to_go')}}  </a></p>
</div>
<div class="doctor-calendar-table table-responsive">
<table class="table">
<thead>
<tr>
<th>{{trans('langFront.product')}}</th>
<th>{{trans('langFront.Inventory')}}</th>
<th>{{trans('langFront.the_number_in_your_cart')}}</th>
 </tr>
</thead>
<tbody>
@foreach($data['response'] as $response)
<tr>
<td><span class="time">{{$response['product']}}</span></td>
<td>
<h3>{{$response['count']}}</h3>
</td>
<td>
<h3>{{$response['number']}}</h3>
</td>
</tr>
@endforeach


</tbody>
</table>
</div>
  @else
      <div class="section-title">
 <span>{{trans('langFront.the_payment')}} {{trans('langFront.failed')}}</span>
    <h2>{{$data['text']}} </h2>
        <p>{{trans('langFront.by_going_to_the_page')}}<a href="/account" class="">{{trans('langFront.Account')}}</a>
        {{trans('langFront.you_can_view_your_order_history')}}</p>
     </div>
  @endif

  @endif


</div>
</section>



@endsection

