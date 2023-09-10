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
<form action="{{route('Front.account.updateProfile')}}" method="POST">
                                            @CSRF
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">{{trans('langFront.account_information')}}</h4>
									<div class="row form-row">

										<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.name')}}<span class="text-danger">*</span></label>
												<input type="text" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" placeholder="{{trans('langFront.name')}}"
                                                                    name="name" >
											</div>
										</div>
                                        	<div class="col-md-6">
											<div class="form-group">
												<label> {{trans('langFront.family')}} <span class="text-danger">*</span></label>
												<input type="text" class="form-control"  value="{{\Illuminate\Support\Facades\Auth::user()->family}}" name="family"
                                                                    placeholder="{{trans('langFront.family')}}">
											</div>
										</div>

                                        	<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.mobile')}}</label>
												<input type="number" class="form-control" name="mobile"
                                                                    value="{{\Illuminate\Support\Facades\Auth::user()->mobile}}"
                                                                    placeholder="{{trans('langFront.mobile')}}" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.email')}}<span class="text-danger">*</span></label>
												<input  class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                                                       type="email"
                                                                       name="email"
                                                                       placeholder="{{trans('langFront.email')}}" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>{{trans('langFront.national_code')}}<span class="text-danger">*</span></label>
												<input type="number" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->national_identity}}"

                                                                       name="national_identity"
                                                                       placeholder="{{trans('langFront.national_code')}}" >
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>{{trans('langFront.date_of_birth')}}</label>
												<input  class="form-control" id="datepicker4"
                                                                       value="{{timestampDate(\Illuminate\Support\Facades\Auth::user()->birth_date)['date']}}"
                                                                       type="text"
                                                                       placeholder=""
                                                                       name="birth_date">
											</div>
										</div>

                                        	<div class="col-md-6">
											<div class="form-group mb-0">
												<label>{{trans('langFront.new_password')}}</label>
												<input  class="form-control" value=""
                                                                       name="password"
                                                                       type="password"
                                                                       placeholder="">
											</div>
										</div>

                                               	<div class="col-md-6">
											<div class="form-group mb-0">
												<label>{{trans('langFront.confirm_new_password')}}</label>
												<input  class="form-control" value=""
                                                                       type="text"
                                                                       name="passwordConfirm"
                                                                       placeholder="">
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
        $(document).ready(function () {
            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });


        function showAddAddress() {
            $('modelAddress').show();
        }

    </script>
@endsection
