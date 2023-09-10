<script type="text/javascript" src="{{ asset('Front/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('Front/js/bootstrap_5.0.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Front/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Front/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Front/js/feather.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('Front/js/plugins.init.js')}}"></script>
<script type="text/javascript" src="{{ asset('Front/js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('Front/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Front/js/tiny-slider.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="{{ asset('Front/js/jquery-confirm_3.3.4.min.js')}}"></script>
@yield('js')


<!-- Initialize the slider -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = tns({
            container: '#tns1',
            "items": 3,
            "slideBy": 2,
            controls:false,
            "mouseDrag": true,
            "lazyload": true,
            "speed": 400
        });

    });
    document.addEventListener('DOMContentLoaded', function() {
        var slider = tns({
            container: '#tns2',
            "items": 6,
            "slideBy": 2,
            controls:false,
            "mouseDrag": true,
            "lazyload": true,
            "speed": 400,

        });

    });
</script>


<script type="text/javascript">
    $(window).on('load', function () {
        $('#preloader').addClass('d-none');
    });
</script>

<script type="text/javascript">
    $(".slider33").slick({

        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 2,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });
</script>
<script type="text/javascript">
    $('#subscribeForm').on('submit',function(e){
        e.preventDefault();
        let email = $('#subscribeEmail').val();
        $.ajax({
            url: "/subscribeStore",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                email:email,
            },
            success:function(response){

                if (response) {
                    Swal.fire(
                        'ایمیل شما با موفقیت ثبت شد',
                        '',
                        'success'
                    )
                    $("#contactForm")[0].reset();


                }
            },
            error: function(response) {
                $('#email-error').text(response.responseJSON.errors.email);
            }
        });
    });
</script>
<script type="text/javascript">
    $('#CounselingForm').on('submit',function(e){
        e.preventDefault();
        let phone = $('#CounselingPhone').val();
        let description = $('#CounselingDescription').val();
        $.ajax({
            url: "/CounselingStore",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                phone:phone,
                description:description,
            },
            success:function(response){

                if (response) {
                    Swal.fire(
                        '',
                        'درخواست شما شما با موفقیت ثبت شد!همکاران ما به زودی با شما تماس خواهند گرفت.',
                        'success'
                    )
                    $("#CounselingForm")[0].reset();
                }
            },
            error: function(response) {
                $('#phone-error').text(response.responseJSON.errors.phone);

            }
        });
    });
</script>
<script type="text/javascript">
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]

    });
    $(".slider33").slick({

        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 2,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });
</script>
@if(isset($settings['scripts'])) {!!$settings['scripts']!!} @endif
