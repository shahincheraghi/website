
@if ($errors->any())
    {{--    {{ implode('', $errors->all('<div>:message</div>')) }}--}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif


@if(session('msg'))
    <div class="row">
        <div class="col-md-12 ">
            <div class="alert alert-warning error-show">{{session('msg')}}</div>
        </div>
    </div>
@endif

@if(session('msgSuccess'))
    <div class="row">
        <div class="col-md-12 ">
            <div class="alert alert-success mr-2 ml-2 mt-2 ">{{session('msgSuccess')}}</div>
        </div>
    </div>
@endif
@if(session('msgError'))
    <div class="row">
        <div class="col-md-12 ">
            <div class="alert alert-warning mr-2 ml-2 mt-2">{{session('msgError')}}</div>
        </div>
    </div>
@endif
