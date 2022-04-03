$(document).ready(function(){

   // Our Auto 
    (function autoSlider(){

        $(".ourSlider .active").each(function(){
            if (!$(this).is(":last-child")){
                $(this).delay(3000).fadeOut(1000, function(){
                    $(this).removeClass("active").next().addClass("active").fadeIn(1000);
                    autoSlider();
                }); 
            }else{
                $(this).delay(3000).fadeOut(1000,function(){
                    $(this).removeClass("active");
                    $(".ourSlider div").eq(0).addClass("active").fadeIn(1000);
                    autoSlider();
                });
            }
        });

    }());
    // Add Class Active to active Link
    $str = window.location.href;
    $str.split('/');
    $array = $str.split('/');
    $x = $array[5];
    $array1 = $x.split('.');
    $class = $array1[0];
    $class = $class;
    $(".nav ." + $class).addClass("actif");

    // View select option 
    $(".choose").children().on("click",function(){
    $($(this).data('class')).slideDown(200).find("select").attr("name","select");
    $($(this).next().data('class')).slideUp(200);
    $($(this).prev().data('class')).slideUp(200);
    });
     
    // Select Cour Or Exam Or TDs From Liste
    $(".choice").click(function() {
       $(this).addClass("now").siblings(".choice").removeClass("now").end().next().slideDown(500)
       .siblings(".info").slideUp(500);
    });
    

     $('.form').find('input, textarea').on('keyup blur focus', function (e) {  
      var $this = $(this),
          label = $this.prev('label');

          if (e.type === 'keyup') {
                if ($this.val() === '') {
              label.removeClass('active highlight');
            } else {
              label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight'); 
                } else {
                label.removeClass('highlight');   
                }   
        } else if (e.type === 'focus') {
          
          if( $this.val() === '' ) {
                label.removeClass('highlight'); 
                } 
          else if( $this.val() !== '' ) {
                label.addClass('highlight');
                }
        }

    });

    $('.tab a').on('click', function (e) {
      
      e.preventDefault();
      
      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');
      
      target = $(this).attr('href');

      $('.tab-content > div').not(target).hide();
      
      $(target).fadeIn(600);
      
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
