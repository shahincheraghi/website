<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> @yield('title')</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/dashboard-analytics.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/plugins/tour/tour.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/pages/authentication.css') }}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->
    @yield('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body
    class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
<!-- BEGIN: Content-->
<div class="app-content content">
    @yield('content')
</div>
<!-- END: Content-->
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('Admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->
<script src="{{ asset('Admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('Admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('Admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/core/app.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/components.js')}}"></script>
<script src="{{ asset('Admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script src="https://cdn.tiny.cloud/1/ky776fcfzivsxgjcd0oftwbo4z4qlhozznrgmbpopgq4a587/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
@yield("script")
</body>
<!-- END: Body-->
</html>
