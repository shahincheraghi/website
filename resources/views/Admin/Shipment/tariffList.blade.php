@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.tariffInsert')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.tariff')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{trans('langPanel.insert')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.insert')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @include('Layouts.msg')
                                        <form method="POST"
                                              action="{{route('Admin.shipments.storeTariff',Request::segment(4))}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.post_type')}}</label>
                                                            <div class="controls">
                                                                <div class="form-group">
                                                                    <select class=" select2 form-control"
                                                                            name="post_type">
                                                                        <option
                                                                            value="1">{{trans('langPanel.Within_province')}}</option>
                                                                        <option
                                                                            value="2">{{trans('langPanel.Extra_provincial')}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.minimum_weight')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="minimum_weight"
                                                                       class="form-control"
                                                                       data-validation-required-message="{{trans('langPanel.inputminimum_weight')}}"
                                                                       placeholder="{{trans('langPanel.inputminimum_weight')}}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.maximum_weight')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="maximum_weight"
                                                                       class="form-control"
                                                                       data-validation-required-message="{{trans('langPanel.inputmaximum_weight')}}"
                                                                       placeholder="{{trans('langPanel.inputmaximum_weight')}}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.shipping_cost')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="shipping_cost"
                                                                       class="form-control"
                                                                       data-validation-required-message="{{trans('langPanel.inputshipping_cost')}}"
                                                                       placeholder="{{trans('langPanel.inputshipping_cost')}}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">{{trans('langPanel.save')}}</button>

                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>

            <section id="data-list-view" class="data-list-view-header">
                <div class="action-btns d-none">
                </div>

                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                        <tr>
                            <th>{{trans('langPanel.index')}}</th>
                            <th>{{trans('langPanel.post_type')}}</th>
                            <th>{{trans('langPanel.minimum_weight')}}</th>
                            <th>{{trans('langPanel.maximum_weight')}}</th>
                            <th>{{trans('langPanel.Possibilities')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @foreach($data['tariffs'] as $value)
                            <tr>
                                <td>{{$i++}}</td>
                                @if($value->post_type==1)
                                <td>{{trans('langPanel.Within_province')}}</td>
                                @else
                                <td>{{trans('langPanel.Extra_provincial')}}</td>
                                @endif
                                <td>{{$value->minimum_weight}}</td>
                                <td>{{$value->maximum_weight}}</td>
                                <td>


                                    <a href="{{route('Admin.shipments.tariffEdit',$value->id)}}" type="button"
                                       class="btn btn-icon  rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light"><i
                                            class="feather icon-edit"></i></a>

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
