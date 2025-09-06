<!DOCTYPE html>
<html lang="id">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title') {{ ucwords(config('app.name')) }} @yield('homeTitle')</title>
      {{-- Icon --}}
      <link rel="icon" href="{{ asset('img/logo_framework.png') }}"> 

      {{-- Font, CSS, JS --}}
      @include('apps.template.ui-components')

   </head>

   <body>
      {{-- Navigation --}}
      @include('apps.layouts.navigation')
      
      {{-- Offcanvas --}}
      @include('apps.layouts.sidebar-offcanvas')

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

   </body>
</html>