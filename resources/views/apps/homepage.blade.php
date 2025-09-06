@extends('apps.layouts.main')

@section('homeTitle', ' - '.ucwords('is a place to buy clothes online'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/img-modal.css') }}">
<style>
	.skeleton {
		background: #eee;
	}
	
	.h-card{
		height: 150px;
	}
	.hw-card-news{
		height: 400px;
		min-width: 100%;
	}
	.h-300{
		height: 300px;
	}
	.
	
	/* Card Slider */
	.product-title a{
		color: #666;
		background-color: #000 !important;
	}

	/* Card Slider - Ellipse Text */
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
		margin: 10px;
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
	.btn-border-success a{
		color: #198754c5;
	}

	/* Jumbotron */
	.jumbotron .btn-border-success .border-img{
		border-radius: 20px;
		transition: 0.5s ease-in-out;
		cursor: pointer;
	}
	.jumbotron .btn-border-success .border-img:hover{
		opacity: 0.5;
	}
	.jumbotron .btn-border-success .click-cart{
		background-color: #fff;
		box-shadow: 0 2px 10px #1987545e;
		border-radius: 40px;
		padding: 5px 10px;
		color: #198754;
		top: 0;
		right: 0;
		margin-top: -10px;
		margin-right: 10px;
	}
	.jumbotron .btn-border-success .product-info{
		border-radius: 20px 20px 0 0;
	}
	.jumbotron .btn-border-success h6{
		margin-right: 20px;
	}
	.jumbotron .btn-border-success:hover h6{
		margin-right: 0px;
	}
</style>
@endsection

@section('content')
{{-- Carousel / Slider --}}
<div id="event-banner" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner shadow">
		<div class="carousel-item active" data-bs-interval="5000">
			<img src="/img/Banner1.jpg" class="d-block w-100 h-slider skeleton" alt="...">
		</div>
		<div class="carousel-item" data-bs-interval="5000">
			<img src="/img/Banner2.jpg" class="d-block w-100 h-slider skeleton" alt="...">
		</div>
		<div class="carousel-item" data-bs-interval="5000">
			<img src="/img/Banner3.jpg" class="d-block w-100 h-slider skeleton" alt="...">
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#event-banner" data-bs-slide="prev">
		<span class="carousel-control-prev-icon bg-secondary rounded-circle" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#event-banner" data-bs-slide="next">
		<span class="carousel-control-next-icon bg-secondary rounded-circle" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>

{{-- Recommendation Card --}}
<div class="mt-5">
	<div class="d-md-flex justify-content-between align-items-center mb-3">
		<h4 class="m-0">Rekomendasi Busana</h4>
		<a href="#" class="text-decoration-none text-success">Lihat rekomendasi busana lainnya <i class="fa-solid fa-angle-right text-sm"></i></a>
	</div>
	<div class="owl-carousel owl-theme">
		@foreach ($rec_products as $item)
			<div class="btn-border-success h-300">
				<img src="{{ asset('storage/'.$item->picture) }}" class="img-card h-card" alt="{{ $item->name }}">
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
		@endforeach
	</div>
</div>

{{-- New Products Jumbotron --}}
<div class="mt-5 jumbotron">
	<h4>Penjualan Terbaik</h4>
	<div class="row g-sm-5 g-md-4">
		@foreach ($best_seller as $item)
		<div class="col-sm-6 col-md-3">
			<div class="btn-border-success position-relative overflow-hidden">
				<img src="{{ asset('storage/'.$item->picture) }}" class="img-card hw-card-news border-img skeleton" alt="{{ $item->name }}">
				<div class="product-info position-absolute bottom-0 w-100 bg-white py-2">
					<button class="click-cart border-0 position-absolute skeleton"><i class="fa-solid fa-cart-plus"></i></button>
					<div class="px-2 product-title">
						<a href="{{ route('product-detail', ['categorySlug'=>$item->productCategory->slug, 'slug'=>$item->slug]) }}" class="text-decoration-none"><p class="text-start skeleton">{{ $item->name }}</p></a>
					</div>
					<div class="w-100 px-2">
						<div class="d-flex flex-column">
							<p class="text-start text-secondary m-0 skeleton" style="font-size: 14px;"><i class="fa-solid fa-hand-holding-dollar text-warning"></i> {{ $item->users->count() }} Terjual</p>
							@if ($item->discount > 0 && $item->discount <= 100)
							<p class="text-start m-0 skeleton"><span class="alert alert-success opacity-70 py-0 px-1 m-0 me-1">{{ $item->discount * 100 }}%</span> <span class="m-0 text-decoration-line-through text-secondary">Rp {{ number_format($item->price, 0, ',', '.') }}</span></p>
							@elseif ($item->discount > 100)
							<p class="text-start m-0 skeleton"><span class="alert alert-danger opacity-70 py-0 px-1 m-0 me-1">Buy {{ $item->discount - 100 }} Get 1</span></p>
							@endif
						</div>
						<h6 class="card-title fw-bold float-end p-2 rounded text-nowrap" style="width: fit-content">Rp {{ $item->discount <= 100 ?  number_format($item->price - ($item->price * $item->discount), 0, ',', '.') :  number_format($item->price, 0, ',', '.')}}</h6>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

{{-- Image Modal --}}
@include('apps.template.image-modal')

@endsection

@section('jsScript')
	<script src="{{ asset('js/img-modal.js') }}"></script>

	{{-- owl carousel --}}
	<script src="{{ asset('tools/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/owlcarousel_opt.js') }}"></script>
	<script>
		$(window).on('load', function () {
			$('.skeleton').removeClass('skeleton');
		});
	</script>
@endsection