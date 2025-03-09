<?php
$redux_url = '';
if( class_exists('ReduxFramework') ){
	$redux_url = ReduxFramework::$_url;
}

$logo_url 					= get_template_directory_uri() . '/images/logo.png'; 
$favicon_url 				= get_template_directory_uri() . '/images/favicon.ico';

$color_image_folder = get_template_directory_uri() . '/admin/assets/images/colors/';
$list_colors = array('default','orange','red','blue','orange-4','orange-6','pink','orange-7','green-2','green-4');
$preset_colors_options = array();
foreach( $list_colors as $color ){
	$preset_colors_options[$color] = array(
					'alt'      => $color
					,'img'     => $color_image_folder . $color . '.jpg'
					,'presets' => emall_get_preset_color_options( $color )
	);
}

$font_image_folder = get_template_directory_uri() . '/admin/assets/images/fonts/';
$list_fonts = array('Jost', 'Yantramanav','Roboto','Baloo-2');
$preset_fonts_options = array();
foreach( $list_fonts as $font ){
	$preset_fonts_options[$font] = array(
					'alt'      => $font
					,'img'     => $font_image_folder . $font . '.jpg'
					,'presets' => emall_get_preset_font_options( $font )
	);
}

$family_fonts = array(
	"Arial, Helvetica, sans-serif"                          => "Arial, Helvetica, sans-serif"
	,"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif"
	,"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif"
	,"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive"
	,"Courier, monospace"                                   => "Courier, monospace"
	,"Garamond, serif"                                      => "Garamond, serif"
	,"Georgia, serif"                                       => "Georgia, serif"
	,"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif"
	,"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace"
	,"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"
	,"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif"
	,"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif"
	,"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif"
	,"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif"
	,"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif"
	,"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif"
	,"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif"
	,"CustomFont"                          					=> "CustomFont"
);

$header_layout_options = array();
$header_image_folder = get_template_directory_uri() . '/admin/assets/images/headers/';
for( $i = 1; $i <= 9; $i++ ){
	$header_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Header Layout %s', 'emall'), $i)
		,'img' => $header_image_folder . 'header_v'.$i.'.jpg'
	);
}

$product_hover_style_options = array();
$product_hover_image_folder = get_template_directory_uri() . '/admin/assets/images/products/hover/';
for( $i = 1; $i <= 4; $i++ ){
	$product_hover_style_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Product Hover Style %s', 'emall'), $i)
		,'img' => $product_hover_image_folder . 'product_v'.$i.'.jpg'
	);
}

$product_style_options = array();
$product_image_folder = get_template_directory_uri() . '/admin/assets/images/products/';
for( $i = 1; $i <= 3; $i++ ){
	$product_style_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Product Style %s', 'emall'), $i)
		,'img' => $product_image_folder . 'product_v'.$i.'.jpg'
	);
}

$loading_screen_options = array();
$loading_image_folder = get_template_directory_uri() . '/images/loading/';
for( $i = 1; $i <= 10; $i++ ){
	$loading_screen_options[$i] = array(
		'alt'  => sprintf(esc_html__('Loading Image %s', 'emall'), $i)
		,'img' => $loading_image_folder . 'loading_'.$i.'.svg'
	);
}

$footer_block_options = emall_get_footer_block_options();

$custom_block_options = emall_get_custom_block_options();

$breadcrumb_layout_options = array();
$breadcrumb_image_folder = get_template_directory_uri() . '/admin/assets/images/breadcrumbs/';
for( $i = 1; $i <= 3; $i++ ){
	$breadcrumb_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Breadcrumb Layout %s', 'emall'), $i)
		,'img' => $breadcrumb_image_folder . 'breadcrumb_v'.$i.'.jpg'
	);
}

$sidebar_options = array();
$default_sidebars = emall_get_list_sidebars();
if( is_array($default_sidebars) ){
	foreach( $default_sidebars as $key => $_sidebar ){
		$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
	}
}

$product_loading_image = get_template_directory_uri() . '/images/prod_loading.gif';

$mailchimp_forms = array( 0 => '' );
$args = array(
	'post_type'			=> 'mc4wp-form'
	,'post_status'		=> 'publish'
	,'posts_per_page'	=> -1
);
$forms = new WP_Query( $args );
if( !empty( $forms->posts ) && is_array( $forms->posts ) ) {
	foreach( $forms->posts as $p ) {
		$mailchimp_forms[$p->ID] = $p->post_title;
	}
}

$option_fields = array();

