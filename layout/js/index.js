$(document).ready(function(){


	 // Navbar options 
    $(window).scroll(function(){
         if($(window).scrollTop() >= 40){
            $(".navbar").css("backgroundColor","#fff");
         }else{
            $(".navbar").css({
                backgroundColor : "rgba(52, 73, 94, .0)",
            });
         }
    });

    // Trigger Nice Scroll
    $('html').niceScroll({
        cursorcolor :'#34495E',
        cursorwidth: '8px',
        cursorborder: 'none',
        cursorborderraidus: '10%',
    });

      // Footer z-index
     $(window).scroll(function(){
      "use strict";
      
       if ($(window).scrollTop() > $(".sponsors").offset().top + 100){
          $(".footer").css("zIndex", "999");
       }else{
        $(".footer").css("zIndex", "-10");
       }
     });  

    // Search Button
    $(".search1").click(function(){
      'use strict'
      $("section").css("filter", "blur(5px)");
      $(".search").fadeIn(500);
    
    });
    $(".search").dblclick(function(){
       $(".search").fadeOut(200);
       $("section").css("filter", "blur(0px)");

    });

    // Scroll Button
    var toTop = $("#top");
    toTop.click(function(){
      "use strict"
      $("html,body").animate({scrollTop:0},800);
    });
    $(window).scroll(function(){
      "use strict"
       if($(this).scrollTop() >= 800){
            toTop.show(1000);
      }else{
            toTop.hide(800);
         }
    });


   // Animate 
   var image = $(".image");
   image.hover
   (
    function(){
       $(this).find(".image-over").fadeIn(200);
    },
        function(){
        $(this).find(".image-over").fadeOut(200);
    }
    )

   $(".carousel-control").click(function(){
      $(".item").toggleClass("wow bounceInLeft");
   });
   
    // Teaches Section
    $(".person").mouseenter(function(){
        $(this).find(".follow").slideDown(200);
    });
    $(".person").mouseleave(function(){
        $(this).find(".follow").slideUp(200);
    });
    $(".person").mouseenter(function(){
        $(this).find(".follow").slideDown(200);
    });
    $(".person").mouseleave(function(){
        $(this).find(".follow").slideUp(200);
    });


});