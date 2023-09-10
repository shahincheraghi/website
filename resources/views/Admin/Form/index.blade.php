@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.footer')}}
@endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/form-js@8.1.1/dist/form-js.css" />
    <script src="https://unpkg.com/form-js@8.1.1/dist/form-js.js"></script>
@endsection
@section('content')
    <style>
        .form-wrap.form-builder .frmb-control li{
            text-align: right !important;
        }
        .form-wrap.form-builder .frmb-control li::before {
            margin-left: 10px !important;
            font-size: 16px;
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.footer')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.footer')}}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table data-list-view">
                    <thead>
                    <tr>
                        <th>{{trans('langPanel.index')}}</th>
                        <th>{{trans('langPanel.name')}}</th>
                        <th>{{trans('langPanel.keyword')}}</th>
                        <th>{{trans('langPanel.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @forelse($data['Form'] as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->keyword}}</td>
                            <td>
                                <a href="{{route('Admin.faqs.edit',$item->id)}}"
                                   type="button"
                                   class="btn btn-icon  rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light"><i
                                        class="feather icon-edit"></i></a>
                                <a onclick="deleteRecord('{{route('Admin.faqs.destroy',$item->id)}}')"
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

            <a onClick="addForm()" href="javascript:void(0)" class="btn btn-primary font-weight-bolder my-3"> فرم جدید</a>
            <form id="formFooter">
                <div class="content-body">
                    <!-- Input Validation start -->
                    <section class="input-validation">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="fb-editor"></div>
                            </div>
                        </div>
                    </section>
                    <!-- Input Validation end -->
                </div>
            </form>

            <a onClick="saveForm()" href="javascript:void(0)" class="btn btn-primary font-weight-bolder my-3">ثبت فیلد های فرم</a>

            <!-- boostrap form model -->
            <div class="modal fade" id="form-modal" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="form-Modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger mb-2" style="display:none"></div><br/>
                            <form action="javascript:void(0)" id="FormSave" name="FormSave" class="form-horizontal" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">نام فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="نام فرم را وارد کنید"  required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="code" class="col-sm-5 control-label">کد انحصاری فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="code" name="code" placeholder="کد انحصاری فرم را وارد کنید"  required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-5 control-label">  توضیحات فرم :
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" id="description" ></textarea>
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

            <style>
                .select2-container{
                    width: 100% !important;
                }
            </style>
            <!-- boostrap form model -->
            <div class="modal fade" id="form-field-modal" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="form-field-Modal-title"></h4>
                        </div>

                        <div class="modal-body">
                            <div class="alert alert-danger mb-2" style="display:none"></div><br/>
                            <form action="javascript:void(0)" id="FormFieldSave" name="FormFieldSave" class="form-horizontal" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="status">انتخاب فرم</label>
                                    <select class="form-control select2 form-control" id="form_id" name="form_id">
                                        <option></option>
                                        @foreach($forms as $form)
                                            <option value="{{$form->id}}">{{$form->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="modal-footer justify-content-center">

                                    <button type="submit" class="btn btn-primary" id="btn-save-brand">ثبت فیلد های فرم</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end bootstrap model -->


        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('Admin/app-assets/plugins/formBuilder/jquery-ui.min.js')}}"></script>
    <script src="{{asset('Admin/app-assets/plugins/formBuilder/form-builder.min.js')}}"></script>


    {{--    script for create form ajax--}}
    <script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    function addForm(){
        $('#FormSave').trigger("reset");
        $('#form-Modal-title').html("ثبت فرم");
        $('#form-modal').modal('show');

    }
    $('#FormSave').submit(function(e) {
        e.preventDefault();
        setTimeout(function() {
            jQuery('.alert-danger').css("display", "none");
        },6000);
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "addForm",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                if(data.errors){
                    // پاک کردن ارورهای قبلی
                    jQuery('.alert-danger').empty();
                    jQuery.each(data.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<p>'+value+'</p>');
                    });
                }else {
                    $("#form-modal").modal('hide');
                    $("#btn-save-brand").html('در حال ارسال ...');
                    $("#btn-save-brand").attr("disabled", false);
                    Swal.fire(
                        'با موفقیت ثبت شد!',
                        '',
                        'success'
                    ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                }
            },
            error: function(data){
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


    {{----------------------------   select2 ---------------------------------}}
    <script>
        $('#form_id').select2({
            placeholder: 'انتخاب گزینه'
        });
    </script>
    {{----------------------------   select2---------------------------------}}

    {{--    script for save form ajax--}}
    <script type="text/javascript">
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        function saveForm(){
            $('#FormFieldSave').trigger("reset");
            $('#form-field-Modal-title').html("ثبت فیلد های فرم");
            $('#form-field-modal').modal('show');

        }
        $('#FormSave').submit(function(e) {
            e.preventDefault();
            setTimeout(function() {
                jQuery('.alert-danger').css("display", "none");
            },6000);
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "addFormField",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.errors){
                        // پاک کردن ارورهای قبلی
                        jQuery('.alert-danger').empty();
                        jQuery.each(data.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>'+value+'</p>');
                        });
                    }else {
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
                error: function(data){
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

    {{--    script for create field fo form ajax--}}
    <script>
        $(document).ready(function() {
                var fbOptions = {
                    messages: {
                        fr: {
                            addOption: 'افزودن گزینه',
                            allFieldsRemoved: 'همه‌ی فیلدها حذف شدند.',
                            allowMultipleFiles: 'امکان آپلود چند فایل در هر فیلد وجود دارد.',
                            autocomplete: 'Autocomplete',
                            button: 'دکمه',
                            cannotBeEmpty: 'این فیلد نمی‌تواند خالی باشد.',
                            checkboxGroup: 'گروه چک باکس',
                            checkbox: 'چک باکس',
                            checkboxes: 'چک باکس‌ها',
                            className: 'کلاس',
                            clearAllMessage: 'آیا مطملا هستید که می‌خواهید همه‌ی فیلدها را پاک کنید؟',
                            clearAll: 'پاک کردن همه‌ی فیلدها',
                            close: 'بستن',
                            content: 'محتوا',
                            copy: 'کپی',
                            copyButton: '&#43;',
                            copyButtonTooltip: 'افزودن فیلد جدید',
                            dateField: 'فیلد تاریخ',
                            description: 'توضیحات',
                            descriptionField: 'متن توضیحات',
                            devMode: 'حالت توسعه‌دهنده',
                            editNames: 'ویرایش نام‌ها',
                            editorTitle: 'فرم ساز',
                            editXML: 'ویرایش XML',
                            enableOther: 'فعال‌سازی گزینه‌ی دیگر',
                            enableOtherMsg: 'اضافه کردن گزینه به فیلدها',
                            fieldDeleteWarning: 'آیا مطمئن هستید که می‌خواهید این فیلد را حذف کنید، تمامی داده‌های مربوط به فرم از دست خواهند رفت.',
                            fieldVars: 'متغیرهای فیلد',
                            fieldNonEditable: 'این فیلد قابل ویرایش نیست.',
                            fieldRemoveWarning: 'آیا مطمئن هستید که می‌خواهید این فیلد را حذف کنید؟',
                            fileUpload: 'آپلود فایل',
                            formUpdated: 'فرم بروزرسانی شد',
                            getStarted: 'شروع کنید',
                            header: 'سربرگ',
                            hide: 'مخفی کردن',
                            hidden: 'مخفی',
                            label: 'برچسب',
                            labelEmpty: 'نام فیلد را وارد کنید',
                            limitRole: 'فقط برای کاربران این نقش قابل دسترسی است:',
                            mandatory: 'اجباری',
                            maxChoices: 'حداکثر تعداد گزینه‌ها',
                            minChoices: 'حداقل تعداد گزینه‌ها',
                            name: 'نام',
                            no: 'خیر',
                            off: 'خاموش',
                            on: 'روشن',
                            option: 'گزینه',
                            optional: 'اختیاری',
                            optionLabelPlaceholder: 'برچسب',
                            optionValuePlaceholder: 'مقدار',
                            optionEmpty: 'مقدار گزینه را وارد کنید',
                            other: 'دیگر',
                            paragraph: 'پاراگراف',
                            placeholder: 'پیش‌نمایش',
                            placeholders: {
                                value: 'مقدار',
                                label: 'برچسب',
                                text: '',
                                textarea: '',
                                email: 'آدرس ایمیل',
                                placeholder: 'پیش نمایش',
                                className: 'کلاس',
                                password: 'رمز عبور',
                                number: 'شماره',
                                tel: 'تلفن',
                                url: 'آدرس سایت',
                                search: 'جستجو',
                                range: 'محدوده',
                                date: 'تاریخ',
                                month: 'ماه',
                                week: 'هفته',
                                time: 'زمان',
                            },
                        },
                    },
                };
                $(document.getElementById('fb-editor')).formBuilder(fbOptions);

        });
    </script>
    <script>
        $('#FormFieldSave').submit(function(e) {
            e.preventDefault();
            var formData = $('#fb-editor').formBuilder('getData', 'json');
            var formId = $('#form_id').val();
            $.ajax({
                url: '/Admins/FormFieldSave',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {formData: formData ,formId:formId},
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
    {{--    script for create field fo form ajax--}}
@endsection
