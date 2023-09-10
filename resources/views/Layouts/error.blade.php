{{--dscscsdc--}}

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
