@extends('Layouts.frontLayout')
@section('content')
    <div>
        <section class="container-fluid register">
            <div class="row">
                <div class="col-12">
                    <div class="register-form bg-white setinco-box-shadow">
                        <div class="setinco-titles bg-white dir-rtl text-center"><h2>بازیابی کلمه عبور</h2></div>
                        <div class="form-content">
                            <div class="row dir-rtl">
                                <div class="col-12 form-group text-center">
                                    <h5>رمز عبور خود را فراموش کرده ايد؟</h5>
                                    <p>لطفا شماره موبایل خود را وارد و دکمه ادامه را بزنید تا کد بازیابی برای شما ارسال شود</p>
                                    <!---->
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><input type="tel" id="telephone" placeholder="شماره همراه" value="" required="required" class="form-control" /></div>
                                </div>
                                <!---->
                                <!---->
                                <!---->
                                <div class="col-12">
                                    <div class="register-submit">
                                        <button>ارسال</button>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
