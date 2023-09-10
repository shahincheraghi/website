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
@include('Layouts.error')
                             <form id="formAddress" action="{{route('Front.address.Update',$data['address']->id)}}"
                                                          method="post">
                                            @CSRF

							<div class="card">
								<div class="card-body">
									<h4 class="card-title">{{trans('langFront.new_address')}}</h4>
									<div class="row form-row">

										<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.recipient_name')}}<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="receiver"
                                                                                                   id="receiver"
                                                                                                   placeholder="{{trans('langFront.recipient_name')}}"
                                                                                                   required  value="{{$data['address']->receiver}}">
											</div>
										</div>
                                        	<div class="col-md-6">
											<div class="form-group">
												<label> {{trans('langFront.mobile')}} <span class="text-danger">*</span></label>
												<input type="number" class="form-control"  name="cel" id="cel" required
                                                                               placeholder="{{trans('langFront.mobile')}}" value="{{$data['address']->cel}}" >
											</div>
										</div>

                                        	<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.phone')}}</label>
												<input type="number" class="form-control" name="tel" id="tel" required
                                                                               placeholder="{{trans('langFront.phone')}}" value="{{$data['address']->phone}}" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.postal_code')}}<span class="text-danger">*</span></label>
												<input  type="text" class="form-control" name="postal_code"
                                                                               id="postal_code"
                                                                               placeholder="{{trans('langFront.postal_code')}}" value="{{$data['address']->postal_code}}" >
											</div>
										</div>



			                             <div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.city')}}</label>
												<select class="form-control select nice-select" name="city_id" id="city_id">
													    @foreach($data['city'] as $item)
														@if($item->id==$data['address']->city_id)
															<option selected
                                                                                    value="{{$item->id}}">{{$item->province}}
                                                                                    - {{$item->name}}</option>
															@else
                                                                                <option
                                                                                    value="{{$item->id}}">{{$item->province}}
                                                                                    - {{$item->name}}</option>
																					@endif
                                                                            @endforeach
												</select>
											</div>
										</div>



                                        	<div class="col-md-12">
											<div class="form-group mb-0">
												<label>{{trans('langFront.address')}}</label>
                                                <textarea rows="3"
                                                                                                      id="post-address"
                                                                                                      placeholder="{{trans('langFront.address')}}"
                                                                                                      name="address"
                                                                                                      class="form-control"> {{$data['address']->address}}</textarea>
											</div>
										</div>


									</div>
								</div>
							</div>


							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">{{trans('langFront.store')}}</button>
							</div>
</form>
						</div>




						</div>
					</div>
				</div>


@endsection
@section('script')
    <script>

        function deleteAddress(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            var title = '{!! trans('langFront.delete_address')!!}';
            var text = '{!! trans('langFront.do_you_want_to_delete_the_address?')!!}';
            var yes_delete = '{!! trans('langFront.yes_delete')!!}';
            var cancel = '{!! trans('langFront.cancel')!!}';
            var deleted = '{!! trans('langFront.deleted!')!!}';
            var the_removal_operation_was_successful = '{!! trans('langFront.the_removal_operation_was_successful')!!}';
            var could_not_be_deleted = '{!! trans('langFront.could_not_be_deleted!')!!}';

            swalWithBootstrapButtons.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: yes_delete,
                cancelButtonText: cancel,
                reverseButtons: true
            }).then((result) => {
                // console.log(result);
                if (result.value) {
                    var url = '/account/addressDelete/' + id;
                    var data = $.parseJSON($.ajax({
                        'url': url,
                        'type': 'POST',
                        'data': {
                            "_token": "{{ csrf_token() }}",
                        },
                        async: false,
                        'success': function (data) {
                            if (data == true) {
                                $('#address-row' + id).remove();
                                swalWithBootstrapButtons.fire(
                                    deleted,
                                    the_removal_operation_was_successful,
                                    'success'
                                )
                            } else {
                                swalWithBootstrapButtons.fire(
                                    could_not_be_deleted,
                                    operation_failed,
                                    'error'
                                )
                            }
                        },
                        'error': function (jqXhr, textStatus, errorMessage) {
                            // error callback
                            swalWithBootstrapButtons.fire(
                                could_not_be_deleted,
                                operation_failed,
                                'error'
                            )

                        }
                    }).responseText);


                } else if (

                    result.dismiss === Swal.DismissReason.cancel

                    /* Read more abo
                                        ut handling dismissals below */
                ) {
                    swalWithBootstrapButtons.fire(
                        could_not_be_deleted,
                        operation_failed,
                        'error'
                    )
                }
            })
        }
    </script>
@endsection
