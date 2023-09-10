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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.comment')}}</a>
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
                <!-- Description list alignment -->
                <section id="description-list-alignment">
                    <div class="row match-height justify-content-center">
                        <!-- Description lists horizontal -->
                        <div class="col-sm-12 col-md-8">
                            <div class="card">
                                @include('Layouts.msg')
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.sender')}}
                                                    : {{$data['Comment']->fullname}}</dt>
                                                <dt class="col-sm-4">{{trans('langPanel.email')}}
                                                    : {{$data['Comment']->email}}</dt>
                                                <dt class="col-sm-4">{{trans('langPanel.date')}}
                                                    : {{timestampDate($data['Comment']->created_at,true)['date']}}</dt>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.image')}}:</dt>
                                                <dt class="col-sm-8">
                                                    <div class="media mb-2">
                                                        <a class="mr-2 my-25">
                                                            <img src="/{{$data['Comment']->image}}"
                                                                 alt="{{$data['Comment']->fullname}}"
                                                                 class="users-avatar-shadow rounded" height="90"
                                                                 width="90">
                                                        </a>
                                                    </div>
                                                </dt>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.comment')}}:</dt>
                                                <dd class="col-sm-8">
                                                    <blockquote
                                                        class="blockquote pl-1 border-left-primary border-left-3">

                                                     @if($data['Comment']->commentable_type==1)
                                                             <p class="mb-0">
                                                            @if(isset($data['Comment']->blog->title))
                                                                {{$data['Comment']->blog->title}}
                                                            @endif
                                                             </p>
                                                     @elseif($data['Comment']->commentable_type==2)
                                                           <p class="mb-0">
                                                            @if(isset($data['Comment']->product->title))
                                                                {{$data['Comment']->product->title}}
                                                            @endif
                                                           </p>

                                                    @else
                                                            <p class="mb-0">
                                                                {{trans('langPanel.comment')}}
                                                             </p>

                                                      @endif


                                                    </blockquote>
                                                </dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-4">{{trans('langPanel.text')}}:</dt>
                                                <dd class="col-sm-8">
                                                    <blockquote
                                                        class="blockquote pl-1 border-left-primary border-left-3">
                                                        <p class="mb-0">{{$data['Comment']->text}}</p>
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
