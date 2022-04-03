$(document).ready(function(){

	"use strict";


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
    
    // Text iditor
var content_row = 1;

function addContent() {
  html = '<div id="content-row">';
  html += '<div class="form-group">';
  html += '<label class="col-sm-2">Page Content</label>';
  html += '<div class="col-sm-10">';
  html += '<textarea class="form-control" id="code_preview' + content_row + '" name="page_code[' + content_row + '][code]" style="height: 300px;"></textarea>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  $('#content-row').append(html);
  $('#code_preview' + content_row).summernote({height: 300});

  content_row++;
}
    // Trigger Nice Scroll
    $('html').niceScroll({
        cursorcolor :'#34495E',
        cursorwidth: '8px',
        cursorborder: 'none',
        cursorborderraidus: '10%',
    });
    // Dashboard   
    $(".toggle-info").click(function(){
    	$(this).toggleClass("selected").parent().next(".panel-body").fadeToggle(800);
    	if ($(this).hasClass("selected")){
    		$(this).html("<i class='fa fa-minus fa-lg'></i>");
    		console.log("salma");
    	}else{
    		$(this).html("<i class='fa fa-plus fa-lg'></i>");
    	}
    });

    // Textarea max lenght message
    var maxText = $("#area").attr("maxlength");
   
    $('.message').html('<span>' + maxText + '</span> characters remaining'); 
    
    $("#area").keyup(function (){
        var textLength = $(this).val().length,
            rem = maxText - textLength;
         
        $('.message').html('<span>' + rem + '</span> characters remaining');  
    });

    // Upload File Validation
    $("#upload").click(function(){
    	var file_name = $("#image").val();
    	if (file_name == ""){
    		alert("Please Select File");
    		return;
    	}else{
    		var extention = $("#image").val().split(".").pop().toLowerCase();
    		if (jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1){
    			alert('Invalid Image File');
    			$("#image").val();
    			return false;
    		}
    	}
    });

    // Live Record Function
    $('.live').keyup(function(){
      $($(this).data('class')).text($(this).val());
        var src = "images/"+$("#image").val();
        if (src == ''){
        	$(".img").attr("src", src);
        }
    });

	// Hide placeholder on form focus
	$("[placeholder]").focus(function(){
		$(this).attr("data-text", $(this).attr("placeholder"));
		$(this).attr("placeholder", "");
	}).blur(function(){
		$(this).attr("placeholder", $(this).attr("data-text"));
	});

	// 	Add Asterisk on required field
	$('input').each(function(){
		if ($(this).attr('required') === 'required'){
			$(this).after('<span class="asterisk">*</span>');
			
		}
	});

	// Convert Password filed to text field on hover
	var passfield = $(".password");
	$(".show-pass").hover(function(){
         passfield.attr('type', 'text');
	}, function(){
         passfield.attr('type', 'password');
	});

	// Confirmation Message On Button
	$(".confirm").click(function(){
         return confirm("Are You Sure ?");
	});

	// Categorie View Option
	$(".cat h3").click(function(){
		$(this).next(".full-view").fadeToggle(200);
	});
	$(".ordering span").click(function(){
		$(this).addClass("active").siblings("span").removeClass("active");
		if ($(this).data("view") === "full"){
		   $(".cat .full-view").fadeIn(200);
		}else{
			$(".cat .full-view").fadeOut(200);
		}
	});

    // View select option 
    $(".choose").children().on("click",function(){
    $($(this).data('class')).slideDown(200).find("select").attr("name","select");
    $($(this).nextAll().data('class')).slideUp(200);
    $($(this).prevAll().data('class')).slideUp(200);
    });
}); 