@extends('the_she.admin_page.layouts.main-admin')

@section('content') 
<div class="row">
   <div class="shadow p-4 col-lg-6 m-auto">
      <h3 class="text-center">{{ $title }}</h3>
      <br>
      <form action="{{ $title == "Ubah Data Produk" ? route("admin.produk.update", $product->slug) : route("admin.produk.store") }}" method="POST" enctype="multipart/form-data">
         @csrf
         @if ($title == "Ubah Data Produk")
               @method("PUT")
         @else
               @method("POST")
         @endif
         <div class="mb-3">
            <label for="product_name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name', @$product->product_name) }}">
            @error('product_name')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="product_category" class="form-label">Kategori Produk</label>
            <select id="product_category" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
              <option selected disabled>- - - Pilih Kategori Produk - - -</option>
              @foreach ($productCa as $category)
              @if (old('category_id', @$product->productCategory->name) == $category->title)
                  <option selected value="{{ $category->id }}">{{ $category->title }}</option>
              @else
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endif
          @endforeach
            </select>
            @error('category_id')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', @$product->stock) }}">
             @error('stock')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="price" class="form-label">Harga Produk</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', @$product->price) }}">
             @error('price')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="discount" class="form-label">Diskon</label>
            <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount', @$product->discount * 100) }}">
             @error('discount')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="formFile" class="form-label">Foto Produk</label>
            <input class="form-control @error('picture') is-invalid @enderror" type="file" id="formFile" name="picture">
            @error('picture')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="mb-3">
            <label class="form-label" for="textarea">Deskripsi Produk</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Berikan description terhadap produk anda disini..." id="textarea" name="description">{{ old('description', @$product->description) }}</textarea>
             @error('description')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
          </div>
         <div class="d-flex justify-content-between">
            <a href="/Admin/produk"class="btn btn-outline-warning">Kembali</a>
            <button type="submit" class="btn btn-primary px-3">{{ $btn_text }}</button>
         </div>
      </form>
   </div>
</div>
@endsection