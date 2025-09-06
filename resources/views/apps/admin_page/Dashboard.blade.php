@extends('the_she.admin_page.layouts.main-admin')

@section('content')
   <h3 class="">Dashboard</h3>
   <hr>
   <div class="row p-2 gap-4 justify-content-around">
      <div class="col-md-3 col-12 shadow p-4 border-start border-primary border-4 text-primary">
         <div class="row">
         <div class="col-6">
            <h3><i class="fa-solid fa-users"></i></h3>
         </div>
         <div class="col-6"><h3 class="text-end">{{ $users->count() }}</h3></div>
         <div class="col-7"><p class="m-0 mt-3"><b>Data Pelanggan</b></p></div>
         </div>
      </div>
      <div class="col-md-3 col-12 shadow p-4 border-start border-danger border-4 text-danger">
         <div class="row">
         <div class="col-6">
            <h3><i class="fa-solid fa-box-open"></i></h3>
         </div>
         <div class="col-6"><h3 class="text-end">{{ $products->count() }}</h3></div>
         <div class="col-7"><p class="m-0 mt-3"><b>Data Produk</b></p></div>
         </div>
      </div>
      <div class="col-md-3 col-12 shadow p-4 border-start border-warning border-4 text-warning">
         <div class="row">
         <div class="col-6">
            <h3><i class="fa-solid fa-arrows-down-to-line"></i></h3>
         </div>
         <div class="col-6">
            <h3 class="text-end">{{ $orders->count() }}</h3>
         </div>
         <div class="col-7">
            <p class="m-0 mt-3"><b>Data Pesanan</b></p>
         </div>
         </div>
      </div>
   </div>
   <div class="table-responsive mt-5">
      <table class="table table-striped caption-top table-borderless" id="example">
         <div class="d-flex justify-content-between align-items-center mb-3">
               <h4 class="w-100">Pesanan Terbaru</h4>
               <div class="bg-success d-flex rounded align-items-center w-100 outline-hijau overflow-hidden">
                  <form class="d-flex">
                     <div class="text-light px-2"><i class="fa-solid fa-magnifying-glass"></i></div>
                     <input class="input-1 border-success" type="search" placeholder="Search" aria-label="Search" id="myInputTextField" autocomplete="off">
                  </form>
               </div>
         </div>
         <thead class="bg-success text-light">
            <tr>
               <th scope="col" class="text-nowrap">No.</th>
               <th scope="col" class="text-nowrap">Kode Pesanan</th>
               <th scope="col" class="text-nowrap">Pelanggan</th>
               <th scope="col" class="text-nowrap">Produk</th>
               <th scope="col" class="text-nowrap">Status</th>
               <th scope="col" class="text-nowrap">Opsi</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td class="text-nowrap">2123490989</td>
               <td class="text-nowrap">Mark</td>
               <td class="text-nowrap">Suprime</td>
               <td class="text-nowrap text-warning">Dalam Proses</td>
               <td>
                  <div class="d-flex gap-2">
                     <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                     <form action="">
                           <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                  </div>
               </td>
            </tr>
            <tr>
               <th scope="row">2</th>
               <td class="text-nowrap">2123456789</td>
               <td class="text-nowrap">Jacob</td>
               <td class="text-nowrap">Udeng Bali</td>
               <td class="text-nowrap text-warning">Dalam Proses</td>
               <td>
                  <div class="d-flex gap-2">
                     <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                     <form action="">
                           <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                  </div>
               </td>
            </tr>
            <tr>
               <th scope="row">3</th>
               <td >1287892390</td>
               <td class="text-nowrap">Larry the Bird</td>
               <td>Peci</td>
               <td class="text-success">Sudah Sampai</td>
               <td>
                  <div class="d-flex gap-2">
                     <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                     <form action="">
                           <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                  </div>
               </td>
            </tr>
            <tr>
               <th scope="row">4</th>
               <td >1287892390</td>
               <td class="text-nowrap">iluh cantik</td>
               <td>Kaos Couples</td>
               <td class="text-success">Sudah Sampai</td>
               <td>
                  <div class="d-flex gap-2">
                     <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                     <form action="">
                           <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                  </div>
               </td>
            </tr>
            <tr>
               <th scope="row">5</th>
               <td >1287892390</td>
               <td class="text-nowrap">Ninik Arianti</td>
               <td>BRA B3</td>
               <td class="text-warning">Dalam Proses</td>
               <td>
                  <div class="d-flex gap-2">
                     <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                     <form action="">
                           <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                  </div>
               </td>
            </tr>
            <tr>
               <th scope="row">6</th>
               <td class="text-nowrap">2123456789</td>
               <td class="text-nowrap">Jacob</td>
               <td class="text-nowrap">Udeng Bali</td>
               <td class="text-nowrap text-warning">Dalam Proses</td>
               <td>
                  <div class="d-flex gap-2">
                     <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                     <form action="">
                           <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
@endsection