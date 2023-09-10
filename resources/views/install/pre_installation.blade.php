@extends('install.layout')

@section('content')
    <h2>1. قبل نصب</h2>

    <div class="box">
            <p>لطفاً اطمینان حاصل کنید که افزونه های PHP که در زیر ذکر شده است نصب شده اند.</p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>افزونه ها </th>
                        <th class="text-center">وضعیت</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($requirement->extensions() as $label => $satisfied)
                        <tr>
                            <td>{{ $label }}</td>

                            <td class="text-center">
                                <i class="fa fa-{{ $satisfied ? 'check' : 'times' }}" aria-hidden="true"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="box">
        <p>لطفاً اطمینان حاصل کنید که مجوزهای صحیح را برای فهرستهای ذکر شده در زیر تنظیم کرده اید.
        </p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>پرونده ها</th>
                        <th class="text-center">وضعیت</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($requirement->directories() as $label => $satisfied)
                        <tr>
                            <td>{{ $label }}</td>

                            <td class="text-center">
                                <i class="fa fa-{{ $satisfied ? 'check' : 'times' }}" aria-hidden="true"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-buttons clearfix">
        <a href="{{ $requirement->satisfied() ? route('install.configuration.show') : '#' }}" class="btn btn-primary pull-right" {{ $requirement->satisfied() ? '' : 'disabled' }}>
            ادامه
        </a>
    </div>
@endsection
