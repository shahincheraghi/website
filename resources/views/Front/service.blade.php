@extends('Layouts.frontLayout')
@section('content')


<section class="page-title-area" style="background-image: url(/{{(isset($data['settings']['breadcrumbImage']))?$data['settings']['breadcrumbImage']:''}})">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>{{trans('langFront.services')}}</h2>
<ul>
<li><a href="{{route('Front.index')}}">{{trans('langFront.home')}}</a></li>
<li>{{trans('langFront.services')}}</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<section class="services-area ptb-100 bg-f4f9fd">
<div class="container">
<div class="row">
@forelse($data['services'] as $service)
   <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box" style="background-image: url({{$service->image}});"  >
                        <div class="icon">
                            <i class="{{$service->icon}}"></i>
                        </div>
                        <h3><a href="{{route('Front.serviceSingle',$service->id)}}">{{$service->title}}</a></h3>
                        <p>{!!Str::limit($service->text, $limit = 150, $end = '...') !!}</p>
                        <a href="{{route('Front.serviceSingle',$service->id)}}" class="read-more-btn">{{trans('langFront.more')}} <i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
   @empty
          <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="single-news text-center ">
                            <span class="d-block mb-2"> <img width="70" src="/Front/img/blank.svg"></span>
                            {{trans('langFront.No_information_found')}}
                        </div>
                    </div>
                @endforelse
<div class="col-lg-12 col-md-12">
 @if ($data['services']->lastPage() > 1)
<div class="pagination-area">
<a href="{{ $data['services']->url(1) }}" class="prev page-numbers {{ ($data['services']->currentPage() == 1) ? ' disabled' : '' }} "><i class="fas fa-angle-double-right"></i></a>
@for ($i = 1; $i <= $data['services']->lastPage(); $i++)
<a href="{{ $data['services']->url($i) }}" class="page-numbers {{ ($data['services']->currentPage() == $i) ? ' current' : '' }} " >{{ $i }}</a>
@endfor
<a href="{{ $data['services']->url($data['services']->currentPage()+1) }}"  class="next page-numbers {{ ($data['services']->currentPage() == $data['services']->lastPage()) ? ' disabled' : '' }} "><i class="fas fa-angle-double-left"></i></a>
</div>
@endif
</div>

</div>
</div>
</section>

@endsection

