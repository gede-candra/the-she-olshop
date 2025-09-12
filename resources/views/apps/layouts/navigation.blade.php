{{-- Navigation Bar --}}
@if (auth()->check())
@php
$u = auth()->user();

// Inisial: ambil huruf awal tiap kata pada name (maks 2 huruf)
$initials = collect(explode(' ', trim($u->name ?? 'U')))->filter()->take(2)->map(fn($p) =>
mb_substr($p,0,1))->implode('');

// Warna latar avatar yang konsisten (hash dari email/id)
$palette = [
'#0ea5e9', // sky-500
'#10b981', // emerald-500
'#f97316', // orange-500
'#ef4444', // red-500
'#a855f7', // purple-500
'#14b8a6', // teal-500
'#f59e0b', // amber-500
'#64748b', // slate-500
'#3b82f6', // blue-500
'#22c55e', // green-500
'#eab308', // yellow-500
'#ec4899', // pink-500
'#f43f5e', // rose-500
'#8b5cf6', // violet-500
'#06b6d4', // cyan-500
'#94a3b8', // slate-400
];

$idx = crc32(($u->email ?? $u->id).'tso') % count($palette);
$avatarBg = $palette[$idx];
@endphp
@endif

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2)">
   <div class="container-fluid gap-2 gap-lg-1 align-items-start">
      <a class="navbar-brand fs-3 text-success d-flex mt-lg-2" href="/" style="font-family: 'Bungee Shade';"><img
            src="/img/logo_framework.png" width="40" alt="">TSO</a>
      <div class="d-flex gap-2">
         @if (!auth()->check() || (auth()->check() && $u->role_id !== 1))
         <div class="d-flex d-lg-none">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#CartModal"><i
                  class="fa-solid fa-cart-shopping"></i></button>
         </div>
         @endif
         <div class="d-flex d-lg-none">
            @if (!auth()->check())
            <button type="button" class="btn-auth-modal btn btn-outline-success text-nowrap" data-bs-toggle="modal"
               data-bs-target="#login-modal">
               <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </button>
            @else
            <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#SidebarModal"
               aria-controls="offcanvasExample">
               <span class="rounded-circle d-inline-flex justify-content-center align-items-center"
                  style="width:36px;height:36px; background:{{ $avatarBg }}; color:#fff;font-weight:700;border:2px solid var(--bs-success);">
                  {{ strtoupper($initials) }}
               </span>
               <i class="fa-solid fa-caret-down text-success"></i>
            </a>
            @endif
         </div>
      </div>
      <div class="w-100 d-grid gap-2">
         <div class="d-flex gap-3">
            <div class="bg-success d-flex rounded align-items-center w-100 overflow-hidden shadow-sm">
               <form class="d-flex w-100 align-items-center">
                  <input class="border-success w-100 border-0 px-3 py-2" type="search"
                     placeholder="Cari busana yang kamu suka..." aria-label="Search" id="myInputTextField"
                     autocomplete="off" style="border-radius: 30px 0 30px 0; outline: none">
                  <button type="button" class="text-light border-0 bg-transparent px-2"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
               </form>
            </div>
            <ul class="navbar-nav d-none d-lg-flex gap-2">
               @if (!auth()->check() || (auth()->check() && $u->role_id !== 1))
               <li class="nav-item">
                  <button class="btn btn-outline-success text-nowrap" data-bs-toggle="modal"
                     data-bs-target="#CartModal"><i class="fa-solid fa-cart-shopping"></i> Keranjang</button>
               </li>
               @endif
               @if (!auth()->check())
               <li class="nav-item">
                  <button type="button" class="btn-auth-modal btn btn-outline-success text-nowrap"
                     data-bs-toggle="modal" data-bs-target="#login-modal"><i
                        class="fa-solid fa-arrow-right-to-bracket"></i> Masuk</button>
               </li>
               @else

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle p-0 d-flex align-items-center" href="#" id="userDropdown"
                     role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <span class="rounded-circle d-inline-flex justify-content-center align-items-center"
                        style="width:36px;height:36px; background:{{ $avatarBg }}; color:#fff;font-weight:700;border:2px solid var(--bs-success);">
                        {{ strtoupper($initials) }}
                     </span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown"
                     style="min-width: 260px;">
                     <li class="px-3 py-2">
                        <div class="fw-semibold text-dark text-truncate">{{ $u->name }}</div>
                        <div class="small text-muted text-truncate">{{ $u->email }}</div>
                     </li>

                     <li>
                        <hr class="dropdown-divider">
                     </li>

                     <!-- Tetapkan Dashboard di bagian atas -->
                     <li>
                        <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                           <i class="fa-solid fa-gauge fa-fw me-2"></i> Dashboard
                        </a>
                     </li>

                     <li>
                        <hr class="dropdown-divider">
                     </li>

                     <!-- Grup: Profile -->
                     <li>
                        <h6 class="dropdown-header text-success">Profile</h6>
                     </li>
                     <li>
                        <a class="dropdown-item {{ request()->routeIs('profile.show') ? 'active' : '' }}" href="#">
                           <i class="fa-solid fa-user fa-fw me-2"></i> Profil Saya
                        </a>
                     </li>
                     <li>
                        <a class="dropdown-item {{ request()->routeIs('password.edit') ? 'active' : '' }}" href="#">
                           <i class="fa-solid fa-lock fa-fw me-2"></i> Ubah Password
                        </a>
                     </li>

                     <li>
                        <hr class="dropdown-divider">
                     </li>

                     @if ($u->role_id === 1)
                     <!-- Grup: Master -->
                     <li>
                        <h6 class="dropdown-header text-success">Master</h6>
                     </li>
                     <li>
                        <a class="dropdown-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
                           href="{{ route('pelanggan.index') }}">
                           <i class="fa-solid fa-users fa-fw me-2"></i> Pelanggan
                        </a>
                     </li>
                     <li>
                        <a class="dropdown-item {{ request()->routeIs('produk.*') ? 'active' : '' }}"
                           href="{{ route('produk.index') }}">
                           <i class="fa-solid fa-box-open fa-fw me-2"></i> Produk
                        </a>
                     </li>

                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     @endif

                     <!-- Grup: Transaksi -->
                     <li>
                        <h6 class="dropdown-header text-success">Transaksi</h6>
                     </li>
                     <li>
                        <a class="dropdown-item {{ request()->routeIs('pesanan.*') ? 'active' : '' }}"
                           href="{{ route('pesanan.index') }}">
                           <i class="fa-solid fa-arrows-down-to-line fa-fw me-2"></i> Riwayat Pesanan
                        </a>
                     </li>

                     <li>
                        <hr class="dropdown-divider">
                     </li>

                     <li>
                        <button type="button" class="btn-logout dropdown-item text-danger">
                           <i class="fa-solid fa-right-from-bracket fa-fw me-2"></i> Logout
                        </button>
                     </li>
                  </ul>


               </li>
               @endif
            </ul>
         </div>

         <ul id="nav-categories" class="navbar-nav d-flex flex-row gap-2 overflow-auto w-100">
            <li class="nav-item">
               <a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0" aria-current="page"
                  href="/"><i class="fa-solid fa-house-chimney"></i></a>
            </li>
            <!-- kategori akan ditambahkan via JS -->
         </ul>
      </div>
   </div>
</nav>