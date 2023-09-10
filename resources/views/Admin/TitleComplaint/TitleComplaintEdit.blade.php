@extends('Layouts.adminLayout')
@section('title')
    | {{trans('langPanel.TitleComplaintEdit')}}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.TitleComplaint')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.TitleComplaintEdit')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.TitleComplaintEdit')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal"
                                              action="{{route('Admin.TitleComplaints.update',$data['TitleComplaint']->id)}}"
                                              method="POST" novalidate enctype="multipart/form-data">
                                            @CSRF
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="name">{{trans('langPanel.name')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['TitleComplaint']->name}}" name="name"
                                                               id="name" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="order">{{trans('langPanel.order')}}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$data['TitleComplaint']->order}}" name="order"
                                                               id="order" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">{{trans('langPanel.status')}}</label>
                                                        <select name="status" class="form-control" id="basicInput">
                                                            <option value="1" {{ $data['TitleComplaint']->status  == 1 ? 'selected' : '' }}>فعال</option>
                                                            <option value="3" {{ $data['TitleComplaint']->status  == 0 ? 'selected' : '' }}>غیر فعال</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <button type="submit"
                                                    class="btn btn-primary">{{trans('langPanel.save_information')}}</button>
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
@section('script')
    <script src="{{asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>

    <script>
            @isset($data['Faq']->category_id )
        var val ={!! $data['Faq']->category_id !!};
        $('#category option[value=' + val + ']').attr('selected', 'selected');
        @endisset
    </script>

@endsection
