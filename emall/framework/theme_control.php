<?php 
/*** Template Redirect ***/
add_action('template_redirect', 'emall_template_redirect');
function emall_template_redirect(){
	global $wp_query, $post;

	/* Get Page Options */
	if( is_page() || is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( is_page() ){
			$page_id = $post->ID;
		}
		if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
			$page_id = get_option('woocommerce_shop_page_id', 0);
		}
		$page_options = emall_set_global_page_options( $page_id );
		
		if( $page_options['ts_layout_fullwidth'] != 'default' ){
			emall_change_theme_options('ts_layout_fullwidth', $page_options['ts_layout_fullwidth']);
			if( $page_options['ts_layout_fullwidth'] ){
				emall_change_theme_options('ts_header_layout_fullwidth', $page_options['ts_header_layout_fullwidth']);
				emall_change_theme_options('ts_main_content_layout_fullwidth', $page_options['ts_main_content_layout_fullwidth']);
				emall_change_theme_options('ts_footer_layout_fullwidth', $page_options['ts_footer_layout_fullwidth']);
			}
		}

		if( $page_options['ts_layout_style'] != 'default' ){
			emall_change_theme_options('ts_layout_style', $page_options['ts_layout_style']);
		}
		
		if( $page_options['ts_header_layout'] != 'default' ){
			emall_change_theme_options('ts_header_layout', $page_options['ts_header_layout']);
		}
		
		if( $page_options['ts_breadcrumb_layout'] != 'default' ){
			emall_change_theme_options('ts_breadcrumb_layout', $page_options['ts_breadcrumb_layout']);
		}
		
		if( $page_options['ts_breadcrumb_bg_parallax'] != 'default' ){
			emall_change_theme_options('ts_breadcrumb_bg_parallax', $page_options['ts_breadcrumb_bg_parallax']);
		}
		
		if( trim($page_options['ts_bg_breadcrumbs']) != '' ){
			emall_change_theme_options('ts_bg_breadcrumbs', $page_options['ts_bg_breadcrumbs']);
		}
		
		if( trim($page_options['ts_logo']) != '' ){
			emall_change_theme_options('ts_logo', $page_options['ts_logo']);
		}
		
		if( trim($page_options['ts_logo_mobile']) != '' ){
			emall_change_theme_options('ts_logo_mobile', $page_options['ts_logo_mobile']);
		}
		
		if( trim($page_options['ts_logo_sticky']) != '' ){
			emall_change_theme_options('ts_logo_sticky', $page_options['ts_logo_sticky']);
		}
		
		if( $page_options['ts_menu_id'] || $page_options['ts_secondary_menu_id'] ){
			add_filter('wp_nav_menu_args', 'emall_filter_wp_nav_menu_args');
		}
		
		if( $page_options['ts_footer_block'] ){
			emall_change_theme_options('ts_footer_block', $page_options['ts_footer_block']);
		}
		
		if( $page_options['ts_header_transparent'] ){
			add_filter('body_class', function($classes) use ($page_options){
				$classes[] = 'header-transparent header-text-' . $page_options['ts_header_text_color'];
				return $classes;
			});
		}
	}
	
	/* Archive - Category product */
	if( is_tax( get_object_taxonomies('product') ) || is_post_type_archive('product') || (function_exists('dokan_is_store_page') && dokan_is_store_page()) ){
		emall_set_header_breadcrumb_layout_woocommerce_page( 'shop' );
		
		add_action('woocommerce_before_main_content', 'emall_remove_hooks_from_shop_loop');
		
		if( is_tax( get_object_taxonomies('product') ) || is_post_type_archive('product') ){
			add_action('woocommerce_before_main_content', 'emall_add_extra_content_shop_list_view');
		}
		
		/* Update product category layout */
		if( is_tax('product_cat') ){
			$term = $wp_query->queried_object;
			if( !empty($term->term_id) ){
				$bg_breadcrumbs_id = get_term_meta($term->term_id, 'bg_breadcrumbs_id', true);
				$layout = get_term_meta($term->term_id, 'layout', true);
				$left_sidebar = get_term_meta($term->term_id, 'left_sidebar', true);
				$right_sidebar = get_term_meta($term->term_id, 'right_sidebar', true);
				
				if( $bg_breadcrumbs_id != '' ){
					$bg_breadcrumbs_src = wp_get_attachment_url( $bg_breadcrumbs_id );
					if( $bg_breadcrumbs_src !== false ){
						emall_change_theme_options('ts_bg_breadcrumbs', $bg_breadcrumbs_src);
					}
				}
				if( $layout != '' ){
					emall_change_theme_options('ts_prod_cat_layout', $layout);
				}
				if( $left_sidebar != '' ){
					emall_change_theme_options('ts_prod_cat_left_sidebar', $left_sidebar);
				}
				if( $right_sidebar != '' ){
					emall_change_theme_options('ts_prod_cat_right_sidebar', $right_sidebar);
				}
			}
		}
	}
	
	/* Single post */
	if( is_singular('post') ){
		/* Remove hooks on Related and Featured products */
		emall_remove_hooks_from_shop_loop();
		
		$post_data = array();
		$post_custom = get_post_custom();
		foreach( $post_custom as $key => $value ){
			if( isset($value[0]) ){
				$post_data[$key] = $value[0];
			}
		}
		
		if( isset($post_data['ts_post_layout']) && $post_data['ts_post_layout'] != '0' ){
			emall_change_theme_options('ts_blog_details_layout', $post_data['ts_post_layout']);
		}
		if( isset($post_data['ts_post_left_sidebar']) && $post_data['ts_post_left_sidebar'] != '0' ){
			emall_change_theme_options('ts_blog_details_left_sidebar', $post_data['ts_post_left_sidebar']);
		}
		if( isset($post_data['ts_post_right_sidebar']) && $post_data['ts_post_right_sidebar'] != '0' ){
			emall_change_theme_options('ts_blog_details_right_sidebar', $post_data['ts_post_right_sidebar']);
		}
		if( isset($post_data['ts_bg_breadcrumbs']) && $post_data['ts_bg_breadcrumbs'] != '' ){
			emall_change_theme_options('ts_bg_breadcrumbs', $post_data['ts_bg_breadcrumbs']);
		}
	}
	
	/* Single product */
	if( is_singular('product') ){
		/* Remove hooks on Related and Up-Sell products */
		add_action('woocommerce_before_main_content', 'emall_remove_hooks_from_shop_loop'); 

		$theme_options = emall_get_theme_options();
	
		$prod_data = array();
		$post_custom = get_post_custom();
		foreach( $post_custom as $key => $value ){
			if( isset($value[0]) ){
				$prod_data[$key] = $value[0];
			}
		}
		if( isset($prod_data['ts_prod_layout']) && $prod_data['ts_prod_layout'] != '0' ){
			emall_change_theme_options('ts_prod_layout', $prod_data['ts_prod_layout']);
		}
		if( isset($prod_data['ts_prod_left_sidebar']) && $prod_data['ts_prod_left_sidebar'] != '0' ){
			emall_change_theme_options('ts_prod_left_sidebar', $prod_data['ts_prod_left_sidebar']);
		}
		if( isset($prod_data['ts_prod_right_sidebar']) && $prod_data['ts_prod_right_sidebar'] != '0' ){
			emall_change_theme_options('ts_prod_right_sidebar', $prod_data['ts_prod_right_sidebar']);
		}
		
		if( !$theme_options['ts_prod_thumbnail'] ){
			remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
		}
		
		if( !$theme_options['ts_prod_label'] ){
			remove_action('woocommerce_product_thumbnails', 'emall_template_loop_product_label', 99);
		}
		
		if( !$theme_options['ts_prod_rating'] ){
			remove_action('woocommerce_single_product_summary', 'emall_template_star_rating', 5);
		}
		
		if( $theme_options['ts_prod_title'] && $theme_options['ts_prod_title_in_content'] ){
			emall_change_theme_options('ts_prod_title', 0); /* remove title above breadcrumb */
			add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
		}
		
		if( !$theme_options['ts_prod_price'] ){
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15);
		}
		
		if( !$theme_options['ts_prod_short_desc'] ){
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
		}

		if( !$theme_options['ts_prod_add_to_cart'] || $theme_options['ts_enable_catalog_mode'] ){
			$terms        = get_the_terms( $post->ID, 'product_type' );
			$product_type = ! empty( $terms ) ? sanitize_title( current( $terms )->name ) : 'simple';
			if( $product_type != 'variable' ){
				remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
			}
			else{
				remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
			}
		}

		if( !$theme_options['ts_prod_upsells'] ){
			remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
		}

		if( !$theme_options['ts_prod_related'] ){
			remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
		}
		
		/* Breadcrumb */
		if( isset($prod_data['ts_bg_breadcrumbs']) && $prod_data['ts_bg_breadcrumbs'] != '' ){
			emall_change_theme_options('ts_bg_breadcrumbs', $prod_data['ts_bg_breadcrumbs']);
		}
		
		/* Add extra classes to post */
		add_action('woocommerce_before_single_product', 'emall_woocommerce_before_single_product');

		/* Thumbnails slider on mobile */
		if( in_array( $theme_options['ts_prod_gallery_layout'], array('grid-1-column', 'grid-2-columns') ) && $theme_options['ts_prod_thumbnails_slider_mobile'] && wp_is_mobile() ){
			emall_change_theme_options('ts_prod_gallery_layout', 'horizontal');
		}

		add_filter( 'woocommerce_comment_pagination_args', function($args){
			$args['prev_text']	= esc_html__( 'Previous page', 'emall' );
			$args['next_text']	= esc_html__( 'Next page' , 'emall' );
			return $args;
		});
		
		add_filter( 'woocommerce_review_gravatar_size', function() { return 150; } );
	}

	/* 404 template */
	if( is_404() ){
		$page_id = emall_get_theme_options('ts_404_page');

		if( $page_id ){
			wp_redirect(get_permalink($page_id));
		}
	}

	/* WooCommerce - Other pages */
	if( class_exists('WooCommerce') ){
		if( is_cart() ){
			emall_set_header_breadcrumb_layout_woocommerce_page( 'cart' );
			
			add_action('woocommerce_before_cart', 'emall_remove_hooks_from_shop_loop');
		}
		
		if( is_checkout() ){
			emall_set_header_breadcrumb_layout_woocommerce_page( 'checkout' );
		}
		
		if( is_account_page() ){
			emall_set_header_breadcrumb_layout_woocommerce_page( 'myaccount' );
		}
	}

	/* Header Cart - Wishlist */
	if( !class_exists('WooCommerce') ){
		emall_change_theme_options('ts_enable_tiny_shopping_cart', 0);
	}
	
	if( !class_exists('WooCommerce') || !class_exists('YITH_WCWL') ){
		emall_change_theme_options('ts_enable_tiny_wishlist', 0);
	}
	
	/* Right to left */
	if( is_rtl() ){
		emall_change_theme_options('ts_enable_rtl', 1);
	}
}

