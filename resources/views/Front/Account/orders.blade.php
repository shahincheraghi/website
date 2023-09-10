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

						<div class="col-md-7 col-lg-8 col-xl-9">


							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">{{trans('langFront.your_latest_orders')}}</h4>
									<div class="appointment-tab">




												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>

                                               <tr >
                                                <th >{{trans('langFront.order_id')}}</th>
                                                <th>{{trans('langFront.order_id')}} </th>
                                                <th >{{trans('langFront.total_sum')}}</th>
                                                <th >{{trans('langFront.see_details')}}</th>
                                                </tr>

																</thead>
																<tbody>
                                            @if(isset($data['orders']) and count($data['orders'])>0)
                                                @forelse($data['orders'] as $item)
                                            <tr>
                                                <td>{{$item->tracking_code}}#</td>
                                                <td>{{ timestampDate($item->date,true)['date'] }}</td>
                                                <td>{{($item->Payment!=null)?number_format($item->Payment->price_off):''}} {{trans('langFront.toman')}}</td>
                                                <td>
                                                	<a href="{{route('Front.order.detail',$item->id)}}" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> مشاهده
																				</a>

                                                </td>
                                            </tr>
                                                @empty

                                                @endforelse
                                            @endif


																</tbody>
															</table>
														</div>
													</div>
												</div>



										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>



@endsection
