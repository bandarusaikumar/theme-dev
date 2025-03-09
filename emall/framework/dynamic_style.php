<?php
if( !isset($data) ){
	$data = emall_get_theme_options();
}

$default_options = array(
				'ts_layout_fullwidth'			=> 0
				,'ts_logo_width'				=> "42"
				,'ts_device_logo_width'			=> "42"
				,'ts_mobile_logo_width'			=> "28"
				,'ts_content_padding'			=> "75"
				,'ts_input_button_radius_size'  => "0"
				,'ts_prod_title_truncate' 		=> 1
				,'ts_prod_title_truncate_row' 	=> 2
				,'ts_custom_font_ttf'			=> array( 'url' => '' )
		);
		
foreach( $default_options as $option_name => $value ){
	if( isset($data[$option_name]) ){
		$default_options[$option_name] = $data[$option_name];
	}
}

extract($default_options);
		
$default_colors = array(
				'ts_main_background_color'						=>	'#ffffff'
				,'ts_primary_color'								=>	'#db3c3c'
				,'ts_text_color_in_bg_primary'					=>	'#ffffff'
				,'ts_text_color'								=>	'#000000'
				,'ts_heading_color'								=>	'#000000'
				,'ts_gray_color'								=>  '#888888'
				,'ts_gray_2_color'								=>  '#666666'
				,'ts_border_color'								=>	'#e1e1e1'
				,'ts_link_color'								=>	'#db3c3c'
				,'ts_link_hover'								=>	'#db3c3c'
				
				,'ts_dropdown_bg'								=>	'#ffffff'
				,'ts_blockquote_bg'								=>	'#f9f9f9'
				,'ts_lazyload_bg'								=>  '#f5f5f5'
				
				,'ts_input_color'								=>	'#000000'
				,'ts_input_bg'									=>	'#ffffff'
				,'ts_input_border'								=>	'#e1e1e1'
				
				,'ts_btn_color'									=>	'#ffffff'
				,'ts_btn_bg'									=>	'#000000'
				,'ts_btn_border'								=>	'#000000'
				,'ts_btn_hover'									=>	'#ffffff'
				,'ts_btn_hover_bg'								=>	'#db3c3c'
				,'ts_btn_hover_border'							=>	'#db3c3c'
				
				,'ts_btn_thumb_color'							=>	'#000000'
				,'ts_btn_thumb_bg'								=>	'#ffffff'
				,'ts_btn_thumb_border'							=>	'#e1e1e1'
				,'ts_btn_thumb_hover'							=>	'#ffffff'
				,'ts_btn_thumb_hover_bg'						=>	'#000000'
				,'ts_btn_thumb_hover_border'					=>	'#000000'
				
				,'ts_product_bg'								=>	'#ffffff'
				,'ts_rating_color'								=>	'#000000'
				,'ts_rated_color'								=>	'#000000'
				,'ts_price_color'								=>	'#000000'
				,'ts_sale_price_color'							=>	'#aaaaaa'
				,'ts_sale_label_color'							=>	'#ffffff'
				,'ts_sale_label_bg'								=>	'#000000'
				,'ts_new_label_color'							=>	'#ffffff'
				,'ts_new_label_bg'								=>	'#3bb477'
				,'ts_feature_label_color'						=>	'#ffffff'
				,'ts_feature_label_bg'							=>	'#db3c3c'
				,'ts_outstock_label_color'						=>	'#ffffff'
				,'ts_outstock_label_bg'							=>	'#919191'
				
				,'ts_breadcrumb_border'							=>	'#e1e1e1'
				,'ts_breadcrumb_color'							=>	'#000000'
				,'ts_breadcrumb_link_color'						=>	'#666666'
				,'ts_breadcrumb_2_color'						=>  '#ffffff'
				
				,'ts_menu_color'								=>	'#000000'
				,'ts_menu_hover'								=>	'#000000'
				,'ts_sub_menu_color'							=>	'#000000'
				,'ts_sub_menu_hover'							=>	'#db3c3c'
				,'ts_vertical_menu_color' 						=>  '#ffffff'
				,'ts_vertical_menu_bg' 							=>  '#db3c3c'
				
				,'ts_notice_bg'									=>  '#000000'
				,'ts_notice_color'								=>  '#ffffff'
				,'ts_hd_top_bg' 								=>	'#000000'
				,'ts_hd_top_color' 								=>	'#ffffff'
				,'ts_hd_top_hover' 								=>	'#d1d1d1'
				,'ts_hd_top_border' 							=>	'#1f1f1f'
				,'ts_hd_top_border_bottom'						=>	'#000000'
				,'ts_hd_middle_bg' 								=>	'#ffffff'
				,'ts_hd_middle_color' 							=>	'#000000'
				,'ts_hd_middle_hover' 							=>	'#db3c3c'
				,'ts_hd_middle_border' 							=>	'#e1e1e1'
				,'ts_hd_bottom_bg' 								=>	'#ffffff'
				,'ts_hd_bottom_color' 							=>	'#000000'
				,'ts_hd_bottom_hover' 							=>	'#000000'
				,'ts_hd_bottom_border' 							=>	'#e1e1e1'
				,'ts_hd_cart_count_bg' 							=>	'#db3c3c'
				,'ts_hd_cart_count_color' 						=>	'#ffffff'
				,'ts_hd_search_bg'								=> 	'#ffffff'
				,'ts_hd_search_color' 							=>  '#000000'
				,'ts_hd_search_border'							=>  '#e1e1e1'
				,'ts_hd_search_button_color'					=> 	'#ffffff'
				,'ts_hd_search_button_bg' 						=>  '#db3c3c'
				
				,'ts_hd_mobile_bg' 								=>  '#000000'
				,'ts_hd_mobile_color' 							=>  '#ffffff'
				,'ts_hd_mobile_bg'								=>  '#ffffff'
				,'ts_hd_cart_mobile_count_bg'					=>  '#db3c3c'
				,'ts_hd_cart_mobile_count_color'				=>  '#ffffff'
				
				,'ts_footer_bg' 								=>	'#f4f4f4'
				,'ts_footer_color' 								=>	'#000000'
				,'ts_footer_gray_color'							=>  '#666666'
				,'ts_footer_heading_color' 						=>	'#000000'
				,'ts_footer_link_color' 						=>	'#000000'
				,'ts_footer_link_hover'							=>	'#db3c3c'
				,'ts_footer_border'								=>	'#dddddd'
				
				,'ts_mobile_menu_color'							=>	'#000000'
				,'ts_mobile_menu_hover'							=>	'#db3c3c'
				,'ts_mobile_menu_bg'							=>  '#ffffff'
				,'ts_mobile_menu_tab_bg'						=>  '#efefef'
);

