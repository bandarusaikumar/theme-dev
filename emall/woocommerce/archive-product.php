<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 8.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$theme_options = emall_get_theme_options();

$extra_class = '';

$show_filter_area = emall_is_active_filter_area();

if( $show_filter_area ){
	$theme_options['ts_prod_cat_layout'] = '0-1-0';
}

$page_column_class = emall_page_layout_columns_class($theme_options['ts_prod_cat_layout']);

$main_content_class = '';
if( $show_filter_area ){
	$main_content_class .= 'style-' . $theme_options['ts_filter_widget_area_style'];
}

$show_breadcrumb = get_post_meta(wc_get_page_id( 'shop' ), 'ts_show_breadcrumb', true);
$show_page_title = apply_filters( 'woocommerce_show_page_title', true ) && get_post_meta(wc_get_page_id( 'shop' ), 'ts_show_page_title', true);

if( $show_breadcrumb || $show_page_title ){
	$extra_class = 'show_breadcrumb_'.$theme_options['ts_breadcrumb_layout'];
}

emall_breadcrumbs_title( $show_breadcrumb, $show_page_title, woocommerce_page_title(false) );

emall_shop_top_product_categories();
?>
<div class="page-container <?php echo esc_attr($extra_class) ?> <?php echo esc_attr($page_column_class['main_class']); ?>">
	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
	<div id="left-sidebar" class="ts-sidebar">
		<span class="close"></span>
		<aside>
		<?php
		if( is_active_sidebar($theme_options['ts_prod_cat_left_sidebar']) ){
			emall_product_on_sale_form();
			dynamic_sidebar( $theme_options['ts_prod_cat_left_sidebar'] );
		}
		?>
		</aside>
	</div>
	<div class="overlay"></div>
	<?php endif; ?>
	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div id="main-content" class="<?php echo esc_attr( $main_content_class ); ?>">
		<div id="primary" class="site-content">
		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( woocommerce_product_loop() ) : ?>
			
			<div class="before-loop-wrapper"><?php do_action( 'woocommerce_before_shop_loop' ); ?></div>
			
			<?php
			emall_filter_widget_area();
			
			if( class_exists('WC_Widget_Layered_Nav_Filters') ){
				echo '<div class="ts-active-filters">';
				the_widget('WC_Widget_Layered_Nav_Filters', array('title' => esc_html__('Active filters:', 'emall')));
				echo '</div>';
			}
			
			global $woocommerce_loop;

			if( absint($theme_options['ts_prod_cat_columns']) > 0 ){
				$woocommerce_loop['columns'] = absint($theme_options['ts_prod_cat_columns']);
			}
			?>

			<div class="woocommerce main-products columns-<?php echo esc_attr($woocommerce_loop['columns']); ?>" style="--ts-columns: <?php echo esc_attr($woocommerce_loop['columns']); ?>;">
			<?php
			woocommerce_product_loop_start();

			if( wc_get_loop_prop( 'total' ) ){
				while ( have_posts() ){
					the_post();

					do_action( 'woocommerce_shop_loop' );
				
					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();
			?>
			</div>
			
			<div class="after-loop-wrapper"><?php do_action( 'woocommerce_after_shop_loop' ); ?></div>
			
		<?php else: ?>

			<?php do_action( 'woocommerce_no_products_found' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
		</div>
	</div>
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<div id="right-sidebar" class="ts-sidebar">
			<span class="close"></span>
			<aside>
			<?php 
			if( is_active_sidebar($theme_options['ts_prod_cat_right_sidebar']) ){
				emall_product_on_sale_form();
				dynamic_sidebar( $theme_options['ts_prod_cat_right_sidebar'] );
			}
			?>
			</aside>
		</div>
		<div class="overlay"></div>
	<?php endif; ?>	
	
</div>
<?php get_footer(); ?>