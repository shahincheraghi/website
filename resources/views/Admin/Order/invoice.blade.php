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
            <div class="content-body">
                <!-- invoice functionality start -->
                <section class="invoice-print mb-1">
                    <div class="row">


                        <div class="col-12 col-md-7 offset-md-5 d-flex flex-column flex-md-row justify-content-end">
                            <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> {{trans('langPanel.Print')}} </button>
                        </div>
                    </div>
                </section>
                <!-- invoice functionality end -->
                <!-- invoice page -->
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">

                            <div class="col-sm-8 col-12 text-left">
                                <h1>{{trans('langPanel.invoice')}}</h1>
                                <div class="invoice-details mt-2">
                                    <h6>{{trans('langPanel.tracking_code')}}</h6>
                                    <p>{{$data['orders']->tracking_code}}</p>
                                    <h6 class="mt-2">{{trans('langPanel.date')}}</h6>
                                    <p>{{timestampDate($data['orders']->date,true)['date']}}</p>
                                </div>
                            </div>
                                <div class="col-sm-4 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img src="/{{$data['settings']['favicon']}}" alt="company logo" />
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->

                        <!-- Invoice Recipient Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-8 col-12 text-left">
                                <h5>{{trans('langPanel.address')}} :</h5>
                                <div class="recipient-info my-2">
                                    <p>{{ $data['orders']->Address->address}}
                                     {{trans('langPanel.postal_code')}} :
                                       {{ $data['orders']->Address->postal_code}} </p>

                                </div>

                            </div>
                                <div class="col-sm-4 col-12 text-left">
                                 <h5> {{trans('langPanel.phone')}} :</h5>
                                <div class="recipient-info my-2">
                                    <p>
                                       {{ $data['orders']->Address->cel}} - {{ $data['orders']->Address->phone}}

                                    </p>


                                </div>
                            </div>

                        </div>
                        <!--/ Invoice Recipient Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-1 invoice-items-table">
                            <div class="row">
                                <div class="table-responsive col-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{trans('langPanel.product')}}</th>
                                                <th>{{trans('langPanel.count')}}</th>
                                                <th>{{trans('langPanel.price_off')}}</th>
                                                <th>{{trans('langPanel.price')}}</th>
                                                <th>{{trans('langPanel.sum')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $i=1; @endphp
                                         @foreach($data['orders']->Cart as $Cart)

                                            <tr>
                                                <td>{{ $i}}</td>
                                                <td>{{$Cart->Product->title}}</td>
                                                <td>{{$Cart->number}}</td>
                                                <td>{{number_format($Cart->price_off) }} {{trans('langPanel.toman')}}</td>
                                                <td>{{number_format($Cart->price) }} {{trans('langPanel.toman')}}</td>
                                                <td>{{number_format($Cart->price_off* $Cart->number) }} {{trans('langPanel.toman')}}</td>
                                            </tr>
                                             @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="invoice-total-details" class="invoice-total-table">
                            <div class="row">
                                <div class="col-7 offset-5">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th> {{trans('langPanel.total_order')}} </th>
                                                    <td>{{number_format($data['orders']->Payment->price_off-$data['orders']->shipping_cost)}} {{trans('langPanel.toman')}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{trans('langPanel.total_invoice')}}</th>
                                                    <td>{{number_format($data['orders']->Payment->price)}} {{trans('langPanel.toman')}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{trans('langPanel.shipping_cost')}}</th>
                                                    <td>{{number_format($data['orders']->shipping_cost)}} {{trans('langPanel.toman')}}</td>
                                                </tr>
                                                   <tr>
                                                    <th>{{trans('langPanel.total_invoice_discount')}}</th>
                                                    <td>
                                                    @if($data['orders']->Payment->price != $data['orders']->Payment->price_off)
                                                   {{number_format($data['orders']->Payment->price_off)}} {{trans('langPanel.toman')}}
                                                   @else
                                                  {{number_format($data['orders']->Payment->price)}} {{trans('langPanel.toman')}}
                                                  @endif
                                            </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Footer -->
                        <div id="invoice-footer" class="text-left pt-3">
                            <p>{{$data['settings']['address']}}
                                <p class="bank-details mb-0">
                                    <span class="mr-4">{{trans('langPanel.store_zip_code')}}: <strong>{{$data['settings']['store_zip_code']}}</strong></span>
                                    <span>{{trans('langPanel.phone')}}: <strong>{{$data['settings']['phone']}} -{{$data['settings']['email']}} </strong></span>
                                </p>
                        </div>
                        <!--/ Invoice Footer -->

                    </div>
                </section>
                <!-- invoice page end -->

            </div>
        </div>
    </div>
@endsection
