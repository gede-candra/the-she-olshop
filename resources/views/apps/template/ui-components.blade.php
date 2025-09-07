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

{{-- bootstrap --}}
<link rel="stylesheet" href="{{ asset('tools/bootstrap-5.2.0/css/bootstrap.min.css') }}">
{{-- owl carousel --}}
<link rel="stylesheet" href="{{ asset('tools/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('tools/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
{{-- mycss --}}
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">

@if (auth()->check())
{{-- datatable --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

{{-- mycss --}}
<link rel="stylesheet" href="{{ asset('css/template.css') }}">
@endif

{{-- CSS --}}
<style>
  .avatar-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-weight: 700;
  }

  .dropdown-item:focus,
  .dropdown-item.active {
    background-color: var(--bs-success) !important;
    color: #fff !important;
  }
</style>

@yield('css')


{{-- JAVASCRIPT --}}

{{-- bootstrap js --}}
<script src="{{ asset('tools/bootstrap-5.2.0/js/bootstrap.bundle.min.js') }}"></script>
{{-- jquery --}}
<script src="{{ asset('tools/jquery-3.6.0/jquery.min.js') }}"></script>
{{-- datatable --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js">
</script>
<script src="/js/config_datatables.js"></script>
{{-- helper --}}
<script src="{{ asset('js/ajax-helper.js') }}"></script>
<script src="{{ asset('js/utilities.js') }}"></script>
{{-- my js --}}
<script src="{{ asset('js/apps/auth.js') }}"></script>
<script src="{{ asset('js/apps/show-random-product-categories.js') }}"></script>

@yield('js-asset')