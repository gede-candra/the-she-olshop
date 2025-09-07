{{-- offcanvas --}}
@php
$u = auth()->user();
@endphp

<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="SidebarModal" aria-labelledby="SidebarModalLabel">
   <div class="offcanvas-header">
      <a class="navbar-brand fs-3 text-success d-flex mt-lg-2" href="/" style="font-family: 'Bungee Shade';"><img
            src="/img/logo_framework.png" width="40" alt="">TSO</a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      <div>
         <ul class="navbar-nav gap-3">
            <div class="border-bottom border-2"></div>
            <li class="nav-item px-3 py-2">
               <div class="fw-semibold text-dark text-truncate">{{ $u->name }}</div>
               <div class="small text-muted text-truncate">{{ $u->email }}</div>
            </li>

            <div class="border-bottom border-2"></div>

            <!-- Tetapkan Dashboard di bagian atas -->
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                  href="{{ route('dashboard') }}">
                  <i class="fa-solid fa-gauge fa-fw me-2"></i> Dashboard
               </a>
            </li>

            <div class="border-bottom border-2"></div>

            <!-- Grup: Profile -->
            <li class="nav-item">
               <h6 class="dropdown-header text-secondary">Profile</h6>
            </li>
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2 {{ request()->routeIs('profile.show') ? 'active' : '' }}"
                  href="#">
                  <i class="fa-solid fa-user fa-fw me-2"></i> Profil Saya
               </a>
            </li>
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2 {{ request()->routeIs('password.edit') ? 'active' : '' }}"
                  href="#">
                  <i class="fa-solid fa-lock fa-fw me-2"></i> Ubah Password
               </a>
            </li>

            <div class="border-bottom border-2"></div>

            <!-- Grup: Master -->
            <li class="nav-item">
               <h6 class="dropdown-header text-secondary">Master</h6>
            </li>
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2 {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
                  href="{{ route('pelanggan.index') }}">
                  <i class="fa-solid fa-users fa-fw me-2"></i> Pelanggan
               </a>
            </li>
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2 {{ request()->routeIs('produk.*') ? 'active' : '' }}"
                  href="{{ route('produk.index') }}">
                  <i class="fa-solid fa-box-open fa-fw me-2"></i> Produk
               </a>
            </li>

            <div class="border-bottom border-2"></div>

            <!-- Grup: Transaksi -->
            <li class="nav-item">
               <h6 class="dropdown-header text-secondary">Transaksi</h6>
            </li>
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2 {{ request()->routeIs('pesanan.*') ? 'active' : '' }}"
                  href="{{ route('pesanan.index') }}">
                  <i class="fa-solid fa-arrows-down-to-line fa-fw me-2"></i> Pesanan
               </a>
            </li>

            <div class="border-bottom border-2"></div>

            <li class="nav-item">
               <button type="button"
                  class="btn-logout text-decoration-none text-nowrap btn btn-outline-danger btn-sm border-0 d-flex align-items-center gap-2 w-100">
                  <i class="fa-solid fa-right-from-bracket fa-fw me-2"></i> Logout
               </button>
            </li>
         </ul>
      </div>
   </div>
</div>