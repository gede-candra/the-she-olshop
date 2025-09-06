<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - {{ config('app.name') }} </title>
  {{-- Icon --}}
  <link rel="icon" href="/img/logo_framework.png"> 
  {{-- bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/all.min.css">

  <!-- my font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Henny+Penny&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Puddles&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  {{-- mycss --}}
  <style>
    #margin{
      margin-top: 130px;
    }
    .w-px-40{
      width: 40px;
    }
    .h-slider{
      height: 290px;
    }
    .h-responsive{
      height: 200px;
    }
    
    @media (min-width: 992px) { 
      #margin{
        margin-top: 110px;
      }
      .h-responsive{
        height: 240px;
      }
      .h-slider{
        height: 350px;
      }
     }
  </style>
  {{-- myjs --}}



</head>

<body>
  {{-- Navigation Bar --}}
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2)">
    <div class="container-fluid gap-2 gap-lg-1 align-items-start">
      <a class="navbar-brand fs-3 text-success d-flex mt-lg-2" href="/" style="font-family: 'Bungee Shade';"><img src="/img/logo_framework.png" width="40" alt="">TSO</a>
      <div class="d-flex gap-2">
        <div class="d-flex d-lg-none">
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Keranjang"><i class="fa-solid fa-cart-shopping"></i></button>
        </div>
        <div class="d-flex d-lg-none">
          <button type="button" class="btn btn-outline-success" data-bs-toggle="offcanvas" data-bs-target="#ListPencarian" aria-controls="offcanvasExample"><i class="fa-solid fa-bars-staggered"></i></button>
        </div>
      </div>
      <div class="w-100 d-grid gap-2">
        <div class="d-flex gap-3">
          <form class="d-flex w-100">
            <input class="form-control me-2" type="search" placeholder="Cari busana yang kamu suka..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <ul class="navbar-nav d-none d-lg-flex gap-2">
            <li class="nav-item">
              <button class="btn btn-outline-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#Keranjang"><i class="fa-solid fa-cart-shopping"></i> Keranjang</button>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-success d-flex align-items-center gap-2" aria-current="page" href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-success d-flex align-items-center gap-2" aria-current="page" href="/daftar-pelanggan"><i class="fa-solid fa-user-plus"></i> Daftar</a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav d-none d-lg-flex gap-2">
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="/"><i class="fa-solid fa-house-chimney"></i></a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="#">Busana Adat</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="#">Busana Anak</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="#">Busana Dewasa</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="#">Seragam Sekolah</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="#">Busana Kerja</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm" aria-current="page" href="#">Busana Olahraga</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Modal -->
  {{-- Keranjang Belanja --}}
  <div class="modal fade" id="Keranjang" tabindex="-1" aria-labelledby="KeranjangLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="KeranjangLabel"><i class="fa-solid fa-cart-shopping"></i> Keranjang Belanja</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img class="w-50" src="/img/cart-empty.png" alt="">
            <h2 class="fs-4 ">Yah Keranjang Belanjamu Kosong!</h2>
            <p>Silahkan menuju ke beranda untuk membeli busana yang kamu suka.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- About Footer --}}
  <div class="modal fade" id="Tentang" tabindex="-1" aria-labelledby="TentangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TentangLabel"><i class="fa-solid fa-circle-info"></i> Tentang Aplikasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
            <h2 class="fs-4 text-center"><b>The She Olshop</b></h2>
            <p class="text-center fs-6">Versi 2022.1.1.TSO</p>
            <div class="row">
              <div class="col-12 mt-3">
                <h6><b>Developer :</b></h6>
                <a href="https://www.instagram.com/cdr_wijaya/" class="text-decoration-none">I Gede Candra Wijaya</a> <strong>&</strong>
                <a href="https://www.instagram.com/deaasd_/" class="text-decoration-none">Ayu Sri Dewi</a>
              </div>
              <div class="col-12 mt-3">
                <h6><b>Description :</b></h6>
                <p style="text-align: justify; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, facilis. Nemo, placeat laudantium. Dolor, iure nesciunt, expedita dolores alias iste qui, necessitatibus amet eum eaque doloremque incidunt placeat nisi ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus saepe cumque beatae nobis quaerat dolores culpa neque. Veritatis laudantium veniam quisquam dicta quo dignissimos obcaecati deserunt libero, minima nisi temporibus?</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- offcanvas --}}
  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="ListPencarian" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <a class="navbar-brand fs-3 text-success mt-lg-2" href="/" style="font-family: 'lobster';">The She Olshop</a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
        <ul class="navbar-nav gap-2">
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="/"><i class="fa-solid fa-house-chimney"></i> Beranda</a>
          </li>
          <hr>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i> Busana Adat</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i> Busana Anak</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i> Busana Dewasa</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i> Seragam Sekolah</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i> Busana Kerja</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn-outline-success btn-sm d-flex align-items-center gap-2" aria-current="page" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i> Busana Olahraga</a>
          </li>
        </ul>
        <hr>
        <div class="row gap-4 px-3">
          <a class="btn btn-outline-success col-4" href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk</a>
          <a class="btn btn-outline-success col-4" href="/daftar-pelanggan"><i class="fa-solid fa-user-plus"></i> Daftar</a>
        </div>
        <div class="row gap-2 px-3 d-none">
          <a class="btn btn-outline-success col-12" href="/login"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
          <a class="btn btn-outline-success col-12" href="/daftar-pelanggan"><i class="fa-solid fa-key"></i> Ubah Password</a>
          <a class="btn btn-outline-danger col-12" href="/daftar-pelanggan"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Konten The She Olshop --}}
  <div id="margin" class="container">
    @yield('halaman_depan')
  </div>

  {{-- FOOTER --}}
  <hr>
  <footer class="d-flex flex-column align-items-center gap-3 mb-4">
    <div class="d-flex">
      <a href="https://www.instagram.com/" class="btn"><i class="fa-brands fa-instagram fs-3"></i></a>
      <a href="https://www.facebook.com/" class="btn"><i class="fa-brands fa-facebook fs-3"></i></a>
      <a href="https://twitter.com/" class="btn"><i class="fa-brands fa-twitter fs-3"></i></a>
    </div>
      
    <button data-bs-toggle="modal" data-bs-target="#Tentang">&copy; 2022 The She Olshop, Inc</button>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>