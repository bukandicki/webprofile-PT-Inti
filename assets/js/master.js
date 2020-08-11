$(document).ready(function () {
	$(".landing-slider").slick({
		arrows: true,
	    draggable: false,
	    pauseOnHover: false,
	    pauseOnFocus: false,
	    responsive: [
    {
      breakpoint: 1024,
      settings: {
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        arrows: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        autoplay: true,
        draggable: true
      }
    }
  ]
	});

// $('.content-performance').slick({
// 	  centerMode: true,
// 	  centerPadding: '60px',
// 	  draggable: false,
// 	  dots: true,
// 	  slidesToShow: 3,
// 	  responsive: [
// 	    {
// 	      breakpoint: 768,
// 	      settings: {
// 	        arrows: false,
// 	        centerMode: true,
// 	        centerPadding: '40px',
// 	        slidesToShow: 3
// 	      }
// 	    },
// 	    {
// 	      breakpoint: 480,
// 	      settings: {
// 	        arrows: false,
// 	        centerMode: true,
// 	        centerPadding: '40px',
// 	        slidesToShow: 1
// 	      }
// 	    }
// 	  ]
// 	});

	$('.bars-admin').on('click', function () {
		$(".sidebar_left_admin").css("left","0%");
		$(".sidebar_right_admin").css("left","20%");
	});

	$(document).click(function(event) {
		  if (!$(event.target).closest(".sidebar_left_admin,.bars-admin").length) {
		    $("body").find('.sidebar_left_admin').css("left","-20%");
			$(".sidebar_right_admin").css("left","0%");
		  }
	});

	$('#show-hidding-menu').on('click', function () {
		if ($(this).data('clicked',true)) {
			$('.hidding-nav').css("top","0");
			$('.hidding-nav').css("visibility","visible");
		}else {
			$('.hidding-nav').css("top","-100%");
		}
	});

	$(document).click(function(event) {
		  if (!$(event.target).closest(".hidding-nav,#show-hidding-menu").length) {
		    $("body").find('.hidding-nav').css("top","-100%");
		  }
		});

	$(document).on('click', 'a[href^="#"]', function (event) {
	    event.preventDefault();

	    $('html, body').animate({
	        scrollTop: $($.attr(this, 'href')).offset().top
	    }, 950);
  	});

		var sebelumDiScroll = 0;
		headernya = $("#landing-header");
		headerOffset = headernya.offset().top;
		$(window).scroll(function() {
		    var scrollSaatIni = $(this).scrollTop();
		    if(scrollSaatIni > headerOffset) {
		        if (scrollSaatIni > sebelumDiScroll) {
		            headernya.removeClass("fixed animated slideInDown");
		            headernya.addClass("fixed animated slideOutUp");
		        } else {
		            headernya.removeClass("fixed animated slideOutUp");
		            headernya.addClass("fixed animated slideInDown");
		            headernya.css("background-color","rgba(0, 0, 0, .8)");
		        }
		    } else {
		         	headernya.removeClass('fixed');   
		            headernya.css("background-color","transparent");
		    }
		    sebelumDiScroll = scrollSaatIni;
		});

		$("#show-modal,#show-modal-hiding").click(function(){
  			$(".modal-wrap").addClass("visible");
			$(".modal-content").addClass("animated slideInDown");
			$("#username-modal").focus();
		});

		$("#close-modal").click(function(){
		  	$(".modal-wrap").removeClass("visible");
		});

		$(document).click(function(event) {
		  if (!$(event.target).closest(".modal-content,#show-modal,#show-modal-hiding").length) {
		    $("body").find(".modal-wrap").removeClass("visible");
			$(".modal-content").removeClass("animated slideInDown");
		  }
		});

		$(".active").mouseenter(function() {
    		$(this).css("box-shadow","5em 0 0 0 #2196f3 inset");
  		});
  		$(".active").mouseleave(function() {
    		$(this).css("box-shadow","-5em 0 0 0 #2196f3 inset");
    		$(this).css("color","#ffffff");
  		});

//   		$(function() {

//     var $el, leftPos, newWidth,
//         $mainNav = $("#example-one");
    
//     $mainNav.append("<li id='magic-line'></li>");
//     var $magicLine = $("#magic-line");
    
//     $magicLine
//         .width($(".current-page-item").width())
//         .css("left", $(".current-page-item a").position().left)
//         .data("origLeft", $magicLine.position().left)
//         .data("origWidth", $magicLine.width());
        
//     $("#example-one li a:not(.active)").hover(function() {
//         $el = $(this);
//         leftPos = $el.position().left;
//         newWidth = $el.parent().width();
//         $magicLine.stop().animate({
//             left: leftPos,
//             width: newWidth
//         })
//     }, function() {
//         $magicLine.stop().animate({
//             left: $magicLine.data("origLeft"),
//             width: $magicLine.data("origWidth")
//         });    
//     });
// });


  $("#author").on("click", function () {
  	$("#about").css("left","-100%");
  	$("#author-page").css("right","0%");
  });

  $(document).click(function(event) {
		  if (!$(event.target).closest("#author-page,#author").length) {
		    $("body").find("#author-page").css("right","-100%");
		    $("body").find("#about").css("left","0%");
		  }
		});

});