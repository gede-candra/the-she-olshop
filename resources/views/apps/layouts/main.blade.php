<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   {{-- Title --}}
   <title>@yield('title') {{ ucwords(config('app.name')) }} @yield('homeTitle')</title>
   {{-- Icon --}}
   <link rel="icon" href="{{ asset('img/logo_framework.png') }}">

   {{-- Font, CSS, JS --}}
   @include('apps.template.ui-components')

</head>

<body>
   {{-- Navigation --}}
   @include('apps.layouts.navigation')

   @if (auth()->check())
   {{-- Offcanvas --}}
   @include('apps.layouts.sidebar-offcanvas')
   @endif

   {{-- Auth Modal --}}
   @include('apps.layouts.auth-modal')

   {{-- Content --}}
   <div class="container-xl margin-content">
      @yield('content')
   </div>

   <!-- Cart Modal -->
   @include('apps.customer_page.cart.modal')

   {{-- Footer --}}
   @include('apps.layouts.footer')

   {{-- Input Hidden --}}
   @yield('hidden-url')

   <input type="hidden" id="show-random-product-category-url" value="{{ route('show-random-product-category') }}">
   @if (!auth()->check())
   <input type="hidden" id="login-url" value="{{ route('login') }}">
   <input type="hidden" id="register-url" value="{{ route('register') }}">
   @else
   <input type="hidden" id="logout-url" value="{{ route('logout') }}">
   @endif
</body>

</html>