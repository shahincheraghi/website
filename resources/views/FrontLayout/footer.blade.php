@if($footer->statusTopFooter == 1)
<div class="container-fluid px-0">
    <div class="py-5 bg-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="section-title">
                        <div class="d-flex">
                            <i style="font-size: 50px"
                               class="{{(isset($footer->topFooterIcon))?$footer->topFooterIcon:''}} d-flex align-items-center text-white"></i>
                            <div class="flex-1 ms-md-4 ms-3">
                                <h4 class="fw-bold text-light title-dark mb-1">{{(isset($footer->topFooterTitle))?$footer->topFooterTitle:''}}</h4>
                                <p class="text-white-50 mb-0">{{(isset($footer->topFooterDescription))?$footer->topFooterDescription:''}}</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-5 mt-4 mt-sm-0">
                    <div class="text-md-end ms-5 ms-sm-0">
                        @if(isset($footer->topFooterTitleBtnOne))
                        <a href="{{(isset($footer->topFooterLinkBtnOne))?$footer->topFooterLinkBtnOne:''}}"
                           class="btn btn-primary me-2 me-lg-2 me-md-0 my-2"> {{(isset($footer->topFooterTitleBtnOne))?$footer->topFooterTitleBtnOne:''}}</a>
                        @endif

                            @if(isset($footer->topFooterTitleBtnOne))
                        <a href="{{(isset($footer->topFooterLinkBtnTow))?$footer->topFooterLinkBtnTow:''}}"
                           class="btn btn-soft-primary my-2">{{(isset($footer->topFooterTitleBtnTow))?$footer->topFooterTitleBtnTow:''}}</a>
                        @endif
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end div-->
</div>
@endif
<footer class="footer footer-border">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
{{--                <a href="#" class="logo-footer">--}}
{{--                    <img src="/{{$settings['favicon']}}" height="100px" alt="">--}}
{{--                </a>--}}
                <h5 class="text-light footer-head">درباره ما</h5>
                <p class="mt-4 mb-3 text-justify">{{(isset($footer->description))?$footer->description:''}}</p>
                <ul class="fontFooterCustom  list-unstyled pt-3 ul-contact-info-footer">
                    <li style="width: 100%  ;"><p class="fontFooterCustom dirRtl">
                            <i class="fa fa-map-marker-alt text-red text-primary"></i>
                            &nbsp;   &nbsp;
                            آدرس :
                            &nbsp;
                            {{(isset($footer->address))?$footer->address:''}}
                        </p>
                    </li>
                    <li style="width: 100%  ;"><p class="fontFooterCustom dirRtl">
                            <i class="fa fa-phone text-red text-primary"></i>
                            &nbsp;
                            تلفن :
                            &nbsp;<a class="textTagAInFooter" href="tel:{{(isset($footer->phone))?$footer->phone:''}}">{{(isset($footer->phone))?$footer->phone:''}}</a>
                            &nbsp;
                        </p>
                    </li>
                    <li style="width: 100%  ;"><p class="fontFooterCustom dirRtl">
                            <i class="fa fa-envelope text-red text-primary"></i>
                            ایمیل :
                            &nbsp;
                            &nbsp;&nbsp;<a class="textTagAInFooter" href="mailto:{{(isset($footer->email))?$footer->email:''}}">{{(isset($footer->email))?$footer->email:''}}</a>
                        </p>
                    </li>
                </ul>
                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4 mr-0 pr-0">
                    @if(($footer->whatsapp))
                        <li class="list-inline-item"><a href="{{(isset($footer->whatsapp))?$footer->whatsapp:''}}" class="rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="19px" height="19px" fill-rule="nonzero"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.69047,0 -23,10.30953 -23,23c0,4.0791 1.11869,7.88588 2.98438,11.20898l-2.94727,10.52148c-0.09582,0.34262 -0.00241,0.71035 0.24531,0.96571c0.24772,0.25536 0.61244,0.35989 0.95781,0.27452l10.9707,-2.71875c3.22369,1.72098 6.88165,2.74805 10.78906,2.74805c12.69047,0 23,-10.30953 23,-23c0,-12.69047 -10.30953,-23 -23,-23zM25,4c11.60953,0 21,9.39047 21,21c0,11.60953 -9.39047,21 -21,21c-3.72198,0 -7.20788,-0.97037 -10.23828,-2.66602c-0.22164,-0.12385 -0.48208,-0.15876 -0.72852,-0.09766l-9.60742,2.38086l2.57617,-9.19141c0.07449,-0.26248 0.03851,-0.54399 -0.09961,-0.7793c-1.84166,-3.12289 -2.90234,-6.75638 -2.90234,-10.64648c0,-11.60953 9.39047,-21 21,-21zM16.64258,13c-0.64104,0 -1.55653,0.23849 -2.30859,1.04883c-0.45172,0.48672 -2.33398,2.32068 -2.33398,5.54492c0,3.36152 2.33139,6.2621 2.61328,6.63477h0.00195v0.00195c-0.02674,-0.03514 0.3578,0.52172 0.87109,1.18945c0.5133,0.66773 1.23108,1.54472 2.13281,2.49414c1.80347,1.89885 4.33914,4.09336 7.48633,5.43555c1.44932,0.61717 2.59271,0.98981 3.45898,1.26172c1.60539,0.5041 3.06762,0.42747 4.16602,0.26563c0.82216,-0.12108 1.72641,-0.51584 2.62109,-1.08203c0.89469,-0.56619 1.77153,-1.2702 2.1582,-2.33984c0.27701,-0.76683 0.41783,-1.47548 0.46875,-2.05859c0.02546,-0.29156 0.02869,-0.54888 0.00977,-0.78711c-0.01897,-0.23823 0.0013,-0.42071 -0.2207,-0.78516c-0.46557,-0.76441 -0.99283,-0.78437 -1.54297,-1.05664c-0.30567,-0.15128 -1.17595,-0.57625 -2.04883,-0.99219c-0.8719,-0.41547 -1.62686,-0.78344 -2.0918,-0.94922c-0.29375,-0.10568 -0.65243,-0.25782 -1.16992,-0.19922c-0.51749,0.0586 -1.0286,0.43198 -1.32617,0.87305c-0.28205,0.41807 -1.4175,1.75835 -1.76367,2.15234c-0.0046,-0.0028 0.02544,0.01104 -0.11133,-0.05664c-0.42813,-0.21189 -0.95173,-0.39205 -1.72656,-0.80078c-0.77483,-0.40873 -1.74407,-1.01229 -2.80469,-1.94727v-0.00195c-1.57861,-1.38975 -2.68437,-3.1346 -3.0332,-3.7207c0.0235,-0.02796 -0.00279,0.0059 0.04687,-0.04297l0.00195,-0.00195c0.35652,-0.35115 0.67247,-0.77056 0.93945,-1.07812c0.37854,-0.43609 0.54559,-0.82052 0.72656,-1.17969c0.36067,-0.71583 0.15985,-1.50352 -0.04883,-1.91797v-0.00195c0.01441,0.02867 -0.11288,-0.25219 -0.25,-0.57617c-0.13751,-0.32491 -0.31279,-0.74613 -0.5,-1.19531c-0.37442,-0.89836 -0.79243,-1.90595 -1.04102,-2.49609v-0.00195c-0.29285,-0.69513 -0.68904,-1.1959 -1.20703,-1.4375c-0.51799,-0.2416 -0.97563,-0.17291 -0.99414,-0.17383h-0.00195c-0.36964,-0.01705 -0.77527,-0.02148 -1.17773,-0.02148zM16.64258,15c0.38554,0 0.76564,0.0047 1.08398,0.01953c0.32749,0.01632 0.30712,0.01766 0.24414,-0.01172c-0.06399,-0.02984 0.02283,-0.03953 0.20898,0.40234c0.24341,0.57785 0.66348,1.58909 1.03906,2.49023c0.18779,0.45057 0.36354,0.87343 0.50391,1.20508c0.14036,0.33165 0.21642,0.51683 0.30469,0.69336v0.00195l0.00195,0.00195c0.08654,0.17075 0.07889,0.06143 0.04883,0.12109c-0.21103,0.41883 -0.23966,0.52166 -0.45312,0.76758c-0.32502,0.37443 -0.65655,0.792 -0.83203,0.96484c-0.15353,0.15082 -0.43055,0.38578 -0.60352,0.8457c-0.17323,0.46063 -0.09238,1.09262 0.18555,1.56445c0.37003,0.62819 1.58941,2.6129 3.48438,4.28125c1.19338,1.05202 2.30519,1.74828 3.19336,2.2168c0.88817,0.46852 1.61157,0.74215 1.77344,0.82227c0.38438,0.19023 0.80448,0.33795 1.29297,0.2793c0.48849,-0.05865 0.90964,-0.35504 1.17773,-0.6582l0.00195,-0.00195c0.3568,-0.40451 1.41702,-1.61513 1.92578,-2.36133c0.02156,0.0076 0.0145,0.0017 0.18359,0.0625v0.00195h0.00195c0.0772,0.02749 1.04413,0.46028 1.90625,0.87109c0.86212,0.41081 1.73716,0.8378 2.02148,0.97852c0.41033,0.20308 0.60422,0.33529 0.6543,0.33594c0.00338,0.08798 0.0068,0.18333 -0.00586,0.32813c-0.03507,0.40164 -0.14243,0.95757 -0.35742,1.55273c-0.10532,0.29136 -0.65389,0.89227 -1.3457,1.33008c-0.69181,0.43781 -1.53386,0.74705 -1.8457,0.79297c-0.9376,0.13815 -2.05083,0.18859 -3.27344,-0.19531c-0.84773,-0.26609 -1.90476,-0.61053 -3.27344,-1.19336c-2.77581,-1.18381 -5.13503,-3.19825 -6.82031,-4.97266c-0.84264,-0.8872 -1.51775,-1.71309 -1.99805,-2.33789c-0.4794,-0.62364 -0.68874,-0.94816 -0.86328,-1.17773l-0.00195,-0.00195c-0.30983,-0.40973 -2.20703,-3.04868 -2.20703,-5.42578c0,-2.51576 1.1685,-3.50231 1.80078,-4.18359c0.33194,-0.35766 0.69484,-0.41016 0.8418,-0.41016z"></path></g></g></svg>
                            </a></li>
                    @endif
                    @if(($footer->telegram))
                        <li class="list-inline-item"><a href="{{(isset($footer->telegram))?$footer->telegram:''}}" class="rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="19px" height="19px" fill-rule="nonzero"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.69071,0 -23,10.3093 -23,23c0,12.6907 10.30929,23 23,23c12.69071,0 23,-10.3093 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60983,0 21,9.39017 21,21c0,11.60983 -9.39017,21 -21,21c-11.60983,0 -21,-9.39017 -21,-21c0,-11.60982 9.39017,-21 21,-21zM34.08789,14.03516c-0.684,0 -1.45256,0.15842 -2.35156,0.48242c-1.396,0.503 -17.81559,7.47458 -19.68359,8.26758c-1.068,0.454 -3.05664,1.2985 -3.05664,3.3125c0,1.335 0.78227,2.28984 2.32227,2.83984c0.828,0.295 2.79455,0.89108 3.93555,1.20508c0.484,0.133 0.99834,0.20117 1.52734,0.20117c1.035,0 2.07658,-0.25789 2.89258,-0.71289c-0.007,0.168 -0.00242,0.33781 0.01758,0.50781c0.123,1.05 0.77047,2.03758 1.73047,2.64258c0.628,0.396 5.75744,3.83291 6.52344,4.37891c1.076,0.769 2.2655,1.17578 3.4375,1.17578c2.24,0 2.99152,-2.31283 3.35352,-3.42383c0.525,-1.613 2.49089,-14.72997 2.71289,-17.04297c0.151,-1.585 -0.50958,-2.89019 -1.76758,-3.49219c-0.471,-0.227 -1.00875,-0.3418 -1.59375,-0.3418zM34.08789,16.03516c0.275,0 0.52052,0.04548 0.72852,0.14648c0.473,0.227 0.71363,0.73305 0.64063,1.49805c-0.242,2.523 -2.20309,15.32928 -2.62109,16.61328c-0.358,1.098 -0.73512,2.04297 -1.45313,2.04297c-0.718,0 -1.50239,-0.25169 -2.27539,-0.80469c-0.773,-0.552 -5.90614,-3.99436 -6.61914,-4.44336c-0.625,-0.394 -1.28647,-1.37617 -0.35547,-2.32617c0.767,-0.782 6.58503,-6.42878 7.08203,-6.92578c0.37,-0.371 0.19698,-0.81836 -0.16602,-0.81836c-0.125,0 -0.27469,0.05269 -0.42969,0.17969c-0.608,0.497 -9.08436,6.169 -9.81836,6.625c-0.486,0.302 -1.23853,0.51953 -2.01953,0.51953c-0.333,0 -0.67014,-0.03991 -0.99414,-0.12891c-1.128,-0.311 -3.03692,-0.89016 -3.79492,-1.16016c-0.729,-0.26 -0.99414,-0.50908 -0.99414,-0.95508c0,-0.634 0.89489,-1.07166 1.83789,-1.47266c0.996,-0.423 18.23012,-7.74156 19.57812,-8.22656c0.624,-0.226 1.19483,-0.36328 1.67383,-0.36328z"></path></g></g></svg>
                            </a></li>
                    @endif
                    @if(($footer->instagram))
                        <li class="list-inline-item"><a href="{{(isset($footer->instagram))?$footer->instagram:''}}" class="rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="19px" height="19px" fill-rule="nonzero"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.16752,0 -13,5.83248 -13,13v18c0,7.16752 5.83248,13 13,13h18c7.16752,0 13,-5.83248 13,-13v-18c0,-7.16752 -5.83248,-13 -13,-13zM16,5h18c6.08648,0 11,4.91352 11,11v18c0,6.08648 -4.91352,11 -11,11h-18c-6.08648,0 -11,-4.91352 -11,-11v-18c0,-6.08648 4.91352,-11 11,-11zM37,11c-1.10457,0 -2,0.89543 -2,2c0,1.10457 0.89543,2 2,2c1.10457,0 2,-0.89543 2,-2c0,-1.10457 -0.89543,-2 -2,-2zM25,14c-6.06329,0 -11,4.93671 -11,11c0,6.06329 4.93671,11 11,11c6.06329,0 11,-4.93671 11,-11c0,-6.06329 -4.93671,-11 -11,-11zM25,16c4.98241,0 9,4.01759 9,9c0,4.98241 -4.01759,9 -9,9c-4.98241,0 -9,-4.01759 -9,-9c0,-4.98241 4.01759,-9 9,-9z"></path></g></g></svg>
                            </a></li>
                    @endif
                    @if(($footer->aparat))
                        <li class="list-inline-item"><a href="{{(isset($footer->aparat))?$footer->aparat:''}}" class="rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="19px" height="19px" fill-rule="nonzero"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M24.40234,9c-6.60156,0 -12.80078,0.5 -16.10156,1.19922c-2.19922,0.5 -4.10156,2 -4.5,4.30078c-0.39844,2.39844 -0.80078,6 -0.80078,10.5c0,4.5 0.39844,8 0.89844,10.5c0.40234,2.19922 2.30078,3.80078 4.5,4.30078c3.50391,0.69922 9.5,1.19922 16.10156,1.19922c6.60156,0 12.59766,-0.5 16.09766,-1.19922c2.20313,-0.5 4.10156,-2 4.5,-4.30078c0.40234,-2.5 0.90234,-6.09766 1,-10.59766c0,-4.5 -0.5,-8.10156 -1,-10.60156c-0.39844,-2.19922 -2.29687,-3.80078 -4.5,-4.30078c-3.5,-0.5 -9.59766,-1 -16.19531,-1zM24.40234,11c7.19922,0 12.99609,0.59766 15.79688,1.09766c1.5,0.40234 2.69922,1.40234 2.89844,2.70313c0.60156,3.19922 1,6.60156 1,10.10156c-0.09766,4.29688 -0.59766,7.79688 -1,10.29688c-0.29687,1.89844 -2.29687,2.5 -2.89844,2.70313c-3.60156,0.69922 -9.60156,1.19531 -15.60156,1.19531c-6,0 -12.09766,-0.39844 -15.59766,-1.19531c-1.5,-0.40234 -2.69922,-1.40234 -2.89844,-2.70312c-0.80078,-2.80078 -1.10156,-6.5 -1.10156,-10.19922c0,-4.60156 0.40234,-8 0.80078,-10.09766c0.30078,-1.90234 2.39844,-2.50391 2.89844,-2.70312c3.30078,-0.69922 9.40234,-1.19922 15.70313,-1.19922zM19,17v16l14,-8zM21,20.40234l8,4.59766l-8,4.59766z"></path></g></g></svg>
                            </a></li>
                    @endif

                        @if(($footer->linkedin))
                            <li class="list-inline-item"><a href="{{(isset($footer->linkedin))?$footer->linkedin:''}}" class="rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="19px" height="19px" fill-rule="nonzero"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h32c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-32c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM14,11.01172c-1.09522,0 -2.08078,0.32736 -2.81055,0.94141c-0.72977,0.61405 -1.17773,1.53139 -1.17773,2.51367c0,1.86718 1.61957,3.32281 3.67969,3.4668c0.0013,0.00065 0.0026,0.0013 0.00391,0.00195c0.09817,0.03346 0.20099,0.05126 0.30469,0.05273c2.27301,0 3.98828,-1.5922 3.98828,-3.52148c-0.00018,-0.01759 -0.00083,-0.03518 -0.00195,-0.05274c-0.10175,-1.90023 -1.79589,-3.40234 -3.98633,-3.40234zM14,12.98828c1.39223,0 1.94197,0.62176 2.00195,1.50391c-0.01215,0.85625 -0.54186,1.51953 -2.00195,1.51953c-1.38541,0 -2.01172,-0.70949 -2.01172,-1.54492c0,-0.41771 0.15242,-0.7325 0.47266,-1.00195c0.32023,-0.26945 0.83428,-0.47656 1.53906,-0.47656zM11,19c-0.55226,0.00006 -0.99994,0.44774 -1,1v19c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-5.86523v-13.13477c-0.00006,-0.55226 -0.44774,-0.99994 -1,-1zM20,19c-0.55226,0.00006 -0.99994,0.44774 -1,1v19c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-10c0,-0.82967 0.22639,-1.65497 0.625,-2.19531c0.39861,-0.54035 0.90147,-0.86463 1.85742,-0.84766c0.98574,0.01695 1.50758,0.35464 1.90234,0.88477c0.39477,0.53013 0.61523,1.32487 0.61523,2.1582v10c0.00006,0.55226 0.44774,0.99994 1,1h6c0.55226,-0.00006 0.99994,-0.44774 1,-1v-10.73828c0,-2.96154 -0.87721,-5.30739 -2.38086,-6.89453c-1.50365,-1.58714 -3.59497,-2.36719 -5.80664,-2.36719c-2.10202,0 -3.70165,0.70489 -4.8125,1.42383v-0.42383c-0.00006,-0.55226 -0.44774,-0.99994 -1,-1zM12,21h4v12.13477v4.86523h-4zM21,21h4v1.56055c0.00013,0.43 0.27511,0.81179 0.68291,0.94817c0.40781,0.13638 0.85714,-0.00319 1.11591,-0.34661c0,0 1.57037,-2.16211 5.01367,-2.16211c1.75333,0 3.25687,0.58258 4.35547,1.74219c1.0986,1.15961 1.83203,2.94607 1.83203,5.51953v9.73828h-4v-9c0,-1.16667 -0.27953,-2.37289 -1.00977,-3.35352c-0.73023,-0.98062 -1.9584,-1.66341 -3.47266,-1.68945c-1.52204,-0.02703 -2.77006,0.66996 -3.50195,1.66211c-0.73189,0.99215 -1.01562,2.21053 -1.01562,3.38086v9h-4z"></path></g></g></svg>
                                </a></li>
                        @endif

                </ul><!--end icon-->
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">شرکت </h5>
                <ul class="list-unstyled footer-list mt-4">
                    @if(isset($menusFooter1))
                        @foreach($menusFooter1 as $item)

                            <li><a href="{{$item->link}}" class="text-foot font-14"><i class="uil uil-angle-left-b me-1"></i>
                                    {{$item->title}}
                                </a></li>
                        @endforeach
                    @endif
                </ul>
            </div><!--end col-->

            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">لینک های مفید </h5>
                <ul class="list-unstyled footer-list mt-4">
                    @if(isset($menusFooter2))
                        @foreach($menusFooter2 as $item)

                            <li>
                                <a href="{{$item->link}}" class="text-foot font-14"><i class="uil uil-angle-left-b me-1"></i> خدمات سایت
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">خبرنامه </h5>
                <p class="mt-4"> {{(isset($footer->titleSubscribe))?$footer->titleSubscribe:''}}</p>
                <form id="subscribeForm">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe mb-3">
                                <label class="form-label">ایمیل خود را بنویسید <span
                                        class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-mail fea icon-sm icons">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <input type="text" id="submitsubscribe" name="send"
                                           class="form-control ps-5 rounded" placeholder="ایمیل شما: " required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div style="justify-content: center;align-items: center;"
                                 class="alert alert-success d-none" id="success-alert">
                                <button type="button" style="right: 5%" class="position-absolute close "
                                        data-dismiss="alert">x
                                </button>
                                <strong style="color: white;font-size: small " class="dirRtl text-center">ثبت نام با
                                    موفقیت انجام شد</strong>
                            </div>
                            <div class="alert alert-danger d-none" id="alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>error! </strong>

                            </div>

                            <div class="d-grid">
                                <input type="submit" id="submitsubscribe" name="send"
                                       class="submit-btn btn btn-soft-primary"
                                       value="ثبت ایمیل">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer>
<footer class="footer footer-bar ">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">
                        {{(isset($footer->titleCopyRightBottomFooter))?$footer->titleCopyRightBottomFooter:''}}

                        @if(isset($footer->titleDevelopBottomFooter))
                        طراحی شده با <i class="mdi mdi-heart text-primary"></i> توسط <a
                            href="/" target="_blank" class="text-reset">
                                {{(isset($footer->titleDevelopBottomFooter))?$footer->titleDevelopBottomFooter:''}}
                            </a>
                        @endif
                    </p>
                </div>
            </div><!--end col-->

            <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0"></div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer>
<!-- Footer End -->
@section('js')

@endsection
