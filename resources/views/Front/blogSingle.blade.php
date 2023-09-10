@extends('Layouts.frontLayout')
@section('content')
    @php
        $keywords='';
            $type=\App\Models\Settings::getTypePage();
            $User=\App\Models\User::getUserAdmin();
            $blog=\App\Models\Blog::getBlogsTwo();
            $page=\App\Models\Page::getPagesTwo();
            $settings = \App\Models\Settings::allSettings()->pluck('value', 'name');
    @endphp
    @if(Route::currentRouteName()==='Front.blogSingle')
        @php $keywords=$data['blog']["keywords"]; @endphp
    @endif

    <section class="bg-half d-table w-100" style="background-image: url(/{{(isset($data['settings']['breadcrumbImage']))?$data['settings']['breadcrumbImage']:''}});">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
{{--                        <h4 class="title text-white title-dark"> {{$data['blog']->title}} </h4>--}}
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
    <div class="ttm-row sidebar mt-100-large-size ttm-sidebar-right clearfix">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 content-area">
                    <article class="post ttm-blog-single clearfix">

                        <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                            <div class="ttm-post-featured">
                                <img class="img-fluid" src="/{{$data['blog']->image}}" alt="" height="100%" width="100%">
                            </div>
                            <div class="ttm-box-post-date">
                                <span class="ttm-entry-date">
                                      {{\Morilog\Jalali\Jalalian::fromFormat('Y/m/d', timestampDate($data['blog']->created_at,true)['date'])->format(' %d %B ')}}
                                </span>
                            </div>
                        </div>

                        <div style="text-align: justify" class="ttm-blog-single-content">
                            <div class="ttm-post-entry-header">
                                <div class="post-meta">
                                    <span class="ttm-meta-line category"><i class="ti ti-folder"></i>{{$data['blog']->Category->title}}</span>
                                    <span class="ttm-meta-line byline"><i class="ti ti-user"></i>{{$data['blog']->author_name}}</span>
                                    <span class="ttm-meta-line tags-links"><i class="fa fa-comments-o"></i>{{$data['blog']->comments->count()}} نظر</span>
                                </div>
                            </div>
                            <div class="entry-content">
                                <div class="ttm-box-desc-text">
                                    <h3 class="mb-5">{{$data['blog']->title}}</h3>
                                    <p >{!!$data['blog']->text!!}</p>
                                    <div class="social-media-block">
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="ttm_tag_lists margin_top15">
                                                <span class="ttm-tags-links-title"><i class="fa fa-tags"></i>برچسب ها:</span>
                                                <span class="ttm-tags-links">
                                                    <a href="#">{{$data['blog']->Category->title}}</a>
                                                </span>
                                            </div>
{{--                                            <div class="ttm-social-share-wrapper margin_top15">--}}
{{--                                                <h6 class="fs-16 m-0 padding_right10">اشتراک گذاری : </h6>--}}
{{--                                                <ul class="social-icons">--}}
{{--                                                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                                    <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="comments-area mb-5">
                            <h3 class="comments-title">{{$data['blog']->comments->count()}} نظر:</h3>
                            <ol class="comment-list">

                                @foreach($data['comments'] as $comment)

                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <b class="fn">{{$comment->fullname}}</b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <a href="#">
                                                        <time>{{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%B %d، %Y')}}</time>
                                                    </a>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>{!! $comment->text !!}</p>
                                            </div>
                                        </article>
                                    </li>
                                @endforeach

                            </ol>
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">{{trans('langFront.Leave_a_message')}}</h3>
                                <form class="comment-form" method="post" action="{{route('comments.store',$data['blog']->id)}}" >
                                    @csrf
                                    @if(session('msgSuccess'))
                                        <div class="alert alert-success contact_msg" style="" role="alert">
                                            {{trans('langFront.Message_sent_successfully')}}
                                        </div>
                                    @endif
                                    <p class="comment-notes py-4">
                                        <span  id="email-notes">{{trans('langFront.all_fields_marked_with_an_asterisk_(*)_are_required')}} </span>
                                        <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <label>{{trans('langFront.commentsUser')}}</label>
                                        <textarea name="text" id="text" cols="45" rows="5" maxlength="65525" ></textarea>
                                    </p>
                                    <p style="width: 48% !important;" class="comment-form-author">
                                        <label>{{trans('langFront.name')}} <span class="required">*</span></label>
                                        <input type="text" id="fullname" name="fullname" required="required" oninvalid="this.setCustomValidity('Name_cannot_be_empty')">
                                    </p>
                                    <p style="width: 48% !important;" class="comment-form-email">
                                        <label>{{trans('langFront.email')}} <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" required="required" oninvalid="this.setCustomValidity({{trans('langFront.Your_email_should_not_be_blank')}})">
                                    </p>

                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="btn btn btn-danger" value="{{trans('langFront.Submit_a_comment')}}">
                                    </p>
                                </form>
                            </div>
                        </div>


                    </article>
                </div>
                <div class="col-lg-4 widget-area sidebar-right">
                    <aside class="widget widget-search with-title">
                        <h3 class="widget-title">جستجو کردن</h3>
                        <form role="search" method="get" class="search-form" action="#">
                            <label>

                                <input type="search" class="input-text" placeholder="جستجو …" value="" name="s">
                            </label>
                            <button class="btn" type="submit"><i class="fa fa-search"></i> </button>
                        </form>
                    </aside>


                </div>
            </div>
        </div>
    </div>

@endsection
