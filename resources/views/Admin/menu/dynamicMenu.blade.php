@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.insertHomeBox4')}}
@endsection
{{--@section('css')--}}

{{--@endsection--}}
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.menu')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.listMenu')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <style>
                    .text-bold {
                        font-weight: 900 !important;
                    }
                    .toastStatus{justify-content: right;text-align: right;font-size: 15px !important;}
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

                    .dd {
                        position: relative;
                        display: block;
                        margin: 0;
                        padding: 0;
                        max-width: 100%;
                        list-style: none;
                        font-size: 13px;
                        line-height: 20px;
                    }

                    .dd-list {
                        display: block;
                        position: relative;
                        margin: 0;
                        padding: 0;
                        list-style: none;
                    }

                    .dd-list .dd-list {
                        padding-left: 30px;
                    }

                    .dd-collapsed .dd-list {
                        display: none;
                    }

                    .dd-item,
                    .dd-empty,
                    .dd-placeholder {
                        display: block;
                        position: relative;
                        margin: 0;
                        padding: 0;
                        min-height: 20px;
                        font-size: 13px;
                        line-height: 20px;
                    }

                    .dd-handle {
                        display: block;
                        height: 35px;
                        line-height: 12px;
                        margin: 5px 0;
                        padding: 10px;
                        color: #333;
                        text-decoration: none;
                        font-weight: bold;
                        border: 1px solid #938af4;
                        background: #fafafa;
                        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
                        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
                        background: linear-gradient(top, #fafafa 0%, #eee 100%);
                        -webkit-border-radius: 3px;
                        border-radius: 5px;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                    }

                    background: #fafafa

                    ;
                    background:

                    -webkit-linear-gradient
                    (
                    top, #fafafa

                    0
                    %
                    ,
                    #eee

                    100
                    %
                    )
                    ;
                    background:

                    -moz-linear-gradient
                    (
                    top, #fafafa

                    0
                    %
                    ,
                    #eee

                    100
                    %
                    )
                    ;
                    background:

                    linear-gradient
                    (
                    top, #fafafa

                    0
                    %
                    ,
                    #eee

                    100
                    %
                    )
                    ;
                    -webkit-border-radius:

                    3
                    px

                    ;
                    border-radius:

                    3
                    px

                    ;
                    box-sizing: border-box

                    ;
                    -moz-box-sizing: border-box

                    ;
                    }
                    .dd-handle:hover {
                        color: #2ea8e5;
                        background: #fff;
                    }

                    .dd-item > button {
                        display: block;
                        position: relative;
                        cursor: pointer;
                        float: left;
                        width: 25px;
                        height: 20px;
                        margin: 5px 0;
                        padding: 0;
                        text-indent: 100%;
                        white-space: nowrap;
                        overflow: hidden;
                        border: 0;
                        background: transparent;
                        font-size: 12px;
                        line-height: 1;
                        text-align: center;
                        font-weight: bold;
                    }

                    .dd-item > button:before {
                        content: '+';
                        display: block;
                        position: absolute;
                        width: 100%;
                        text-align: center;
                        text-indent: 0;
                        font-size: 20px
                    }

                    .dd-item > button[data-action="collapse"]:before {
                        content: '-';
                    }

                    .dd-placeholder,
                    .dd-empty {
                        margin: 5px 0;
                        padding: 0;
                        min-height: 30px;
                        background: #f2fbff;
                        border: 1px dashed #b6bcbf;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                    }

                    .dd-empty {
                        border: 1px dashed #bbb;
                        min-height: 100px;
                        background-color: #e5e5e5;
                        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                        -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
                        background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                        -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
                        background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                        linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
                        background-size: 60px 60px;
                        background-position: 0 0, 30px 30px;
                    }

                    .dd-dragel {
                        position: absolute;
                        pointer-events: none;
                        z-index: 9999;
                    }

                    .dd-dragel > .dd-item .dd-handle {
                        margin-top: 0;
                    }

                    .dd-dragel .dd-handle {
                        -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
                        box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
                    }

                    /**
                     * Nestable Extras
                     */

                    .nestable-lists {
                        display: block;
                        clear: both;
                        padding: 30px 0;
                        width: 100%;
                        border: 0;
                        border-top: 2px solid #ddd;
                        border-bottom: 2px solid #ddd;
                    }

                    #nestable-menu {
                        padding: 0;
                        margin: 20px 0;
                    }

                    #nestable-output,
                    #nestable2-output {
                        width: 100%;
                        height: 7em;
                        font-size: 0.75em;
                        line-height: 1.333333em;
                        font-family: Consolas, monospace;
                        padding: 5px;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                    }

                    #nestable2 .dd-handle {
                        color: #fff;
                        border: 1px solid #999;
                        background: #bbb;
                        background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
                        background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
                        background: linear-gradient(top, #bbb 0%, #999 100%);
                    }

                    #nestable2 .dd-handle:hover {
                        background: #bbb;
                    }

                    #nestable2 .dd-item > button:before {
                        color: #fff;
                    }

                    @media only screen and (min-width: 700px) {

                        .dd {
                            width: 100%;
                        }

                        .dd + .dd {
                            margin-left: 2%;
                        }

                    }

                    .dd-hover > .dd-handle {
                        background: #2ea8e5 !important;
                    }

                    /**
                     * Nestable Draggable Handles
                     */

                    .dd3-content {
                        display: block;
                        height: 30px;
                        margin: 5px 0;
                        padding: 5px 10px 5px 40px;
                        color: #333;
                        text-decoration: none;
                        font-weight: bold;
                        border: 1px solid #ccc;
                        background: #fafafa;
                        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
                        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
                        background: linear-gradient(top, #fafafa 0%, #eee 100%);
                        -webkit-border-radius: 3px;
                        border-radius: 3px;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                    }

                    .dd3-content:hover {
                        color: #2ea8e5;
                        background: #fff;
                    }

                    .dd-dragel > .dd3-item > .dd3-content {
                        margin: 0;
                    }

                    .dd3-item > button {
                        margin-left: 30px;
                    }

                    .dd3-handle {
                        position: absolute;
                        margin: 0;
                        left: 0;
                        top: 0;
                        cursor: pointer;
                        width: 30px;
                        text-indent: 100%;
                        white-space: nowrap;
                        overflow: hidden;
                        border: 1px solid #aaa;
                        background: #ddd;
                        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
                        background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
                        background: linear-gradient(top, #ddd 0%, #bbb 100%);
                        border-top-right-radius: 0;
                        border-bottom-right-radius: 0;
                    }

                    .dd3-handle:before {
                        content: '≡';
                        display: block;
                        position: absolute;
                        left: 0;
                        top: 3px;
                        width: 100%;
                        text-align: center;
                        text-indent: 0;
                        color: #fff;
                        font-size: 20px;
                        font-weight: normal;
                    }

                    .dd3-handle:hover {
                        background: #ddd;
                    }

                    /**
                     * Socialite
                     */

                    .socialite {
                        display: block;
                        float: left;
                        height: 35px;
                    }

                </style>
                <div class="container">
                    {{-- menu --}}
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="header-title ">

                                        <span class="float-right">
                            <a href="#newModal" class="btn btn-outline-primary pull-right" data-toggle="modal">
                                ثبت منو جدید
                            </a>
                                            <br>
                        </span>
                                    </div>

                                    {{-- new --}}
                                    <br>

                                    <div class="row my-5">
                                        <div class="col-md-12">

                                            <div class="dd" id="nestable">
                                                {!! $menu !!}
                                            </div>

                                            <p id="success-indicator" style="display:none; margin-right: 10px;">
                                                <i class="fas fa-check-circle"></i> Menu order has been saved
                                            </p>
                                        </div>

                                    </div>

                                    <!-- Create new item Modal -->
                                    <div class="modal fade" id="newModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">ثبت منو جدید</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ route('topnew') }}"
                                                      class="form-horizontal">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="title"
                                                                   class="col-md-2 control-label align-items-center d-flex text-bold">
                                                                عنوان منو</label>
                                                            <div class="col-md-10">
                                                                <input type="text" placeholder="مثال(about-us)"
                                                                       name="title" class="form-control"
                                                                       value="{{ old('title') }}" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="slug"
                                                                   class="col-md-2 control-label d-flex align-items-center text-bold">لینک
                                                                منو</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="slug"
                                                                       placeholder="مثال(https://www.your-website.com/pages/id=1/about-us)"
                                                                       class="form-control" value="{{ old('slug') }}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">انصراف
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">ثبت</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <!-- Delete item Modal -->
                                    <div class="modal border-danger fade" id="deleteModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header bg-danger text-