/*** General Tab ***/
$option_fields['general'] = array(
	array(
		'id'        => 'section-logo-favicon'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Logo - Favicon', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_logo'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select an image file for the main logo', 'emall' )
		,'readonly' => false
		,'default'  => array( 'url' => $logo_url )
	)
	,array(
		'id'        => 'ts_logo_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Mobile Logo', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on mobile', 'emall' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_sticky'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Sticky Logo', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on sticky header', 'emall' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_menu_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Mobile Menu Logo', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on mobile menu', 'emall' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'emall' )
		,'default'  => '42'
	)
	,array(
		'id'        => 'ts_device_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width on Ipad', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'emall' )
		,'default'  => '42'
	)
	,array(
		'id'        => 'ts_mobile_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width on Mobile', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'emall' )
		,'default'  => '28'
	)
	,array(
		'id'        => 'ts_text_logo'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Text Logo', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Emall'
	)

	,array(
		'id'        => 'section-layout-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Layout Style', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Layout Fullwidth', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Layout Fullwidth', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Main Content Layout Fullwidth', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Footer Layout Fullwidth', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'       		=> 'ts_content_padding'
		,'type'         => 'slider'
		,'title'    	=> esc_html__( 'Layout Fullwidth - Padding', 'emall' )
		,'subtitle' 	=> esc_html__( 'Padding left and Padding right of layout (px)', 'emall' )
		,'default'      => 75
		,'min'          => 30
		,'step'         => 5
		,'max'          => 200
		,'display_value'=> 'text'
		,'desc'     	=> ''
		,'default'  	=> ''
		,'required'		=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'       	=> 'ts_layout_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Layout Style', 'emall' )
		,'subtitle' => esc_html__( 'You can override this option for the individual page', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'boxed' 	=> esc_html__( 'Boxed', 'emall' )
			,'wide' 	=> esc_html__( 'Wide', 'emall' )
			,'wider' 	=> esc_html__( 'Wider', 'emall' )
		)
		,'default'  => 'wider'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '0' )
	)
	,array(
		'id'       	=> 'ts_maximum_scale'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Maximum Scale', 'emall' )
		,'subtitle' => esc_html__( 'Allow users to zoom in/out on mobile device. Set 1 to disable', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			1 	=> 1
			,2 	=> 2
			,3 	=> 3
			,4 	=> 4
			,5 	=> 5
		)
		,'default'  => 1
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-rtl'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Right To Left', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_rtl'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Right To Left', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-smooth-scroll'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Smooth Scroll', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_smooth_scroll'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Smooth Scroll', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-back-to-top-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Back To Top Button', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_back_to_top_button'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_back_to_top_button_on_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button On Mobile', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-slider-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Slider Options', 'emall' )
		,'subtitle' => esc_html__( 'These options are used for sliders which are not added in post/page content. Ex: related products, related blogs, ...', 'emall' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_slider_loop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Slider Loop', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_slider_autoplay'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Slider Autoplay', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_slider_nav'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Slider Navigation', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_slider_dots'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Slider Bullets', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-page-not-found'
		,'type'     => 'section'
		,'title'    => esc_html__( '404 Page', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_404_page_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( '404 Image', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Choose image background for 404 text', 'emall' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array( 
		'id'       	=> 'ts_404_page' 
		,'type'     => 'select' 
		,'title'    => esc_html__( '404 Page', 'emall' ) 
		,'subtitle' => esc_html__( 'Select the page which displays the 404 page', 'emall' ) 
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	
	,array(
		'id'        => 'section-newsletter-signup-popup'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Newsletter Sign Up Popup', 'emall' )
		,'subtitle' => esc_html__( 'Show Newsletter Sign Up popup after loading page', 'emall' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_newsletter_signup'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Popup', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_newsletter_signup_homepage_only'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Homepage Only', 'emall' )
		,'subtitle' => esc_html__( 'Only show popup on homepage', 'emall' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_newsletter_signup_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Popup Image', 'emall' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_newsletter_signup_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Popup Title', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Newsletter Sign Up'
	)
	,array(
		'id'        => 'ts_newsletter_signup_description'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Popup Description', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
	)
	,array(
		'id'       	=> 'ts_newsletter_signup_mcform'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Popup Mailchimp Form', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $mailchimp_forms
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-loading-screen'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Loading Screen', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_loading_screen'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Loading Screen', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_loading_image'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Loading Image', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $loading_screen_options
		,'default'  => '1'
	)
	,array(
		'id'        => 'ts_custom_loading_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Custom Loading Image', 'emall' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'       	=> 'ts_display_loading_screen_in'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Display Loading Screen In', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'all-pages' 		=> esc_html__( 'All Pages', 'emall' )
			,'homepage-only' 	=> esc_html__( 'Homepage Only', 'emall' )
			,'specific-pages' 	=> esc_html__( 'Specific Pages', 'emall' )
		)
		,'default'  => 'all-pages'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_loading_screen_exclude_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Exclude Pages', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'all-pages' )
	)
	,array(
		'id'       	=> 'ts_loading_screen_specific_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Specific Pages', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'specific-pages' )
	)
	
	,array(
		'id'        => 'section-general-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'General Style', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_input_button_radius_size'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Radius Size', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set radius for input and button (in pixels)', 'emall' )
		,'default'  => '0'
		,'validate'	=> 'numeric'
	)
	,array(
		'id'        => 'ts_text_uppercase'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Uppercase Text', 'emall' )
		,'subtitle' => esc_html__( 'Uppercase text in somewhere: heading, tabs, ...', 'emall' )
		,'default'  => false
	)
);

