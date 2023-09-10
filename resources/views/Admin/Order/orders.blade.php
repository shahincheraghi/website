@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.orderList')}}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
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
                                            href="#">{{trans('langPanel.orderList')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> {{trans('langPanel.filters')}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="users-list-filter">
                                <form action="{{route('Admin.orders.index')}}" method="get">
                                    <div class="row">

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <label for="payment">{{trans('langPanel.typePayment')}}</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="payment" name="payment">
                                                    <option value="0">{{trans('langPanel.All')}}</option>
                                                    <option value="1">{{trans('langPanel.online')}}</option>
                                                    <option value="2">{{trans('langPanel.place')}}</option>

                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <label for="user">{{trans('langPanel.users')}}</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="user" name="user">
                                                    <option value="0">{{trans('langPanel.All')}}</option>
                                                    @foreach($data['users'] as $users)
                                                        <option value="{{$users->id}}">{{$users->name}}
                                                            -{{$users->family}}</option>
                                                    @endforeach


                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>{{trans('langPanel.mobile')}}</label>
                                                    <input type="text" class="form-control  "
                                                           placeholder="{{trans('langPanel.mobile')}}" name="mobile"
                                                           value=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>{{trans('langPanel.startDate')}}</label>
                                                    <input type="text" class="form-control Datepick "
                                                           placeholder="{{trans('langPanel.startDate')}}"
                                                           name="dateStart" value=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>{{trans('langPanel.endDate')}}</label>
                                                    <input type="text" class="form-control Datepick "
                                                           placeholder="{{trans('langPanel.endDate')}}" name="dateEnd"
                                                           value=""/>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary">{{trans('langPanel.filters')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                    </div>
                    @include('Layouts.msg')
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                <th>{{trans('langPanel.index')}}</th>
                                <th>{{trans('langPanel.date')}}</th>
                                <th>{{trans('langPanel.tracking_code')}}</th>
                                <th>{{trans('langPanel.price')}}</th>
                                <th>{{trans('langPanel.user')}}</th>
                                <th>{{trans('langPanel.Possibilities')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($data['orders'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td> {{timestampDate($value->date,true)['date']}}</td>
                                    <td> {{$value->tracking_code}}</td>
                                    <td> {{number_format($value->Payment->price_off)}} {{trans('langPanel.toman')}}</td>
                                    <td> {{$value->User->name}} {{$value->User->family}}</td>
                                    <td>


                                        <a href="{{route('Admin.orders.details',$value->id)}}" type="button"
                                           class="btn btn-icon  rounded-circle btn-info mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-info"></i></a>
                                        <a href="{{route('Admin.orders.invoice',$value->id)}}" type="button"
                                           class="btn btn-icon  rounded-circle btn-info mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-file-text"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </section>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('Admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
@endsection
