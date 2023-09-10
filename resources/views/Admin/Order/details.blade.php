@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.orderDetails')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.order')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.orderDetails')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">

                    <fieldset class="checkout-step-1 px-0">

                        @include('Layouts.msg')

                        <section id="place-order" class="list-view product-checkout">
                            <div class="checkout-items">
                                 @if($data['orders']->status==0)
                                        @php $status=trans('langPanel.pending');  @endphp
                                    @elseif($data['orders']->status==1)
                                        @php $status=trans('langPanel.confirmed') ;  @endphp
                                    @elseif($data['orders']->status==2)
                                        @php $status=trans('langPanel.post') ;  @endphp
                                    @elseif($data['orders']->status==3)
                                        @php  $status=trans('langPanel.complete')  ;  @endphp
                                    @endif



                                    <div class="card ecommerce-card" style="background: #7367f0;color: #fff;">
                                        <div class="card-content pt-1 pb-1 ">
                                            <div class="col-md-12">   {{trans('langPanel.shipments')}} : {{$data['orders']->Shipment->title}}  </div>
                                            <div class="col-md-12">   {{trans('langPanel.status')}} :  {{$status}}  </div>
                                        @if($data['orders']->status!=3)
                                                <div class="col-md-12">   {{trans('langPanel.switching')}} :
                                        <a href="{{route('Admin.orders.detailsChange',['order_id'=>$data['orders']->id,'status'=>$data['orders']->status+1])}}" class="btn btn-info place-order waves-effect waves-light">
                                                        <i class="ficon feather icon-check-circle"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @foreach($data['orders']->Cart as $Cart)

                                        <div class="card ecommerce-card">
                                            <div class="card-content">
                                                <div class="item-img text-center">
                                                    <a href="app-ecommerce-details.html">
                                                        <img src="/{{$Cart->Product->image}}"
                                                             alt="img-placeholder" style="height: 100px;">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="item-name">
                                                        <a href=""> {{trans('langPanel.name')}} : {{$Cart->Product->title}}</a>
                                                        <p class="item-company">{{trans('langPanel.count')}} : {{$Cart->number}}</p>
                                                    </div>
                                                </div>
                                                <div class="item-options text-center">
                                                    <div class="item-wrapper">

                                                        <div class="item-cost">
                                                            {{trans('langPanel.price')}} : {{number_format($Cart->price_off) }} {{trans('langPanel.toman')}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                            </div>
                            <div class="checkout-options">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p class="options-title">{{trans('langPanel.information')}}</p>

                                            <div class="price-details">
                                                <p>{{trans('langPanel.invoice_information')}}</p>
                                            </div>

                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.tracking_code')}} :
                                                </div>
                                                <div class="detail-amt">
                                                    {{$data['orders']->tracking_code}}
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.date')}}
                                                </div>
                                                <div class="detail-amt">
                                                    {{timestampDate($data['orders']->date,true)['date']}}
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                        {{trans('langPanel.total_order')}}:
                                                </div>
                                                <div class="detail-amt">
                                                    {{number_format($data['orders']->Payment->price_off-$data['orders']->shipping_cost)}} {{trans('langPanel.toman')}}
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.total_invoice')}} :
                                                </div>
                                                <div class="detail-amt">
                                                    {{number_format($data['orders']->Payment->price)}} {{trans('langPanel.toman')}}
                                                </div>
                                            </div>

                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.shipping_cost')}} :
                                                </div>
                                                <div class="detail-amt">
                                                    {{number_format($data['orders']->shipping_cost)}} {{trans('langPanel.toman')}}

                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.deliveryDecipient')}} :
                                                </div>
                                                <div class="detail-amt emi-details">
                                                    {{ $data['orders']->Address->receiver}}
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.tel')}} :
                                                </div>
                                                <div class="detail-amt ">
                                                    {{ $data['orders']->Address->cel}} - {{ $data['orders']->Address->phone}}
                                                </div>
                                            </div>

                                            <div class="detail">
                                                <div class="detail-title">
                                                    {{trans('langPanel.address')}}:
                                                </div>
                                                <div class="detail-amt ">
                                                    {{ $data['orders']->Address->address}} {{trans('langPanel.postal_code')}}:{{ $data['orders']->Address->postal_code}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="detail">
                                                <div class="detail-title detail-total">
                                                    {{trans('langPanel.total_invoice_discount')}} :
                                                </div>
                                                <div class="detail-amt discount-amt">
                                                    @if($data['orders']->Payment->price != $data['orders']->Payment->price_off)
                                                        {{number_format($data['orders']->Payment->price_off)}} {{trans('langPanel.toman')}}
                                                    @else
                                                        {{number_format($data['orders']->Payment->price)}} {{trans('langPanel.toman')}}
                                                    @endif

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </fieldset>

                </form>

            </div>
        </div>
    </div>
@endsection


