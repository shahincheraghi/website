@extends('Layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-lg-3 col-md-6 col-12 float-left">
                                <div class="card">
                                    @include('Layouts.msg')
                                    <div class="card-header d-flex flex-column align-items-start pb-1">
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-file text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1 mb-25">{{$data['blog']}}</h2>
                                        <p class="mb-0">{{trans('langPanel.blogs')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12  float-left">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-1">
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-message-circle text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1 mb-25">{{$data['comment']}}</h2>
                                        <p class="mb-0">{{trans('langPanel.comment')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12  float-left">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-1">
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-edit text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1 mb-25">{{$data['message']}}</h2>
                                        <p class="mb-0">{{trans('langPanel.messages')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12  float-left">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-1">
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-eye text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1 mb-25">{{$data['visit']}}</h2>
                                        <p class="mb-0">{{trans('langPanel.visit')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.browser_statistics')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body" style="    max-height: 371px;
    overflow-x: scroll;">
                                        @forelse($data['fetchTopBrowsers'] as $item )
                                            <div class="d-flex justify-content-between mb-25">
                                                <div class="browser-info">
                                                    <p class="mb-25">{{$item['browser']}}</p>
                                                    <h4>{{$item['sessions']}}%</h4>
                                                </div>
                                                <div class="stastics-info text-right">

                                                </div>
                                            </div>
                                            <div class="progress progress-bar-primary mb-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="73"
                                                     aria-valuemin="{{$item['sessions']}}" aria-valuemax="100" style="width:{{$item['sessions']}}%"></div>
                                            </div>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.last_month_visit_statistics')}}</h4>
                                    <div class="d-flex justify-content-start">
                                        <div class="mr-2">
                                            <p class="mb-50 text-bold-600">{{trans('langPanel.total_hits')}}</p>
                                            <h2 class="text-bold-400">
                                                    <span
                                                        class="text-success">{{$data['sumPageViews']}}</span>
                                            </h2>
                                        </div>
                                        <div>
                                            <p class="mb-50 text-bold-600">{{trans('langPanel.total_visitors')}}</p>
                                            <h2 class="text-bold-400">
                                                <span>{{$data['sumVisitors']}}</span>

                                            </h2>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <div id="shop-chart2"></div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection
