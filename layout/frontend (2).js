var panelWidth = 0;
var startPanel = 2;
$(document).ready(function(){


    // Carousel Interval
    $(".carousel").carousel({
        interval:5000
    });
    
    // Course's page
     
    
   $(".item").click(function() {
                    $(this).addClass("active").siblings(".item").removeClass("active").end().next().slideDown(500)
        .siblings(".info").slideUp(500);

   });
    

       //  Navbar animation
       var cpi = $(".cpi"),
        cs = $(".cs"),
        acceuil = $(".acceuil");
   $(".btn1").click(function(){
       $(this).slideUp(400).prev().slideUp(400).nextAll(".sign").slideDown(400);
       cs.find(".over-lay2").css("backgroundColor" , "rgba(2,2,2,.7");
       cpi.addClass("active");
       if (cs.hasClass("active")){          
       cs.removeClass("active");
       cs.children(".sign").slideUp(400).end()
       .children("h2").slideDown(400).end()
       .find(".over-lay2").css("backgroundColor" ,"rgba(2,2,2,.3").end()
       .prevAll(".cpi").find(".over-lay1").css("backgroundColor" , "rgba(2,2,2,.3");
       $(".btn2").slideDown(400);
    }
       
       

   });

   $(".btn2").click(function(){
       $(this).slideUp(400).prev().slideUp(400).nextAll(".sign").slideDown(400);
       cpi.find(".over-lay1").css("backgroundColor" , "rgba(2,2,2,.7");
       cs.addClass("active");
       if (cpi.hasClass("active")){
       cpi.removeClass("active");
       cpi.children(".sign").slideUp(400).end()
       .children("h2").slideDown(400).end()
       .find(".over-lay1").css("backgroundColor" ,"rgba(2,2,2,.3").end()
       .nextAll(".cs").find(".over-lay2").css("backgroundColor" , "rgba(2,2,2,.3");
       $(".btn1").slideDown(400);
       }

   });

   acceuil.click(function(){

    if (cs.hasClass("active")){
            
            cs.removeClass("active");
            cs.children(".sign").slideUp(400).end()
            .children("h2").slideDown(400).end()
            .find(".over-lay2").css("backgroundColor" ,"rgba(2,2,2,.3").end()
            .prevAll(".cpi").find(".over-lay1").css("backgroundColor" , "rgba(2,2,2,.3");
            $(".btn2").slideDown(400);
    }
    if (cpi.hasClass("active")){
            
            cpi.removeClass("active");
            cpi.children(".sign").slideUp(400).end()
            .children("h2").slideDown(400).end()
            .find(".over-lay1").css("backgroundColor" ,"rgba(2,2,2,.3").end()
            .nextAll(".cs").find(".over-lay2").css("backgroundColor" , "rgba(2,2,2,.3");
            $(".btn1").slideDown(400);

    }
   });

   // Login Show
   $(".connexion").click(function(){
        $(".header").fadeIn(1200);
   });

   // Search Button
    $(".search1").click(function(){
      'use strict'
      $("section").css('filter','blur(10px)');
      $(".search").fadeIn(500);
    
    });
    
    $(".search").not($(".form-wrapper")).click(function(){
       $(".search").fadeOut(200);
       $("section").css('filter','blur(0px)');

    });


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
        cursorborderradius: '10%',
    });

   // Login Hide
   $(".fa-caret-up").click(function(){
     $(".header").slideUp(500);
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

    // Footer z-index
     $(window).scroll(function(){
      "use strict";
      
       if ($(window).scrollTop() > $(".subcribe").offset().top + 100){
          $(".footer").css("zIndex", "10");
       }else{
        $(".footer").css("zIndex", "-9999");
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

    console.log($(".stat").offset().top);
    $(window).scroll(function(){
      "use strict"
        if ($(window).scrollTop() >= $(".stat").offset().top - 100){
                  var i = 0;
         var j = 0;

         var ourCont = setInterval(function(){

        var counter = parseInt($('.count').html()); 
        var counter2 = parseInt($('.count').html()); 
        var visite  = 5872;
        var count1 = visite / 100;
        var reste = visite - count1*100;
        
       console.log(count1);
       console.log(reste);
        if ( i< count1 || j < reste){
            
            $('.count').html(i + 1 + "," +  j + 1);
            i = i + 1;
            j = j +1;
        

        } else{
            $('.count').html("59,581");
            clearInterval(ourCont);
        }
 
    },40); 
    }else{
         $('.count').html("00,000");
    }
    });
    
     // Trigger MixItUp
    $('#container').mixItUp();

    $('.shuffle li').click(function(){
        $(this).addClass("selected").siblings().removeClass('selected');
    });
// enseignant
	/* progressive enhancement */
	$('.sp .tabs').css('display','block');
	$('.sp .panel_container .panel').css({'position':'absolute', 'height':'400px'});
	$('.sp .panel_container .panels').css({'position':'absolute', 'top':'0px'});
	
	window.panelWidth = $('.sp').width();	
	
	/* Position the panels */
	$('.panel_container .panel').each(function(index){
		$(this).css({'width':window.panelWidth+'px','left':(index*window.panelWidth)});
		$('.sp .panels').css('width',(index+1)*window.panelWidth+'px');
	});
	
	/* Add click events to tabs */
	$('.sp .tabs span').each(function(){
		$(this).on('click', function(){
			changePanels( $(this).index() );
		});
	});

	/* Trigger the starting panel */
	$('.sp .tabs span:nth-child('+window.startPanel+')').trigger('click');
	
	   "use strict"; 

   $("#tabs li").click(function (){

   	     // Get the clicked ID and cache in im my ID varaible
         var myId = $(this).attr('id');

         $(this).removeClass("inactive").siblings().addClass("inactive");
         $(".cont div").hide();

         $("#"+ myId + "-contains").slideDown(200);
   });
    
});

function changePanels(newIndex){
	
	var newPanelPosition = ( window.panelWidth * newIndex ) * -1;
	var newPanelHeight = $('.sp .panel:nth-child('+(newIndex+1)+')').find('.panel_content').height() + 15;

	$('.sp .tabs span').removeClass('selected');
	$('.sp .tabs span:nth-child('+(newIndex+1)+')').addClass('selected');

	$('.sp .panels').animate({left:newPanelPosition},0);
	$('.sp .panel_container').animate({height:newPanelHeight},0);

}
