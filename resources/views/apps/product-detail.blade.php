@extends('apps.layouts.main')

@section('title', $product->name . ' - ' . $product->productCategory->name)

@section('content')
<div class="card mb-5">
   <div class="row g-0 ">
     <div class="col-md-5">
       <img src="{{ asset('storage/' . $product->picture) }}" class="img-thumbnail w-100 border border-success" style="max-height: 450px;" alt="{{ $product->name }}">
     </div>
     <div class="col-md-7">
       <div class="card-body">
         <h5 class="card-title">{{ $product->name }}</h5>
         <h2 class="text-success">Rp{{ $product->discount <= 100 ?  number_format($product->price - ($product->price * $product->discount), 0, ',', '.') :  number_format($product->price, 0, ',', '.')}}</h2>
         <div class="d-flex flex-column">
							<p class="text-start text-secondary m-0 skeleton" style="font-size: 14px;"><i class="fa-solid fa-hand-holding-dollar text-warning"></i> {{ $product->users->count() }} Terjual</p>
							@if ($product->discount > 0 && $product->discount <= 100)
							<p class="text-start m-0 skeleton"><span class="alert alert-success opacity-70 py-0 px-1 m-0 me-1">{{ $product->discount * 100 }}%</span> <span class="m-0 text-decoration-line-through text-secondary">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
							@elseif ($product->discount > 100)
							<p class="text-start m-0 skeleton"><span class="alert alert-danger opacity-70 py-0 px-1 m-0 me-1">Buy {{ $product->discount - 100 }} Get 1</span></p>
							@endif
						</div>
         <br>
         <div class="">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto enim voluptatem soluta eos odio cupiditate maiores veritatis doloribus itaque, repudiandae ipsum eius hic eaque quas. Numquam modi itaque molestiae possimus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto enim voluptatem soluta eos odio cupiditate maiores veritatis doloribus itaque, repudiandae ipsum eius hic eaque quas. Numquam modi itaque molestiae possimus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto enim voluptatem soluta eos odio cupiditate maiores veritatis doloribus itaque, repudiandae ipsum eius hic eaque quas. Numquam modi itaque molestiae possimus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto enim voluptatem soluta eos odio cupiditate maiores veritatis doloribus itaque, repudiandae ipsum eius hic eaque quas. Numquam modi itaque molestiae possimus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto enim voluptatem soluta eos odio cupiditate maiores veritatis doloribus itaque, repudiandae ipsum eius hic eaque quas. Numquam modi itaque molestiae possimus.</p>
         </div>
         <br>
         <p class="card-text"><small class="text-muted">Diperbarui {{ $product->updated_at->diffForHumans() }}</small></p>
         <form action="" class="float-end">
            <div>
               <label for="">quantity :</label>
               <input class="text-center" type="number" min="1" max="{{ $product->stock }}" value="1">
               <label for="">of <b>{{ $product->stock }}</b></label>
            </div>
            <button class="btn btn-outline-success my-3"><i class="fa-solid fa-cart-plus"></i> Masukkan ke keranjang</button>
         </form>
       </div>
     </div>
   </div>
 </div>
@endsection