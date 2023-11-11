@extends('Layouts.adminLayout')

@section('title')| {{trans('langPanel.RepresentativeList')}} @endsection

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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.Representative')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="#">{{trans('langPanel.listRepresentative')}}</a>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#colorModal">
                          نماینده جدید
                    </button>
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            <tr>
                                <th>{{trans('langPanel.index')}}</th>
                                <th>{{trans('langPanel.agency')}}</th>
                                <th>{{trans('langPanel.filter')}}</th>
                                <th>{{trans('langPanel.province')}}</th>
                                <th>{{trans('langPanel.city')}}</th>
                                <th>{{trans('langPanel.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @forelse($Representative as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->agency}}</td>
                                    <td>{{$item->filter}}</td>
                                    <td>{{$item->province}}</td>
                                    <td>{{$item->city}}</td>
                                    </td>
                                    <td>
                                        <a onclick="showEditRepresentative({{$item->id}})"
                                           type="button"
                                           class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-edit"></i></a>

                                        <a onclick="deleteRecord('{{route('Admin.RepresentativeController.destroy',$item->id)}}')"
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
    <div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="colorModalLabel">ثبت نماینده جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="RepresentativeForm" class="RepresentativeForm" enctype="multipart/form-data">
                        @csrf
                    <div class="row">

                         <div class="col-md-6">
                             <div class="form-group">
                                <label for="filter">{{trans('langPanel.agency')}}</label>
                                <input type="text" class="form-control" id="agency" name="agency"
                                    placeholder="نام نماینده را وارد کنید">
                                <span class="invalid-feedback" role="alert" id="agencyError"></span>
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="filter">{{trans('langPanel.filter')}}</label>
                                <select class="form-control" id="filter" name="filter">
                                    <option value="">انتخاب کنید</option>
                                    <option value="alborz">alborz</option>
                                    <option value="ardabil">ardabil</option>
                                    <option value="azerbaijan-east">azerbaijan-east</option>
                                    <option value="azerbaijan-west">azerbaijan-west</option>
                                    <option value="bushehr">bushehr</option>
                                    <option value="chahar-mahaal-bakhtiari">chahar-mahaal-bakhtiari</option>
                                    <option value="fars">fars</option>
                                    <option value="gilan">gilan</option>
                                    <option value="golestan">golestan</option>
                                    <option value="hamadan">hamadan</option>
                                    <option value="hormozgan">hormozgan</option>
                                    <option value="ilam">ilam</option>
                                    <option value="isfahan">isfahan</option>
                                    <option value="kerman">kerman</option>
                                    <option value="krmanshah">krmanshah</option>
                                    <option value="khorasan-north">khorasan-north</option>
                                    <option value="khorasan-razavi">khorasan-razavi</option>
                                    <option value="khorasan-south">khorasan-south</option>
                                    <option value="khuzestan">khuzestan</option>
                                    <option value="kohgiluyeh-boyer-ahmad">kohgiluyeh-boyer-ahmad</option>
                                    <option value="kurdistan">kurdistan</option>
                                    <option value="lorestan">lorestan</option>
                                    <option value="markazi">markazi</option>
                                    <option value="mazandaran">mazandaran</option>
                                    <option value="qazvin">qazvin</option>
                                    <option value="qom">qom</option>
                                    <option value="semnan">semnan</option>
                                    <option value="sistan-baluchestan">sistan-baluchestan</option>
                                    <option value="tehran">tehran</option>
                                    <option value="yazd">yazd</option>
                                    <option value="zanjan">zanjan</option>
                                    <option value="caspian">caspian</option>
                                    <option value="persian-gulf">persian-gulf</option>
                                    <option value="jazmourian">jazmourian</option>
                                    <option value="qom">qom</option>
                                    <option value="abu-musa">abu-musa</option>
                                    <option value="faror-big">faror-big</option>
                                    <option value="faror-small">faror-small</option>
                                    <option value="hendorabi">hendorabi</option>
                                    <option value="hengam">hengam</option>
                                    <option value="hormoz">hormoz</option>
                                    <option value="khark">khark</option>
                                    <option value="kish">kish</option>
                                    <option value="lark">lark</option>
                                    <option value="lavan">lavan</option>
                                    <option value="qeshm">qeshm</option>
                                    <option value="siri">siri</option>
                                    <option value="tunb-big">tunb-big</option>
                                    <option value="tunb-small">tunb-small</option>
                                </select>


                                <span class="invalid-feedback" role="alert" id="filterError"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 ">
                                <label class="form-label required"
                                       for="province">استان
                                </label>

                                <input type="text" class="form-control" id="province" name="province"
                                       placeholder="استان را وارد کنید">

                                <span class="invalid-feedback" role="alert" id="provinceError"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 ">
                                <label class="form-label required"
                                       for="city">شهر
                                </label>
                                <input type="text" class="form-control" id="city" name="city"
                                       placeholder="شهر را وارد کنید">
                                <span class="invalid-feedback" role="alert" id="cityError"></span>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="timeWork">{{trans('langPanel.timeWork')}}</label>
                                <input type="text" class="form-control" id="timeWork" name="timeWork"
                                       placeholder="ساعت کاری را وارد کنید">
                                <span class="invalid-feedback" role="alert" id="timeWorkError"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">{{trans('langPanel.address')}}</label>
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="آدرس را وارد کنید">
                                <span class="invalid-feedback" role="alert" id="addressError"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">{{trans('langPanel.phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="شماره موبایل را وارد کنید">
                                <span class="invalid-feedback" role="alert" id="phoneError"></span>
                            </div>
                        </div>

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
    <div class="modal fade" id="RepresentativeModalIUpdate" tabindex="-1" aria-labelledby="RepresentativeModalIUpdate"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RepresentativeModalLabel"> ویرایش نماینده </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="RepresentativeFormUpdate" class="RepresentativeFormUpdate" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" hidden id="idUpdate">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="filterUpdate">{{trans('langPanel.agency')}}</label>
                                    <input type="text" class="form-control" id="agencyUpdate" name="agency"
                                           placeholder="نام نماینده را وارد کنید">
                                    <span class="invalid-feedback" role="alert" id="agencyUpdateError"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="filterUpdate">{{trans('langPanel.filter')}}</label>
                                    <select class="form-control" id="filterUpdate" name="filter">
                                        <option value="">انتخاب کنید</option>
                                        <option value="alborz">alborz</option>
                                        <option value="ardabil">ardabil</option>
                                        <option value="azerbaijan-east">azerbaijan-east</option>
                                        <option value="azerbaijan-west">azerbaijan-west</option>
                                        <option value="bushehr">bushehr</option>
                                        <option value="chahar-mahaal-bakhtiari">chahar-mahaal-bakhtiari</option>
                                        <option value="fars">fars</option>
                                        <option value="gilan">gilan</option>
                                        <option value="golestan">golestan</option>
                                        <option value="hamadan">hamadan</option>
                                        <option value="hormozgan">hormozgan</option>
                                        <option value="ilam">ilam</option>
                                        <option value="isfahan">isfahan</option>
                                        <option value="kerman">kerman</option>
                                        <option value="krmanshah">krmanshah</option>
                                        <option value="khorasan-north">khorasan-north</option>
                                        <option value="khorasan-razavi">khorasan-razavi</option>
                                        <option value="khorasan-south">khorasan-south</option>
                                        <option value="khuzestan">khuzestan</option>
                                        <option value="kohgiluyeh-boyer-ahmad">kohgiluyeh-boyer-ahmad</option>
                                        <option value="kurdistan">kurdistan</option>
                                        <option value="lorestan">lorestan</option>
                                        <option value="markazi">markazi</option>
                                        <option value="mazandaran">mazandaran</option>
                                        <option value="qazvin">qazvin</option>
                                        <option value="qom">qom</option>
                                        <option value="semnan">semnan</option>
                                        <option value="sistan-baluchestan">sistan-baluchestan</option>
                                        <option value="tehran">tehran</option>
                                        <option value="yazd">yazd</option>
                                        <option value="zanjan">zanjan</option>
                                        <option value="caspian">caspian</option>
                                        <option value="persian-gulf">persian-gulf</option>
                                        <option value="jazmourian">jazmourian</option>
                                        <option value="qom">qom</option>
                                        <option value="abu-musa">abu-musa</option>
                                        <option value="faror-big">faror-big</option>
                                        <option value="faror-small">faror-small</option>
                                        <option value="hendorabi">hendorabi</option>
                                        <option value="hengam">hengam</option>
                                        <option value="hormoz">hormoz</option>
                                        <option value="khark">khark</option>
                                        <option value="kish">kish</option>
                                        <option value="lark">lark</option>
                                        <option value="lavan">lavan</option>
                                        <option value="qeshm">qeshm</option>
                                        <option value="siri">siri</option>
                                        <option value="tunb-big">tunb-big</option>
                                        <option value="tunb-small">tunb-small</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="filterUpdateError"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3 ">
                                    <label class="form-label required"
                                           for="provinceUpdate">استان
                                    </label>
                                    <input type="text" class="form-control" id="provinceUpdate" name="province"
                                           placeholder="استان را وارد کنید">

                                    <span class="invalid-feedback" role="alert" id="provinceUpdateError"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3 ">
                                    <label class="form-label required"
                                           for="cityUpdate">شهر
                                    </label>
                                    <input type="text" class="form-control" id="cityUpdate" name="city"
                                           placeholder="شهر را وارد کنید">
                                    <span class="invalid-feedback" role="alert" id="cityUpdateError"></span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="timeWorkUpdate">{{trans('langPanel.timeWork')}}</label>
                                    <input type="text" class="form-control" id="timeWorkUpdate" name="timeWork"
                                           placeholder="ساعت کاری را وارد کنید">
                                    <span class="invalid-feedback" role="alert" id="timeWorkUpdateError"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">{{trans('langPanel.status')}}</label>
                                    <select class="form-control" id="statusUpdate" name="status">
                                        <option value="">انتخاب کنید</option>
                                        <option value="1">فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="statusUpdateError"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addressUpdate">{{trans('langPanel.address')}}</label>
                                    <input type="text" class="form-control" id="addressUpdate" name="address"
                                           placeholder="آدرس را وارد کنید">
                                    <span class="invalid-feedback" role="alert" id="addressUpdateError"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">{{trans('langPanel.phone')}}</label>
                                    <input type="text" class="form-control" id="phoneUpdate" name="phone"
                                           placeholder="شماره تلفن را وارد کنید">
                                    <span class="invalid-feedback" role="alert" id="phoneUpdateError"></span>
                                </div>
                            </div>

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


   <script>
       $("#filter").select2({
           dropdownAutoWidth: true,
           width: '100%',
           height: '40px',
           placeholder: 'فیلتر نقشه را وارد کنید',
           allowClear: true
       });
       $("#filterUpdate").select2({
           dropdownAutoWidth: true,
           width: '100%',
           height: '40px',
           placeholder: 'فیلتر نقشه را وارد کنید',
           allowClear: true
       });
   </script>



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
        function showEditRepresentative(id) {
            $.ajax({
                url: "/Admins/Representative/edit",
                type: "POST",
                data: {id: id},
                success: function (response) {

                    $("#idUpdate").val(response.data.id);
                    $("#filterUpdate").val(response.data.filter).change();
                    $("#agencyUpdate").val(response.data.agency);
                    $("#provinceUpdate").val(response.data.province);
                    $("#cityUpdate").val(response.data.city);
                    $("#timeWorkUpdate").val(response.data.timeWork);
                    $("#addressUpdate").val(response.data.address);
                    $("#phoneUpdate").val(response.data.phone);
                    $('#statusUpdate').val(response.data.status).change();
                    $('#RepresentativeModalIUpdate').modal('show');
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
            $("#RepresentativeForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/Admins/Representative/store",
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
                                $("#RepresentativeForm")[0].reset();

                                location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        // Show error messages for each field
                        if (errors.filter) {
                            $("#filter").addClass("is-invalid");
                            $("#filterError").text(errors.filter[0]);
                        }
                        if (errors.agency) {
                            $("#agency").addClass("is-invalid");
                            $("#agencyError").text(errors.agency[0]);
                        }
                        if (errors.city) {
                            $("#city").addClass("is-invalid");
                            $("#cityError").text(errors.city[0]);
                        }
                        if (errors.province) {
                            $("#province").addClass("is-invalid");
                            $("#provinceError").text(errors.province[0]);
                        }
                        if (errors.timeWork) {
                            $("#timeWork").addClass("is-invalid");
                            $("#timeWorkError").text(errors.timeWork[0]);
                        }
                        if (errors.address) {
                            $("#address").addClass("is-invalid");
                            $("#addressError").text(errors.address[0]);
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
            $("#RepresentativeFormUpdate").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/Admins/Representative/update",
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
                                $("#RepresentativeFormUpdate")[0].reset();
                                // Hide modal
                                $("#RepresentativeModalIUpdate").modal("hide");


                                location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        // Show error messages for each field

                        if (errors.filter) {
                            $("#filterUpdate").addClass("is-invalid");
                            $("#filterUpdateError").text(errors.filter[0]);
                        }
                        if (errors.agency) {
                            $("#agencyUpdate").addClass("is-invalid");
                            $("#agencyUpdateError").text(errors.agency[0]);
                        }
                        if (errors.city) {
                            $("#cityUpdate").addClass("is-invalid");
                            $("#cityUpdateError").text(errors.city[0]);
                        }
                        if (errors.province) {
                            $("#provinceUpdate").addClass("is-invalid");
                            $("#provinceUpdateError").text(errors.province[0]);
                        }
                        if (errors.timeWork) {
                            $("#timeWorkUpdate").addClass("is-invalid");
                            $("#timeWorkUpdateError").text(errors.timeWork[0]);
                        }
                        if (errors.phone) {
                            $("#phoneUpdate").addClass("is-invalid");
                            $("#phoneUpdateError").text(errors.phone[0]);
                        }
                        if (errors.address) {
                            $("#addressUpdate").addClass("is-invalid");
                            $("#addressUpdateError").text(errors.address[0]);
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
