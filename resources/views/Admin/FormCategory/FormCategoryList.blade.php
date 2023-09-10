@extends('Layouts.adminLayout')

@section('title')| {{trans('langPanel.FormCategoryList')}} @endsection

@section(' css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">

@endsection

@section('content')
    <style>
        .swal2-icon.swal2-warning::before {content: unset !important;}  .text-bold {font-weight: 900 !important;}
        .modal .modal-header .close {
            padding: 0.2rem 0.62rem;
            box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.1);
            border-radius: 0.357rem;
            background: #FFFFFF;
            opacity: 1;
            -webkit-transition: all 0.23s ease 0.1s;
            transition: all 0.23s ease 0.1s;
            position: relative;
            -webkit-transform: translate(-8px, -2px);
            -ms-transform: translate(-8px, -2px);
            transform: translate(7px, 8px) !important;
        }</style>
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.FormCategory')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.listFormCategory')}}</a>
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
                    @include('Layouts.msg')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                        فرم دسته بندی جدید
                    </button>
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                <th>{{trans('langPanel.index')}}</th>
                                <th>{{trans('langPanel.name')}}</th>
                                <th>{{trans('langPanel.sort')}}</th>
                                <th>عکس</th>
                                <th>{{trans('langPanel.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @forelse($FormCategory as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->sort}}</td>
                                    <td><img src="/File/FormCategory/{{$item->img}}" alt="image" width="150px"
                                             height="100px"></td>
                                    <td>
                                        @if($item->status == 0)
                                            <span>غیرفعال</span>
                                        @elseif($item->status == 1)
                                            <span>فعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="showEditFormCategory({{$item->id}})"
                                           type="button"
                                           class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-edit"></i></a>

                                        <a onclick="deleteRecord('{{route('Admin.FormCategoryController.destroy',$item->id)}}')"
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

    <!-- Modal Create-->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">ثبت دسته بندی فرم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm" class="categoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{trans('langPanel.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="نام را وارد کنید">
                            <span class="invalid-feedback" role="alert" id="nameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="sort">{{trans('langPanel.sort')}}</label>
                            <input type="number" class="form-control" id="sort" name="sort"
                                   placeholder="رده بندی را وراد کنید">
                            <span class="invalid-feedback" role="alert" id="sortError"></span>
                        </div>
                        <div class="form-group ">
                            <label for="name">{{trans('langPanel.image')}}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img" name="img"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="img">انتخاب کنید</label>
                            </div>
                            <span class="invalid-feedback" role="alert" id="imgError"></span>
                        </div>


                        <div class="form-group">
                            <label for="status">{{trans('langPanel.status')}}</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                            <span class="invalid-feedback" role="alert" id="statusError"></span>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->

    <!-- Modal Update-->
    <div class="modal fade" id="categoryModalIUpdate" tabindex="-1" aria-labelledby="categoryModalIUpdate"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">ویرایش دسته بندی فرم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryFormUpdateForm" class="categoryFormUpdateForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" hidden id="idUpdate">
                        <div class="form-group">
                            <label for="name">{{trans('langPanel.name')}}</label>
                            <input type="text" class="form-control" id="nameUpdate" name="name"
                                   placeholder="نام را وارد کنید">
                            <span class="invalid-feedback" role="alert" id="nameUpdateError"></span>
                        </div>
                        <div class="form-group">
                            <label for="sort">{{trans('langPanel.sort')}}</label>
                            <input type="number" class="form-control" id="sortUpdate" name="sort"
                                   placeholder="رده بندی را وراد کنید">
                            <span class="invalid-feedback" role="alert" id="sortUpdateError"></span>
                        </div>
                        <div class="row d-flex align-items-center ml-2">
                            <p>عکس فعلی:</p>
                            <img class="pl-3" src="" width="220px" height=80px" id="imageSrc" alt="">
                        </div>
                        <div class="form-group ">
                            <label for="name">{{trans('langPanel.image')}}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="imgUpdate" name="img"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="img">انتخاب کنید</label>
                            </div>
                            <span class="invalid-feedback" role="alert" id="imgUpdateError"></span>
                        </div>


                        <div class="form-group">
                            <label for="status">{{trans('langPanel.status')}}</label>
                            <select class="form-control" id="statusUpdate" name="status">
                                <option value="">انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                            <span class="invalid-feedback" role="alert" id="statusUpdateError"></span>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-primary">ویرایش</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->

@endsection

@section('script')

    {{--    =======token ajax============--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    {{--    =======token ajax============--}}


    {{--    =========show data edit =========--}}
    <script type="text/javascript">
        function showEditFormCategory(id) {
            $.ajax({
                url: "/Admins/formCategory/edit",
                type: "POST",
                data: {id: id},
                success: function (response) {

                    $("#idUpdate").val(response.data.id);
                    $("#nameUpdate").val(response.data.name);
                    $("#sortUpdate").val(response.data.sort);
                    document.getElementById('imageSrc').src = "/File/FormCategory/" + response.data.img;
                    $('#statusUpdate').val(response.data.status).change();
                    $('#categoryModalIUpdate').modal('show');
                },
                error: function (xhr, status, error) {

                }
            });
        }
    </script>
    {{--    =========show data edit =========--}}


    {{--    script for create form ajax-------}}
    <script type="text/javascript">

        $(document).ready(function () {
            // Submit form data using Ajax
            $("#categoryForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/Admins/formCategory/store",
                    type: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        Swal.fire(
                            'با موفقیت ثبت شد!',
                            '',
                            'success'
                        )
                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                    },
                    error: function (xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        // Show error messages for each field
                        if (errors.name) {
                            $("#name").addClass("is-invalid");
                            $("#nameError").text(errors.name[0]);
                        }
                        if (errors.sort) {
                            $("#sort").addClass("is-invalid");
                            $("#sortError").text(errors.sort[0]);
                        }
                        if (errors.img) {
                            $("#img").addClass("is-invalid");
                            $("#imgError").text(errors.img[0]);
                        }
                        if (errors.status) {
                            $("#status").addClass("is-invalid");
                            $("#statusError").text(errors.status[0]);
                        }
                    }
                });
            });
        });
    </script>
    {{--    script for create form ajax-------}}


    {{--    script for update form ajax----------}}
    <script type="text/javascript">
        $(document).ready(function () {

            // Submit form data using Ajax
            $("#categoryFormUpdateForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/Admins/formCategory/update",
                    type: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        // Show success message
                        Swal.fire(
                            'با موفقیت ویرایش شد!',
                            '',
                            'success'
                        ) .then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        // Show error messages for each field
                        if (errors.name) {
                            $("#nameUpdate").addClass("is-invalid");
                            $("#nameUpdateError").text(errors.name[0]);
                        }
                        if (errors.sort) {
                            $("#sortUpdate").addClass("is-invalid");
                            $("#sortUpdateError").text(errors.sort[0]);
                        }
                        if (errors.img) {
                            $("#imgUpdate").addClass("is-invalid");
                            $("#imgUpdateError").text(errors.img[0]);
                        }
                        if (errors.status) {
                            $("#statusUpdate").addClass("is-invalid");
                            $("#statusUpdateError").text(errors.status[0]);
                        }
                    }
                });
            });
        });
    </script>
    {{--    script for update form ajax----------}}

@endsection
