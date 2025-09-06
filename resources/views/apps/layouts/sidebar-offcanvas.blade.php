{{-- offcanvas --}}
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="SidebarModal" aria-labelledby="SidebarModalLabel">
   <div class="offcanvas-header">
      <a class="navbar-brand fs-3 text-success d-flex mt-lg-2" href="/" style="font-family: 'Bungee Shade';"><img src="/img/logo_framework.png" width="40" alt="">TSO</a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      <div>
         <ul class="navbar-nav gap-3">
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2" aria-current="page" href="/"><i class="fa-solid fa-house-chimney"></i> Beranda</a>
            </li>
            <div class="border-bottom border-2"></div>
            @foreach ($product_categories as $item)
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2" aria-current="page" href="{{ route('product-by-category', ['slug'=>$item->slug]) }}"><i class="fa-solid fa-magnifying-glass-dollar"></i> {{ $item->name }}</a>
            </li>
            @endforeach
         </ul>
         <hr>
         <div class="">
            <button type="button" class="btn-auth-modal btn btn-outline-success btn-sm text-nowrap float-end" data-bs-toggle="modal" data-bs-target="#login-modal"><i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk</button>
         </div>
         <div class="row gap-2 px-3 d-none">
            <a class="btn btn-outline-success col-12" href="#"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
            <a class="btn btn-outline-success col-12" href="#"><i class="fa-solid fa-key"></i> Ubah Password</a>
            <a class="btn btn-outline-danger col-12" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
         </div>
      </div>
   </div>
</div>