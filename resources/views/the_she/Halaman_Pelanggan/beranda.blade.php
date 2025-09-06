@extends('the_she/Halaman_Pelanggan/layouts/main')

@section('title', 'Temukan Cinta dalam Setiap Koleksi')

@section('halaman_depan')
{{-- Carousel / Slider --}}
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>
	<div class="carousel-inner">
	<div class="carousel-item active" data-bs-interval="5000">
		<img src="/img/Banner1.jpg" class="d-block w-100 h-slider" alt="...">
		<div class="carousel-caption d-none d-md-block">
			<h5>First slide label</h5>
			<p>Some representative placeholder content for the first slide.</p>
		</div>
	</div>
	<div class="carousel-item" data-bs-interval="5000">
		<img src="/img/Banner2.jpg" class="d-block w-100 h-slider" alt="...">
		<div class="carousel-caption d-none d-md-block">
			<h5>Second slide label</h5>
			<p>Some representative placeholder content for the second slide.</p>
		</div>
	</div>
	<div class="carousel-item" data-bs-interval="5000">
		<img src="/img/Banner3.jpg" class="d-block w-100 h-slider" alt="...">
		<div class="carousel-caption d-none d-md-block">
			<h5>Third slide label</h5>
			<p>Some representative placeholder content for the third slide.</p>
		</div>
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

{{-- Card  --}}
<div class="row row-cols-1 row-cols-md-2 g-5 mt-4">
	@foreach ($produks as $tampilkan)
	<div class="col-6 col-md-4 col-lg-3">
		<div class="card h-100">
			<img src="/img/Gambar1.jpg" class="card-img-top h-responsive" alt="...">
			<div class="card-body">
				<h5 class="card-title">{{ $tampilkan->nama_produk }}</h5>
				<p class="card-text">{{ $tampilkan->jenis_produks->title }}</p>
			</div>
			<div class="d-flex justify-content-end gap-2 p-2">
				<button class="btn btn-outline-success w-px-40 "><i class="fa-solid fa-cart-plus"></i></button>
				<button class="btn btn-outline-primary w-px-40 "><i class="fa-solid fa-circle-info"></i></button>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection