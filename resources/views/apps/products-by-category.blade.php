@extends('apps.layouts.main')

@section('title', $product_category->name.' | ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/img-modal.css') }}">
<style>
	
	.h-card{
		height: 150px;
	}
	.h-300{
		width: 100%;
		height: 300px;
	}
	
	/* Card */
	.product-title a{
		color: #666;
		background-color: #000 !important;
	}

	/* Card - Ellipse Text */
	.product-title p{
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
		font-size: 14px;
	}

	
	.btn-border-success{
		transition-duration: 0.6s;
		box-shadow: 0 2px 10px #1987545e;
		border-radius: 20px;
	}
	.btn-border-success:hover{
		box-shadow: 0 2px 10px #198754;
		color: #198754;
	}
	.btn-border-success img{
		border-radius: 20px 20px 0 0;
	}
	.btn-border-success span{
		margin-right: 20px;
		opacity: 0.5;
		font-size: 14px;
		float: left;
	}
	.btn-border-success h6{
		transition-duration: 0.6s;
		background-color: transparent;
		margin-bottom: 10px;
	}
	.btn-border-success:hover h6{
		color: #fff;
		background-color: #198754;
		margin-right: -20px;
		font-weight: 100 !important;
	}
	.btn-border-success:hover a{
		color: #198754;
	}
</style>
@endsection

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner shadow">
	<div class="carousel-item active" data-bs-interval="5000">
		<img src="/img/Banner1.jpg" class="d-block w-100 h-slider" alt="...">
	</div>
	<div class="carousel-item" data-bs-interval="5000">
		<img src="/img/Banner2.jpg" class="d-block w-100 h-slider" alt="...">
	</div>
	<div class="carousel-item" data-bs-interval="5000">
		<img src="/img/Banner3.jpg" class="d-block w-100 h-slider" alt="...">
	</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="visually-hidden">Next</span>
</button>
</div>

{{-- Products By Category --}}
<div class="mt-5">
	<div class="d-md-flex justify-content-between align-items-center mb-3">
		<h4 class="m-0">Produk Dengan Kategori: {{ $product_category->name }}</h4>
	</div>
	<div class="row">
		@foreach ($products as $item)
		<div class="col-6 col-sm-4 col-md-3 col-lg-2">
			<div class="btn-border-success h-300">
				<img src="{{ asset('storage/'.$item->picture) }}" class="img-card h-card w-100" alt="{{ $item->name }}">
				<div class="h-50 position-relative">
					<div class="px-2 product-title">
						<a href="{{ route('product-detail', ['categorySlug'=>$item->productCategory->slug, 'slug'=>$item->slug]) }}" class="text-decoration-none"><p class="text-start">{{ $item->name }}</p></a>
					</div>
					<div class="position-absolute bottom-0 w-100 px-2">
						<div class="d-flex flex-column">
							<p class="text-start text-secondary m-0" style="font-size: 14px;"><i class="fa-solid fa-hand-holding-dollar text-warning"></i> {{ $item->users->count() }} Terjual</p>
							@if ($item->discount > 0 && $item->discount <= 100)
							<p class="text-start m-0"><span class="alert alert-success opacity-70 py-0 px-1 m-0 me-1">{{ $item->discount * 100 }}%</span> <span class="m-0 text-decoration-line-through text-secondary">Rp {{ number_format($item->price, 0, ',', '.') }}</span></p>
							@elseif ($item->discount > 100)
							<p class="text-start m-0"><span class="alert alert-danger opacity-70 py-0 px-1 m-0 me-1">Buy {{ $item->discount - 100 }} Get 1</span></p>
							@endif
						</div>
						<h6 class="card-title fw-bold float-end p-2 rounded text-nowrap" style="width: fit-content">Rp {{ $item->discount <= 100 ?  number_format($item->price - ($item->price * $item->discount), 0, ',', '.') :  number_format($item->price, 0, ',', '.')}}</h6>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="text-center mt-4 text-secondary">
		@if ($products->total() <= 0)
		<div class="text-center position-relative">
			<h1 class="display-1"><i class="fa-solid fa-shirt"></i><span class="display-4"><i class="fa-solid fa-ban"></i></span></h1>
			<p class="">Mohon maaf saat ini produk dengan kategori {{ $product_category->name }} sedang kosong</p>
		</div>
		@else
		<p class="m-0">Menampilkan {{ $products->lastItem() }} | {{ $products->total() }}</p>
		@endif
		<p>- - -</p>
	</div>
</div>

{{-- Image Modal --}}
@include('apps.template.image-modal')

@endsection

@section('jsScript')
	<script src="{{ asset('js/img-modal.js') }}"></script>
@endsection