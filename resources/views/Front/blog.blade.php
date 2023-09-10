
@extends('Layouts.frontLayout')
@section('content')

    <section class="bg-half d-table w-100" style="background-image: url(/{{(isset($data['settings']['breadcrumbImage']))?$data['settings']['breadcrumbImage']:''}});">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> {{trans('langFront.blog')}} </h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="/"> صفحه اصلی</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('langFront.blog')}} </li>
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











<section class="section">
    <div class="container">
        <div class="row">
            @foreach($data['blogs'] as $blog)
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="card blog rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="/{{$blog->image}}" class="card-img-top" alt="{{$blog->title}}">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h6><a href="javascript:void(0)" class="card-title title text-dark">{{$blog->title}}</a></h6>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>+99</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>{{$blog->comments->count()}} نظر </a></li>
                            </ul>
                            <a href="{{route('Front.blogSingle',$blog->id)}}" class="text-muted readmore">ادامه مطلب  <i class="uil uil-angle-left-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> {{$blog->author_name}}</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> {{\Morilog\Jalali\Jalalian::fromFormat('Y/m/d', timestampDate($blog->created_at,true)['date'])->format(' %d %B ')}}</small>
                    </div>
                </div>
            </div><!--end col-->
                @endforeach


            <!-- PAGINATION START -->
{{--            <div class="col-12">--}}
{{--                <ul class="pagination justify-content-center mb-0">--}}
{{--                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">قبلی </a></li>--}}
{{--                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">بعدی </a></li>--}}
{{--                </ul>--}}
{{--            </div><!--end col-->--}}
            <!-- PAGINATION END -->
        </div><!--end row-->
    </div><!--end container-->
</section>














@endsection
