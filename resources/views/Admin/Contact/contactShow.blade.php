@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.show')}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.contacts')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{trans('langPanel.show')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="description-list-alignment">
                    <div class="row match-height justify-content-center">
                        <div class="col-sm-12 col-md-8">
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.sender')}}
                                                    : {{$data['Contact']->fullname}}</dt>
                                                <dt class="col-sm-4">{{trans('langPanel.email')}}
                                                    : {{$data['Contact']->email}}</dt>
                                                <dt class="col-sm-4">{{trans('langPanel.date')}}
                                                    : {{timestampDate($data['Contact']->created_at,true)['date']}}</dt>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.subject')}}:</dt>
                                                <dd class="col-sm-8">
                                                    <blockquote
                                                        class="blockquote pl-1 border-left-primary border-left-3">
                                                        <p class="mb-0">{{$data['Contact']->subject}}</p>
                                                    </blockquote>
                                                </dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.text')}}:</dt>
                                                <dd class="col-sm-8">
                                                    <blockquote
                                                        class="blockquote pl-1 border-left-primary border-left-3">
                                                        <p class="mb-0">{{$data['Contact']->text}}</p>
                                                    </blockquote>
                                                </dd>
                                            </dl>
                                        </div>
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
