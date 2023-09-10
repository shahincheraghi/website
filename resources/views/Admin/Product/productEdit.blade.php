@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.productEdit')}}
@endsection
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
                                    <li class="breadcrumb-item"><a href="#">{{trans('langPanel.product')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{trans('langPanel.edit')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <section id="nav-justified">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('langPanel.edit')}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @include('Layouts.msg')
                                        <form method="POST"
                                              action="{{route('Admin.products.update',$data['product']->id)}}"
                                              enctype="multipart/form-data" novalidate>
                                            @CSRF
                                            <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab-justified" data-toggle="tab"
                                                       href="#home-just" role="tab" aria-controls="home-just"
                                                       aria-selected="false">{{trans('langPanel.product')}}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab-justified" data-toggle="tab"
                                                       href="#profile-just" role="tab" aria-controls="profile-just"
                                                       aria-selected="false">{{trans('langPanel.specification')}}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="messages-tab-justified" data-toggle="tab"
                                                       href="#messages-just" role="tab" aria-controls="messages-just"
                                                       aria-selected="false">{{trans('langPanel.seo')}}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="settings-tab-justified" data-toggle="tab"
                                                       href="#settings-just" role="tab" aria-controls="settings-just"
                                                       aria-selected="true">{{trans('langPanel.importanTexplanation')}}
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content pt-1">
                                                <div class="tab-pane active" id="home-just" role="tabpanel"
                                                     aria-labelledby="home-tab-justified">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.title')}}</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="title"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputTitle')}}"
                                                                               placeholder="{{trans('langPanel.inputTitle')}}"
                                                                               required
                                                                               value="{{$data['product']->title}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.english_title')}}</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="english_title"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputenglish_title')}}"
                                                                               placeholder="{{trans('langPanel.inputenglish_title')}}"
                                                                               required
                                                                               value="{{$data['product']->english_title}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.price')}}</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="price"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputprice')}}"
                                                                               placeholder="{{trans('langPanel.inputprice')}}"
                                                                               required value="{{$data['product']->price}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.discount_percent')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="discount_percent"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputdiscount_percent')}}"
                                                                               placeholder="{{trans('langPanel.inputdiscount_percent')}}"
                                                                               required  value="{{$data['product']->discount_percent}}" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                                       <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.min_order')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="min_order"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.min_order')}}"
                                                                               placeholder="{{trans('langPanel.min_order')}}"
                                                                               required value="{{$data['product']->min_order}}">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                                          <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.count')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="count"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.count')}}"
                                                                               placeholder="{{trans('langPanel.count')}}"
                                                                               required value="{{$data['product']->count}}" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.code')}}</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="code"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputCode')}}"
                                                                               placeholder="{{trans('langPanel.inputCode')}}"
                                                                               required
                                                                               value="{{$data['product']->code}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.accounting_code')}}</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="accounting_code"
                                                                               class="form-control"

                                                                               placeholder="{{trans('langPanel.inputAccountingCode')}}"
                                                                               value="{{$data['product']->accounting_code}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.guarantee')}}</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="guarantee"
                                                                               class="form-control"
                                                                               placeholder="{{trans('langPanel.inputGuarantee')}}"
                                                                               value="{{$data['product']->guarantee}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <fieldset class="form-group">
                                                                    <label
                                                                        for="basicInputFile">{{trans('langPanel.image')}}</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                               id="inputGroupFile01" name="image"/>
                                                                        <label class="custom-file-label"
                                                                               for="inputGroupFile01">{{trans('langPanel.image')}}</label>
                                                                    </div>
                                                                </fieldset>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="profile-just" role="tabpanel"
                                                     aria-labelledby="profile-tab-justified">
                                                    <div class="form-body">
                                                        <div class="row">

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.weight')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="weight"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputweight')}}"
                                                                               placeholder="{{trans('langPanel.inputweight')}}"
                                                                               required
                                                                               value="{{$data['product']->weight}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.length')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="length"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputlength')}}"
                                                                               placeholder="{{trans('langPanel.inputlength')}}"
                                                                               required
                                                                               value="{{$data['product']->length}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.width')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="width"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputwidth')}}"
                                                                               placeholder="{{trans('langPanel.inputwidth')}}"
                                                                               required
                                                                               value="{{$data['product']->width}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.height')}}</label>
                                                                    <div class="controls">
                                                                        <input type="number" name="height"
                                                                               class="form-control"
                                                                               data-validation-required-message="{{trans('langPanel.inputheight')}}"
                                                                               placeholder="{{trans('langPanel.inputheight')}}"
                                                                               required
                                                                               value="{{$data['product']->height}}">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>{{trans('langPanel.typeProduct')}}</label>
                                                                    <div class="controls">
                                                                        <div class="form-group">
                                                                            <select class=" select2 form-control"
                                                                                    name="type">


                                                                           @foreach( Config::get('typeProduct') as $typeProduct)
                                                                        <option
                                                                            value="{{$typeProduct['id']}}">{{trans($typeProduct['title'])}}</option>
                                                                            @endforeach


                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="messages-just" role="tabpanel"
                                                     aria-labelledby="messages-tab-justified">
                                                    <div class="col-md-12 col-12">
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control" id="basicTextarea" rows="3"
                                                                      name="seo"
                                                                      placeholder="{{trans('langPanel.seo')}}"> {{$data['product']->seo}}</textarea>
                                                        </fieldset>


                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="settings-just" role="tabpanel"
                                                     aria-labelledby="settings-tab-justified">
                                                    <div class="col-md-12 col-12">
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control" id="basicTextarea" rows="3"
                                                                      name="short_description"
                                                                      placeholder="{{trans('langPanel.short_description')}}">{{$data['product']->short_description}}</textarea>
                                                        </fieldset>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                       <textarea id="full-featured-non1" class="fullpremium"
                                                 name="description">{{$data['product']->description}}
                                       </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">{{trans('langPanel.edit')}}</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>



    </script>
@endsection
