$(document).ready(function () {
   $("body").css("overflowY", "auto");

   $("#img01").click(function (e) { 
      e.preventDefault();
      
      $("#picture-modal-caption").toggle();
      $(".picture-modal-close").toggle();
   })

   $("img.img-card").click(function (e) { 
      e.preventDefault();
      
      $("body").css("overflowY", "hidden");

      $("#myModal").css("display", "flex");
      $("#img01").attr("src", e.target.src);
      $("#picture-modal-caption").html(e.target.alt);
      $("#picture-modal-caption").show();
      $(".picture-modal-close").show();


      $("#myModal").click(function (e) { 
         e.preventDefault();
         
         if(e.target.className != "picture-modal-content" && e.target.id != "picture-modal-caption"){
            $("#myModal").css("display", "none");

            $("body").css("overflowY", "auto");
         }
      });
   });

   
   $("span.picture-modal-close").click(function (e) { 
      e.preventDefault();

      $("body").css("overflowY", "auto");
      
      $("#myModal").css("display", "none");
   });
   
});