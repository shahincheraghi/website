@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.formBuilder')}}
@endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/form-js@8.1.1/dist/form-js.css"/>
    <script src="https://unpkg.com/form-js@8.1.1/dist/form-js.js"></script>
@endsection
@section('content')
    <style>
        .form-wrap.form-builder .frmb-control li {
            text-align: right !important;
        }

        .form-wrap.form-builder .frmb-control li::before {
            margin-left: 10px !important;
            font-size: 16px;
        }

        .select2-container {
            width: 100% !important;
        }

        .fb-field-placeholder {
            background-color: #f6f6f6;
            border: 1px dashed #ccc;
            height: 50px;
            margin-bottom: 15px;
        }

        .modal-open .fb-field-placeholder {
            background-color: #f6f6f6;
            border: 1px dashed #ccc;
            height: 50px;
            margin-bottom: 15px;
        }
        /* استایل جدول */
        .table {

            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            width: 100% !important;
            overflow: auto;
            border: 1px solid #dee2e6;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        /* استایل دکمه بارگذاری مجدد */
        .reload-button {
            margin-top: 1rem;
        }
    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <!-- data header gird form -->
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.panel')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.formBuilder')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.formBuilder')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data header gird form -->

            <!-- data gird form -->
            <section id="data-list-view" class="data-list-view-header">
                <a onClick="addForm()" href="javascript:void(0)" class="btn btn-primary font-weight-bolder my-1"> فرم
                    جدید</a>
                <div class="action-btns d-none">
                </div>
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                        <tr>
                            <th>{{trans('langPanel.index')}}</th>
                            <th>{{trans('langPanel.name')}}</th>
                            <th>{{trans('langPanel.description')}}</th>
                            <th>{{trans('langPanel.code')}}</th>
                            <th>{{trans('langPanel.operation')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @forelse($forms as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->code}}</td>
                                <td>

                                    <a onclick="showEdit({{$item->id}})"
                                       type="button"
                                       class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light"><i
                                            class="feather icon-edit"></i></a>

                                    <a onclick="deleteRecord('{{route('Admin.forms.destroy',$item->id)}}')"
                                       type="button"
                                       class="btn btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light"><i
                                            class="feather icon-delete"></i></a>

                                    <a onclick="fieldBuilder({{$item->id}})"
                                       type="button"
                                       class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light"><i
                                            class="feather icon-list text-white"></i></a>


                                    <a onclick="formBuilderData({{$item->id}})"
                                       type="button"
                                       class="btn btn-icon rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light"><i
                                            class="feather icon-database text-white"></i></a>
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
            <!-- data gird form -->

            <!-- boostrap fieldBuilder model -->
            <div class="modal fade" id="field-builder-modal" tabindex="-1" role="dialog"
                 aria-labelledby="field-builder-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <form action="javascript:void(0)" id="FormFieldSave" name="FormFieldSave">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="field-builder-modal-label">Field Builder</h5>
                                <button type="button" class="close" style="margin: 0 !important;" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="fb-editor"></div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" hidden id="form_id" name="form_id">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                <button type="submit" class="btn btn-primary" id="save-form">ثبت درخواست</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end bootstrap fieldBuilder model -->

            <!-- boostrap form model -->
            <div class="modal fade" id="form-modal" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="form-Modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger mb-2" style="display:none"></div>
                            <br/>
                            <form action="javascript:void(0)" id="FormSave" name="FormSave" class="form-horizontal"
                                  method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">نام فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="نام فرم را وارد کنید" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="code" class="col-sm-5 control-label">کد انحصاری فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="code" name="code"
                                               placeholder="کد انحصاری فرم را وارد کنید" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-5 control-label"> توضیحات فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label" for="status">وضعیت :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-center">

                                    <button type="submit" class="btn btn-primary" id="btn-save-brand">ثبت فرم</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end bootstrap model -->

            <!-- boostrap form update model -->
            <div class="modal fade" id="form-update-modal" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="form-Modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger mb-2" style="display:none"></div>
                            <br/>
                            <form action="javascript:void(0)" id="FormUpdate" name="FormUpdate" class="form-horizontal"
                                  method="POST" enctype="multipart/form-data">
                                <input type="hidden" hidden id="idUpdate" name="id">
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">نام فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nameUpdate" name="name"
                                               placeholder="نام فرم را وارد کنید" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="code" class="col-sm-5 control-label">کد انحصاری فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="codeUpdate" name="code"
                                               placeholder="کد انحصاری فرم را وارد کنید" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-5 control-label"> توضیحات فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" id="descriptionUpdate"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label" for="status">وضعیت :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="statusUpdate" name="status">
                                            <option value="1">فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-center">

                                    <button type="submit" class="btn btn-primary" id="btn-update-brand">ویرایش فرم</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end bootstrap form update  model -->


            <!-- boostrap form update model -->
            <div class="modal fade" id="modalDataGridFormBuilder" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleDataGridFormBuilder">اطلاعات ثبت شده</h4>
                        </div>
                        <div class="modal-body">
                            <table id="dataGridCustomFormBuilder" class="table"></table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end bootstrap form update  model -->

        </div>
    </div>
@endsection


@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-formBuilder/3.8.3/form-builder.min.js" integrity="sha512-H2n4sb6jgsXLkQpJNWrU8+Z9GNkeFaWnPCW3IACoqBzf4hbjMyEfSRCbSNA671SgiBrjTqJq2Atbmf3/dM6B9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-formBuilder/3.8.3/form-render.min.js" integrity="sha512-aYVBJ4y4clcJ0qRyhQgAPO7+uCWei/FWZauZtoWyF+y26UWgmbDF9je7k5TnY64//XS/8HzMeitykoalARvxAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-formBuilder/3.4.2/form-render.min.js"></script>

    <script type="text/javascript" >
        function formBuilderData(id) {
            $.ajax({
                type: 'POST',
                url: "formBuilderData",
                data: { id: id },
                success: (data) => {
                    if (data.data.length === 0) {
                        Swal.fire(
                            '',
                            'اطلاعاتی با این شناسه پیدا نشد.',
                            'info'
                        )
                        return;
                    }

                    $('#modalDataGridFormBuilder').modal('show');
                    $('#dataGridCustomFormBuilder').empty();

                    var columns = [];
                    $.each(data.data, function (k, v) {
                        try {
                            var parsedValue = JSON.parse(v.value);
                            columns = Object.keys(parsedValue);
                            return false;
                        } catch (error) {
                            alert('بعضی اطلاعات به درستی وارد نشده است.');
                        }
                    });

                    var table = $('<table width="100%" id="dataGridTable"></table>');
                    var thead = $('<thead></thead>');
                    var tbody = $('<tbody></tbody>');

                    var headerRow = $('<tr></tr>');
                    $.each(columns, function (index, column) {
                        if (column !== 'formId' && column !== '_token') {
                            var th = $('<th></th>');
                            th.text(column);
                            headerRow.append(th);
                        }
                    });
                    thead.append(headerRow);

                    $.each(data.data, function (k, v) {
                        try {
                            var parsedValue = JSON.parse(v.value);
                            var row = $('<tr></tr>');

                            $.each(columns, function (index, column) {
                                if (column !== 'formId' && column !== '_token') {
                                    var cell = $('<td></td>');
                                    cell.text(parsedValue[column]);
                                    row.append(cell);
                                }
                            });

                            tbody.append(row);
                        } catch (error) {
                            alert('بعضی اطلاعات به درستی وارد نشده است.');
                        }
                    });

                    table.append(thead);
                    table.append(tbody);

                    $('#dataGridCustomFormBuilder').empty();
                    $('#dataGridCustomFormBuilder').append(table);

                    // اعمال DataTables بر روی جدول
                    $('#dataGridTable').DataTable({
                        "paging": true,
                        "pageLength": 10
                        // دیگر تنظیمات دلخواه خود را اضافه کنید
                    });
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 404) {
                        alert('اطلاعاتی با این شناسه پیدا نشد.');
                    } else {
                        Swal.fire(
                            'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                            '',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                }
            });
        }

        var thElements = $('#dataGridCustomFormBuilder th');
        thElements.addClass('text-center font-weight-bold');

        var tdElements = $('#dataGridCustomFormBuilder td');
        tdElements.addClass('text-right');
    </script>


    {{--    script for create form ajax--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function addForm() {
            $('#FormSave').trigger("reset");
            $('#form-Modal-title').html("ثبت فرم");
            $('#form-modal').modal('show');
        }

        $('#FormSave').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "addForm",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.errors) {
                        // پاک کردن ارورهای قبلی
                        jQuery('.alert-danger').empty();
                        jQuery.each(data.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $("#form-modal").modal('hide');
                        $("#btn-save-brand").html('در حال ارسال ...');
                        $("#btn-save-brand").attr("disabled", false);
                        Swal.fire(
                            '',
                            'با موفقیت ثبت شد!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                },
                error: function (data) {
                    Swal.fire(
                        'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                        '',
                        'error'
                    )
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                }
            });
        });

    </script>
    {{--    script for create form ajax--}}


    {{--    script for save form ajax--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function saveForm() {
            $('#FormFieldSave').trigger("reset");
            $('#form-field-Modal-title').html("ثبت فیلد های فرم");
            $('#form-field-modal').modal('show');

        }

        $('#FormSave').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "addFormField",
                data: formData,
                success: (data) => {
                    if (data.errors) {
                        // پاک کردن ارورهای قبلی
                        jQuery('.alert-danger').empty();
                        jQuery.each(data.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $("#form-modal").modal('hide');
                        $("#btn-save-brand").html('در حال ارسال ...');
                        $("#btn-save-brand").attr("disabled", false);
                        Swal.fire(
                            '',
                            'با موفقیت ثبت شد!',
                            'success'
                        )
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    }
                },
                 error: function (data) {
                     Swal.fire(
                         'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                         '',
                         'error'
                     )
                         .then((result) => {
                             if (result.isConfirmed) {
                                 window.location.reload();
                             }
                         });
                 }
            });
        });

    </script>
    {{--    script for save form ajax--}}


    {{--    script for create form ajax--}}
    <script type="text/javascript">
        function fieldBuilder() {
            $('#FormSave').trigger("reset");
            $('#form-Modal-title').html("ثبت فرم");
            $('#form-modal').modal('show');
        }

        $('#FormSave').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "addForm",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.errors) {
                        // پاک کردن ارورهای قبلی
                        jQuery('.alert-danger').empty();
                        jQuery.each(data.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $("#form-modal").modal('hide');
                        $("#btn-save-brand").html('در حال ارسال ...');
                        $("#btn-save-brand").attr("disabled", false);
                        Swal.fire(
                            '',
                            'با موفقیت ثبت شد!',
                            'success'
                        )
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                },
                error: function (data) {
                    Swal.fire(
                        'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                        '',
                        'error'
                    )
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                }
            });
        });

    </script>
    {{--    script for create form ajax--}}



    {{--    script for create form ajax--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#FormSave').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "addForm",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.errors) {
                        // پاک کردن ارورهای قبلی
                        jQuery('.alert-danger').empty();
                        jQuery.each(data.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $("#form-modal").modal('hide');

                        Swal.fire(
                            '',
                            'با موفقیت ثبت شد!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                },
            });
        });

    </script>
    {{--    script for create form ajax--}}



    {{--    script for edit form ajax--}}
    <script type="text/javascript">
        function showEdit(id){
            $.ajax({
                type: 'POST',
                url: "showEditForm",
                data: {id: id},

                success: (response) => {
                    $("#idUpdate").val(response.data.id);
                    $("#nameUpdate").val(response.data.name);
                    $("#descriptionUpdate").val(response.data.description);
                    $("#codeUpdate").val(response.data.code);
                    $('#statusUpdate').val(response.data.status).change();
                    // $('#FormUpdate').trigger("reset");
                    $('#form-update-modal').modal('show');
                },
                error: function (data) {
                    Swal.fire(
                        '',
                        'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                        'error'
                    )
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                }
            });
        }
        $('#FormSave').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);

        });
    </script>
    {{--    script for edit form ajax--}}


    {{--    script for update form ajax--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#FormUpdate').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "addForm",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.errors) {
                        // پاک کردن ارورهای قبلی
                        jQuery('.alert-danger').empty();
                        jQuery.each(data.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $("#form-modal").modal('hide');
                        $("#btn-save-brand").html('در حال ارسال ...');
                        $("#btn-save-brand").attr("disabled", false);
                        Swal.fire(
                            '',
                            'با موفقیت ویرایش شد!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                    }
                },
                error: function (data) {
                    Swal.fire(
                        '',
                        'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                        'error'
                    )
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                }
            });
        });

    </script>
    {{--    script for update form ajax--}}




    {{--============form builder =======================--}}
    <script type="text/javascript">

        function fieldBuilder(id) {
            $('#FormSave').trigger("reset");
            $("#form_id").val(id);
            $('#form-Modal-title').html("ثبت فرم");
            $('#field-builder-modal').modal('show');

        }


        $('#field-builder-modal').on('show.bs.modal', function () {
            var id = $('#form_id').val();
            $.ajax({
                url: '/Admins/getFormFields',
                data: {id: id},
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#fb-editor').empty();
                    $('#fb-editor').formBuilder('destroy');
                    if (response.data==null){
                        $('#fb-editor').formBuilder();
                    }
                    if (response.tada!==null){
                            var formData = response.data.fields;
                            var formDataRow = JSON.parse(formData);
                            $('#fb-editor').formBuilder({
                                formData: formDataRow
                            });
                    }
                },
                error: function (error) {
                    Swal.fire(
                        'خطا!',
                        'لطفا مجدداً امتحان کنید.',
                        'error'
                    );
                }
            });
        });

    </script>
    {{--============form builder =======================--}}


    {{--    script for create field fo form ajax--}}
    <script type="text/javascript">
        $('#FormFieldSave').submit(function (e) {
            e.preventDefault();
            var formData = $('#fb-editor').formBuilder('getData', 'json');
            var formId = $('#form_id').val();
            $.ajax({
                url: '/Admins/FormFieldSave',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {formData: formData, formId: formId},
                success: function (response) {
                    Swal.fire(
                        '',
                        'با موفقیت ثبت شد!',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function (error) {
                    Swal.fire(
                        'خطا!',
                        'لطفا مجدد امتحان کنید ',
                        'error'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
    {{--    script for create field fo form ajax--}}




@endsection
