<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo $product->get_image(); ?>
		<span class="product-title"><?php echo $product->get_name(); ?></span>
	</a>
	<div class="buttons">
		<div class="addtocart">
			<?php echo $product->get_price_html(); ?>
		</div>
		<div class="quickview">
			<?php echo do_shortcode('[c4d-woo-qv button_text="Quick View" button_icon="fa fa-search"]')?>
		</div>
		<div class="wishlist">
			<?php echo do_shortcode('[c4d-woo-wishlist-button icon="fa fa-heart-o" label=""]')?>
		</div>
		<div class="compare">
			<?php echo do_shortcode('[c4d-woo-wishlist-button icon="fa fa-heart-o" label=""]')?>
		</div>
	</div>
	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
