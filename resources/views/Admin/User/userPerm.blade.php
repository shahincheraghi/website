@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.permission')}}
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
            </div>
            <div class="content-body">
                <!-- page users view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- permissions start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom mx-2 px-0">
                                    <h6 class="border-bottom py-1 mb-0 font-medium-2"><i
                                            class="feather icon-lock mr-50 "></i>{{trans('langPanel.permission')}}
                                    </h6>
                                </div>
                                <div class="card-body px-75">
                                    <div class="table-responsive users-view-permission">

                                        <form action="{{route('Admin.userPerm.update',$data['user']->id)}}"
                                              method="post">
                                            @CSRF


                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>{{trans('langPanel.the_part')}}</th>
                                                    <th>{{trans('langPanel.list')}}</th>
                                                    <th>{{trans('langPanel.show')}}</th>
                                                    <th>{{trans('langPanel.add')}}</th>
                                                    <th>{{trans('langPanel.edit_panel')}}</th>
                                                    <th>{{trans('langPanel.update')}}</th>
                                                    <th>{{trans('langPanel.delete')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach (Config::get('userRolePerm') as $item)
                                                        <tr>
                                                            <td>{{$item['name']}}</td>
                                                            <td>
                                                                @if(isset($item['child']['list']))
                                                                    <div class="custom-control custom-checkbox ml-50">
                                                                        <input type="checkbox"
                                                                               id="users-checkbox{{$item['child']['list']['id']}}"
                                                                               value="{{$item['child']['list']['url']}}"
                                                                               class="custom-control-input"
                                                                               name="perm[{{$item['child']['list']['id']}}][]">
                                                                        <label class="custom-control-label"
                                                                               for="users-checkbox{{$item['child']['list']['id']}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($item['child']['show']))

                                                                    <div class="custom-control custom-checkbox ml-50">
                                                                        <input type="checkbox"
                                                                               id="users-checkbox{{$item['child']['show']['id']}}"
                                                                               value="{{$item['child']['show']['url']}}"
                                                                               class="custom-control-input"
                                                                               name="perm[{{$item['child']['show']['id']}}][]">
                                                                        <label class="custom-control-label"
                                                                               for="users-checkbox{{$item['child']['show']['id']}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($item['child']['create']))
                                                                    <div class="custom-control custom-checkbox ml-50">
                                                                        <input type="checkbox"
                                                                               id="users-checkbox{{$item['child']['create']['id']}}"
                                                                               value="{{$item['child']['create']['url']}}"
                                                                               class="custom-control-input"
                                                                               name="perm[{{$item['child']['create']['id']}}][]">
                                                                        <label class="custom-control-label"
                                                                               for="users-checkbox{{$item['child']['create']['id']}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if(isset($item['child']['edit']))
                                                                    <div class="custom-control custom-checkbox ml-50">
                                                                        <input type="checkbox"
                                                                               id="users-checkbox{{$item['child']['edit']['id']}}"
                                                                               value="{{$item['child']['edit']['url']}}"
                                                                               name="perm[{{$item['child']['edit']['id']}}][]"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label"
                                                                               for="users-checkbox{{$item['child']['edit']['id']}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if(isset($item['child']['update']))
                                                                    <div class="custom-control custom-checkbox ml-50">
                                                                        <input type="checkbox"
                                                                               id="users-checkbox{{$item['child']['update']['id']}}"
                                                                               value="{{$item['child']['update']['url']}}"
                                                                               class="custom-control-input"
                                                                               name="perm[{{$item['child']['update']['id']}}][]">
                                                                        <label class="custom-control-label"
                                                                               for="users-checkbox{{$item['child']['update']['id']}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if(isset($item['child']['delete']))
                                                                    <div class="custom-control custom-checkbox ml-50">
                                                                        <input type="checkbox"
                                                                               id="users-checkbox{{$item['child']['delete']['id']}}"
                                                                               value="{{$item['child']['delete']['url']}}"
                                                                               class="custom-control-input"
                                                                               name="perm[{{$item['child']['delete']['id']}}][]">
                                                                        <label class="custom-control-label"
                                                                               for="users-checkbox{{$item['child']['delete']['id']}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <hr>



                                                </tbody>
                                            </table>



                                            <div class="row pl-2 ">

                                                @foreach (Config::get('userRolePermT') as $item)
                                                    <div class=" mb-1 mt-1 custom-control custom-checkbox col-6 col-md-2 ml-50 d-inline-block ">
                                                        <input type="checkbox"
                                                               id="users-checkbox{{$item['id']}}"
                                                               value="{{$item['rout']}}"
                                                               class="custom-control-input"
                                                               name="perm[{{$item['id']}}][]">
                                                        <label class="custom-control-label"
                                                               for="users-checkbox{{$item['id']}}">{{$item['name']}}</label>
                                                    </div>
                                                @endforeach

                                            </div>





                                            <div class="col-12">
                                                <button type="submit"
                                                        class="btn btn-primary mr-1 mb-1">{{trans('langPanel.save')}}</button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- permissions end -->
                    </div>
                </section>
                <!-- page users view end -->

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('Admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('Admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>

    <script>

        var $v ={!! $data['userPerm'] !!}
            // console.log($v);
            $.each($v, function (key, val) {
                $('input[type=checkbox][value="' + val + '"]').prop('checked', true);
            });


    </script>

@endsection
