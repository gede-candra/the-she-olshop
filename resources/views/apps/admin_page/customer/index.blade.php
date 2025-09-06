@extends('the_she.admin_page.layouts.main-admin')

@section('content')
    @if ( session()->has('sukses') )
    {{-- Alert --}}
    <div class="bg-pemberitahuan">
        <div class="pemberitahuan row align-items-center mt-5 gap-2 gap-md-0">
            <div class="col-md-2 col-12"><i class="fa-solid fa-circle-check sukses-ikon"></i></div>
            <div class="teks-pemberitahuan col-md-9 col-12">
                <span>Sukses</span>
                <span>{{ session('success') }}</span>
            </div>
            <div class="col-md-1 col-12"><button id="btn-okay">OK</button></div>
        </div>
    </div>
    {{-- Alert end --}}
    @endif

    <div class="table-responsive mt-5">
        <table class="table table-striped caption-top table-borderless" id="example">
            <div class="d-flex justify-content-end mb-3">
                <a href="#" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Data</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="w-100">Data Pelanggan</h3>
                <div class="bg-success d-flex rounded align-items-center w-100 outline-hijau overflow-hidden">
                    <form class="d-flex">
                        <div class="text-light px-2"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <input class="input-1 border-success" type="search" placeholder="Search" aria-label="Search"
                            id="myInputTextField" autocomplete="off">
                    </form>
                </div>
            </div>
            <hr>
            <thead class="bg-success text-light">
                <tr>
                    <th scope="col">No.</th>
                    <th class="text-nowrap" scope="col">Nama Pelanggan</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="text-nowrap">{{ $item->name }}</td>
                        <td class="text-nowrap">{{ $item->username }}</td>
                        <td class="text-nowrap">{{ $item->email }}</td>
                        <td class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="#" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Yakin ingin menghapus data {{ $item->name }}')"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