function emall_filter_wp_nav_menu_args( $args ){
	global $post;

	if( is_page() && !is_admin() && !empty($args['theme_location']) ){
		if( $args['theme_location'] == 'primary' ){
			$menu = get_post_meta($post->ID, 'ts_menu_id', true);
			if( $menu ){
				$args['menu'] = $menu;
			}
		}
		
		if( $args['theme_location'] == 'secondary' ){
			$menu = get_post_meta($post->ID, 'ts_secondary_menu_id', true);
			if( $menu ){
				$args['menu'] = $menu;
			}
		}
	}
	return $args;
}

function emall_remove_hooks_from_shop_loop(){
	$theme_options = emall_get_theme_options();

	if( ! $theme_options['ts_prod_cat_thumbnail'] ){
		remove_action('woocommerce_before_shop_loop_item_title', 'emall_template_loop_product_thumbnail', 10);
	}
	
	if( ! $theme_options['ts_prod_cat_label'] ){
		remove_action('woocommerce_after_shop_loop_item_title', 'emall_template_loop_product_label', 1);
	}

	if( ! $theme_options['ts_prod_cat_sku'] ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_product_sku', 5);
	}
	
	if( ! $theme_options['ts_prod_cat_brand'] ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_brands', 10);
	}
	
	if( ! $theme_options['ts_prod_cat_title'] ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_product_title', 15);
	}
	
	if( ! $theme_options['ts_prod_cat_cat'] ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_categories', 20);
	}
	
	if( ! $theme_options['ts_prod_cat_price'] ){
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 25);
	}
	
	if( ! $theme_options['ts_prod_cat_rating'] ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_star_rating', 30);
	}
	
	if( ! $theme_options['ts_prod_cat_desc'] ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_short_description', 46);
	}
	
	if( ! $theme_options['ts_prod_cat_add_to_cart'] ){
		remove_action('woocommerce_after_shop_loop_item_title', 'emall_template_loop_add_to_cart', 10001 );
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_add_to_cart', 65);
	}

	if( $theme_options['ts_prod_cat_color_swatch'] ){
		add_action('woocommerce_after_shop_loop_item', 'emall_template_loop_product_variable_color', 50);
		$number_color_swatch = absint( $theme_options['ts_prod_cat_number_color_swatch'] );
		add_filter('emall_loop_product_variable_color_number', function() use ($number_color_swatch){
			return $number_color_swatch;
		});
	}
	
	if( in_array( $theme_options['ts_prod_cat_loading_type'], array('infinity-scroll', 'load-more-button') ) ){
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		emall_change_theme_options('ts_prod_cat_per_page_dropdown', 0);
	}
}