white">
                                                    <h5 class="modal-title">Delete Item</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;
                                                    </button>
                                                </div>
                                                <form method="POST" action="/admin/topmenudelete"
                                                      class="form-horizontal">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this menu item?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                        <input type="hidden" name="delete_id" id="postvalue" value=""/>
                                                        <input type="submit" class="btn btn-danger"
                                                               value="Delete Item"/>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                {{-- new --}}


                                <!-- boostrap form update model -->
                                    <div class="modal fade menuModalUpdate" id="menuModalUpdate" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="menu-Modal-title"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger mb-2" style="display:none"></div>
                                                    <br/>
                                                    <form action="javascript:void(0)" id="FormUpdate" name="FormUpdate" class="form-horizontal"
                                                          method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" hidden id="idUpdate" name="id">
                                                        <div class="form-group row">
                                                            <label for="title"
                                                                   class="col-md-2 control-label align-items-center d-flex text-bold">
                                                                عنوان منو</label>
                                                            <div class="col-md-10">
                                                                <input type="text"
                                                                       id="titleUpdateMenu"
                                                                       placeholder="مثال(about-us)"
                                                                       name="title"
                                                                       class="form-control"
                                                                       required
                                                                       autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="slug"
                                                                   class="col-md-2 control-label d-flex align-items-center text-bold">لینک
                                                                منو</label>
                                                            <div class="col-md-10">
                                                                <input id="slugUpdateMenu"
                                                                       type="text"
                                                                       name="slug"
                                                                       placeholder="مثال(https://www.your-website.com/pages/id=1/about-us)"
                                                                       class="form-control"
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">

                                                            <button type="submit" class="btn btn-primary" id="btn-update-menu">ویرایش منو</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>

                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end bootstrap form update  model -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.2-1/js/bootstrap.min.js" integrity="sha512-73t+oD9YRdVZBwLUw/FLF+4+mt6JyUhm8xUEgwA2/+QI3pM+t/6ALkELMcin6caoV1GVt3OMudVlHiMei0DXfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/nestable2@1.6.0/jquery.nestable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>

    {{--    script for delete form ajax--}}
    <script type="text/javascript">

        $(document).ready(function () {
            $('.showEditMenu').click(function () {
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "showEditMenu",
                    data: {id: id},
                    success: (response) => {
                        $('#menuModalUpdate').modal('toggle');
                        $('#menu-Modal-title').text('ویرایش منو');
                        $("#idUpdate").val(response.id);
                        $("#titleUpdateMenu").val(response.title);
                        $("#slugUpdateMenu").val(response.slug);
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

            $('.destroyMenuDynamic').click(function (e) {
                var clickedElement = event.target;
                var id = clickedElement.dataset.id;

                Swal.fire(
                    'آیا مطمئنید ؟',
                    'بعد از حذف دیگر قادر به بازگردانی نیستید.',
                    'info'
                )
                    .then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: "destroyMenuDynamic",
                                data: {id: id},
                                success: (response) => {
                                    Swal.fire(
                                        'با موفقیت حذف شد!',
                                        '',
                                        'success'
                                    )
                                        .then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
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
                        }
                    });

            });
        });
    </script>
    {{--    script for delete form ajax--}}



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
            $('#editMenuDynamic').modal('show');

        }

        $('#FormSave').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "updateMenuDynamic",
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
                            'با موفقیت ثبت شد!',
                            '',
                            'success'
                        )
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    }
                },
                // error: function (data) {
                //     Swal.fire(
                //         'مشکلی به وجود آمده لطفا بعدا امتحان کنید!',
                //         '',
                //         'error'
                //     )
                //         .then((result) => {
                //             if (result.isConfirmed) {
                //                 window.location.reload();
                //             }
                //         });
                // }
            });
        });

    </script>
    {{--    script for save form ajax--}}




    <script type="text/javascript">


        $('#FormUpdate').submit(function (e) {
            e.preventDefault();
            setTimeout(function () {
                jQuery('.alert-danger').css("display", "none");
            }, 6000);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "FormUpdateMenuDynamic",
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
                            'با موفقیت ویرایش شد!',
                            '',
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






    {{-- topmenu --}}
    <script type="text/javascript">

        $('.dd').nestable().on('change', function () {
            var data = $('.dd').nestable('serialize');
            var datastring = JSON.stringify(data);
            updateMenus(datastring);
        });

        function updateMenus(data) {
            $.ajax({
                url: 'update-menus-parents',
                type: 'POST',
                dataType: 'json',
                data: {
                    menus: data
                },
                success: function (response) {
                    webToast.Success({
                        status:'موقعیت منو',
                        align:'bottomCenter',
                        message:'موقعیت منو با موفقیت تغییر کرد.',
                        delay: 2000
                    });

                }
            });
        }

        $(document).ready(function () {
            $(function () {
                $('.dd').nestable({
                    dropCallback: function (details) {

                        var order = new Array();
                        $("li[data-id='" + details.destId + "']").find('ol:first').children().each(function (index, elem) {
                            order[index] = $(elem).attr('data-id');
                        });
                        if (order.length === 0) {
                            var rootOrder = new Array();
                            $("#nestable > ol > li").each(function (index, elem) {
                                rootOrder[index] = $(elem).attr('data-id');
                            });
                        }
                        var token = $('form').find('input[name=_token]').val();
                        $.post('{{url("admin/menustop/reorder/")}}',
                            {
                                source: details.sourceId,
                                destination: details.destId,
                                order: JSON.stringify(order),
                                rootOrder: JSON.stringify(rootOrder),
                                _token: token
                            },
                            function (data) {
                                // console.log('data '+data);
                            })
                            .done(function () {
                                $("#success-indicator").fadeIn(100).delay(1000).fadeOut();
                            })
                            .fail(function () {
                            })
                            .always(function () {
                            });
                    }

                });
                //delete item
                $('.delete_toggle').each(function (index, elem) {
                    $(elem).click(function (e) {
                        e.preventDefault();
                        $('#postvalue').attr('value', $(elem).attr('rel'));
                        $('#deleteModal').modal('toggle');
                    });
                });
            });
        });



    </script>
    <!-- END: Page Vendor JS-->
@endsection
