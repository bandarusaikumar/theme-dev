jQuery(function($){
	"use strict";
	var on_touch = !$('body').hasClass('ts_desktop');
	
	/*** Product Video ***/
	$('a.ts-product-video-button').on('click', function(e){
		e.preventDefault();
		var product_id = $(this).data('product_id');
		var container = $('#ts-product-video-modal');
		if( container.find('.product-video-content').html() ){
			container.addClass('show');
		}
		else{
			container.addClass('loading');
			$.ajax({
				type : 'POST'
				,url : emall_params.ajax_url
				,data : {action : 'emall_load_product_video', product_id: product_id, security: emall_params.product_video_nonce}
				,success : function(response){
					container.find('.product-video-content').html( response );
					container.removeClass('loading').addClass('show');
				}
			});
		}
	});
	
	/*** Product 360 ***/
	if( typeof $.fn.ThreeSixty == 'function' ){
		if( $('.ts-product-360-button').length == 0 ){
			setTimeout(function(){
				generate_product_360();
			}, 1000);
		}
		
		$('.ts-product-360-button').on('click', function(){
			$('#ts-product-360-modal').addClass('loading');
			generate_product_360();
			return false;
		});
	}
	
	function generate_product_360(){
		if( !$('.ts-product-360').hasClass('loaded') ){
			$('.ts-product-360').ThreeSixty({
				currentFrame: 1
				,imgList: '.threesixty_images'
				,imgArray: _ts_product_360_image_array
				,totalFrames: _ts_product_360_image_array.length
				,endFrame: _ts_product_360_image_array.length
				,progress: '.spinner'
				,navigation: true
				,responsive: true
				,onReady: function(){
					$('#ts-product-360-modal').removeClass('loading').addClass('show');
					$('.ts-product-360').addClass('loaded');
				}
			});
		}
		else{
			$('#ts-product-360-modal').removeClass('loading').addClass('show');
		}
	}
	
	/*** Size Chart ***/
	$('.ts-product-size-chart-button').on('click', function(e){
		e.preventDefault();
		$('#ts-product-size-chart-modal').addClass('show');
	});

	/*** Show more/less product content ***/
	if( $('.single-product .more-less-buttons').length ){
		setTimeout(function(){
			var product_content = $('.single-product .more-less-buttons').siblings('.product-content');
			if( product_content.outerHeight() < 520 ){
				$('.single-product .more-less-buttons').remove();
				product_content.removeClass('closed show-more-less');
			}
			else{
				var timeout = 200 + ( product_content.find('img').length * 200 );
				setTimeout(function(){
					var scrollheight = product_content.get(0).scrollHeight;
					var speed = scrollheight / 1500;
					var style = '<style>'
								+ '.product-content.show-more-less{transition:'+speed+'s ease;}'
								+ '.product-content.opened{max-height:'+scrollheight+'px;}'
								+ '</style>';
					$('head').append( style );
				}, timeout);
			}
		}, 10);
	}
	
	$('.single-product .more-less-buttons a').on('click', function(e){
		e.preventDefault();
		$(this).hide();
		$(this).siblings('a').show();
		var action = $(this).data('action');
		$(this).parent().siblings('.product-content').removeClass('opened closed').addClass(action);
		
		if( action == 'closed' ){
			var top = $(this).parents('.woocommerce-tabs').offset().top - get_fixed_header_height() - 10;
			$('body, html').animate({
				scrollTop: top
			}, 1000);
		}
	});

	function get_fixed_header_height(){
		var admin_bar_height = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
		var sticky_height = $('.header-sticky.is-sticky').length ? $('.header-sticky.is-sticky').outerHeight() : 0;
		return admin_bar_height + sticky_height;
	}
	
	/*** Tabs Accordion ***/
	if( $('.product.tabs-accordion').length ){
		$('.woocommerce-Tabs-panel > h2, .woocommerce-Tabs-panel #reviews > h2').on('click', function(){
			$(this).toggleClass('active');
			$(this).siblings().toggleClass('active');
		});
	}
});