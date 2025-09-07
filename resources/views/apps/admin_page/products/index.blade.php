@extends('apps.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/img-modal.css') }}">
@endsection
@section('content')
    @if (session()->has('sukses'))
        {{-- Alert --}}
        {{-- <div class="bg-pemberitahuan">
            <div class="pemberitahuan row align-items-center mt-5 gap-2 gap-md-0">
                <div class="col-md-2 col-12"><i class="fa-solid fa-circle-check sukses-ikon"></i></div>
                <div class="teks-pemberitahuan col-md-9 col-12">
                    <span>Sukses</span>
                    <span>{{ session('sukses') }}</span>
                </div>
                <div class="col-md-1 col-12"><button id="btn-okay">OK</button></div>
            </div>
        </div> --}}
        {{-- Alert end --}}
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route("produk.create") }}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Tambah Data</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="w-100">Data Produk</h3>
        <div class="bg-success d-flex rounded align-items-center w-100 outline-hijau overflow-hidden">
            <form class="d-flex w-100 align-items-center">
                <div class="text-light px-2"><i class="fa-solid fa-magnifying-glass"></i></div>
                <input class="input-1 border-success" type="search" placeholder="Search" aria-label="Search"
                    id="myInputTextField" autocomplete="off">
            </form>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped caption-top table-borderless" id="example">
            <thead class="bg-success text-light">
                <tr>
                    <th scope="col" class="text-nowrap">No.</th>
                    <th scope="col" class="text-nowrap">Gambar</th>
                    <th scope="col" class="text-nowrap">Nama Produk</th>
                    <th scope="col" class="text-nowrap">Jenis Produk</th>
                    <th scope="col" class="text-nowrap" style="min-width: 400px">Deskripsi</th>
                    <th scope="col" class="text-nowrap">Harga</th>
                    <th scope="col" class="text-nowrap">Stok</th>
                    <th scope="col" class="text-nowrap">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="text-center"><img class="img-card h-card" src="{{ asset('storage/'.$item->picture) }}" height="60px" alt="{{ $item->product_name }}"></td>
                        <td>{{ $item->name }}</td>
                        <td class="text-nowrap {{ isset($item->productCategory->name) ? '' : 'text-danger' }}">{{ $item->productCategory->name  }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="text-nowrap">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="text-nowrap">{{ $item->stock }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route("produk.edit", $item->slug) }}" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route("produk.destroy", $item->slug) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Image Modal --}}
    @include('apps.template.image-modal')

@endsection
@section('js-asset')
    <script src="{{ asset('js/img-modal.js') }}"></script>
@endsection