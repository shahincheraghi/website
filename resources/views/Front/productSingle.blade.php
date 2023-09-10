@extends('Layouts.frontLayout')
@section('content')



<main class="pb-90 pt-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-wrap">
                    <div class="product-details mb-60">
                        <div class="row">
                            <div class="col-lg-6 text-right">
                                <div  id="elevate-zoom " class="ez-wrap mb-5 mb-lg-0">
                                    <div>
                                        <div style="height:500px;width:500px;" class="zoomWrapper ">

                                            <img id="img_01" src="/{{$data['Product']->image}}" alt="{{$data['Product']->title}}" data-zoom-image="/{{$data['Product']->image}}"  style="position: absolute;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details-content">
                                    <div class="top-content">
{{--                                        <div class="price-review d-flex align-items-center">--}}
{{--                                            <div class="pd-price">--}}

{{--                                                @if($data['Product']->discount_percent>0)--}}
{{--                                                    <div class="sale-btn">{{$data['Product']->discount_percent}}%</div>--}}
{{--                                                @endif--}}
{{--                                                @if($data['Product']->discount_percent>0)--}}
{{--                                                    <div >--}}
{{--                                                        <span class="new-price"> {{number_format(PriceCalculation($data['Product']->price,$data['Product']->discount_percent))}} {{trans('langFront.toman')}}</span>--}}
{{--                                                        <span class="old-price">{{number_format($data['Product']->price)}} </span>--}}
{{--                                                    </div>--}}
{{--                                                @else--}}
{{--                                                    <div >--}}
{{--                                                        <span class="new-price">{{number_format($data['Product']->price)}} {{trans('langFront.toman')}}</span>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}

{{--                                            </div>--}}

{{--                                        </div>--}}
                                        <h2 class="product_title">{{$data['Product']->title}}</h2>
                                        <p class="text-justify">
                                            {{$data['Product']->short_description}}
                                        </p>
                                    </div>
                                    <div class="middle-content">

                                            <div style="justify-content: center" class="d-flex align-items-sm-center flex-wrap">

                                                <button  type="submit" class="single_add_to_cart_button btn "><span style="color: white !important;">برای ثبت سفارش تماس بگیرید</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         viewBox="0 0 16 16" class="svg replaced-svg">
                                                        <path id="cart-white"
                                                              d="M5.8,14.8a1.6,1.6,0,1,0,1.6,1.6A1.6,1.6,0,0,0,5.8,14.8ZM1,2V3.6H2.6L5.48,9.672,4.4,11.632a1.547,1.547,0,0,0-.2.768A1.6,1.6,0,0,0,5.8,14h9.6V12.4H6.136a.2.2,0,0,1-.2-.2l.024-.1.72-1.3h5.96a1.592,1.592,0,0,0,1.4-.824L16.9,4.784A.782.782,0,0,0,17,4.4a.8.8,0,0,0-.8-.8H4.368L3.616,2H1ZM13.8,14.8a1.6,1.6,0,1,0,1.6,1.6A1.6,1.6,0,0,0,13.8,14.8Z"
                                                              transform="translate(-1 -2)" fill="#fff"></path>
                                                    </svg>
                                                </button>
                                                <div class="buttons d-flex align-items-center"><a href="#"
                                                                                                  class="add_to_wishlist">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="wishlist"
                                                             width="17.998" height="17.997" viewBox="0 0 17.998 17.997"
                                                             class="svg replaced-svg">
                                                            <path id="wishlist-2" data-name="wishlist"
                                                                  d="M1732.993,48a.712.712,0,0,1-.529-.251l-6.972-7.912a6.314,6.314,0,0,1-.008-8.145,4.681,4.681,0,0,1,7.21.008l.31.352.3-.344a4.682,4.682,0,0,1,7.209,0,6.332,6.332,0,0,1-.007,8.149l-6.987,7.9A.711.711,0,0,1,1732.993,48Zm-3.909-16.33a3.365,3.365,0,0,0-2.537,1.2,4.51,4.51,0,0,0,0,5.809l6.443,7.313,6.458-7.3a4.523,4.523,0,0,0,0-5.813,3.3,3.3,0,0,0-5.086,0l-.832.944a.69.69,0,0,1-1.062,0l-.839-.952A3.379,3.379,0,0,0,1729.083,31.667Z"
                                                                  transform="translate(-1723.999 -29.999)"
                                                                  fill="#fff"></path>
                                                        </svg>
                                                    </a><a href="#" class="add_to_wishlist">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14.753"
                                                             height="18" viewBox="0 0 14.753 18"
                                                             class="svg replaced-svg">
                                                            <path id="Union_96" data-name="Union 96"
                                                                  d="M1.936,15.571l1.383-1.38,2.425,2.428L4.361,18ZM.124,13.762,4.36,9.538,5.738,10.92,1.5,15.145Zm4.6.981-.978-.978.97-.97h5.863A2.227,2.227,0,0,0,12.8,10.569V9.757h1.948v.811a4.179,4.179,0,0,1-4.171,4.175Zm4.289-7.66,4.23-4.23,1.38,1.38L10.4,8.465ZM0,8.24V7.428A4.179,4.179,0,0,1,4.171,3.253h5.855L11,4.231l-.97.97H4.171A2.227,2.227,0,0,0,1.947,7.428V8.24Zm9.011-6.86L10.392,0l2.425,2.425L11.436,3.8Z"
                                                                  transform="translate(0 0.001)" fill="#fff"></path>
                                                        </svg>
                                                    </a></div>
                                            </div>

                                    </div>
                                    <div class="product_meta text-justify">
                                        <div class="sku_wrapper"><span class="label">وزن: </span><span
                                                class="sku">۵۰۰۰</span></div>
                                        <div class="posted_in"><span class="label">طول: </span><a href="#"
                                                                                                       rel="tag">۴۰</a>
                                        </div>
                                        <div class="tagged_as"><span class="label">محل تحویل :
    </span>
                                            <span>انبار اصفهان</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="woocommerce-tabs wc-tabs-wrapper mb-60">
                    <div class="tab-btn">
                        <ul class="nav">
                            <li>
                                <button class="active" data-bs-toggle="tab" data-bs-target="#description">توضیحات بیشتر
                                </button>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content pt-1">
                        <div class="tab-pane fade show active product-description" id="description">

                            <div class="products-details-tab-content">
                                <p style="text-align: justify !important;line-height: 2">{!!$data['Product']->description!!}</p>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection

