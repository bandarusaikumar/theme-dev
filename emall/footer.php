<?php 
	$emall_theme_options = emall_get_theme_options();
?>
</div><!-- #main .wrapper -->
	<?php if( !is_page_template('page-templates/blank-page-template.php') && $emall_theme_options['ts_footer_block'] ): ?>
	<footer id="colophon" class="footer-container footer-area loading <?php echo esc_attr( $emall_theme_options['ts_footer_layout_fullwidth'] ? 'footer-fullwidth' : '' ) ?>">
		<?php emall_get_footer_content( $emall_theme_options['ts_footer_block'] ); ?>
	</footer>
	<?php endif; ?>
</div><!-- #page -->

<?php if( !is_page_template('page-templates/blank-page-template.php') ): ?>
		
	<!-- Group Header Button -->
	<div id="group-icon-header" class="ts-floating-sidebar">
		<div class="overlay"></div>
		<span class="close"></span>
		<div class="ts-sidebar-content <?php echo esc_attr( ( has_nav_menu( 'vertical' ) ) ? '' : 'no-tab' ); ?>">
		
			<div class="sidebar-content">
			<?php if( $emall_theme_options['ts_header_layout'] == 'v6' || $emall_theme_options['ts_header_layout'] == 'v9' || $emall_theme_options['ts_header_layout'] == 'v10' ) :?>
				<ul class="tab-mobile-menu">
					<li id="main-menu" class="active"><span><?php esc_html_e('Menu', 'emall'); ?></span></li>
					
					<?php if( has_nav_menu( 'vertical' ) ): ?>
					<li id="vertical-menu"><span><?php echo esc_html(wp_get_nav_menu_name('vertical')); ?></span></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
		
				<h6 class="menu-title"><span><?php esc_html_e('Menu', 'emall'); ?></span></h6>
				
				<div class="mobile-menu-wrapper ts-menu tab-menu-mobile">
					<div class="menu-main-mobile">
						<?php 
						if( has_nav_menu( 'mobile' ) ){
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'mobile', 'walker' => new Emall_Walker_Nav_Menu() ) );
						}else{
							if( has_nav_menu( 'primary' ) ){
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'primary', 'walker' => new Emall_Walker_Nav_Menu() ) );
							}else{
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu' ) );
							}
						}
						?>
					</div>
				</div>
				
				<?php if( ($emall_theme_options['ts_header_layout'] == 'v6' || $emall_theme_options['ts_header_layout'] == 'v9') && has_nav_menu( 'vertical' ) ): ?>
					<div class="mobile-menu-wrapper ts-menu tab-vertical-menu">
						<div class="vertical-menu-wrapper">			
							<?php
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'vertical-menu', 'theme_location' => 'vertical', 'walker' => new Emall_Walker_Nav_Menu() ) );							?>
						</div>
					</div>
				<?php endif; ?>
				
				<div class="group-button-header">
					<div class="meta-middle">
					
						<?php if( $emall_theme_options['ts_enable_tiny_account'] ): ?>
						<div class="my-account-wrapper">							
							<?php echo emall_tiny_account(false); ?>
						</div>
						<?php endif; ?>
						
						<?php if( class_exists('YITH_WCWL') && $emall_theme_options['ts_enable_tiny_wishlist'] ): ?>
						<div class="my-wishlist-wrapper"><?php echo emall_tini_wishlist(); ?></div>
						<?php endif; ?>
						
					</div>
					<?php if( $emall_theme_options['ts_mobile_email_text'] || ( $emall_theme_options['ts_enable_hotline'] && $emall_theme_options['ts_hotline_number'] ) ){ ?>
					<div class="meta-bottom">
						<?php emall_hotline(); ?>
						<?php emall_mobile_email(); ?>
					</div>
					<?php } ?>
					
					<?php if( $emall_theme_options['ts_header_language'] || $emall_theme_options['ts_header_currency'] ){ ?>
					<div class="meta-language-currency">
					
					<?php if( $emall_theme_options['ts_header_language'] ): ?>
					<div class="header-language"><?php emall_wpml_language_selector(); ?></div>
					<?php endif; ?>
					
					<?php if( $emall_theme_options['ts_header_currency'] ): ?>
					<div class="header-currency"><?php emall_woocommerce_multilingual_currency_switcher(); ?></div>
					<?php endif; ?>
					
					</div>
					<?php } ?>
				</div>
			</div>	
		</div>
	</div>
		
<?php endif; ?>

<!-- Search Sidebar -->
<?php if( $emall_theme_options['ts_enable_search'] ): ?>
	<div id="ts-search-sidebar" class="ts-floating-sidebar">
		<div class="overlay"></div>
		<div class="ts-sidebar-content">
			<span class="close"></span>
			<div class="container">
			<?php
				emall_get_search_form_by_category();
				emall_search_keywords();
			?>
			</div>
			
			<div class="ts-search-result-container container woocommerce"></div>
		</div>
	</div>
<?php endif; ?>

<!-- Shopping Cart Floating Sidebar -->
<?php if( class_exists('WooCommerce') && $emall_theme_options['ts_enable_tiny_shopping_cart'] && $emall_theme_options['ts_shopping_cart_sidebar'] && !is_cart() && !is_checkout() ): ?>
<div id="ts-shopping-cart-sidebar" class="ts-floating-sidebar">
	<div class="overlay"></div>
	<div class="ts-sidebar-content">
		<span class="close"></span>
		<div class="ts-tiny-cart-wrapper"></div>
	</div>
</div>
<?php endif; ?>

<?php 
if( ( !wp_is_mobile() && $emall_theme_options['ts_back_to_top_button'] ) || ( wp_is_mobile() && $emall_theme_options['ts_back_to_top_button_on_mobile'] ) ): 
?>
<div id="to-top" class="scroll-button">
	<a class="scroll-button" href="javascript:void(0)" title="<?php esc_attr_e('Back to Top', 'emall'); ?>"><?php esc_html_e('Back to Top', 'emall'); ?></a>
</div>
<?php endif; ?>

<?php 
wp_footer(); ?>
</body>
</html>