/*** Color Scheme Tab ***/
$option_fields['color-scheme'] = array(
	array(
		'id'          => 'ts_color_scheme'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Preset Colors', 'emall' )
		,'subtitle'   => esc_html__( 'Select preset colors which are used for demos', 'emall' )
		,'desc'       => ''
		,'options'    => $preset_colors_options
		,'default'    => 'default'
		,'class'      => ''
	)
	,array(
		'id'        => 'section-general-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Main Colors', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_primary_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Primary Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color_in_bg_primary'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color In Background Primary Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_main_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Main Content Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Heading Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_gray_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Gray Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#888888'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_gray_2_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Gray 2 Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#666666'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link - Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link - Color Hover', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_blockquote_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Blockquote - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f9f9f9'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_lazyload_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'LazyLoad - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f5f5f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-input-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Input', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_input_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input - Border Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	
	,array(
		'id'        => 'section-buttons-color'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Buttons Color', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_btn_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button - Border Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_hover_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button - Background Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_hover_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button - Border Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-button-thumbnails-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Buttons Icon On Product Thumbnail', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_btn_thumb_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Thumbnail - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Thumbnail - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Thumbnail - Border Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Thumbnail - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_hover_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Thumbnail - Background Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_hover_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Thumbnail - Border Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-product-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_product_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-rating-color'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Rating', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_rating_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Rating Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_rated_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Reated Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-price-color'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Price', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Price Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#666666'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_sale_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Price Sale Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#aaaaaa'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-label-color'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Label', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_sale_label_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_sale_label_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_new_label_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_new_label_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#3bb477'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_feature_label_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_feature_label_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_outstock_label_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_outstock_label_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#919191'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-breadcrumb-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Breadcrumb Colors', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_breadcrumb_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb - Border Color', 'emall' )
		,'subtitle' => esc_html__( 'use for ipad', 'emall' )
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb - Link Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#666666'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_2_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Text(Has Background Image)', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-header-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'HEADER', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-hd-notice-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Notice', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_notice_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_notice_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-top-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Top', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_hd_top_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_top_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_top_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d1d1d1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_top_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top - Border Color', 'emall' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'emall' )
		,'default'  => array(
			'color' 	=> '#1f1f1f'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_top_border_bottom'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top - Border Bottom Color', 'emall' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'emall' )
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-middle-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Middle', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_hd_middle_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_middle_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_middle_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_middle_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle - Border Color', 'emall' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'emall' )
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-bottom-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Bottom', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_hd_bottom_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_bottom_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_bottom_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_bottom_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom - Border Color', 'emall' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'emall' )
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-cart-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Cart/Wishlist', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_hd_cart_count_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Cart/Wishlist Count Number - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_cart_count_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Cart/Wishlist Count Number - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-search-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Search', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_hd_search_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Search - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_search_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Search - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_search_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Search - Border Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#e1e1e1'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_search_button_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Search Button - Text Color', 'emall' )
		,'subtitle' => esc_html__( 'Support Header Version 10', 'emall' )
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_search_button_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Search Button - Background Color', 'emall' )
		,'subtitle' => esc_html__( 'Support Header Version 10', 'emall' )
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	
	,array(
		'id'        => 'section-header-mobile-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Mobile Colors', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_hd_mobile_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Mobile - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_mobile_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Mobile - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-cart-mobile-count'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Cart', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_hd_cart_mobile_count_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Cart Count Number - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_hd_cart_mobile_count_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Cart Count Number - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	
	,array(
		'id'        => 'section-menu-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Menu Colors', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_menu_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_menu_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_sub_menu_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sub Menu - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_sub_menu_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sub Menu - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu - Text Color', 'emall' )
		,'subtitle' => esc_html__( 'Support Header Version 10', 'emall' )
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu - Background Color', 'emall' )
		,'subtitle' => esc_html__( 'Support Header Version 10', 'emall' )
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-menu-mobile-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Mobile Menu', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_mobile_menu_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Mobile Menu - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_mobile_menu_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Mobile Menu - Text Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_mobile_menu_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Mobile Menu - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_mobile_menu_tab_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Mobile Menu - Tab Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#efefef'
			,'alpha'	=> 1
		)
	)
	
	,array(
		'id'        => 'section-footer-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Footer Colors', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_footer_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer - Background Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f4f4f4'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer - Text Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_gray_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer - Text Gray Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#666666'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer - Heading Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Link - Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#dd2831'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_link_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Link - Hover Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#db3c3c'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer - Border Color', 'emall' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#dddddd'
			,'alpha'	=> 1
		)
	)
);

