<!-- FONT  -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Henny+Penny&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik+Puddles&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
{{-- Font Awesome --}}
<link rel="stylesheet" href="{{ asset('tools/fontawesome-free-6.1.1-web/css/all.min.css') }}">

{{-- CSS --}}

{{-- bootstrap --}}
<link rel="stylesheet" href="{{ asset('tools/bootstrap-5.2.0/css/bootstrap.min.css') }}">
{{-- owl carousel --}}
<link rel="stylesheet" href="{{ asset('tools/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('tools/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
{{-- mycss --}}
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">

@yield('css')

{{-- JAVASCRIPT --}}

{{-- bootstrap js --}}
<script src="{{ asset('tools/bootstrap-5.2.0/js/bootstrap.bundle.min.js') }}"></script>
{{-- jquery --}}
<script src="{{ asset('tools/jquery-3.6.0/jquery.min.js') }}"></script>
{{-- my js --}}
<script src="{{ asset('js/utilities.js') }}"></script>
<script src="{{ asset('js/apps/auth.js') }}"></script>

@yield('jsScript')