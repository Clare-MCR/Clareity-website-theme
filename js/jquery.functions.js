$(document).ready(function() {
	
 
///////// FULL WIDTH BG IMAGE
		var theWindow        = $(window),
			$bg              = $("#bg"),
			aspectRatio      = $bg.width() / $bg.height();
												
		function resizeBg() {				
				if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
					$bg
						.removeClass()
						.addClass('bgheight');
				} else {
					$bg
						.removeClass()
						.addClass('bgwidth');
				}							
		}
												
		theWindow.resize(function() {
				resizeBg();
		}).trigger("resize");
		
///////// FADE IN BG IMAGE
if (!$.browser.msie){
	$("#bg").bind("load", function () { $(this).fadeIn(2000); });
}
		
///////// FUNTION FOR MENU
	$('.nav li ul').css({display: "none"}); 
	$('.nav li').hover(function(){
		$(this).find('ul:first').css({visibility: "visible", display: "none"}).fadeIn('normal');
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
		
///////// LOGO HOVER
	$(".logo-link img").hover(
		function() {
			$(this).stop().animate({"opacity": ".8"}, "slow");
		},
		function() {
			$(this).stop().animate({"opacity": "1"}, "slow");
	});
	
///////// IE NAV LAST CHILD FIX	
		$('.nav ul li:last-child').css('border-bottom', 'none');
		$('.footer-col ul li:last-child').css('border-bottom', 'none');		
	
///////// POST IMG HOVER
	$('a.post-thumb').hover(function() {
			$(this).find('.post-thumb-hover').stop('true','true').fadeIn("normal");
		}, function(){
			$(this).find('.post-thumb-hover').stop('true','true').fadeOut("normal");
		});

///////// PORTFOLIO IMG HOVER
	$(".port-thumb-hover").css("display", "none"); 
	$(".gallery-btn-container").css("display", "none"); 
	$('.port-thumb').hover(function() {
			$(this).find('.port-thumb-hover').stop().fadeIn("normal");
			$(this).find('.gallery-btn-container').stop().fadeIn("normal");
		}, function(){
			$(this).find('.port-thumb-hover').stop('true','false').fadeOut("normal");
        	$(this).find('.gallery-btn-container').stop('true','false').fadeOut("normal");
		});
	
///////// NEXT / PREV Hover
	if (!$.browser.msie){
	$('.older-posts a').hover(function() {
			$(this).animate({"background-position": "-=10px"}, "slow");
		}, function(){
			$(this).animate({"background-position": "+=10px"}, "slow");
		});
	$('.newer-posts a').hover(function() {
			$(this).animate({"background-position": "+=10px"}, "slow");
		}, function(){
			$(this).animate({"background-position": "-=10px"}, "slow");
		});}
	
///////// FOR TOP BANNER SLIDE DOWN
$('#open-banner').click(function() {
		$('.top-banner').stop('true','true').animate({ top: '0px'}, 400);
		$(this).hide();
		$('#close-banner').show();
	});
$('#close-banner').click(function() {
		$('.top-banner').stop('true','true').animate({ top: '-175px'}, 400);
		$(this).hide();
		$('#open-banner').show();
	});
	
///////// FOR ALTERNATING GALLERY IMAGES
	$(".gallery-container-2col div:even").addClass("columns-2");
	$(".gallery-container-3col a:nth-child(3n+2)").addClass("columns-3");
	$(".gallery-container-4col a:nth-child(4n+2)").addClass("columns-4a");
	$(".gallery-container-4col a:nth-child(4n+3)").addClass("columns-4b");
	
///////// FOR BACK TO TOP	
	$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});
		
});