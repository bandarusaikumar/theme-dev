<?php
$emall_theme_options = emall_get_theme_options();
?>
<header class="<?php echo esc_attr( emall_get_header_classes() ); ?>">
	<div class="header-template">
		<?php if( $emall_theme_options['ts_header_currency'] || $emall_theme_options['ts_header_language'] || (function_exists('ts_header_social_icons') && $emall_theme_options['ts_enable_header_social_icons']) || ($emall_theme_options['ts_enable_location'] && $emall_theme_options['ts_location_text']) || ($emall_theme_options['ts_enable_info'] && $emall_theme_options['ts_info_text']) || ($emall_theme_options['ts_enable_need_help'] && $emall_theme_options['ts_need_help_text']) ): ?>
		<div class="header-top hidden-phone info-center">
			<div class="container">
				<div class="header-left">
					<?php emall_need_help() ?>
				</div>
				
				<?php emall_info(); ?>
				
				<div class="header-right">
					<?php emall_location(); ?>
					
					<?php if( function_exists('ts_header_social_icons') && $emall_theme_options['ts_enable_header_social_icons'] ): ?>
					<div class="header-social-icon"><?php ts_header_social_icons(); ?></div>
					<?php endif; ?>
					
					<?php if( $emall_theme_options['ts_header_language'] ): ?>
					<div class="header-language"><?php emall_wpml_language_selector(); ?></div>
					<?php endif; ?>
					
					<?php if( $emall_theme_options['ts_header_currency'] ): ?>
					<div class="header-currency"><?php emall_woocommerce_multilingual_currency_switcher(); ?></div>
					<?php endif; ?></div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="header-middle header-sticky logo-center">
			<div class="container">
				
				<div class="header-left hidden-phone">
					<div class="menu-wrapper">
						<div class="ts-menu">
						<?php 
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper','theme_location' => 'primary','walker' => new Emall_Walker_Nav_Menu() ) );
							}
							else{
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper' ) );
							}
						?>
						</div>
					</div>
				</div>
				
				<div class="logo-wrapper"><?php emall_theme_logo(); ?></div>
				
				<?php emall_hotline(); ?>
				
				<div class="header-right">
					<?php emall_hotline(); ?>
				
					<?php if( $emall_theme_options['ts_enable_search'] ): ?>
					<div class="search-button search-icon">
						<span class="icon"></span>
					</div>
					<?php endif; ?>
					
					<?php if( $emall_theme_options['ts_enable_tiny_account'] ): ?>
					<div class="my-account-wrapper hidden-phone">							
						<?php echo emall_tiny_account(); ?>
					</div>
					<?php endif; ?>
					
					<?php if( class_exists('YITH_WCWL') && $emall_theme_options['ts_enable_tiny_wishlist'] ): ?>
						<div class="my-wishlist-wrapper hidden-phone"><?php echo emall_tini_wishlist(); ?></div>
					<?php endif; ?>
					
					<?php if( $emall_theme_options['ts_enable_tiny_shopping_cart'] ): ?>
					<div class="shopping-cart-wrapper">
						<?php echo emall_tiny_cart(); ?>
					</div>
					<?php endif; ?>
					
					<div class="ts-mobile-icon-toggle visible-phone">
						<span class="icon"></span>
					</div>
				</div>
			</div>					
		</div>
	</div>	
</header>