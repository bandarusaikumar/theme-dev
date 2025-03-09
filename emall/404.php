<?php 
get_header();

$theme_options = emall_get_theme_options();
$classes = array();
$classes[] = 'show_breadcrumb_' . $theme_options['ts_breadcrumb_layout'];

$image_404 = is_array($theme_options['ts_404_page_image'])?$theme_options['ts_404_page_image']['url']:$theme_options['ts_404_page_image'];
if( !$image_404 ){
	$image_404 = get_template_directory_uri() . '/images/img-404.png'; 
}

emall_breadcrumbs_title(false, false, '');
?>
	<div class="page-container <?php echo esc_attr(implode(' ', $classes)); ?>">
		<div id="main-content">	
			<div id="primary" class="site-content">
				<article>
					<div class="not-found">
						<div class="image-404">
							<img loading="lazy" src="<?php echo esc_url($image_404); ?>" alt="<?php esc_attr_e('404 image', 'emall'); ?>">
						</div>
						<h1><?php esc_html_e('OOOps, Sorry!!!', 'emall'); ?></h1>
						<p><?php esc_html_e('We\'re sorry, but the page you were looking for doesn\'t exist.', 'emall'); ?></p>
						<a href="<?php echo esc_url( home_url('/') ) ?>" class="button"><?php esc_html_e('Go Home', 'emall'); ?></a>
					</div>
				</article>
			</div>
		</div>
	</div>
<?php
get_footer();