function emall_add_extra_content_shop_list_view(){
	$theme_options = emall_get_theme_options();
	
	if( !$theme_options['ts_prod_cat_columns_selector'] && $theme_options['ts_prod_cat_columns'] != '1' ){
		return;
	}
	
	if( $theme_options['ts_prod_cat_list_desc'] ){
		add_action('woocommerce_after_shop_loop_item', 'emall_template_loop_short_description_list_view', 40);
	}
	
	if( class_exists('YITH_WCWL') && 'yes' == get_option( 'yith_wcwl_show_on_loop', 'no' ) && $theme_options['ts_product_hover_style'] != 'v2' ){
		add_action('woocommerce_after_shop_loop_item', 'emall_add_wishlist_button_to_product_list', 66);
	}
	
	add_action('woocommerce_after_main_content', function() use ( $theme_options ){
		remove_action('woocommerce_after_shop_loop_item', 'emall_template_loop_short_description_list_view', 40);
		if( $theme_options['ts_product_hover_style'] != 'v2' ){
			remove_action('woocommerce_after_shop_loop_item', 'emall_add_wishlist_button_to_product_list', 66);
		}
	}, 1);
}

function emall_set_header_breadcrumb_layout_woocommerce_page( $page = 'shop' ){
	/* Header Layout */
	$header_layout = get_post_meta(wc_get_page_id( $page ), 'ts_header_layout', true);
	if( $header_layout != 'default' && $header_layout != '' ){
		emall_change_theme_options('ts_header_layout', $header_layout);
	}
	
	/* Breadcrumb Layout */
	$breadcrumb_layout = get_post_meta(wc_get_page_id( $page ), 'ts_breadcrumb_layout', true);
	if( $breadcrumb_layout != 'default' && $breadcrumb_layout != '' ){
		emall_change_theme_options('ts_breadcrumb_layout', $breadcrumb_layout);
	}
}

