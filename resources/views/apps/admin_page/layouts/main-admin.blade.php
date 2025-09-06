<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>The She Olshop | Admin</title>
   {{-- Icon --}}
   <link rel="icon" href="{{ asset('img/logo_framework.png') }}"> 
   <!-- my font  -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Henny+Penny&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
   {{-- Font Awesome Icon --}}
   <link rel="stylesheet" href="{{ asset('tools/fontawesome-free-6.1.1-web/css/all.min.css') }}">
   {{-- Bootstrap --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   {{-- mycss --}}
   <link rel="stylesheet" href="/css/template.css">
   @yield('css')

   {{-- JQuery and Data Table plugin --}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
   <script type="text/javascript" charset="utf8" src="/js/jquery.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
   <script src="/js/config_datatables.js"></script>
   <script src="{{ asset('js/utilities.js') }}"></script>
   {{-- <script src="/js/alert.js"></script> --}}
   @yield('jsScript')
</head>
<body style="overflow-y: {{ ( session()->has('success')) ? 'hidden' : 'auto' }};">
   {{-- Navigation Bar Admin --}}
   <nav class="navbar navbar-expand-lg py-0 navbar-light bg-light fixed-top" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2)">
      <div class="container ">
         <a class="navbar-brand fs-3 text-success d-flex align-items-center gap-2" href="/Admin"  style="font-family: 'Bungee Shade';"><img src="/img/logo_framework.png" width="40" alt="">TSO <sup class="fs-6 fw-bold text-secondary opacity-75" style="font-family: 'calibri';">Admin</sup></a>
         <div class="order-lg-2 d-flex align-items-center gap-3">
         <div class="btn-group">
            <button type="button" class="btn btn-outline-success btn-sm rounded-pill dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fa-solid fa-user"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
            <li><button class="dropdown-item" type="button"><i class="fa-solid fa-user-pen"></i> Edit Profile</button></li>
            <li><button class="dropdown-item" type="button"><i class="fa-solid fa-key"></i> Change Password</button></li>
            <li><a class="dropdown-item text-danger" href="/"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
         </div>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-ellipsis-vertical"></i>
         </button>
         </div>
         <div class="collapse navbar-collapse justify-content-end me-lg-2" id="navbarSupportedContent">
            <ul class="navbar-nav my-2 my-lg-0">
               <div class="navbar-nav me-lg-2">
                  <li class="nav-item px-lg-2">
                     <a class="nav-link text-success opacity-75 px-2 py-lg-3 fw-bold px-lg-0 {{ request()->is('admin/dashboard*') ? 'aktif' : '' }}" href="{{ route("admin.dashboard") }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
                  </li>
                  <li class="nav-item px-lg-2">
                     <a class="nav-link text-success opacity-75 px-2 py-lg-3 fw-bold px-lg-0 {{ request()->is('admin/pelanggan*') ? 'aktif' : '' }}" href="{{ route("admin.pelanggan.index") }}"><i class="fa-solid fa-users"></i> Pelanggan</a>
                  </li>
                  <li class="nav-item px-lg-2">
                     <a class="nav-link text-success opacity-75 px-2 py-lg-3 fw-bold px-lg-0 {{ request()->is('admin/produk*') ? 'aktif' : '' }}" href="/admin/produk"><i class="fa-solid fa-box-open"></i> Produk</a>
                  </li>
                  <li class="nav-item px-lg-2">
                     <a class="nav-link text-success opacity-75 px-2 py-lg-3 fw-bold px-lg-0 {{ request()->is('admin/pesanan*') ? 'aktif' : '' }}" href="/admin/pesanan"><i class="fa-solid fa-arrows-down-to-line"></i> Pesanan</a> 
                  </li>
               </div>
            </ul>
         </div>
      </div>
   </nav>

   {{-- Admin Page Content --}}
   <div class="container margin-content">
         @yield('content')
   </div>

   <hr>
   {{-- Footer --}}
   @include('the_she.admin_page.layouts.footer')

</body>
</html>