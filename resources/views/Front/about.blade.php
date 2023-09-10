@extends('Layouts.frontLayout')
@section('content')
    <section class="bg-half d-table w-100" style="background-size: cover!important;background: url(/{{(isset($data['settings']['skillImage']))?$data['settings']['skillImage']:''}});">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> {{trans('langFront.about')}} </h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="/"> صفحه اصلی</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('langFront.about')}} </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section>
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>




    <section style="overflow-x: hidden;
    padding: 100px 0;

    position: relative;

" class="section bg-white pt-0 ">

        <div class="container">
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <video controls width="100%">
                                <source src="" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">درباره ما</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video type="video/mp4" class="embed-responsive-item w-100 d-flex"  src="/Front/videos/videoAboutPcesco.mp4" controls ></video>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal -->

            <div class="row justify-content-center">
                <div style="margin-top: 10vh" class="col-12 text-center">
                    <div class="video-solution-cta position-relative" style="z-index: 1;">
                        <div class="position-relative">

                            <img src="/{{(isset($data['settings']['slideImg']))?$data['settings']['slideImg']:''}}" class="img-fluid rounded-md shadow-lg" alt="">
                            <div class="play-icon">
                                <a href="#!" data-toggle="modal" data-target="#exampleModal" class="play-btn lightbox">
                                    <i class="mdi mdi-play text-primary rounded-circle bg-white shadow-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="container mt-md-4 pt-md-2">
                            <div class="row justify-content-center">
                                <div  class="col-lg-12 text-center">
                                    <div class="row align-items-center">


                                        <div class="row text-justify ">
                                            <div class="col-md-12 my-5">
                                                <p style="text-align: justify;" class=" text-white">{{(isset($data['settings']['aboutInfo']))?$data['settings']['aboutInfo']:''}}</p>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <ul>
                                                    @foreach($data['AllServicesSpecial'] as $Services)
                                                        <li style="text-align: right;justify-content: right;color: white;font-size: 17px" class="text-right"><i class="flaticon-check-mark"></i> {{$Services->title}}</li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                    </div><!--end row -->
            <div style="background-color: #081c37 !important" class="feature-posts-placeholder bg-primary bg-gradient"></div>
        </div><!--end container-->
    </section>
@endSection
