<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{!! SEO::generate() !!}
<!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-dark.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>
<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
<!-- Jquery Min JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Wow Min JS -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset('assets/js/meanmenu.js')}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator Min JS -->
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<!-- Contact Form JS -->
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
