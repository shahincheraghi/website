					<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
                                    <img src={{(\Illuminate\Support\Facades\Auth::user()->image!=null)?"/".\Illuminate\Support\Facades\Auth::user()->image:"/File/default/user.png" }} >
										</a>
										<div class="profile-det-info">
											<h3>{{\Illuminate\Support\Facades\Auth::user()->name}}
                    - {{\Illuminate\Support\Facades\Auth::user()->family}}</h3>


										</div>
									</div>
								</div>
                                   @php
            $url=Request::path();
            @endphp
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="{{($url==="account")?"active":""}}">
												<a href="{{route('Front.account.index')}}">
													<i class="fas fa-columns"></i>
													<span>{{trans('langFront.account')}}</span>
												</a>
											</li>
											<li class="{{($url==="account/editProfile")?"active":""}}" >
												<a href="{{route('Front.account.editProfile')}}">
													<i class="fas fa-user-cog"></i>
													<span>{{trans('langFront.edit_account')}}</span>
												</a>
											</li>
											<li class="{{($url==="account/address")?"active":""}}" >
												<a href="{{route('Front.address.index')}}">
													<i class="fas fa-user-injured"></i>
													<span>{{trans('langFront.address_book')}}</span>
												</a>
											</li>
											<li class="{{($url==="account/listOrder")?"active":""}}">
												<a href="{{route('Front.order.list')}}">
													<i class="fas fa-file-invoice"></i>
													<span>{{trans('langFront.order_history')}}</span>
												</a>
											</li>


											<li>
												<a href="{{route('logoute')}}">
													<i class="fas fa-sign-out-alt"></i>
													<span>{{trans('langFront.exit')}}</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->

						</div>
