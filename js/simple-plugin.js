/*
 *  Project: S Gallery 
 *  Description: Responsive jQuery Gallery Plugin with CSS3 Animations inspired by 
 *  Author mail : ral.sust@hotmail.com
 *  Author: Robiul Awal
 *  License: Creative-Commons Attribution Non-Commercial

 Customized: added number of image, for added captions in the HTML, these are hidden while image resizes
 */
(function( $ ) {
$.fn.simple_gallery = function s_gallery(){

$('.items_small>li>a').bind( "click", function(e) {

		e.preventDefault();
         //image_length= $('.items_small>li').size();
		var image_href = $(this).attr("href");
		var image_capture1 =$(this).parents().children(".simple_capture").text();
			 i = $(this).parents().index()-1;
			 j = $(this).parents().index()+1;
			 image_prev = $('.items_small>li>a:eq( '+i+' )').attr("href");
			 image_next = $('.items_small>li>a:eq( '+j+' )').attr("href");		
		
			$('#lightbox').show();
			
			$("#gallery_prev").attr("href",image_prev);
			$("#gallery_next").attr("href",image_next);
			$('#lightbox img, .simple_display_capture').hide();
		var lightbox = '<img src="' + image_href +'" class="gallery_iamge" /> <p class="simple_display_capture tex">'+image_capture1+' </p>';
		   $('#lightbox_content').append(lightbox);    
		});
		
$('#gallery_prev').bind( "click", function(e) {

		e.preventDefault();

		 image_prev = $('.items_small>li>a:eq( '+i+' )').attr("href");
		 image_next = $('.items_small>li>a:eq( '+j+' )').attr("href");
		 image_capture2 = $('.items_small>li:eq( '+i+' ) .simple_capture').text();
		 
			$("#gallery_prev").attr("href",image_prev);
			$("#gallery_next").attr("href",image_next);
			i--;
			j--;
			
		var image_prev_href = $(this).attr("href");
		

		$('#lightbox img, .simple_display_capture').hide();
				var lightboxprev = '<img src="' + image_prev_href +'" class="gallery_iamge" /> <p class="simple_display_capture"> '+image_capture2+'</p>';
				   $('#lightbox_content').append(lightboxprev);
				   
				   if (i<0){$("#gallery_prev").hide();}
				   if ( j < $('.items_small>li').size()){$("#gallery_next").show();}
		});
		
$('#gallery_next').bind( "click", function(e) {

		e.preventDefault();

		 image_prev = $('.items_small>li>a:eq( '+i+' )').attr("href");
		 image_next = $('.items_small>li>a:eq( '+j+' )').attr("href");
		 image_capture3 = $('.items_small>li:eq( '+j+' ) .simple_capture').text();
		 $("#gallery_prev").attr("href",image_prev);
		 $("#gallery_next").attr("href",image_next);
		i++;
		j++;
		 
		var image_next_href = $(this).attr("href");
		//var image_capture3 =$(this).parents().children(".simple_capture").text();
		$('#lightbox img, .simple_display_capture').hide();
				var lightboxnext = '<img src="' + image_next_href +'" class="gallery_iamge" /> <p class="simple_display_capture">'+image_capture3+' </p>';
				   $('#lightbox_content').append(lightboxnext);

				  if ( j > $('.items_small>li').size()-1){$("#gallery_next").hide();}
				  if (i>-1){$("#gallery_prev").show();}
		});		
		  $('.close_button').bind( "click", function(e) {
		  e.preventDefault();
		  $('#lightbox').hide();
		   });
}
}( jQuery ));