@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.counterList')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.counter')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.counterList')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                    </div>
                    <div class="row justify-content-end pr-5">
                        <div>

                            <a class="btn btn-outline-primary" href="{{route('Admin.counters.create')}}">
                                جدید
                            </a>
                        </div>
                    </div>
                    @include('Layouts.msg')
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                <th>{{trans('langPanel.index')}}</th>
                                <th>{{trans('langPanel.title')}}</th>
                                <th>{{trans('langPanel.subTitle')}}</th>
                                <th>{{trans('langPanel.number')}}</th>
                                <th>{{trans('langPanel.image')}}</th>
                                <th>{{trans('langPanel.icons')}}</th>
                                <th>{{trans('langPanel.Possibilities')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($data['Counters'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->subTitle}}</td>
                                    <td>{{$value->number}}</td>
                                    <td><img src="/{{$value->image}}" alt="image" width="150px" height="100px"></td>
                                    <td class="p-1">
                                        <i class="{{$value->icon}}"></i>
                                    </td>
                                    <td>
                                        <a href="{{route('Admin.counters.edit',$value->id)}}"
                                           type="button"
                                           class="btn btn-icon  rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-edit"></i></a>
                                        <a onclick="deleteRecord('{{route('Admin.counters.destroy',$value->id)}}')"
                                           type="button"
                                           class="btn btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-delete"></i></a>
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
