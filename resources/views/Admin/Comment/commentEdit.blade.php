@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.commentEdit')}}
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
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.commentEdit')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height row justify-content-center">

                        <div class=" col-md-10 col-12">
                            <div class="card">
                                @include('Layouts.msg')

                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.commentEdit')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('Admin.comments.update',$data['Comment']->id)}}"
                                              novalidate enctype="multipart/form-data">
                                            @CSRF

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.fullname')}}</label>
                                                        <div class="controls">
                                                            <input type="text" name="fullname" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.fullnameInput')}}"
                                                                   placeholder="{{trans('langPanel.fullnameInput')}}"
                                                                   value="{{$data['Comment']->fullname}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.typeBlog')}}</label>
                                                        <div class="controls">
                                                            <fieldset>
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" onchange="blogtype()"
                                                                           id="checkboxblog" value="1" name="type">
                                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                                    <span class="">{{trans('langPanel.yes')}}</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <label
                                                                for="basicInputFile">{{trans('langPanel.choose_file')}}</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                       id="inputGroupFile01" name="file">
                                                                <label class="custom-file-label"
                                                                       for="inputGroupFile01">{{trans('langPanel.upload')}}</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="media mb-2">
                                                        <a class="mr-2 my-25">
                                                            <img src="/{{$data['Comment']->image}}"
                                                                 alt="{{$data['Comment']->fullname}}"
                                                                 class="users-avatar-shadow rounded" height="90"
                                                                 width="90">
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('langPanel.email')}}</label>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                   data-validation-required-message="{{trans('langPanel.emailInput')}}"
                                                                   placeholder="{{trans('langPanel.emailInput')}}"
                                                                   value="{{$data['Comment']->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none" id="blogtype">
                                                        <label>{{trans('langPanel.blogList')}}</label>
                                                        <div class="controls">
                                                            <div class="form-group">
                                                                <select class="select2 form-control" name="blog"
                                                                        id="blog">
                                                                    @foreach($data['Blogs'] as $blog)
                                                                        <option
                                                                            value="{{$blog->id}}">{{$blog->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" name="text" id="basicTextarea"
                                                                  rows="3"
                                                                  placeholder="{{trans('langPanel.text')}}">{{$data['Comment']->text}}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-2 offset-md-10">
                                                <button type="submit"
                                                        class="btn btn-primary">{{trans('langPanel.update')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
            @isset($data['Comment']->commentable_id )
        var val ={!! $data['Comment']->commentable_id !!};
        if (val != 0) {
            $('#blog option[value=' + val + ']').attr('selected', 'selected');
            $('#checkboxblog').attr('checked', 'checked');
            $('#blogtype').css('display', 'block');
        }
        @endisset
    </script>
@endsection