$data = apply_filters('emall_custom_style_data', $data);

foreach( $default_colors as $option_name => $default_color ){
	if( isset($data[$option_name]['rgba']) ){
		$default_colors[$option_name] = $data[$option_name]['rgba'];
	}
	else if( isset($data[$option_name]['color']) ){
		$default_colors[$option_name] = $data[$option_name]['color'];
	}
}

extract( $default_colors );

/* Parse font option. Ex: if option name is ts_body_font, we will have variables below:
* ts_body_font (font-family)
* ts_body_font_weight
* ts_body_font_style
* ts_body_font_size
* ts_body_font_line_height
* ts_body_font_letter_spacing
*/
$font_option_names = array(
							'ts_body_font',
							'ts_body_2_font',
							'ts_heading_font',
							'ts_menu_font',
							'ts_sub_menu_font',
							'ts_button_font',
							'ts_product_name_font',
							);
$font_size_option_names = array( 
							'ts_fs_body_font',
							'ts_fs_body_2_font',
							'ts_fs_menu_font',
							'ts_fs_sub_menu_font',
							'ts_fs_button_font',
							'ts_fs_button_text_font',
							'ts_fs_product_name_font',
							'ts_fs_detail_product_name_font',
							'ts_fs_product_price_font',
							'ts_fs_small_font',
							'ts_fs_h1_font', 
							'ts_fs_h2_font', 
							'ts_fs_h3_font', 
							'ts_fs_h4_font', 
							'ts_fs_h5_font', 
							'ts_fs_h6_font',
							'ts_fs_product_name_ipad_font',
							'ts_fs_button_ipad_font',
							'ts_fs_button_text_ipad_font',
							'ts_fs_heading_ipad_font',
							'ts_fs_h1_ipad_font', 
							'ts_fs_h2_ipad_font', 
							'ts_fs_h3_ipad_font', 
							'ts_fs_h4_ipad_font', 
							'ts_fs_h5_ipad_font', 
							'ts_fs_h6_ipad_font',
							'ts_fs_body_mobile_font',
							'ts_fs_body_2_mobile_font',
							'ts_fs_product_name_mobile_font',
							'ts_fs_product_price_mobile_font',
							'ts_fs_heading_mobile_font',
							'ts_fs_h1_mobile_font', 
							'ts_fs_h2_mobile_font', 
							'ts_fs_h3_mobile_font', 
							'ts_fs_h4_mobile_font', 
							);
