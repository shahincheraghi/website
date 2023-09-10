@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.pageList')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.Insurance')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.insuranceList')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                    </div>
                    @include('Layouts.msg')
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                <th>{{trans('langPanel.index')}}</th>
                                <th>{{trans('langPanel.imei')}}</th>
                                <th>{{trans('langPanel.fullName')}}</th>
                                <th>{{trans('langPanel.phoneNumber')}}</th>
                                <th>{{trans('langPanel.nationalCode')}}</th>
                                <th>{{trans('langPanel.address')}}</th>
                                <th>{{trans('langPanel.created_at')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($data['Insurance'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->imei}}</td>
                                    <td>{{$value->fullName}}</td>
                                    <td>{{$value->mobile}}</td>
                                    <td>{{$value->nationalCode}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{timestampDate($value->created_at,true)['date']}}</td>
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