/*** Typography Tab ***/
$option_fields['typography'] = array(
	array(
		'id'          => 'ts_preset_fonts'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Preset Fonts', 'emall' )
		,'subtitle'   => esc_html__( 'Select preset fonts which are used for demos', 'emall' )
		,'desc'       => ''
		,'options'    => $preset_fonts_options
		,'default'    => 'Jost'
		,'class'      => ''
	)
	,array(
		'id'        => 'section-fonts'
		,'type'     => 'section'
		,'title'    => esc_html__( 'FONT FAMILY', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_body_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> true
		,'line-height' 		=> false
		,'letter-spacing' 	=> false
		,'font-size'  		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '300'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_body_2_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body 2 Font', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> true
		,'line-height' 		=> false
		,'letter-spacing' 	=> false
		,'font-size'  		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '400'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_heading_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Heading Font', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> true
		,'line-height' 		=> false
		,'letter-spacing' 	=> true
		,'font-size'  		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '400'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Menu Font', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> true
		,'line-height' 		=> false
		,'letter-spacing' 	=> false
		,'font-size'  		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '500'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_sub_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Sub Menu Font', 'emall' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'line-height' 		=> false
		,'letter-spacing' 	=> false
		,'font-size'  		=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '300'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_button_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button Font', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> true
		,'font-style'   	=> false
		,'font-size'		=> false
		,'line-height' 		=> false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '500'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_product_name_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Name Font', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> true
		,'font-style'   	=> false
		,'font-size'		=> false
		,'line-height' 		=> false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '400'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	
	,array(
		'id'        => 'section-font-size'
		,'type'     => 'section'
		,'title'    => esc_html__( 'FONT SIZE', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_fs_body_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '16px'
			,'line-height'		=> '28px'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_body_2_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body 2', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '15px'
			,'line-height'		=> '24px'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_small_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font Small', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '12px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Menu', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '14px'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_sub_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Sub Menu', 'emall' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size' 		=> '15px'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_button_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '14px'
			,'letter-spacing'	=> '1px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_button_text_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button Text', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '14px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_product_name_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Name', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '16px'
			,'line-height'		=> '22px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_product_price_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Price', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '14px'
			,'line-height'		=> '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_detail_product_name_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Detail - Product Name', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '22px'
			,'line-height'		=> '28px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h1_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H1', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '48px'
			,'line-height'		=> '54px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h2_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H2', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '38px'
			,'line-height'		=> '44px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h3_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H3', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '32px'
			,'line-height'		=> '40px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h4_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H4', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '26px'
			,'line-height'		=> '32px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h5_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H5', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '20px'
			,'line-height'		=> '28px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h6_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H6', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '18px'
			,'line-height'		=> '24px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-font-sizes-responsive'
		,'type'     => 'section'
		,'title'    => esc_html__( 'RESPONSIVE FONT SIZE', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-font-size-tablet'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Tablet', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_fs_button_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '13px'
			,'letter-spacing'	=> '1px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_button_text_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button Text', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '13px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_product_name_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Name', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '15px'
			,'line-height'		=> '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_heading_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Heading', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '28px'
			,'line-height'		=> '34px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h1_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H1', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '40px'
			,'line-height'		=> '48px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h2_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H2', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height'		=> '38px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h3_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H3', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '26px'
			,'line-height'		=> '32px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h4_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H4', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '24px'
			,'line-height'		=> '30px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h5_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H5', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height'		=> '24px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h6_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H6', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '16px'
			,'line-height'		=> '22px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-font-size-mobile'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Mobile', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_fs_body_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '14px'
			,'line-height'		=> '24px'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_body_2_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body 2', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> true
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '13px'
			,'line-height'		=> '20px'
			,'letter-spacing'	=> '0.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_product_name_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Name', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '14px'
			,'line-height'		=> '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_product_price_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Price', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'		=> false
		,'font-weight'		=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'font-style'   	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-size'   		=> '13px'
			,'line-height'		=> '18px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_heading_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Heading', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '24px'
			,'line-height'		=> '30px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h1_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H1', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '32px'
			,'line-height'		=> '40px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h2_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H2', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '28px'
			,'line-height'		=> '34px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h3_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H3', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '22px'
			,'line-height'		=> '28px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_fs_h4_mobile_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H4', 'emall' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'line-height'		=> '28px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-custom-font'
		,'type'     => 'section'
		,'title'    => esc_html__( 'CUSTOM FONT', 'emall' )
		,'subtitle' => esc_html__( 'If you get the error message \'Sorry, this file type is not permitted for security reasons\', you can add this line define(\'ALLOW_UNFILTERED_UPLOADS\', true); to the wp-config.php file', 'emall' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_font_ttf'
		,'type'     => 'media'
		,'url'      => true
		,'preview'  => false
		,'title'    => esc_html__( 'Custom Font ttf', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Upload the .ttf font file. To use it, you select CustomFont in the Standard Fonts group', 'emall' )
		,'default'  => array( 'url' => '' )
		,'mode'		=> 'application'
	)
);

/*** Header Tab ***/
$option_fields['header'] = array(
	array(
		'id'        => 'section-header-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Options', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_header_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Header Layout', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $header_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_sticky_header'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Sticky Header', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_enable_store_notice'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Store Notice', 'emall' )
		,'subtitle' => esc_html__( 'Add a notice at the top of header', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_store_notice'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Store Notice Content', 'emall' )
		,'subtitle' => esc_html__( 'If you need countdown, you can use shortcode [ts_countdown before_text="your text" date="yyyy-mm-dd h:m:s"]', 'emall' )
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
		,'required'	=> array( 'ts_enable_store_notice', 'equals', '1' )
	)
	,array(
		'id'      => 'info-infomation'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Information', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_info'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Information' , 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_info_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Information Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_info', 'equals', '1' )
	)
	,array(
		'id'      => 'info-need-help'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Need Help', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_need_help'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Need Help', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_need_help_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Need Help Icon', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-info)', 'emall' )
		,'default'  => 'icon-info'
		,'required'	=> array( 'ts_enable_need_help', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_need_help_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Need Help Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_need_help', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_need_help_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Need Help Link', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_need_help', 'equals', '1' )
	)
	,array(
		'id'      => 'info-hotline'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Hotline', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_hotline'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Hotline', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'       	=> 'ts_hotline_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Hotline Style', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'icon' 		=> esc_html__( 'Icon', 'emall' )
			,'text' 	=> esc_html__( 'Text', 'emall' )
		)
		,'default'  => 'icon'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_enable_hotline', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_hotline_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hotline Icon', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-phone)', 'emall' )
		,'default'  => 'icon-phone'
		,'required'	=> array( 'ts_hotline_style', 'equals', 'icon' )
	)
	,array(
		'id'        => 'ts_mobile_hotline_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hotline Icon On Mobile', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-phone)', 'emall' )
		,'default'  => 'icon-smartphone'
		,'required'	=> array( 'ts_hotline_style', 'equals', 'icon' )
	)
	,array(
		'id'        => 'ts_hotline_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hotline Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_hotline_style', 'equals', 'text' )
	)
	,array(
		'id'        => 'ts_hotline_number'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hotline Number', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_hotline', 'equals', '1' )
	)
	,array(
		'id'      => 'info-location'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Location', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_location'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Location', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_location_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Location Icon', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-map)', 'emall' )
		,'default'  => 'icon-map'
		,'required'	=> array( 'ts_enable_location', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_location_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Location Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_location', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_location_link'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Location Link', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_location', 'equals', '1' )
	)
	,array(
		'id'      => 'info-track-order'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Track Order', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_track_order'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Track Order', 'emall' )
		,'subtitle' => esc_html__( 'Used for header version 10', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_track_order_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Track Order Icon', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-box)', 'emall' )
		,'default'  => 'icon-box'
		,'required'	=> array( 'ts_enable_track_order', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_track_order_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Track Order Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_track_order', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_track_order_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Track Order Link', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_track_order', 'equals', '1' )
	)
	,array(
		'id'      => 'info-hot-deals'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Hot Deals', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_hot_deals'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Hot Deals', 'emall' )
		,'subtitle' => esc_html__( 'Used for header version 10', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_hot_deals_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hot Deals Icon', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-hot-deals)', 'emall' )
		,'default'  => 'icon-hot-deals'
		,'required'	=> array( 'ts_enable_hot_deals', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_hot_deals_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hot Deals Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_hot_deals', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_hot_deals_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hot Deals Link', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_hot_deals', 'equals', '1' )
	)
	,array(
		'id'      => 'info-social-icons'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Social Icons', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_header_social_icons'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Social Icons', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_enable_header_social_text'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Social Text', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_facebook_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Facebook URL', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_facebook_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Facebook Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_text', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_twitter_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Twitter URL', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_twitter_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Twitter Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_text', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_instagram_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Instagram URL', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_instagram_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Instagram Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_text', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_youtube_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Youtube URL', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_youtube_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Youtube Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_text', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_linkedin_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'LinkedIn URL', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_linkedin_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Linkedin Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_text', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social URL', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_text', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_class'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social Icon', 'emall' )
		,'subtitle' => esc_html__( 'Put the class of icon. Emall support our custom font with prefix tb-icon-brand-social name. Ex: tb-icon-brand-facebook. Or you can support Font Awesome 5. Ex: fab fa-facebook-f', 'emall' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'      => 'info-header-language-currency'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Language & Currency', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_header_currency'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Currency', 'emall' )
		,'subtitle' => esc_html__( 'If you don\'t install WooCommerce Multilingual plugin, it may display demo html', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_header_language'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Language', 'emall' )
		,'subtitle' => esc_html__( 'If you don\'t install WPML plugin, it may display demo html', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'      => 'info-header-other'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Search/Wishlist/Account', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_search_by_category'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search By Category', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_search_popular_keywords'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Popular Keywords For Search', 'emall' )
		,'subtitle' => esc_html__( 'A comma separated list of keywords. Ex: Smartphone, Playstation, Laptop', 'emall' )
		,'desc'     => ''
		,'default'  => ''
		,'validate' => 'no_html'
		,'required'	=> array( 'ts_enable_search', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_enable_tiny_wishlist'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_enable_tiny_account'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'My Account', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'      => 'info-header-cart'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Cart', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_tiny_shopping_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
	,array(
		'id'        => 'ts_shopping_cart_free_shipping_message_bar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Free Shipping Message Bar', 'emall' )
		,'subtitle' => esc_html__( 'You need to add the Free Shipping method in WooCommerce settings page', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_shopping_cart_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Sidebar', 'emall' )
		,'subtitle' => esc_html__( 'Show shopping cart as sidebar instead of dropdown. You have to update cart after changing', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_show_shopping_cart_after_adding'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Shopping Cart After Adding Product To Cart', 'emall' )
		,'subtitle' => esc_html__( 'You have to enable Ajax add to cart in WooCommerce > Settings > Products', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
		,'required'	=> array( 'ts_shopping_cart_sidebar', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_add_to_cart_effect'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Add To Cart Effect', 'emall' )
		,'subtitle' => esc_html__( 'You have to enable Ajax add to cart in WooCommerce > Settings > Products. If "Show Shopping Cart After Adding Product To Cart" is enabled, this option will be disabled', 'emall' )
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'emall' )
			,'fly_to_cart'	=> esc_html__( 'Fly To Cart', 'emall' )
			,'show_popup'	=> esc_html__( 'Show Popup', 'emall' )
		)
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-mobile-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Mobile Options', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-mobile-email'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Mobile Menu Email', 'emall' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_mobile_email_icon'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Email Icon', 'emall' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 or our custom IcoMoon font. Ex: fas fa-info (default: icon-phone)', 'emall' )
		,'default'  => 'icon-gmail'
	)
	,array(
		'id'        => 'ts_mobile_email_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Email Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
	)
	
	,array(
		'id'        => 'section-breadcrumb-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Breadcrumb Options', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_breadcrumb_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Breadcrumb Layout', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $breadcrumb_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_breadcrumb_background_image'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Image', 'emall' )
		,'subtitle' => esc_html__( 'You can set background color by going to Color Scheme tab > Breadcrumb Colors section', 'emall' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_bg_breadcrumbs'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Breadcrumbs Background Image', 'emall' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a new image to override the default background image', 'emall' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_breadcrumb_bg_parallax'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Parallax', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_breadcrumb_product_taxonomy_description'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Taxonomy Description In Breadcrumbs', 'emall' )
		,'subtitle' => esc_html__( 'Show product taxonomy description (category, tags, ...) in breadcrumbs area on the product taxonomy page', 'emall' )
		,'default'  => false
	)
);

/*** Footer Tab ***/
$option_fields['footer'] = array(
	array(
		'id'       	=> 'ts_footer_block'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Footer Block', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_footer_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Menu Tab ***/
$option_fields['menu'] = array(
	array(
		'id'             => 'ts_menu_thumb_width'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Width', 'emall' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 60, step: 1, default value: 54', 'emall' )
		,'default'       => 54
		,'min'           => 5
		,'step'          => 1
		,'max'           => 60
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_height'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Height', 'emall' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 60, step: 1, default value: 54', 'emall' )
		,'default'       => 54
		,'min'           => 5
		,'step'          => 1
		,'max'           => 60
		,'display_value' => 'text'
	)
	,array(
		'id'        => 'ts_enable_menu_overlay'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Menu Background Overlay', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'emall' )
		,'off'		=> esc_html__( 'Disable', 'emall' )
	)
);

/*** Blog Tab ***/
$option_fields['blog'] = array(
	array(
		'id'        => 'section-blog'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Layout', 'emall' )
		,'subtitle' => esc_html__( 'This option is available when Front page displays the latest posts', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'emall')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-1'
	)
	,array(
		'id'       	=> 'ts_blog_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Columns', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			1	=> 1
			,2	=> 2
			,3	=> 3
		)
		,'default'  => '1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_read_more'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Read More Button', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_excerpt_strip_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt Strip All Tags', 'emall' )
		,'subtitle' => esc_html__( 'Strip all html tags in Excerpt', 'emall' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_blog_excerpt_max_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Excerpt Max Words', 'emall' )
		,'subtitle' => esc_html__( 'Input -1 to show full excerpt', 'emall' )
		,'desc'     => ''
		,'default'  => '-1'
	)

	,array(
		'id'        => 'section-blog-details'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog Details', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_details_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Details Layout', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'emall')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_blog_details_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_details_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Content', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Tags', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing - Use ShareThis', 'emall' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'emall')
		,'default'  => true
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Sharing - ShareThis Key', 'emall' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'emall' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_author_box'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author Box', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Navigation', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Related Posts', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_blog_details_comment_form'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment Form', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
);

/*** WooCommerce Tab ***/
$option_fields['woocommerce'] = array(
	array(
		'id'        => 'section-product-label'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Label', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_label_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Label Style', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'rectangle' 	=> esc_html__( 'Rectangle', 'emall' )
			,'circle' 		=> esc_html__( 'Circle', 'emall' )
		)
		,'default'  => 'rectangle'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_product_show_new_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product New Label', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_product_new_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'New'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_show_new_label_time'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Time', 'emall' )
		,'subtitle' => esc_html__( 'Number of days which you want to show New label since product is published', 'emall' )
		,'desc'     => ''
		,'default'  => '30'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_feature_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Feature Label Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Hot'
	)
	,array(
		'id'        => 'ts_product_out_of_stock_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Out Of Stock Label Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sold out'
	)
	,array(
		'id'       	=> 'ts_show_sale_label_as'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Show Sale Label As', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'text' 		=> esc_html__( 'Text', 'emall' )
			,'number' 	=> esc_html__( 'Number', 'emall' )
			,'percent' 	=> esc_html__( 'Percent', 'emall' )
		)
		,'default'  => 'percent'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_product_sale_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sale Label Text', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sale'
	)
	
	,array(
		'id'        => 'section-product-title'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Title In The Products List', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_title_truncate'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Truncate Product Title', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'       	=> 'ts_prod_title_truncate_row'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Rows', 'emall' )
		,'subtitle' => esc_html__( 'Number of rows to show, the remains will be replaced with ...', 'emall' )
		,'desc'     => ''
		,'default'  => '2'
		,'validate' => 'numeric'
		,'required'	=> array( 'ts_prod_title_truncate', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-product-hover'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Style', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_style'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Style', 'emall' )
		,'subtitle' => esc_html__( 'Select the style on product', 'emall' )
		,'desc'     => ''
		,'options'  => $product_style_options
		,'default'  => 'v1'
	)
	,array(
		'id'       	=> 'ts_product_hover_style'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Hover Style', 'emall' )
		,'subtitle' => esc_html__( 'Select the style when hovering on product', 'emall' )
		,'desc'     => ''
		,'options'  => $product_hover_style_options
		,'default'  => 'v1'
	)
	,array(
		'id'       	=> 'ts_product_text_align'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Text Align', 'emall' )
		,'subtitle' => esc_html__( 'Align product name, price, categories,..', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'default' 	=> esc_html__( 'Default', 'emall' )
			,'center' 	=> esc_html__( 'Center', 'emall' )
		)
		,'default'  => 'center'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_effect_product'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Back Product Image', 'emall' )
		,'subtitle' => esc_html__( 'Show another product image on hover. It will show an image from Product Gallery', 'emall' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_product_tooltip'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tooltip', 'emall' )
		,'subtitle' => esc_html__( 'Show tooltip when hovering on buttons/icons on product', 'emall' )
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-lazy-load'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Lazy Load', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_lazy_load'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Lazy Load', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_placeholder_img'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Placeholder Image', 'emall' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => $product_loading_image )
	)
	
	,array(
		'id'        => 'section-quickshop'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Quickshop', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_quickshop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Quickshop', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)

	,array(
		'id'        => 'section-catalog-mode'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Catalog Mode', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_catalog_mode'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Catalog Mode', 'emall' )
		,'subtitle' => esc_html__( 'Hide all Add To Cart buttons on your site. You can also hide Shopping cart by going to Header tab > turn Shopping Cart option off', 'emall' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-ajax-search'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ajax Search', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_ajax_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Ajax Search', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_ajax_search_number_result'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Results', 'emall' )
		,'subtitle' => esc_html__( 'Input -1 to show all results', 'emall' )
		,'desc'     => ''
		,'default'  => '6'
	)
	
	,array(
		'id'        => 'section-product-category-images'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Category Images', 'emall' )
		,'subtitle' => esc_html__( 'With old images, you need to regenerate thumbnails after changing settings', 'emall' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_product_cat_image_width'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Thumbnail Width', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '650'
		,'validate' => 'numeric'
	)
	,array(
		'id'        => 'ts_product_cat_image_height'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Thumbnail Height', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '650'
		,'validate' => 'numeric'
	)
	,array(
		'id'        => 'ts_product_cat_image_crop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Crop Thumbnail', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
);

/*** Shop/Product Category Tab ***/
$option_fields['shop-product-category'] = array(
	array(
		'id'        => 'ts_prod_cat_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Shop/Product Category Layout', 'emall' )
		,'subtitle' => esc_html__( 'Sidebar is only available if Filter Widget Area is disabled', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'emall')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_cat_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'section-shop-top-categories'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Top Product Categories', 'emall' )
		,'subtitle' => esc_html__( 'These options are only available if shop/product category page displays both categories and products', 'emall' )
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_top_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Top Product Categories Columns', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'3'			=> '3'
			,'4'		=> '4'
			,'5'		=> '5'
			,'6'		=> '6'
		)
		,'default'  => '3'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_top_cat_slider'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Top Product Categories Slider', 'emall' )
		,'subtitle' => esc_html__( 'Slider is only enabled if there are at least 4 items', 'emall' )
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-shop-filters'
		,'type'     => 'section'
		,'title'    => esc_html__( 'SORT & FILTERS', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_prod_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Columns', 'emall' )
		,'subtitle' => esc_html__( '1 Column is the List layout', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'1'			=> '1'
			,'2'		=> '2'
			,'3'		=> '3'
			,'4'		=> '4'
			,'5'		=> '5'
		)
		,'default'  => '4'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_columns_selector'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Columns Selector', 'emall' )
		,'subtitle' => esc_html__( 'Allow users to select columns on frontend', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_per_page'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Products Per Page', 'emall' )
		,'subtitle' => esc_html__( 'Number of products per page', 'emall' )
		,'desc'     => ''
		,'default'  => '12'
	)
	,array(
		'id'        => 'ts_filter_widget_area'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Filter Widget Area', 'emall' )
		,'subtitle' => esc_html__( 'Display Filter Widget Area on the Shop/Product Category page. If enabled, sidebar will be removed', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'		=> 'ts_filter_widget_area_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Filter Widget Area Style', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'top'			=> esc_html__( 'Filter Top', 'emall' )
			,'popup'		=> esc_html__( 'Filter Popup', 'emall' )
		)
		,'default'  => 'popup'
		,'select2'	=> array( 'allowClear' => false, 'minimumResultsForSearch' => 'Infinity' )
		,'required'	=> array( 'ts_filter_widget_area', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_cat_per_page_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products Per Page Dropdown', 'emall' )
		,'subtitle' => esc_html__( 'Allow users to select number of products per page', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_onsale_checkbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products On Sale Checkbox', 'emall' )
		,'subtitle' => esc_html__( 'Allow users to view only the discounted products', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_loading_type'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Loading Type', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'default'			=> esc_html__( 'Default', 'emall' )
			,'infinity-scroll'	=> esc_html__( 'Infinity Scroll', 'emall' )
			,'load-more-button'	=> esc_html__( 'Load More Button', 'emall' )
			,'ajax-pagination'	=> esc_html__( 'Ajax Pagination', 'emall' )
		)
		,'default'  => 'ajax-pagination'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'section-shop-product-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'PRODUCT OPTIONS', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_cat_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - Grid View', 'emall' )
		,'subtitle' => esc_html__( 'Show product description on grid view', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - Grid View - Limit Words', 'emall' )
		,'subtitle' => esc_html__( 'Number of words to show product description on grid view. It is also used for product elements. To show all, input -1', 'emall' )
		,'desc'     => esc_html__( 'HTML is allowed. So, if your description has html, make sure that this value is large enough. If not, your layout may be broken', 'emall' )
		,'default'  => '-1'
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - List View', 'emall' )
		,'subtitle' => esc_html__( 'Show product description on list view', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - List View - Limit Words', 'emall' )
		,'subtitle' => esc_html__( 'Number of words to show product description on list view. It is also used for product elements. To show all, input -1', 'emall' )
		,'desc'     => esc_html__( 'HTML is allowed. So, if your description has html, make sure that this value is large enough. If not, your layout may be broken', 'emall' )
		,'default'  => '-1'
	)
	,array(
		'id'        => 'ts_prod_cat_color_swatch'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Swatches', 'emall' )
		,'subtitle' => esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'emall' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_number_color_swatch'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Number Of Color Swatches', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			2	=> 2
			,3	=> 3
			,4	=> 4
			,5	=> 5
			,6	=> 6
		)
		,'default'  => '3'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_cat_color_swatch', 'equals', '1' )
	)
);

/*** Product Details Tab ***/
$option_fields['product-details'] = array(
	array(
		'id'        => 'ts_prod_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Layout', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'emall')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'emall')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_breadcrumb'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Breadcrumb', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_cloudzoom'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Cloud Zoom', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_lightbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Lightbox', 'emall' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Attribute Dropdown', 'emall' )
		,'subtitle' => esc_html__( 'If you turn it off, the dropdown will be replaced by image or text label', 'emall' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_color_text'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Attribute Text', 'emall' )
		,'subtitle' => esc_html__( 'Show text for the Color attribute instead of color/color image', 'emall' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_attr_dropdown', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_attr_color_variation_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Attribute Variation Thumbnail', 'emall' )
		,'subtitle' => esc_html__( 'Use the variation thumbnail for the Color attribute. The Color slug has to be "color". You need to specify Color for variation (not any)', 'emall' )
		,'default'  => true
		,'required'	=> array( 'ts_prod_attr_color_text', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail_border'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail Border', 'emall' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_gallery_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Gallery Layout', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'vertical'			=> esc_html__( 'Vertical', 'emall' )
			,'horizontal'		=> esc_html__( 'Horizontal', 'emall' )
			,'grid-1-column'	=> esc_html__( 'Grid - 1 Column', 'emall' )
			,'grid-2-columns'	=> esc_html__( 'Grid - 2 Columns', 'emall' )
			,'top-slider'		=> esc_html__( 'Top Slider', 'emall' )
		)
		,'default'  => 'vertical'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_thumbnails_slider_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnails Slider On Mobile', 'emall' )
		,'subtitle' => esc_html__( 'If enabled, it will change all thumbnail/gallery layouts to slider on mobile', 'emall' )
		,'default'  => true
		,'required'	=> array('ts_prod_gallery_layout', 'contains', 'grid')
	)
	,array(
		'id'        => 'ts_prod_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_title_in_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title In Content', 'emall' )
		,'subtitle' => esc_html__( 'Display the product title in the page content instead of above the breadcrumbs', 'emall' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_availability'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Availability', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_low_stock_notice'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Low Stock Notice', 'emall' )
		,'subtitle' => esc_html__( 'Show a notice when stock is low. You set threshold in WooCommerce settings or product editor. Only support simple product', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_short_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_count_down'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Count Down', 'emall' )
		,'subtitle' => esc_html__( 'You have to activate ThemeSky plugin', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_ajax_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Ajax Add To Cart', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_add_to_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_buy_now'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Buy Now Button', 'emall' )
		,'subtitle' => esc_html__( 'Only support the simple and variable products', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_form_cart_fixed_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Form Cart Fixed Bottom On Mobile', 'emall' )
		,'subtitle' => esc_html__( 'Only support the simple and variable products', 'emall' )
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_contact_page'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Contact Page', 'emall' )
		,'subtitle' => esc_html__( 'If selected, it will add a link to the selected page which may allow customer to ask about product', 'emall' )
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	,array(
		'id'        => 'ts_prod_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_tag'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tags', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_views'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Views', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'       	=> 'ts_prod_views_based_on'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Views Based On', 'emall' )
		,'subtitle' => esc_html__( 'Counter only starts when you enable', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'all-time'	=> esc_html__( 'All Time', 'emall' )
			,'current'	=> esc_html__( 'Current Time', 'emall' )
		)
		,'default'  => 'current'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_views', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing - Use ShareThis', 'emall' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'emall' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sharing - ShareThis Key', 'emall' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'emall' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_size_chart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Size Chart', 'emall' )
		,'subtitle' => esc_html__( 'Size Chart Popup is only available if Attribute Dropdown is disabled and the slug of the Size attribute contain "size". Ex: taille-size', 'emall' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_more_less_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product More/Less Content', 'emall' )
		,'subtitle' => esc_html__( 'Show more/less content in the Description tab', 'emall' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_summary_custom_content'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Summary Custom Content', 'emall' )
		,'subtitle' => esc_html__( 'Add your custom content to summary area', 'emall' )
		,'desc'     => ''
		,'options'  => $custom_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_custom_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_bottom_content'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Bottom Content', 'emall' )
		,'subtitle' => esc_html__( 'Add your content to the bottom of the product page', 'emall' )
		,'desc'     => ''
		,'options'  => $custom_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_custom_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)

	,array(
		'id'        => 'section-product-tabs'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Tabs', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'       	=> 'ts_prod_tabs_accordion'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Accordion', 'emall' )
		,'subtitle' => esc_html__( 'Show tabs as accordion. If you add more custom tabs, please make sure that your tab content has heading (h2) at the top', 'emall' )
		,'desc'     => ''
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'emall' )
			,'desktop'		=> esc_html__( 'On Desktop', 'emall' )
			,'mobile'		=> esc_html__( 'On Mobile', 'emall' )
			,'both'			=> esc_html__( 'On All Screens', 'emall' )
		)
		,'default'  => 'mobile'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_custom_tab'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Custom Tab', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Custom Tab Title', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom tab'
		,'required'	=> array( 'ts_prod_custom_tab', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Product Custom Tab Content', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => esc_html__( 'Your custom content goes here. You can add the content for individual product', 'emall' )
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
		,'required'	=> array( 'ts_prod_custom_tab', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-ads-banner'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ads Banner', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_ads_banner'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Ads Banner', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_ads_banner_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Ads Banner Content', 'emall' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
	)
	
	,array(
		'id'        => 'section-related-up-sell-products'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Related - Up-Sell', 'emall' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_related'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Related Products', 'emall' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
	,array(
		'id'        => 'ts_prod_upsells'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Up-Sell Products', 'emall' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'emall' )
		,'off'		=> esc_html__( 'Hide', 'emall' )
	)
);

/*** Custom Code Tab ***/
$option_fields['custom-code'] = array(
	array(
		'id'        => 'ts_custom_css_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom CSS Code', 'emall' )
		,'subtitle' => ''
		,'mode'     => 'css'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_custom_javascript_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom Javascript Code', 'emall' )
		,'subtitle' => ''
		,'mode'     => 'javascript'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
);