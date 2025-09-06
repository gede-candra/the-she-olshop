window.onload=function(){
   const bg_pemberitahuan = document.querySelector('.bg-pemberitahuan')
   const pemberitahuan = document.querySelector('.pemberitahuan')
   const btn_okay = document.getElementById('btn-okay')

   setTimeout(() => {
     pemberitahuan.style.transform = 'translateY(0px)'
   }, 70)

   btn_okay.addEventListener("click", function(){
     pemberitahuan.style.transform = 'translateY(-250px)'
      setTimeout(() => {
        bg_pemberitahuan.classList.add('d-none')
        document.body.style.overflowY = 'auto'
      }, 200);
   })
 }