@extends('Layouts.AccountLayout')
@section('content')
		<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">{{trans('langFront.home_page')}}</a></li>
									<li class="breadcrumb-item active" aria-current="page">{{trans('langFront.account')}}</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{trans('langFront.account')}}</h2>
						</div>
					</div>
				</div>
			</div>

            <div class="content">
				<div class="container-fluid">

					<div class="row">
	@include('Front.Account.sidbarAccount')
     @php
                                            $payment=$data['orders']->Payment;
                                            $address=$data['orders']->Address;


                                            @endphp
									<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
									<div class="col-md-6">

												<strong>{{trans('langFront.payment_method')}}:</strong> {{$payment->type_payment}} <br>
												<strong> {{trans('langFront.payments_order')}}: </strong>  {{number_format($payment->price)}}<br>
												<strong> {{trans('langFront.status_payment')}} : </strong>  {{trans('langFront.payment')}}

										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												<strong>{{trans('langFront.order_code')}}:</strong> {{$payment->tracking_code}} <br>
												<strong> {{trans('langFront.order_date')}}: </strong>  {{ timestampDate($payment->date,true)['date'] }}
											</p>
										</div>
									</div>
								</div>

								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-bordered">
													<thead>
														<tr>
                                                    <th class="text-right"></th>
                                                    <th class="text-right">{{trans('langFront.name_product')}}</th>
                                                    <th class="text-right">{{trans('langFront.count')}}</th>
                                                    <th class="text-right">{{trans('langFront.price_per')}}</th>
                                                    <th class="text-right">{{trans('langFront.discounted_price')}}</th>
                                                    <th class="text-right">{{trans('langFront.total')}}</th>


														</tr>
													</thead>
													<tbody>
                                                       @php
                                                $priceSum=0;
                                                $priceOffSum=0;
                                                @endphp
                                                    @foreach($data['orders']->Cart as $Cart)
														<tr>
															<td> <img src="/{{$Cart->Product->image}}"
                                                                     alt="img-placeholder" style="height: 100px;max-width: 120px;"> </td>
															<td class="text-center">{{$Cart->Product->title}}</td>
															<td class="text-center">{{$Cart->number}}</td>
                                                             @php
                                                            $priceSum+=$Cart->price*($Cart->number);
                                                            $priceOffSum+=$Cart->price_off*($Cart->number);
                                                        @endphp
															<td class="text-right">{{number_format($Cart->price) }} {{trans('langFront.toman')}}</td>
															<td class="text-right">{{number_format($Cart->price_off) }} {{trans('langFront.toman')}}</td>
															<td class="text-right">{{number_format($Cart->price_off*($Cart->number)) }} {{trans('langFront.toman')}}</td>
														</tr>
 @endforeach
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6 col-xl-4 ml-auto">
											<div class="table-responsive">
												<table class="invoice-table-two table">
													<tbody>
													<tr>
														<th>{{trans('langFront.total_price')}} :</th>
														<td><span>{{number_format($priceSum)}} {{trans('langFront.toman')}} </span></td>
													</tr>
													<tr>
														<th>{{trans('langFront.total_price')}} :</th>
														<td><span>{{number_format($priceOffSum)}} {{trans('langFront.toman')}}</span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->

								<!-- Invoice Information -->
								<div class="other-info">
									<h4>{{trans('langFront.submitted_information')}}</h4>
									<p class="text-muted mb-0">
                                    		<div class="row">
										<div class="col-md-8">
											<div class="invoice-info">
												<p class="invoice-details invoice-details-two">
													{{trans('langFront.receiver')}} : {{$address->receiver}} <br>
													 {{trans('langFront.postal_code')}} : {{$address->postal_code}}<br>
													{{trans('langFront.phone')}} : {{$address->cel}}<br>
                                                    {{trans('langFront.mobile')}} : {{$address->phone}} <br>
													{{trans('langFront.address')}} :{{$address->address}}<br>
												</p>
											</div>
										</div>

									</div>
                                                     </p>
								</div>
								<!-- /Invoice Information -->

							</div>
						</div>

						</div>
					</div>

				</div>
@endsection
