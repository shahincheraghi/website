@extends('Layouts.adminLayout')
@section('title')
    | {{trans('langPanel.CustomersComment')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.CustomersComment')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.listCustomersComment')}}</a>
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
                    <div class="row justify-content-end pr-5">
                        <div>

                            <a class="btn btn-outline-primary" href="{{route('Admin.CustomersComment.create')}}">
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
                                <th>{{trans('langPanel.link')}}</th>
                                <th>عکس</th>
                                <th>{{trans('langPanel.description')}}</th>
                                <th>{{trans('langPanel.type')}}</th>
                                <th>{{trans('langPanel.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @forelse($CustomersComment as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->link}}</td>
                                    <td><img src="/File/HomeContent/{{$item->path}}" alt="image" width="150px" height="100px"></td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        @if($item->status == 3)
                                            <span>غیرفعال</span>
                                        @elseif($item->status == 1)
                                            <span>فعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('Admin.CustomersComment.edit',$item->id)}}"
                                           type="button"
                                           class="btn btn-icon  rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-edit"></i></a>
                                        <a onclick="deleteRecord('{{route('Admin.CustomersComment.destroy',$item->id)}}')"
                                           type="button"
                                           class="btn btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-delete"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>{{trans('langPanel.no_information_found')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- Input Validation end -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('Admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
@endsection
