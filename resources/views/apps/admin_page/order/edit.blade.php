@extends('the_she.Halaman_Admin.layouts.main-admin')

@section('konten') 
<div class="row">
   <div class="shadow p-5 col-lg-6 m-auto">
      <h3 class="text-center">Edit Data Pesanan</h3>
      <br>
      <form action="" method="POST">
         @csrf
         <div class="mb-3">
            <label for="kode_pesanan" class="form-label">Kode Pesanan</label>
            <input readonly type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="{{ $pesanan->id }}">
            @error('kode_pesanan')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="user_id" class="form-label">Pelanggan</label>
            <select id="user_id" class="form-select @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}">
               <option selected disabled class="text-center">- - - Pilih Pelanggan - - -</option>
               @foreach ($pelanggans as $item)
               @if ( old('user_id') == $item->id )
                  <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
               @else
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
               @endif
                  @endforeach
            </select>
            @error('user_id')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select id="produk_id" class="form-select @error('produk_id') is-invalid @enderror" name="produk_id" value="{{ old('produk_id') }}">
              <option selected disabled class="text-center">- - - Pilih Produk - - -</option>
              @foreach ($produks as $brg)
              @if (old('produk_id') == $brg->id)
              <option value="{{ $brg->id }}" selected>{{ $brg->nama_produk }}</option>
              @else
              <option value="{{ $brg->id }}">{{ $brg->nama_produk }}</option>
              @endif
              @endforeach
            </select>
            @error('produk_id')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" class="form-select @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}">
              <option selected disabled class="text-center">- - - Pilih Status - - -</option>
              <option class="text-warning fw-bold" value="Dalam Proses" {{ old('status') == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
              <option class="text-success fw-bold" value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="d-flex justify-content-between">
            <a href="/Admin/pesanan"class="btn btn-outline-warning">Kembali</a>
            <button class="btn btn-primary px-3">Tambah</button>
         </div>
      </form>
   </div>
</div>
@endsection