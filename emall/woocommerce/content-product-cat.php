<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_cat_title = isset($show_title) ? $show_title : true;
$show_cat_product_count = isset($show_product_count) ? $show_product_count : false;
$style = isset($style) ? $style : 'vertical';

$term_link = get_term_link( $category, 'product_cat' );
?>
<section <?php wc_product_cat_class('product-category product', $category); ?>>
	
	<div class="product-wrapper">

		<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
		
		<a href="<?php echo esc_url($term_link) ?>">
			<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
			?>
		</a>
		
		<a class="style-overlap" href="<?php echo esc_url($term_link) ?>"></a>
		
		<div class="meta-wrapper">
			<?php if( $show_cat_title ): ?>
			<h4 class="heading-title category-name">
				<a href="<?php echo esc_url($term_link) ?>">
					<?php if( $show_cat_title): ?>
						<?php echo esc_html($category->name); ?>
					<?php endif; ?>
				</a>
			</h4>
			<?php endif; ?>
			
			<?php
			if( $show_cat_product_count ){
				if( $style == 'vertical' || $style == 'vertical-3' ){
					echo apply_filters( 'woocommerce_subcategory_count_html', '<span class="count">'. sprintf( _n( '%s product', '%s products', $category->count, 'emall' ), $category->count ) .'</span>', $category );
				}
				elseif( $style == 'overlap' ){
					echo apply_filters( 'woocommerce_subcategory_count_html', '<span class="count">'. sprintf( _n( 'Product (%s)', 'Products (%s)', $category->count, 'emall' ), $category->count ) .'</span>', $category );
				}
				else{
					echo apply_filters( 'woocommerce_subcategory_count_html', '<span class="count">('. $category->count .')</span>', $category );
				}
			}
			?>
		
		</div>
		
		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

		<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
		
	</div>

</section>