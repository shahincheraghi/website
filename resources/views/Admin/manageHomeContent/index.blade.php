@extends('Layouts.adminLayout')
@section('title')| {{trans('langPanel.listManageHomeContent')}} @endsection
@section(' css')
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
@section('content')
    <style>
        .swal2-icon.swal2-warning::before {
            content: unset !important;
        }

        .text-bold {
            font-weight: 900 !important;
        }

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
        }

    </style>

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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.Color')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.listManageHomeContent')}}</a>
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
                    <div class="action-btn d-none"></div>
                    @include('Layouts.msg')
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalManageHomeContent">
                        قسمت جدید
                    </button>
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                <th>{{trans('langPanel.index')}}</th>
                                <th>{{trans('langPanel.title')}}</th>
                                <th>{{trans('langPanel.sort')}}</th>
                                <th>{{trans('langPanel.type')}}</th>
                                <th>{{trans('langPanel.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @forelse($ManageHomeContent as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->sort}}</td>
                                    <td>{{$item->HomeContentTitle}}</td>
                                    <td>
                                        @if($item->status == 0)
                                            <span>غیرفعال</span>
                                        @elseif($item->status == 1)
                                            <span>فعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="showEditManageHomeContent({{$item->id}})"
                                           type="button"
                                           class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-edit"></i></a>

                                        <a onclick="deleteRecord('{{route('Admin.ManageHomeContentController.destroy',$item->id)}}')"
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
    <div class="modal fade " id="modalManageHomeContent" tabindex="-1" aria-labelledby="modalManageHomeContent"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="formManageHomeContent" class="categoryForm py-3" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="colorModalLabel">ثبت قسمت جدید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{trans('langPanel.title')}}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="عنوان اصلی را وارد کنید">
                                        <span class="invalid-feedback" role="alert" id="titleError"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="topTitle">{{trans('langPanel.topTitle')}}</label>
                                        <input type="text" class="form-control" id="topTitle" name="topTitle"
                                               placeholder="عنوان بالا را وارد کنید">
                                        <span class="invalid-feedback" role="alert" id="topTitleError"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">{{trans('langPanel.description')}}</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                        <span class="invalid-feedback" role="alert" id="descriptionError"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="sort">{{trans('langPanel.sort')}}</label>
                                        <input type="number" class="form-control" id="sort" name="sort"
                                               placeholder="ترتیب بندی را وراد کنید">
                                        <span class="invalid-feedback" role="alert" id="sortError"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{trans('langPanel.status')}}</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">فعال</option>
                                            <option value="0">غیرفعال</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert" id="statusError"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group" style="display: grid !important;">
                                        <label for="typeHomeContent">{{trans('langPanel.typeHomeContent')}}</label>
                                        <select class="form-control typeHomeContent getDataTypeHomeContent w-100 "
                                                id="typeHomeContent"
                                                name="typeHomeContent"></select>
                                        <span class="invalid-feedback" role="alert" id="typeHomeContentError"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <fieldset class="form-group">
                                        <label
                                            for="image">{{trans('langPanel.choose_file')}}</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                                   id="image" name="image">
                                            <label class="custom-file-label"
                                                   for="image">{{trans('langPanel.upload')}}</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12">
                                    <div id="req_input" class="datainputs row ">
                                        <div class="col-12 d-flex">
                                            <a href="#" id="addmore" class="btn btn-success add_input w-100">اضافه کردن
                                                آیتم</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary">ثبت</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end bootstrap model -->
    <!-- Modal Create-->
    <div class="modal fade " id="editModalManageHomeContent" tabindex="-1" aria-labelledby="editModalManageHomeContent"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="formManageHomeContentUpdate" class="categoryForm py-3" enctype="multipart/form-data">
                <input type="text" class="d-none" id="idUpdate" name="idUpdate">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="colorModalLabel">ثبت قسمت جدید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="titleUpdate">{{trans('langPanel.title')}}</label>
                                        <input type="text" class="form-control" id="titleUpdate" name="title"
                                               placeholder="عنوان اصلی را وارد کنید">
                                        <span class="invalid-feedback" role="alert" id="titleErrorUpdate"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="titleUpdate">{{trans('langPanel.topTitle')}}</label>
                                        <input type="text" class="form-control" id="topTitleUpdate" name="topTitle"
                                               placeholder="عنوان بالا را وارد کنید">
                                        <span class="invalid-feedback" role="alert" id="topTitleErrorUpdate"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="titleUpdate">{{trans('langPanel.topTitle')}}</label>
                                        <textarea class="form-control" name="description"
                                                  id="descriptionUpdate"></textarea>
                                        <span class="invalid-feedback" role="alert" id="descriptionErrorUpdate"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="sortUpdate">{{trans('langPanel.sort')}}</label>
                                        <input type="number" class="form-control" id="sortUpdate" name="sort"
                                               placeholder="ترتیب بندی را وراد کنید">
                                        <span class="invalid-feedback" role="alert" id="sortErrorUpdate"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="statusUpdate">{{trans('langPanel.status')}}</label>
                                        <select class="form-control" id="statusUpdate" name="status">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">فعال</option>
                                            <option value="0">غیرفعال</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert" id="statusErrorUpdate"></span>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end text-left">
                                    <img src="" id="imageUpdatePic" class="imageUpdatePic" width="250" alt="">
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group" style="display: grid !important;">
                                        <label
                                            for="typeHomeContentUpdate">{{trans('langPanel.typeHomeContent')}}</label>
                                        <select class="form-control typeHomeContentUpdate" id="typeHomeContentUpdate"
                                                name="typeHomeContent">
                                            <option></option>
                                            @foreach($SectionHomeContentsInfo as $data)
                                                <option value="{{$data->homeContentId}}">{{$data->title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback" role="alert"
                                              id="typeHomeContentErrorUpdate"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">

                                    <fieldset class="form-group">
                                        <label
                                            for="imageUpdate">{{trans('langPanel.choose_file')}}</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input imageUpdate"
                                                   id="imageUpdate" name="image">
                                            <label class="custom-file-label"
                                                   for="imageUpdate">{{trans('langPanel.upload')}}</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 ">
                                    <div id="req_input_update" class="container ">
                                        <div class="col-12 d-flex">
                                            <a href="#" id="addMoreUpdate"
                                               class="btn btn-success add_input w-100 addItemInUpdateForm">اضافه کردن
                                                آیتم</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary">ویرایش</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end bootstrap model -->
@endsection
@section('script')


    {{--    =========show data edit =========--}}
    <script type="text/javascript">
$('.homeContentIdUpdateSelect2').select();
        function showEditManageHomeContent(id) {

            $.ajax({
                url: "{{ route('Admin.manageHomeContent.show') }}",
                type: "POST",
                data: {id: id},
                success: function (response) {

                    // fill ManageHomeContent form fields
                    var manageHomeContent = response.ManageHomeContent;
                    console.log(manageHomeContent)
                    var manageHomeContentItems = response.ManageHomeContentItems;
                    $('#idUpdate').val(manageHomeContent.id);
                    $('#titleUpdate').val(manageHomeContent.title);
                    $('#topTitleUpdate').val(manageHomeContent.topTitle);
                    $('#descriptionUpdate').val(manageHomeContent.description);
                    $("#imageUpdatePic").attr("src", '/' + manageHomeContent.image);
                    $('#sortUpdate').val(manageHomeContent.sort);
                    $('#statusUpdate').val(manageHomeContent.status).change();
                    if (manageHomeContentItems.length > 0 && manageHomeContentItems[0].sort) {
                        $('#sortItemsUpdate').val(manageHomeContentItems[0].sort);
                    }

                    $('#typeHomeContentUpdate').val(manageHomeContent.type).change();

                    var reqInputUpdate = $('#req_input_update');
                    var rowHomeContents = response.rowHomeContents;
                    for (var i = 0; i < manageHomeContentItems.length; i++) {
                        var manageHomeContentItem = manageHomeContentItems[i];
                        var homeContentId = manageHomeContentItem.homeContentId;
                        var inputHtml = ` <div class="required_inp_update w-100 row m-2"> <input class="form-control col-2" style="margin: 0 20px; display: unset !important;" name="sortItems[]" id="sortItems${i}" placeholder="Text Field ${i + 1}" type="text" value="${manageHomeContentItem.sort}">
                        <select class="form-control firstHomeContentIdUpdate homeContentIdUpdateSelect2 col-6" style="margin: 0 20px; display: unset !important;" name="homeContentId[]" id="homeContentIdUpdate${manageHomeContentItem.id}">${getOption(rowHomeContents, homeContentId)}</select>
                        <input type="button" class="inputRemoveUpdate btn btn-danger col-1 ml-2" value="-"/>
                        </div>`;
                        reqInputUpdate.append(inputHtml);
                        $('#homeContentIdUpdate' + i).val(manageHomeContentItem.homeContentId).change();
                    }

                    // show the modal
                    $('#editModalManageHomeContent').modal('show');


                },
                error: function (xhr, status, error) {
                }
            });
        }

        function getOption(items, itemSelected) {
            let options = "";
            for (var i = 0; i < items.length; i++) {
                options += `<option value="${items[i].id}" ${itemSelected == items[i].id ? "selected" : ""}>${items[i].title}</option>`;
            }
            return options;
        }

        $("#addmore").click(function () {
            const idType = $('#typeHomeContent').val();
            if (idType == null) {
                alert('باید دسته خود را ابتدا انتخاب نمایید')
            } else {
                $.ajax({
                    url: "getDetailHomeContentById",
                    type: "POST",
                    data: {id: idType},
                    success: function (data) {
                        $("#req_input").append('' +
                            '<div class="required_inp w-100 row m-2">' +
                            '<input class="form-control col-2 inpDynamic" style="margin: 0 20px;display: unset !important;" name="sortItems[]" id="sortItems" placeholder="ترتیب " type="text">' +
                            '<select class="form-control col-6 inpDynamic dynamicSelectRowItems" style="margin: 0 20px;display: unset !important;" name="homeContentId[]" id="homeContentId" ></select>' +
                            '<input  type="button" class="inputRemove col-1 ml-2  btn btn-danger" value="-"/>' +
                            '</div>');
                        $.each(data, function (index, item) {
                            // $('#homeContentId').select2('data', {id: item.id, text: item.text});
                            $('.dynamicSelectRowItems').append($('<option>', {
                                value: item.id,
                                text: item.text
                            })).select2({dropdownAutoWidth: true});
                        });


                    },
                    error: function (xhr, status, error) {

                    }
                });
            }
        });
    </script>
    {{--    =========show data edit =========--}}

    {{--    script for create form ajax-------}}
    <script type="text/javascript">

        $(document).ready(function () {
            // Submit form data using Ajax
            $("#formManageHomeContent").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('Admin.manageHomeContent.store')}}",
                    type: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        // Show success message
                        Swal.fire(
                            'با موفقیت ثبت شد!',
                            '',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                // Reset form fields
                                $("#formManageHomeContent")[0].reset();
                                // Hide modal
                                $("#modalManageHomeContent").modal("hide");

                                location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        $('#preloader').addClass('d-none');
                        var errors = xhr.responseJSON.errors;
                        // Show error messages for each field
                        if (errors.title) {
                            $("#title").addClass("is-invalid");
                            $("#titleError").text(errors.title[0]);
                        }
                        if (errors.topTitle) {
                            $("#topTitle").addClass("is-invalid");
                            $("#topTitleError").text(errors.topTitle[0]);
                        }
                        if (errors.description) {
                            $("#title").addClass("is-invalid");
                            $("#descriptionError").text(errors.description[0]);
                        }
                        if (errors.sort) {
                            $("#sort").addClass("is-invalid");
                            $("#sortError").text(errors.sort[0]);
                        }
                        if (errors.sortItems) {
                            $("#sortItems").addClass("is-invalid");
                            $("#sortItemsError").text(errors.sortItems[0]);
                        }
                        if (errors.status) {
                            $("#status").addClass("is-invalid");
                            $("#statusError").text(errors.status[0]);
                        }
                        if (errors.status) {
                            $("#typeHomeContent").addClass("is-invalid");
                            $("#typeHomeContentError").text(errors.typeHomeContent[0]);
                        }
                        if (errors.status) {
                            $("#homeContentId").addClass("is-invalid");
                            $("#homeContentIdError").text(errors.homeContentId[0]);
                        }
                    }
                });
            });

        });
    </script>
    {{--    script for create form ajax-------}}

    {{--    script for update form ajax-------}}
    <script type="text/javascript">

        $(document).ready(function () {
            // Submit form data using Ajax
            $("#formManageHomeContentUpdate").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('Admin.manageHomeContent.update')}}",
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
                        ).then((result) => {
                            if (result.isConfirmed) {
                                // Reset form fields
                                $("#formManageHomeContent")[0].reset();
                                // Hide modal
                                $("#modalManageHomeContent").modal("hide");

                                location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        $('#loading').addClass('d-none');
                        var errors = xhr.responseJSON.errors;
                        // Show error messages for each field
                        if (errors.title) {
                            $("#title").addClass("is-invalid");
                            $("#titleError").text(errors.title[0]);
                        }
                        if (errors.topTitle) {
                            $("#topTitle").addClass("is-invalid");
                            $("#topTitleError").text(errors.topTitle[0]);
                        }
                        if (errors.description) {
                            $("#title").addClass("is-invalid");
                            $("#descriptionError").text(errors.description[0]);
                        }
                        if (errors.sort) {
                            $("#sort").addClass("is-invalid");
                            $("#sortError").text(errors.sort[0]);
                        }
                        if (errors.sortItems) {
                            $("#sortItems").addClass("is-invalid");
                            $("#sortItemsError").text(errors.sortItems[0]);
                        }
                        if (errors.status) {
                            $("#status").addClass("is-invalid");
                            $("#statusError").text(errors.status[0]);
                        }
                        if (errors.status) {
                            $("#typeHomeContent").addClass("is-invalid");
                            $("#typeHomeContentError").text(errors.typeHomeContent[0]);
                        }
                        if (errors.status) {
                            $("#homeContentId").addClass("is-invalid");
                            $("#homeContentIdError").text(errors.homeContentId[0]);
                        }
                    }
                });
            });

        });
    </script>
    {{--    script for update form ajax-------}}

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

    {{--    =======ajax tyoe home content ajax============--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.typeHomeContent').select2({
                placeholder: 'دسته خود را انتخاب کنید',
                ajax: {
                    url: 'get-data-home-content', // آدرس آیاکس کنترلر لاراول
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
            $('#typeHomeContentUpdate').select2({
                placeholder: 'دسته خود را انتخاب کنید',
                ajax: {
                    url: 'get-data-home-content', // آدرس آیاکس کنترلر لاراول
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
            $(".addItemInUpdateForm").click(function () {
                const idType = $('.typeHomeContentUpdate').val();
                if (idType == null) {
                    alert('باید دسته خود را ابتدا انتخاب نمایید')
                } else {
                    $.ajax({
                        url: "getDetailHomeContentById",
                        type: "POST",
                        data: {id: idType},
                        success: function (data) {
                            $("#req_input_update").append('' +
                                '<div class="required_inp_update w-100 row m-2">' +
                                '<input class="form-control col-2 " style="margin: 0 20px;display: unset !important;" name="sortItems[]" id="sortItems" placeholder="ترتیب " type="text">' +
                                '<select class="form-control col-6  dynamicSelectRowItemsUpdate homeContentIdUpdateSelect2" style="margin: 0 20px;display: unset !important;" name="homeContentId[]" id="homeContentId" ></select>' +
                                '<input  type="button" class="inputRemoveUpdate col-1 ml-2  btn btn-danger" value="-"/>' +
                                '</div>');
                            $.each(data, function (index, item) {
                                // $('#homeContentId').select2('data', {id: item.id, text: item.text});
                                $('.dynamicSelectRowItemsUpdate').append($('<option>', {
                                    value: item.id,
                                    text: item.text
                                })).select2({dropdownAutoWidth: true});
                            });
                        },
                        error: function (xhr, status, error) {
                        }
                    });
                }
            });
            $('#typeHomeContentUpdate').on('change', function () {
                $(".required_inp_update").remove()
            });

            $('#typeHomeContent').on('change', function () {
                $(".required_inp").remove()
            });

            $('body').on('click', '.inputRemove', function () {
                $(this).parent('div.required_inp').remove()
            });
            $('body').on('click', '.inputRemoveUpdate', function () {
                $(this).parent('div.required_inp_update').remove()
            });
        });

    </script>
    {{--    =======ajax tyoe home content ajax============--}}


@endsection
