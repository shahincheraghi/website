@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.shipmentInsert')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.shipment')}}</a>
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
                                              action="{{route('Admin.shipments.store')}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.title')}}</label>
                                                            <div class="controls">
                                                                <input type="text" name="title" class="form-control"
                                                                       data-validation-required-message="{{trans('langPanel.inputTitle')}}"
                                                                       placeholder="{{trans('langPanel.inputTitle')}}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.english_title')}}</label>
                                                            <div class="controls">
                                                                <input type="text" name="english_title"
                                                                       class="form-control"
                                                                       data-validation-required-message="{{trans('langPanel.inputenglish_title')}}"
                                                                       placeholder="{{trans('langPanel.inputenglish_title')}}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.insurance_rates')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="insurance_rates"
                                                                       class="form-control"
                                                                       placeholder="{{trans('langPanel.inputInsurance_rates')}}"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.taxation')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="taxation"
                                                                       class="form-control"
                                                                       placeholder="{{trans('langPanel.inputTaxation')}}"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.fixed_extra_amount')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="fixed_extra_amount"
                                                                       class="form-control"
                                                                       placeholder="{{trans('langPanel.inputfixed_extra_amount')}}"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.fixed_extra_percentage')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="fixed_extra_percentage"
                                                                       class="form-control"
                                                                       placeholder="{{trans('langPanel.inputfixed_extra_percentage')}}"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.minimum_order_cost')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="minimum_order_cost"
                                                                       class="form-control"
                                                                       placeholder="{{trans('langPanel.inputminimum_order_cost')}}"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>{{trans('langPanel.surplus_amount')}}</label>
                                                            <div class="controls">
                                                                <input type="number" name="surplus_amount"
                                                                       class="form-control"
                                                                       placeholder="{{trans('langPanel.inputsurplus_amount')}}"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group" style="margin-top: -20px;">
                                                            <label
                                                                for="destination_cities">{{trans('langPanel.destination_cities')}}
                                                            </label>
                                                            <select class="form-control select2"
                                                                    name="destination_cities[]"
                                                                    multiple
                                                                    id="destination_cities">
                                                                @foreach($data['cities']  as $city)
                                                                    <option value="{{$city->id}}">{{$city->province}}
                                                                        - {{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group" style="margin-top: -20px;">
                                                            <label>{{trans('langPanel.typeProduct')}}</label>
                                                            <div class="controls">
                                                                <div class="form-group">
                                                                    <select class=" select2 form-control"
                                                                            name="typeproduct[]" multiple>
                                                                         @foreach( Config::get('typeProduct') as $typeProduct)
                                                                        <option
                                                                            value="{{$typeProduct['id']}}">{{trans($typeProduct['title'])}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12 col-md-6">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="active" value="1"
                                                                       aria-invalid="false">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class=""> {{trans('langPanel.active')}}</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <div class="form-group col-12 col-md-6">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="type_payment" value="1"
                                                                       aria-invalid="false">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span
                                                                    class=""> {{trans('langPanel.type_payment')}}</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>


                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label
                                                                for="basicInputFile">{{trans('langPanel.image')}}</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                       id="inputGroupFile01" name="image"/>
                                                                <label class="custom-file-label"
                                                                       for="inputGroupFile01">{{trans('langPanel.image')}}</label>
                                                            </div>
                                                        </fieldset>
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
            </div>
        </div>
    </div>
@endsection


