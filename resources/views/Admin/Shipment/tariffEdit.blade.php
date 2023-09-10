@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.tariffEdit')}}
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
                                    <li class="breadcrumb-item active">{{trans('langPanel.edit')}}
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
                                    <h4 class="card-title">{{trans('langPanel.edit')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @include('Layouts.msg')
                                        <form method="POST"
                                              action="{{route('Admin.shipments.updateTariff',$data['tariff']->id)}}"
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
                                                                            name="post_type" id="post_type">
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
                                                                       required
                                                                       value="{{$data['tariff']->minimum_weight}}">
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
                                                                       required
                                                                       value="{{$data['tariff']->maximum_weight}}">
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
                                                                       required
                                                                       value="{{$data['tariff']->shipping_cost}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">{{trans('langPanel.edit')}}</button>

                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>



        @isset($data['tariff'] )
        var val ={!! $data['tariff']->post_type !!};
        $('#post_type option[value=' + val + ']').attr('selected', 'selected');
        $('#post_type').trigger('change');
        @endisset
    </script>
@endsection
