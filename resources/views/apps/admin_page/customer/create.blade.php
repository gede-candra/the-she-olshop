@extends('the_she.Halaman_Admin.layouts.main-admin')

@section('content') 
<div class="row">
   <div class="shadow p-5 col-lg-6 m-auto">
      <h3 class="text-center">Tambah Data Pelanggan</h3>
      <br>
      <form action="/Admin/pelanggan" method="POST">
         @csrf
         <div class="mb-3">
            <label for="name" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
            @error('username')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
            @error('email')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="d-flex justify-content-between">
            <a href="/Admin/pelanggan"class="btn btn-outline-warning">Kembali</a>
            <button class="btn btn-primary px-3">Tambah</button>
         </div>
      </form>
   </div>
</div>
@endsection