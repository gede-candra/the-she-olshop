{{-- Navigation Bar --}}
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2)">
   <div class="container-fluid gap-2 gap-lg-1 align-items-start">
   <a class="navbar-brand fs-3 text-success d-flex mt-lg-2" href="/" style="font-family: 'Bungee Shade';"><img src="/img/logo_framework.png" width="40" alt="">TSO</a>
   <div class="d-flex gap-2">
      <div class="d-flex d-lg-none">
         <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#CartModal"><i class="fa-solid fa-cart-shopping"></i></button>
      </div>
      <div class="d-flex d-lg-none">
         <button type="button" class="btn btn-outline-success" data-bs-toggle="offcanvas" data-bs-target="#SidebarModal" aria-controls="offcanvasExample"><i class="fa-solid fa-bars-staggered"></i></button>
      </div>
   </div>
   <div class="w-100 d-grid gap-2">
      <div class="d-flex gap-3">
         <div class="bg-success d-flex rounded align-items-center w-100 overflow-hidden shadow-sm">
            <form class="d-flex w-100 align-items-center">
               <input class="border-success w-100 border-0 px-3 py-2" type="search" placeholder="Cari busana yang kamu suka..." aria-label="Search" id="myInputTextField" autocomplete="off" style="border-radius: 30px 0 30px 0; outline: none">
               <button type="button" class="text-light border-0 bg-transparent px-2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
         </div>
         <ul class="navbar-nav d-none d-lg-flex gap-2">
            <li class="nav-item">
               <button class="btn btn-outline-success text-nowrap" data-bs-toggle="modal" data-bs-target="#CartModal"><i class="fa-solid fa-cart-shopping"></i> Keranjang</button>
            </li>
            <li class="nav-item">
               <button type="button" class="btn-auth-modal btn btn-outline-success text-nowrap" data-bs-toggle="modal" data-bs-target="#login-modal"><i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk</button>
            </li>
         </ul>
      </div>
      <ul class="navbar-nav d-none d-lg-flex gap-2">
         <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0" aria-current="page" href="/"><i class="fa-solid fa-house-chimney"></i></a>
         </li>
         @foreach ($product_categories as $item)
         <li class="nav-item">
            <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0" aria-current="page" href="{{ route('product-by-category', ['slug'=>$item->slug]) }}">{{ $item->name }}</a>
         </li>
         @endforeach
      </ul>
   </div>
   </div>
</nav>