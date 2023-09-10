@extends('Layouts.frontLayout')
@section('content')




    <div class="page-title-wrap overlay ovx-hidden bg-img "
         style="background-image: url(/{{(isset($data['settings']['infoImage']))?$data['settings']['infoImage']:''}});">
        <div class="container position-relative">
            <div class="row">
                <div class="col">
                    <div class="page-title all-white">
                        <h2>{{trans('langFront.products')}}</h2></div>
                </div>
            </div>
            <ul class="breadcrumb-nav nav justify-content-center">
                <li><a href="/">{{trans('langFront.home')}}</a></li>
                <li class="active">{{trans('langFront.products')}}</li>
            </ul>
        </div>
    </div>



    <section style="background-color: #e7e7e759" class="pt-120 pb-120">
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="bigtitle">
                    <h2 class="maintitle h1 text-bold-9 "><span>لیست محصولات </span></h2>
                    <strong class="subtitle1 h6 pb-3">برای استعلام موجودی و قیمت تماس بگیرید</strong>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px" class="container ">
            <div class="row">
                @foreach($data['Product'] as $Product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product">
                            <div class="product-top"><a href="{{route('Front.productSingle',$Product->id)}}"
                                                        class="product-thumbnail"><img
                                        src="/{{$Product->image}}" data-rjs="2" alt="" style="height: 270px" data-rjs-processed="true"
                                        ></a>

                            </div>
                            <div class="product-summary">

                                <a href="{{route('Front.productSingle',$Product->id)}}"><h4>{{$Product->title}}</h4></a><span
                                    class="product-price">
                                    <span
                                        class="woocommerce-Price-amount amount">
                                        <span
                                            class="woocommerce-Price-currencySymbol">
                                            <span style="color: red"> برای اطلاع قیمت تماس بگیرید</span>

                        </span>
                            </div>

                        </div>
                    </div>
                @endforeach

                    <div class="col-lg-12 col-md-12">
                        @if ($data['Product']->lastPage() > 1)
                            <div class="pagination-area">
                                <a href="{{ $data['Product']->url(1) }}"
                                   class="prev page-numbers {{ ($data['Product']->currentPage() == 1) ? ' disabled' : '' }} "><i
                                        class="fas fa-angle-double-right"></i></a>
                                @for ($i = 1; $i <= $data['Product']->lastPage(); $i++)
                                    <a href="{{ $data['Product']->url($i) }}"
                                       class="page-numbers {{ ($data['Product']->currentPage() == $i) ? ' current' : '' }} ">{{ $i }}</a>
                                @endfor
                                <a href="{{ $data['Product']->url($data['Product']->currentPage()+1) }}"
                                   class="next page-numbers {{ ($data['Product']->currentPage() == $data['Product']->lastPage()) ? ' disabled' : '' }} "><i
                                        class="fas fa-angle-double-left"></i></a>
                            </div>
                        @endif
                    </div>
            </div>

        </div>
    </section>



@endsection