$font_option_names = array_merge($font_option_names, $font_size_option_names);
foreach( $font_option_names as $option_name ){
	$default = array(
		$option_name 						=> 'inherit'
		,$option_name . '_weight' 			=> 'normal'
		,$option_name . '_style' 			=> 'normal'
		,$option_name . '_size' 			=> 'inherit'
		,$option_name . '_line_height' 		=> 'inherit'
		,$option_name . '_letter_spacing' 	=> 'inherit'
		,$option_name . '_transform' 		=> 'inherit'
	);
	if( is_array($data[$option_name]) ){
		if( !empty($data[$option_name]['font-family']) ){
			$default[$option_name] = $data[$option_name]['font-family'];
		}
		if( !empty($data[$option_name]['font-weight']) ){
			$default[$option_name . '_weight'] = $data[$option_name]['font-weight'];
		}
		if( !empty($data[$option_name]['font-style']) ){
			$default[$option_name . '_style'] = $data[$option_name]['font-style'];
		}
		if( !empty($data[$option_name]['font-size']) ){
			$default[$option_name . '_size'] = $data[$option_name]['font-size'];
		}
		if( !empty($data[$option_name]['line-height']) ){
			$default[$option_name . '_line_height'] = $data[$option_name]['line-height'];
		}
		if( !empty($data[$option_name]['letter-spacing']) ){
			$default[$option_name . '_letter_spacing'] = $data[$option_name]['letter-spacing'];
		}
		if( !empty($data[$option_name]['text-transform']) ){
			$default[$option_name . '_transform'] = $data[$option_name]['text-transform'];
		}
	}
	extract( $default );
}
?>	

