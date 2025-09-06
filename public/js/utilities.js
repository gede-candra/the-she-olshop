// Size and Margin Content 
var resize = function () {
   $(".margin-content").css({ marginTop : $("nav").height() + 30 + 'px'});
   
   if (($("body").height() + $("footer").height()) >= $(window).height()) {
      $("footer").css("position", "relative");
   } else{
      $("footer").css("position", "absolute");
   }

   if ($(window).width() < 300) {
        $(".jumbotron-column").addClass("col-12");
        $(".jumbotron-column").removeClass("col-6");
    } else{
       $(".jumbotron-column").removeClass("col-12");
       $(".jumbotron-column").addClass("col-6");
   }
}

$(document).ready(resize);
$(window).on("load resize", resize)