function emall_woocommerce_before_single_product(){
	add_filter('post_class', 'emall_single_product_post_class_filter');
}

function emall_single_product_post_class_filter( $classes ){
	global $product;
	
	$theme_options = emall_get_theme_options();

	if( in_array( $theme_options['ts_prod_gallery_layout'], array('grid-1-column', 'grid-2-columns') ) ){
		$classes[] = 'gallery-layout-grid';
	}
	$classes[] = 'gallery-layout-' . $theme_options['ts_prod_gallery_layout'];
	
	if( $theme_options['ts_prod_gallery_layout'] == 'vertical' && !empty( $product->get_gallery_image_ids() ) ){
		$classes[] = 'has-gallery';
	}
	
	if( $theme_options['ts_prod_thumbnail_border'] ){
		$classes[] = 'thumbnail-border';
	}
	
	if( $theme_options['ts_prod_attr_color_variation_thumbnail'] ){
		$classes[] = 'color-variation-thumbnail';
	}

	if( !$theme_options['ts_prod_add_to_cart'] ){
		$classes[] = 'no-add-to-cart';
	}
	
	if( $theme_options['ts_prod_attr_dropdown'] ){
		$classes[] = 'attr-dropdown';
	}
	
	if( $theme_options['ts_prod_form_cart_fixed_mobile'] && in_array( $product->get_type(), array('simple', 'variable') ) ){
		$classes[] = 'form-cart-fixed';
	}
	
	if( $theme_options['ts_prod_tabs_accordion'] ){
		if( $theme_options['ts_prod_tabs_accordion'] == 'both' || 
			( $theme_options['ts_prod_tabs_accordion'] == 'desktop' && !wp_is_mobile() ) ||
			( $theme_options['ts_prod_tabs_accordion'] == 'mobile' && wp_is_mobile() )
		){
			$classes[] = 'tabs-accordion';
			emall_change_theme_options('ts_prod_more_less_content', 0);
		}
	}
	
	remove_filter('post_class', 'emall_single_product_post_class_filter');
	return $classes;
}
?>