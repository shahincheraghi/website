@extends('Layouts.frontLayout')
@section('headSite')
    <link rel="stylesheet" href="./Front/css/swiper.min.css">
@endsection
@section('content')

    @if(count($data['sliders']) >= 1)
        <section class="home-slider position-relative">
            <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($data['sliders'] as $sliders)
                        <div class="carousel-item @if ($loop->last) active @endif" data-bs-interval="3000">
                            <div class="bg-home d-flex align-items-center"
                                 style="background-image:url({{(isset($sliders->image))?$sliders->image:''}})">
                                <div class="bg-overlay"></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <div class="title-heading text-white mt-4">
                                                <h1 class="display-4 title-dark fw-bold mb-3">{{$sliders->title}}</h1>
                                                <p class="para-desc para-dark mx-auto text-light">{{$sliders->text}}</p>
                                                @if(isset($sliders->titleBtn))
                                                    <div class="mt-4">
                                                        <a href="{{$sliders->link}}"
                                                           class="btn btn-primary mt-2"> {{$sliders->titleBtn}}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">قبلی </span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">بعدی </span>
                </a>
            </div>
        </section>
    @endif
    @if(isset($data['homeItems']))
        @foreach($data['homeItems'] as $sections)

            <div class="container  mt-4">
                <!--start row-->
                <div class="row justify-content-center">
                    @if($sections->type != '99')
                        @if($sections->type != '96')
                            @if($sections->type != '1')
                                @if(isset($sections->title) || isset($sections->topTitle) || isset($sections->description))
                                    <div class="col-12 text-center">
                                        <div class="section-title mb-2 pb-2">

                                            @if(isset($sections->title))
                                                <h6 class="text-primary">{{ $sections->title }}</h6>
                                            @endif

                                            @if(isset($sections->topTitle))
                                                <h4 class="title mb-4">{{$sections->topTitle }}</h4>
                                            @endif

                                            @if(isset($sections->description))
                                                <p class="text-muted para-desc mx-auto">{{ $sections->description }}</p>
                                            @endif

                                        </div>
                                    </div><!--end col-->
                                @endif
                            @endif
                        @endif
                    @endif
                    <div class="row"></div>
                </div>
                <!--end row-->
                <!--start row-->
                <div class="row">

                    @if(isset($data['CompetitiveAdvantage'][0]))
                        @if($sections->type == $data['CompetitiveAdvantage'][0]->type)
                            <div class="container mb-2">
                                <div class="row">
                                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                                        @foreach($data['CompetitiveAdvantage'] as $CompetitiveAdvantage)
                                            @if($CompetitiveAdvantage->id === $itemsInSection->homeContentId)
                                                <div class="col-md-3 col-6 p-4 text-center">
                                                    <img src="File/HomeContent/{!! $CompetitiveAdvantage->path !!}"
                                                         style="width: auto;height: 100%;max-height:70px !important; "

                                                         alt="">
                                                    <h5 class="mt-2">{!! $CompetitiveAdvantage->title !!} </h5>
                                                    <p class="text-muted mb-0 font-size-13">{!! $CompetitiveAdvantage->description !!}</p>
                                                </div><!--end col-->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div><!--end row-->
                            </div>
                        @endif
                    @endif

                    @if(isset($data['HomeBox2'][0]))
                        @if($sections->type == $data['HomeBox2'][0]->type)
                            <div class="container  mb-md-5 ">
                                <div class="row">
                                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                                        @foreach($data['HomeBox2'] as $box2)
                                            @if($box2->id === $itemsInSection->homeContentId)
                                                <div class="col-md-4 col-12 mt-5 ">
                                                    <div class="features text-center">
                                                        <div class="image position-relative d-inline-block">
                                                            <img
                                                                src="/File/HomeContent/{{(isset($box2->path))?$box2->path:''}}"
                                                                class="avatar avatar-small" alt="">
                                                        </div>
                                                        <div class="content mt-4">
                                                            <h5 class="text-primary"> {!! $box2->title !!}</h5>
                                                            <p class="text-muted text-justify px-2">
                                                                {!! $box2->description !!}
                                                            </p>
                                                            @if($box2->link !== null)
                                                                <a href="{{$box2->link}}"
                                                                   class="text-primary">اطلاعات بیشتر <i
                                                                        class="uil uil-angle-left-b align-middle"></i></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    @if(isset($data['QuickAccess'][0]))
                        @if($sections->type == $data['QuickAccess'][0]->type)
                            <div class="container  mt-4">
                                <div class="row">
                                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                                        @foreach($data['QuickAccess'] as $QuickAccess)
                                            @if($QuickAccess->id === $itemsInSection->homeContentId)
                                                <div class="col-lg-3 col-md-4 mt-4 pt-2">
                                                    <a
                                                        @if($QuickAccess->link == null)
                                                            href="javascript:void(0)"
                                                        @else
                                                            href="{{$QuickAccess->link}}"
                                                        @endif
                                                        class="shahin">
                                                        <div
                                                            class="card features fea-primary rounded p-4 bg-light text-center position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="{{$QuickAccess->icon}}"></i>
                            </span>
                                                            <div class="card-body p-0 content">
                                                                <h5> {!! $QuickAccess->title !!}</h5>
                                                                <p class="para text-muted mb-0"> {!! $QuickAccess->description !!}</p>
                                                            </div>
                                                            <span class="big-icon text-center">
                                <i class="{{$QuickAccess->icon}}"></i>
                            </span>
                                                        </div>
                                                    </a>
                                                </div><!--end col-->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    @if(isset($data['HomeBox4'][0]))
                        @if($sections->type == $data['HomeBox4'][0]->type)
                            <div class="dirLtr customer-logos">
                                @foreach($sections->manageHomeContentItem as $itemsInSection)
                                    @foreach($data['HomeBox4'] as $box4)
                                        @if($box4->id === $itemsInSection->homeContentId)
                                            <a href="{!! $box4->link !!}" target="_blank">
                                                <div class="slide d-flex justify-content-center text-center ">
                                                    <img style="height: 75px !important;" class="imgCusomslider"
                                                         src="/File/HomeContent/{!! $box4->path !!}">
                                                </div>
                                            </a>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endif

                    @if(isset($data['HomeBox3'][0]))
                        @if($sections->type == $data['HomeBox3'][0]->type)
                            <div class="container my-2">
                                <div class="row align-items-center">
                                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                                        @foreach($data['HomeBox3'] as $box3)
                                            @if($box3->id === $itemsInSection->homeContentId)
                                                <div class="row ">
                                                    <div
                                                        class="col-lg-5 order-2 @if($box3->order == 'right') order-lg-2 @else order-lg-1 @endif mt-4 pt-2 mt-lg-0 pt-lg-0">
                                                        <div class="section-title me-lg-4">
                                                            <h1 class="title text-primary mb-3">{!! $box3->title !!}</h1>
                                                            <p class="para-desc text-muted text-justify">{!! $box3->description !!}</p>
                                                            @if(isset($box3->link))
                                                                <div class="row">
                                                                    <div class="col-12 pt-4">
                                                                        <a href="{!! $box3->link !!}"
                                                                           class="mt-3 h6 text-primary">اطلاعات بیشتر <i
                                                                                class="uil uil-angle-left-b align-middle"></i></a>
                                                                    </div><!--end col-->
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->
                                                    <div
                                                        class="col-lg-7 order-1 @if($box3->order == 'right')order-lg-1 @else order-lg-2 @endif ">
                                                        <div class="">
                                                            <img style="height: 400px;width: auto"
                                                                 src="File/HomeContent/{!! $box3->path !!}"
                                                                 class="img-fluid mx-auto d-block rounded " alt="">
                                                        </div>
                                                    </div><!--end col-->
                                                </div>
                                            @endif
                                        @endForeach
                                    @endforeach
                                </div><!--end row-->
                            </div>
                        @endif
                    @endif

                    @if($sections->type == '97')
                        <div class="container mt-5 mb-2">
                            <div class="row mt-4 pt-2 position-relative" id="counter" style="z-index: 1;">
                                @foreach($data['counters'] as $item)
                                    <div class="col-md-3 col-6 mt-4 pt-2">
                                        <div class="counter-box text-center">
                                            <img src="{{$item->image}}" class="avatar avatar-small" alt="">
                                            <h2 class="mb-0 mt-4"><span class="counter-value"
                                                                        data-target="{{$item->title}}">{{$item->title}}</span>
                                            </h2>
                                            <h6 class="counter-head text-muted">{{$item->subTitle}} </h6>
                                        </div><!--end counter box-->
                                    </div>
                                @endforeach
                            </div>
                            <div class="feature-posts-placeholder"></div>
                        </div>
                    @endif

                    @if(isset($data['BusinessProcess'][0]))
                        @if($sections->type == $data['BusinessProcess'][0]->type)
                            <div class="container mt-5 mb-2">
                                <div class="row">
                                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                                        @foreach($data['BusinessProcess'] as $item)
                                            @if($item->id === $itemsInSection->homeContentId)
                                                <div class="col-md-4 mt-4 pt-2">
                                                    <div class="card features feature-clean
                 @if (!$loop->last) work-process @endif bg-transparent process-arrow border-0 text-center">
                                                        <div class="icons text-primary text-center mx-auto">
                                                            <i class="{!! $item->icon !!} d-block rounded h3 mb-0"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="text-dark">{!! $item->title !!} </h5>
                                                            <p class="text-muted mb-0">{!! $item->description !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                </div>
                <!--end row-->
            </div>
            @if($sections->type == '96')
                @if(isset($data['rowData']['faq']) & count($data['faqs']) >=1)
                    <section class=" bg-light pt-5">
                        <div class="container">
                            <div class="row">
                                @foreach($data['faqs'] as $faq)
                                    @if($faq->stateInHomePage == '1')
                                        <div class="col-md-6 col-12 mt-4 pt-2">
                                            <div class="d-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     class="feather feather-help-circle fea icon-ex-md text-primary me-2 mt-1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                                </svg>
                                                <div class="flex-1">
                                                    <h5 class="mt-0 font-17"> {!! $faq->title !!}</h5>
                                                    <p class="answer text-muted mb-0 font-15">
                                                        {!! $faq->text !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    @endif
                                @endforeach
                            </div><!--end row-->

                            <div class="row  pt-md-3  pt-5 pt-2 pb-lg-5 mt-4 justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="section-title">
                                        @if(isset($sections->title))
                                            <h6 class="text-primary">{{ $sections->title }}</h6>
                                        @endif
                                        @if(isset($sections->subTitle))
                                            <h4 class="title mb-4">{{ $sections->subTitle }}</h4>
                                        @endif
                                        @if(isset($sections->description))
                                            <p class="text-muted para-desc mx-auto">{{ $sections->description }}</p>
                                        @endif

                                        @if(isset($data['footer']->phone))
                                            <a href="tel:{{$data['footer']->phone}}" class="btn btn-primary mt-4"><i
                                                    class="uil uil-phone"></i> تماس
                                                با ما</a>
                                        @endif
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </section>
                @endif
            @endif
            @if($sections->type == '99')
                <section class="py-5 bg-light">
                    <div class="container">

                        <div class="row align-items-center mb-4 pb-2">
                            <div class="col-lg-6">

                                @if(isset($sections->title))
                                    <h6 class="text-primary">{{ $sections->title }}</h6>
                                @endif
                                @if(isset($data['rowData']['blog']->subTitle))
                                    <h4 class="title mb-4">{{ $sections->topTitle }}</h4>
                                @endif

                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="section-title text-center text-lg-start">
                                    @if(isset($sections->description))
                                        <p class="text-muted mb-0 mx-auto para-desc">{{ $sections->description }}</p>
                                        <div class="d-flex justify-content-end col-sm-12">
                                            <a href="/blog">
                                                <input style="font-size: small !important;" type="submit"
                                                       class="btn btn-outline-primary"
                                                       value="آرشیو مطالب">
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row">
                            @foreach($data['blogs']->take(3) as $blog)
                                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                                    <div class="card blog rounded border-0 shadow overflow-hidden">
                                        <div class="position-relative">
                                            <img src="/{{$blog->image}}" class="card-img-top" alt="{{$blog->title}}">
                                            <div class="overlay rounded-top bg-dark"></div>
                                        </div>
                                        <div class="card-body content">
                                            <h6><a href="{{route('Front.blogSingle',$blog->id)}}"
                                                   class="card-title title text-dark">{{$blog->title}}</a>
                                            </h6>
                                            <div class="post-meta d-flex justify-content-between mt-3">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)"
                                                                                              class="text-muted like"><i
                                                                class="uil uil-heart me-1"></i>+99</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                                                                    class="text-muted comments"><i
                                                                class="uil uil-comment me-1"></i>{{$blog->comments->count()}}
                                                            نظر
                                                        </a></li>
                                                </ul>
                                                <a href="{{route('Front.blogSingle',$blog->id)}}"
                                                   class="text-muted readmore">

                                                    اطلاعات بیشتر
                                                    <i class="uil uil-angle-left-b align-middle"></i></a>
                                            </div>
                                        </div>
                                        <div class="author">
                                            <small class="text-light user d-block"><i
                                                    class="uil uil-user"></i> {{$blog->author_name}}</small>
                                            <small class="text-light date"><i
                                                    class="uil uil-calendar-alt"></i>
                                                {{\Morilog\Jalali\Jalalian::fromFormat('Y/m/d', timestampDate($blog->created_at,true)['date'])->format(' %d %B ')}}
                                            </small>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            @endforeach
                        </div>

                        <!--end row-->
                    </div>
                    <!--end container-->
                </section>

            @endif
            @if(isset($data['BigPicInLapTop'][0]))
                @if($sections->type == $data['BigPicInLapTop'][0]->type)
                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                        @foreach($data['BigPicInLapTop'] as $BigPicInLapTops)
                            @if($BigPicInLapTops->id === $itemsInSection->homeContentId)
                                <div class="col-12 text-center">
                                    <div class="section-title mb-5 pb-2"></div>
                                    <img src="File/HomeContent/{!! $BigPicInLapTops->path !!}" alt=""
                                         class="position-relative img-fluid mx-auto d-block" style="z-index: 1;">
                                </div><!--end col-->
                            @endif
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-light">
                                    <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>

                        @endforeach
                    @endforeach
                @endif
            @endif
            @if(isset($data['TextWithBackground'][0]))
                @if($sections->type == $data['TextWithBackground'][0]->type)
                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                        @foreach($data['TextWithBackground'] as $item)
                            @if($item->id === $itemsInSection->homeContentId)
                                <section class="parallax mt-100"
                                         style="background-image:url(File/HomeContent/{{(isset($item->path))?$item->path:''}})">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-12 text-center">
                                                <div class="section-title">
                                                    <h4 class="title title-dark text-white mb-4">{{(isset($item->title))?$item->title:''}}</h4>
                                                    @if(isset($item->description))
                                                        <p class="text-light para-dark para-desc mx-auto">{{$item->description}}</p>
                                                    @endIf
                                                    @if(isset($item->link))
                                                        <a href="{{(isset($item->link))?$item->link:''}}"
                                                           class="text-primary">اطلاعات بیشتر
                                                            <i class="uil uil-angle-left-b align-middle"></i></a>
                                                    @endIf
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </section>
                            @endif

                        @endforeach
                    @endforeach
                @endif
            @endif
            @if(isset($data['TabBox'][0]))
                @if($sections->type == $data['TabBox'][0]->type)

                    <section class="section bg-light">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="section-title mb-2 pb-2">
                                        @if(isset($sections->title))
                                            <h6 class="text-primary">{{ $sections->title }}</h6>
                                        @endif
                                        @if(isset($sections->topTitle))
                                            <h4 class="title mb-4">{{$sections->topTitle }}</h4>
                                        @endif
                                        @if(isset($sections->description))
                                            <p class="text-muted para-desc mx-auto">{{ $sections->description }}</p>
                                        @endif
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->

                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-8 col-md-8">
                                    <div class="row mt-4 pt-2">
                                        @foreach($sections->manageHomeContentItem as $itemsInSection)
                                            @foreach($data['TabBox'] as $item)
                                                @if($item->id === $itemsInSection->homeContentId)
                                                    <div class="col-md-6 col-12">
                                                        <div class="d-flex features pt-4 pb-4">
                                                            <div
                                                                class="icon text-center rounded-circle text-primary me-3 mt-2">
                                                                <i style="padding-left: 0 !important;"
                                                                   class="{!! $item->icon !!}"></i>
                                                            </div>
                                                            <div class="flex-1">
                                                                <h4 class="title">{!! $item->title !!}</h4>
                                                                <p class="text-muted para mb-0">{!! $item->description !!}</p>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                @endif
                                            @endforeach
                                        @endForeach
                                    </div><!--end row-->
                                </div><!--end col-->

                                <div class="col-lg-4 col-md-4 col-12 mt-4 pt-2 text-center text-md-end">
                                    <img src="/{{$sections->image}}" class="img-fluid" alt="">
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </section>
                @endif
            @endif
            @if(isset($data['QuestionAnswer'][0]))
                @if($sections->type == $data['QuestionAnswer'][0]->type)
                    <div class="container mt-2 mt-60">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="accordion" id="accordionExample">
                                    @foreach($sections->manageHomeContentItem as $index => $itemsInSection)
                                        @foreach($data['QuestionAnswer'] as $item)
                                            @if($item->id === $itemsInSection->homeContentId)
                                                <div class="accordion-item rounded shadow">
                                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                                        <button class="accordion-button border-0 bg-light" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $index }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse{{ $index }}">
                                                            {!! $item->title !!}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $index }}"
                                                         class="accordion-collapse border-0 collapse"
                                                         aria-labelledby="heading{{ $index }}"
                                                         data-bs-parent="#accordionExample">
                                                        <div class="accordion-body text-muted bg-white">
                                                            {!! $item->description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <img src="/{!! $sections->image !!}" alt="">
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                @endif
            @endif
            @if(isset($data['SliderMiniImg'][0]))
                @if($sections->type == $data['SliderMiniImg'][0]->type)
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 mt-4 pt-2">
                                <div class="tns-outer" id="tns2-ow">
                                    <div id="tns2-mw" class="tns-ovh">
                                        <div class="tns-inner" id="tns2-iw">
                                            <div
                                                class="tiny-six-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                                id="tns2" style="transform: translate3d(0%, 0px, 0px);">
                                                @foreach($sections->manageHomeContentItem as $itemsInSection)
                                                    @foreach($data['SliderMiniImg'] as $SliderMiniImg)
                                                        @if($SliderMiniImg->id === $itemsInSection->homeContentId)
                                                            <div class="tiny-slide tns-item tns-slide-active"
                                                                 id="tns2-item0">
                                                                <div
                                                                    class="popular-tour rounded-md position-relative overflow-hidden mx-2">
                                                                    <img src="File/homeContent/{{$SliderMiniImg->path}}"
                                                                         class="img-fluid" alt="">
                                                                    <div class="overlay-work bg-dark"></div>
                                                                    <div class="content">
                                                                        <a href="javascript:void(0)"
                                                                           class="title text-white h4 title-dark">{{$SliderMiniImg->title}} </a>
                                                                    </div>
                                                                </div><!--end tour post-->
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tns-nav" aria-label="Carousel Pagination">
                                        <button type="button" data-nav="0" aria-controls="tns2" style=""
                                                aria-label="Carousel Page 1 (Current Slide)"
                                                class="tns-nav-active"></button>
                                        <button type="button" data-nav="1" aria-controls="tns2" style=""
                                                aria-label="Carousel Page 2" class="" tabindex="-1"></button>
                                        <button type="button" data-nav="2" tabindex="-1" aria-controls="tns2"
                                                style="display: none;" aria-label="Carousel Page 3"></button>
                                        <button type="button" data-nav="3" tabindex="-1" aria-controls="tns2"
                                                style="display: none;" aria-label="Carousel Page 4"></button>
                                        <button type="button" data-nav="4" tabindex="-1" aria-controls="tns2"
                                                style="display: none;" aria-label="Carousel Page 5"></button>
                                        <button type="button" data-nav="5" tabindex="-1" aria-controls="tns2"
                                                style="display: none;" aria-label="Carousel Page 6"></button>
                                        <button type="button" data-nav="6" tabindex="-1" aria-controls="tns2"
                                                style="display: none;" aria-label="Carousel Page 7"></button>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                @endif
            @endif
            @if(isset($data['CustomersComment'][0]))
                @if($sections->type == $data['CustomersComment'][0]->type)
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="tns-outer" id="tns1-ow">
                                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite"
                                         aria-atomic="true">
                                        slide <span class="current">2 to 4</span> of 6
                                    </div>
                                    <div id="tns1-mw" class="tns-ovh">
                                        <div class="tns-inner" id="tns1-iw">
                                            <div
                                                class="tiny-three-item tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                                id="tns1" style="transform: translate3d(-16.6667%, 0px, 0px);">

                                                @foreach($data['CustomersComment'] as $item)
                                                    @foreach($sections->manageHomeContentItem as $itemsInSection)
                                                        @if($item->id === $itemsInSection->homeContentId)
                                                            <div class="tiny-slide text-center tns-item"
                                                                 style="width: 350px" id="tns1-item0"
                                                                 aria-hidden="true" tabindex="-1">
                                                                <div class="client-testi rounded shadow m-2 p-4">
                                                                    @if(isset($item->path))
                                                                        <img src="File/HomeContent/{!! $item->path !!}"
                                                                             class="img-fluid avatar avatar-ex-sm mx-auto"
                                                                             alt="">
                                                                    @endif
                                                                    <p class="text-muted mt-4">{!! $item->description !!}</p>
                                                                    <h6 class="text-primary">{!! $item->title !!}</h6>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach

                                            </div>
                                            <div class="tns-nav" aria-label="Carousel Pagination"></div>
                                        </div>
                                    </div>

                                </div>
                            </div><!--end col-->
                        </div>
                    </div>
                @endif
            @endif
        @endForeach

    @endif

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top">
        <i data-feather="arrow-up" class="icons"></i>
    </a>
    <!-- Back to top -->
@endsection
@section('js')
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.js'></script>
    <script type="text/javascript">
        var Swipes = new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 8000,
            },
            pagination: {el: '.swiper-pagination', clickable: true},
        });
    </script>
@endsection
