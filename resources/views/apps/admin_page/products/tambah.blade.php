@extends('the_she.Halaman_Admin.layouts.main-admin')

@section('konten') 
<div class="row">
   <div class="shadow p-5 col-lg-6 m-auto">
      <h3 class="text-center">Tambah Data Produk</h3>
      <br>
      <form action="/Admin/produk" method="POST">
         @csrf
         <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}">
            @error('nama_produk')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="jenisproduk" class="form-label">Jenis Produk</label>
            <select id="jenisproduk" class="form-select @error('jenis_produks_id') is-invalid @enderror" name="jenis_produks_id" value="{{ old('jenis_produks_id') }}">
               <option selected disabled>- - - Pilih Jenis Produk - - -</option>
               @foreach ($jenisproduks as $item)
               @if ( old('jenisproduk') == $item->id)
                  <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
               @else
                  <option value="{{ $item->id }}">{{ $item->title }}</option>
               @endif
               @endforeach
            </select>
            @error('jenis_produks_id')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}">
             @error('stok')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
             @error('harga')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label class="form-label" for="textarea">Deskripsi Produk</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Berikan deskripsi terhadap produk anda disini..." id="textarea" name="deskripsi">{{ old('deskripsi') }}</textarea>
             @error('deskripsi')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="d-flex justify-content-between">
            <a href="/Admin/produk"class="btn btn-outline-warning">Kembali</a>
            <button type="submit" class="btn btn-primary px-3">Tambah</button>
         </div>
      </form>
   </div>
</div>
@endsection