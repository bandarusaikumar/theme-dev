jQuery(function($){
	/* Location hash */
	function set_location_hash( hash ){
		var is_http = true;
		if( typeof location.protocol != undefined ){
			if( location.protocol == 'file:' ){
				is_http = false;
			}
		}
		if( hash && hash != '#' && is_http ){
			if( history.pushState ){
				history.pushState(null, null, '#' + hash);
			}
			else{
				location.hash = hash;
			}
		}
	}
	
	function get_location_hash(){
		if( location.hash ){
			return location.hash.replace('#', '');
		}
		return '';
	}
	
	function remove_location_hash(){
		if( history.pushState && location.protocol != 'file:' ){
			history.pushState(null, null, window.location.pathname);
		}
		else{
			location.hash = '';
		}
	}
	
	function run_lazyload(){
		$('section img:not(.loaded)').each(function(){
			var data_src = $(this).data('src');
			var image_top = $(this).offset().top;
			var image_bottom = image_top + $(this).height();
			var viewport_top = $(window).scrollTop() - 500;
			var viewport_bottom = $(window).scrollTop() + $(window).height() + 500;
			if( data_src && ( ( image_top > viewport_top && image_top < viewport_bottom ) || ( image_bottom > viewport_top && image_bottom < viewport_bottom ) ) ){
				$(this).attr('src', data_src);
				$(this).addClass('loaded');
			}
		});
	}
	
	/* Initial */
	setTimeout(function(){
		var current_hash = get_location_hash();
		if( current_hash ){
			var section = $('#' + current_hash);
			if( section.length ){
				setTimeout(function(){
					window.scrollTo( 0, section.offset().top - parseInt( section.css('margin-top') ) );
				}, 0);
			}
		}
		else{
			$(window).trigger('scroll');
		}
	}, 100);
	
	$('#fixed-icons a').each(function(){
		if( !$(this).attr('href') ){
			$(this).hide();
		}
	});
	
	$(window).on('resize', function(){
		var nav = $('main > nav');
		nav.get(0).style.transform = '';
		$('main').css('padding-left', '');
		$('.menu-icon-toggle').css('margin-left', '');
		$('.menu-icon-toggle').removeClass('close').addClass('open');
	});
	
	/* Section detect */
	var all_sections = [];
	function parse_section(){
		var sections = $('main > section');
		for( var i = 0; i < sections.length; i++ ){
			all_sections.push(sections[i]);
		}
	}
	parse_section();
	
	function get_current_section_id(){
		var scroll_top, section_top, section_height;
		for( var i = 0; i < all_sections.length; i++ ){
			scroll_top = $(window).scrollTop();
			section_top = parseInt( $('#' + all_sections[i].id ).offset().top );
			section_height = $('#' + all_sections[i].id ).height();
			if( scroll_top >= section_top && scroll_top <= section_top + section_height ){
				return all_sections[i].id;
			}
		}
		return '';
	}
	
	function navigation_handle(){
		var current_section_id = get_current_section_id();
		var nav = $('main > nav');
		if( current_section_id ){
			var current_element = nav.find('a[href="#' + current_section_id + '"]');
			if( current_element.length > 0 ){
				var is_parent = current_element.siblings('.sub-menu').length > 0;
				var top_li = current_element.parents('.sub-menu').parent('li');
				var parent_li = current_element.parent('li');
				if( !parent_li.hasClass('current') ){
					if( is_parent ){
						if( !parent_li.hasClass('parent-current') ){
							nav.find('.sub-menu').slideUp();
							parent_li.find('.sub-menu').slideDown();
						}
						nav.find('li').removeClass('current parent-current');
						parent_li.addClass('current parent-current');
					}
					else{
						if( !top_li.hasClass('parent-current') ){
							nav.find('.sub-menu').slideUp();
							top_li.find('.sub-menu').slideDown();
						}
						nav.find('li').removeClass('current parent-current');
						parent_li.addClass('current');
						top_li.addClass('parent-current');
					}
					
					/* Menu scroll */
					var nav_height = nav.outerHeight();
					var item_top = current_element.position().top;
					var item_height = current_element.outerHeight();
					if( item_top + item_height * 2 >= nav_height || item_top < item_height ){
						nav.animate({
							scrollTop: item_top
						}, 1000);
					}
					/* Set location hash */
					set_location_hash( current_section_id );
					
				}
			}
		}
		else{
			//remove_location_hash();
		}
	}
	
	$(window).on('scroll', function(){
		navigation_handle();
		run_lazyload();
		
		if( $(this).scrollTop() > $('body > header').height() ){
			$('main > nav').addClass('nav-fixed');
			$('.menu-icon-toggle').addClass('icon-fixed');
		}
		else{
			$('main > nav').removeClass('nav-fixed');
			$('.menu-icon-toggle').removeClass('icon-fixed');
		}
		
		/* Show Footer */
		var scroll_top = $(this).scrollTop();
		var footer_top = $('footer').offset().top;
		var window_height = $(window).height();
		var offset = scroll_top + window_height - footer_top;
		if( offset > 0 ){
			$('main > nav').css('margin-top', -offset);
		}
		else{
			$('main > nav').css('margin-top', 0);
		}
		
		/* Fixed Icons */
		if( scroll_top > 100 ){
			$('#fixed-icons').removeClass('hidden');
		}
		else{
			$('#fixed-icons').addClass('hidden');
		}
	});
	
	/* Menu on mobile */
	$('.menu-icon-toggle').on('click', function(){
		var nav = $('main > nav');
		var nav_width = nav.width();
		var transform = nav.css('transform');
		var matrix = transform.replace(/[^0-9\-.,]/g, '').split(',');
		var translateX = matrix[4];
		var main_padding_left = 0;
		var icon_margin_left = 0;
		if( translateX < 0 ){
			translateX = 0;
			main_padding_left = nav_width;
			icon_margin_left = nav_width;
			$('.menu-icon-toggle').removeClass('open').addClass('close');
		}
		else{
			translateX = '-100%';
			main_padding_left = 0;
			icon_margin_left = 0;
			$('.menu-icon-toggle').removeClass('close').addClass('open');
		}
		
		nav.get(0).style.transform = 'translateX(' + translateX + ')';
		$('main').css('padding-left', main_padding_left);
		$('.menu-icon-toggle').css('margin-left', icon_margin_left);
	});
	
	/* Scroll Button */
	$('body > header .scroll-button').on('click', function( e ){
		e.preventDefault();
		
		var section = $('main > section:first');
		$('html, body').animate({
			scrollTop: section.offset().top - parseInt( section.css('margin-top') )
		}, 1000);
	});
	
	/* Smooth Scroll */
	$('main nav a, a.internal-link').on('click', function(){
		$(window).trigger('scroll');
	});
	
	/* Code */
	$('.code').attr('readonly', true);
	
	/* Image Tooltip */
	$('.image-tooltip img').on('load', function(){
		var image = $(this);
		setTimeout(function(){
			var element = image.parents('.image-tooltip');
			var element_width = element.width();
			var element_left = element.offset().left;
			
			var tooltip = image.parent();
			var tooltip_width = tooltip.outerWidth();
			var window_width = $(window).width();
			
			var left = 0;
			if( window_width - element_left - element_width/2 < tooltip_width/2 ){ /* overflow right */
				left = - ( tooltip_width - ( window_width - element_left ) + 10 );
			}
			else if( element_left + element_width/2 < tooltip_width/2 ){ /* overflow left */
				left = - ( element_left - 10 );
			}
			
			if( left ){
				tooltip.css({'left': left, 'transform': 'translate(0, -100%)'});
				tooltip.attr('data-old_transform', tooltip.get(0).style.transform);
			}
		}, 100);
	});
	
	$('.image-tooltip').on('mouseenter', function(){
		var element = $(this);
		var window_height = $(window).height();
		var window_top = $(window).scrollTop();
		var element_top = element.offset().top;
		var tooltip = element.find('span');
		
		if( element_top - window_top < window_top + window_height - element_top ){
			var transform = 'translate(-50%, 10px)';
			if( tooltip.attr('data-old_transform') ){
				transform = 'translate(0, 10px)';
			}
			tooltip.css({'transform': transform, 'top': '100%'});
			element.addClass('bottom');
		}
		else{
			element.removeClass('bottom');
		}
	}).on('mouseleave', function(){
		var element = $(this);
		var tooltip = element.find('span');
		var transform = '';
		if( tooltip.attr('data-old_transform') ){
			transform = tooltip.attr('data-old_transform');
		}
		tooltip.css({'transform': transform, 'top': ''});
	});
});