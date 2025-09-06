{{-- Cart --}}
<div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title text-success" id="CartLabel"><i class="fa-solid fa-cart-shopping me-1"></i> Keranjang Belanja</h5>
         <button type="button" class="btn border-0 text-success p-0" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark fs-5"></i></button>
       </div>
       <div class="modal-body">
         <div class="text-center text-success">
           <img class="w-50" src="{{ asset('img/cart-empty-secondary.png') }}" alt="">
           <h2 class="fs-4 ">Yah Keranjang Belanjamu Kosong!</h2>
           <p class="text-secondary">Silakan menuju ke beranda untuk membeli busana yang kamu suka.</p>
         </div>
       </div>
     </div>
   </div>
 </div>