<?php
/*** Custom Font ***/
if( isset($ts_custom_font_ttf) && $ts_custom_font_ttf['url'] ):
?>
@font-face {
	font-family: 'CustomFont';
	src:url('<?php echo esc_url($ts_custom_font_ttf['url']); ?>') format('truetype');
	font-weight: normal;
}
<?php 
endif;	
?>
:root {
	--ts-input-button-radius: <?php echo absint($ts_input_button_radius_size); ?>px;
	
	--ts-content-padding: <?php echo absint($ts_content_padding); ?>px;
	--ts-logo-width: <?php echo absint($ts_logo_width); ?>px;
	
	--ts-font-family: '<?php echo esc_html($ts_body_font); ?>';
	--ts-font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	
	--ts-font-2-family: '<?php echo esc_html($ts_body_2_font); ?>';
	--ts-font-2-weight: <?php echo esc_html($ts_body_2_font_weight); ?>;
	
	--ts-heading-font-family: '<?php echo esc_html($ts_heading_font); ?>';
	--ts-heading-font-weight: <?php echo esc_html($ts_heading_font_weight); ?>;
	--ts-heading-letter-spacing: <?php echo esc_html($ts_heading_font_letter_spacing); ?>;
	
	--ts-btn-font-family: '<?php echo esc_html($ts_button_font); ?>';
	--ts-btn-font-weight: <?php echo esc_html($ts_button_font_weight); ?>;
	
	--ts-menu-font-family: '<?php echo esc_html($ts_menu_font); ?>';
	--ts-menu-font-weight: <?php echo esc_html($ts_menu_font_weight); ?>;
	
	--ts-sub-menu-font-family: '<?php echo esc_html($ts_sub_menu_font); ?>';
	--ts-sub-menu-font-weight: <?php echo esc_html($ts_sub_menu_font_weight); ?>;
	
	--ts-product-name-font-family: '<?php echo esc_html($ts_product_name_font); ?>';
	--ts-product-name-font-weight: <?php echo esc_html($ts_product_name_font_weight); ?>;
	
	--ts-font-size: <?php echo esc_html($ts_fs_body_font_size); ?>;
	--ts-line-height: <?php echo esc_html($ts_fs_body_font_line_height); ?>;
	--ts-letter-spacing: <?php echo esc_html($ts_fs_body_font_letter_spacing); ?>;
	
	--ts-font-2-size: <?php echo esc_html($ts_fs_body_2_font_size); ?>;
	--ts-font-2-line-height: <?php echo esc_html($ts_fs_body_2_font_line_height); ?>;
	--ts-font-2-letter-spacing: <?php echo esc_html($ts_fs_body_2_font_letter_spacing); ?>;
	
	--ts-small-font-size: <?php echo esc_html($ts_fs_small_font_size); ?>;
	
	--ts-menu-font-size: <?php echo esc_html($ts_fs_menu_font_size); ?>;
	--ts-menu-letter-spacing: <?php echo esc_html($ts_fs_menu_font_letter_spacing); ?>;
	
	--ts-sub-menu-font-size: <?php echo esc_html($ts_fs_sub_menu_font_size); ?>;
	--ts-sub-menu-letter-spacing: <?php echo esc_html($ts_fs_sub_menu_font_letter_spacing); ?>;
	
	--ts-btn-font-size: <?php echo esc_html($ts_fs_button_font_size); ?>;
	--ts-btn-letter-spacing: <?php echo esc_html($ts_fs_button_font_letter_spacing); ?>;
	
	--ts-btn-text-font-size: <?php echo esc_html($ts_fs_button_text_font_size); ?>;
	
	--ts-product-name-size: <?php echo esc_html($ts_fs_product_name_font_size); ?>;
	--ts-product-name-line-height: <?php echo esc_html($ts_fs_product_name_font_line_height); ?>;
	--ts-product-price-size: <?php echo esc_html($ts_fs_product_price_font_size); ?>;
	--ts-product-price-line-height: <?php echo esc_html($ts_fs_product_price_font_line_height); ?>;
	--ts-detail-product-name-size: <?php echo esc_html($ts_fs_detail_product_name_font_size); ?>;
	--ts-detail-product-name-line-height: <?php echo esc_html($ts_fs_detail_product_name_font_line_height); ?>;

	--ts-h1-font-size: <?php echo esc_html($ts_fs_h1_font_size); ?>;
	--ts-h1-line-height: <?php echo esc_html($ts_fs_h1_font_line_height); ?>;
	--ts-h2-font-size: <?php echo esc_html($ts_fs_h2_font_size); ?>;
	--ts-h2-line-height:<?php echo esc_html($ts_fs_h2_font_line_height); ?>;
	--ts-h3-font-size: <?php echo esc_html($ts_fs_h3_font_size); ?>;
	--ts-h3-line-height: <?php echo esc_html($ts_fs_h3_font_line_height); ?>;
	--ts-h4-font-size: <?php echo esc_html($ts_fs_h4_font_size); ?>;
	--ts-h4-line-height: <?php echo esc_html($ts_fs_h4_font_line_height); ?>;
	--ts-h5-font-size: <?php echo esc_html($ts_fs_h5_font_size); ?>;
	--ts-h5-line-height: <?php echo esc_html($ts_fs_h5_font_line_height); ?>;
	--ts-h6-font-size: <?php echo esc_html($ts_fs_h6_font_size); ?>;
	--ts-h6-line-height: <?php echo esc_html($ts_fs_h6_font_line_height); ?>;

	--ts-primary-color: <?php echo esc_html($ts_primary_color); ?>;
	--ts-text-in-primary-color: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	--ts-main-bg: <?php echo esc_html($ts_main_background_color); ?>;
	--ts-text-color: <?php echo esc_html($ts_text_color); ?>;
	--ts-heading-color: <?php echo esc_html($ts_heading_color); ?>;
	--ts-gray-color: <?php echo esc_html($ts_gray_color); ?>;
	--ts-gray-2-color: <?php echo esc_html($ts_gray_2_color); ?>;
	--ts-border: <?php echo esc_html($ts_border_color); ?>;
	--ts-link-color: <?php echo esc_html($ts_link_color); ?>;
	--ts-link-hover: <?php echo esc_html($ts_link_hover); ?>;
	--ts-dropdown-bg: <?php echo esc_html($ts_dropdown_bg); ?>;
	--ts-blockquote-bg: <?php echo esc_html($ts_blockquote_bg); ?>;
	--e-bg-lazyload-loaded: linear-gradient(<?php echo esc_html($ts_lazyload_bg); ?>,<?php echo esc_html($ts_lazyload_bg); ?>);
	--e-bg-lazyload: linear-gradient(<?php echo esc_html($ts_lazyload_bg); ?>,<?php echo esc_html($ts_lazyload_bg); ?>);
	
	--ts-input-color: <?php echo esc_html($ts_input_color); ?>;
	--ts-input-bg: <?php echo esc_html($ts_input_bg); ?>;
	--ts-input-border: <?php echo esc_html($ts_input_border); ?>;

	--ts-btn-color: <?php echo esc_html($ts_btn_color); ?>;
	--ts-btn-bg: <?php echo esc_html($ts_btn_bg); ?>;
	--ts-btn-border: <?php echo esc_html($ts_btn_border); ?>;
	--ts-btn-hover: <?php echo esc_html($ts_btn_hover); ?>;
	--ts-btn-hover-bg: <?php echo esc_html($ts_btn_hover_bg); ?>;
	--ts-btn-hover-border: <?php echo esc_html($ts_btn_hover_border); ?>;
	
	--ts-btn-thumbnail-color: <?php echo esc_html($ts_btn_thumb_color); ?>;
	--ts-btn-thumbnail-bg: <?php echo esc_html($ts_btn_thumb_bg); ?>;
	--ts-btn-thumbnail-border: <?php echo esc_html($ts_btn_thumb_border); ?>;
	--ts-btn-thumbnail-hover-color: <?php echo esc_html($ts_btn_thumb_hover); ?>;
	--ts-btn-thumbnail-hover-bg: <?php echo esc_html($ts_btn_thumb_hover_bg); ?>;
	--ts-btn-thumbnail-hover-border: <?php echo esc_html($ts_btn_thumb_hover_border); ?>;
	
	--ts-product-bg: <?php echo esc_html($ts_product_bg); ?>;
	--ts-rating-color: <?php echo esc_html($ts_rating_color); ?>;
	--ts-rated-color: <?php echo esc_html($ts_rated_color); ?>;
	--ts-price-color: <?php echo esc_html($ts_price_color); ?>;
	--ts-sale-price-color: <?php echo esc_html($ts_sale_price_color); ?>;
	--ts-sale-label-color: <?php echo esc_html($ts_sale_label_color); ?>;
	--ts-sale-label-bg: <?php echo esc_html($ts_sale_label_bg); ?>;
	--ts-new-label-color: <?php echo esc_html($ts_new_label_color); ?>;
	--ts-new-label-bg: <?php echo esc_html($ts_new_label_bg); ?>;
	--ts-hot-label-color: <?php echo esc_html($ts_feature_label_color); ?>;
	--ts-hot-label-bg: <?php echo esc_html($ts_feature_label_bg); ?>;
	--ts-soldout-label-color: <?php echo esc_html($ts_outstock_label_color); ?>;
	--ts-soldout-label-bg: <?php echo esc_html($ts_outstock_label_bg); ?>;
	
	--ts-breadcrumb-border: <?php echo esc_html($ts_breadcrumb_border); ?>;
	--ts-breadcrumb-color: <?php echo esc_html($ts_breadcrumb_color); ?>;
	--ts-breadcrumb-link-color: <?php echo esc_html($ts_breadcrumb_link_color); ?>;
	--ts-breadcrumb-2-color: <?php echo esc_html($ts_breadcrumb_2_color); ?>;
	
	--ts-notice-bg: <?php echo esc_html($ts_notice_bg); ?>;
	--ts-notice-color: <?php echo esc_html($ts_notice_color); ?>;
	
	--ts-hd-bottom-border: <?php echo esc_html($ts_hd_bottom_border); ?>;
	--ts-hd-search-bg: <?php echo esc_html($ts_hd_search_bg); ?>;
	--ts-hd-search-color: <?php echo esc_html($ts_hd_search_color); ?>;
	--ts-hd-search-border: <?php echo esc_html($ts_hd_search_border); ?>;
	
	--ts-sub-menu-color: <?php echo esc_html($ts_sub_menu_color); ?>;
	--ts-sub-menu-hover: <?php echo esc_html($ts_sub_menu_hover); ?>;
	
	--ts-mobile-menu-color: <?php echo esc_html($ts_mobile_menu_color); ?>;
	--ts-mobile-menu-hover: <?php echo esc_html($ts_mobile_menu_hover); ?>;
	--ts-mobile-menu-bg: <?php echo esc_html($ts_mobile_menu_bg); ?>;
	--ts-mobile-menu-tab-bg: <?php echo esc_html($ts_mobile_menu_tab_bg); ?>;
}
@media only screen and (max-width: 1200px){
	:root{
		--ts-logo-width: <?php echo absint($ts_device_logo_width); ?>px;
		
		--ts-btn-font-size: <?php echo esc_html($ts_fs_button_ipad_font_size); ?>;
		--ts-btn-letter-spacing: <?php echo esc_html($ts_fs_button_ipad_font_letter_spacing); ?>;
		
		--ts-btn-text-font-size: <?php echo esc_html($ts_fs_button_text_ipad_font_size); ?>;
		
		--ts-product-name-size: <?php echo esc_html($ts_fs_product_name_ipad_font_size); ?>;
		--ts-product-name-line-height: <?php echo esc_html($ts_fs_product_name_ipad_font_line_height); ?>;
		
		--ts-heading-size: <?php echo esc_html($ts_fs_heading_ipad_font_size); ?>;
		--ts-heading-line-height: <?php echo esc_html($ts_fs_heading_ipad_font_line_height); ?>;
		--ts-h1-font-size: <?php echo esc_html($ts_fs_h1_ipad_font_size); ?>;
		--ts-h1-line-height: <?php echo esc_html($ts_fs_h1_ipad_font_line_height); ?>;
		--ts-h2-font-size: <?php echo esc_html($ts_fs_h2_ipad_font_size); ?>;
		--ts-h2-line-height: <?php echo esc_html($ts_fs_h2_ipad_font_line_height); ?>;
		--ts-h3-font-size: <?php echo esc_html($ts_fs_h3_ipad_font_size); ?>;
		--ts-h3-line-height: <?php echo esc_html($ts_fs_h3_ipad_font_line_height); ?>;
		--ts-h4-font-size: <?php echo esc_html($ts_fs_h4_ipad_font_size); ?>;
		--ts-h4-line-height: <?php echo esc_html($ts_fs_h4_ipad_font_line_height); ?>;
		--ts-h5-font-size: <?php echo esc_html($ts_fs_h5_ipad_font_size); ?>;
		--ts-h5-line-height: <?php echo esc_html($ts_fs_h5_ipad_font_line_height); ?>;
		--ts-h6-font-size: <?php echo esc_html($ts_fs_h6_ipad_font_size); ?>;
		--ts-h6-line-height: <?php echo esc_html($ts_fs_h6_ipad_font_line_height); ?>;
	}
}
@media only screen and (max-width: 767px){
	:root{
		--ts-logo-width: <?php echo absint($ts_mobile_logo_width); ?>px;
		--ts-font-size: <?php echo esc_html($ts_fs_body_mobile_font_size); ?>;
		--ts-line-height: <?php echo esc_html($ts_fs_body_mobile_font_line_height); ?>;
		--ts-letter-spacing: <?php echo esc_html($ts_fs_body_mobile_font_letter_spacing); ?>;
		--ts-font-2-size: <?php echo esc_html($ts_fs_body_2_mobile_font_size); ?>;
		--ts-font-2-line-height: <?php echo esc_html($ts_fs_body_2_mobile_font_line_height); ?>;
		--ts-font-2-letter-spacing: <?php echo esc_html($ts_fs_body_2_mobile_font_letter_spacing); ?>;
		--ts-product-name-size: <?php echo esc_html($ts_fs_product_name_mobile_font_size); ?>;
		--ts-product-price-line-height: <?php echo esc_html($ts_fs_product_name_mobile_font_line_height); ?>;
		--ts-product-price-size: <?php echo esc_html($ts_fs_product_price_mobile_font_size); ?>;
		--ts-product-price-line-height: <?php echo esc_html($ts_fs_product_price_mobile_font_line_height); ?>;
		--ts-heading-size: <?php echo esc_html($ts_fs_heading_mobile_font_size); ?>;
		--ts-heading-line-height: <?php echo esc_html($ts_fs_heading_mobile_font_line_height); ?>;
		--ts-h1-font-size: <?php echo esc_html($ts_fs_h1_mobile_font_size); ?>;
		--ts-h1-line-height: <?php echo esc_html($ts_fs_h1_mobile_font_line_height); ?>;
		--ts-h2-font-size: <?php echo esc_html($ts_fs_h2_mobile_font_size); ?>;
		--ts-h2-line-height: <?php echo esc_html($ts_fs_h2_mobile_font_line_height); ?>;
		--ts-h3-font-size: <?php echo esc_html($ts_fs_h3_mobile_font_size); ?>;
		--ts-h3-line-height: <?php echo esc_html($ts_fs_h3_mobile_font_line_height); ?>;
		--ts-h4-font-size: <?php echo esc_html($ts_fs_h4_mobile_font_size); ?>;
		--ts-h4-line-height: <?php echo esc_html($ts_fs_h4_mobile_font_line_height); ?>;
		
		--ts-heading-font-size: <?php echo esc_html($ts_fs_h3_mobile_font_size); ?>;
		--ts-heading-line-height: <?php echo esc_html($ts_fs_h3_mobile_font_line_height); ?>;
	}
}
.ts-header {
	--ts-hd-top-bg: <?php echo esc_html($ts_hd_top_bg); ?>;
	--ts-hd-top-color: <?php echo esc_html($ts_hd_top_color); ?>;
	--ts-hd-top-hover: <?php echo esc_html($ts_hd_top_hover); ?>;
	--ts-hd-top-border: <?php echo esc_html($ts_hd_top_border); ?>;
	--ts-hd-top-border-bottom: <?php echo esc_html($ts_hd_top_border_bottom); ?>;
	--ts-hd-middle-bg: <?php echo esc_html($ts_hd_middle_bg); ?>;
	--ts-hd-middle-color: <?php echo esc_html($ts_hd_middle_color); ?>;
	--ts-hd-middle-hover: <?php echo esc_html($ts_hd_middle_hover); ?>;
	--ts-hd-middle-border: <?php echo esc_html($ts_hd_middle_border); ?>;
	--ts-hd-bottom-bg: <?php echo esc_html($ts_hd_bottom_bg); ?>;
	--ts-hd-bottom-color: <?php echo esc_html($ts_hd_bottom_color); ?>;
	--ts-hd-bottom-hover: <?php echo esc_html($ts_hd_bottom_hover); ?>;
	
	--ts-hd-search-button-color: <?php echo esc_html($ts_hd_search_button_color); ?>;
	--ts-hd-search-button-bg: <?php echo esc_html($ts_hd_search_button_bg); ?>;
	--ts-vertical-menu-color: <?php echo esc_html($ts_vertical_menu_color); ?>;
	--ts-vertical-menu-bg: <?php echo esc_html($ts_vertical_menu_bg); ?>;
	
	--ts-hd-cart-count-bg: <?php echo esc_html($ts_hd_cart_count_bg); ?>;
	--ts-hd-cart-count-color: <?php echo esc_html($ts_hd_cart_count_color); ?>;

	--ts-hd-mobile-bg: <?php echo esc_html($ts_hd_mobile_bg); ?>;
	--ts-hd-mobile-color: <?php echo esc_html($ts_hd_mobile_color); ?>;
	--ts-hd-cart-mobile-count-bg: <?php echo esc_html($ts_hd_cart_mobile_count_bg); ?>;
	--ts-hd-cart-mobile-count-color: <?php echo esc_html($ts_hd_cart_mobile_count_color); ?>;
	
	--ts-menu-color: <?php echo esc_html($ts_menu_color); ?>;
	--ts-menu-hover: <?php echo esc_html($ts_menu_hover); ?>;
}
.footer-container {	
	--ts-footer-bg: <?php echo esc_html($ts_footer_bg); ?>;
	--ts-footer-color: <?php echo esc_html($ts_footer_color); ?>;
	--ts-footer-gray-color: <?php echo esc_html($ts_footer_gray_color); ?>;
	--ts-footer-heading-color: <?php echo esc_html($ts_footer_heading_color); ?>;
	--ts-footer-link-color: <?php echo esc_html($ts_footer_link_color); ?>;
	--ts-footer-link-hover: <?php echo esc_html($ts_footer_link_hover); ?>;
	--ts-footer-border: <?php echo esc_html($ts_footer_border); ?>;
}
<?php 	

/*** Truncate Product Title ***/
if( !empty($ts_prod_title_truncate) && isset($ts_prod_title_truncate_row) ):
?>
table.group_table .woocommerce-grouped-product-list-item__label a,
.woocommerce .products .product .product-name{
	display: -webkit-box;
	-webkit-box-orient: vertical;
	-webkit-line-clamp: <?php echo absint($ts_prod_title_truncate_row); ?>;
	overflow: hidden;
}
<?php endif; ?>