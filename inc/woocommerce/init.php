<?php
/**
 * Call WooCommerce functions and init files.
 *
 * @package Mm
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Theme WooCommerce setup.
 */
function mm_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			/**
			 * Check for other sizes: https://docs.woocommerce.com/document/image-sizes-theme-developers/#section-1
			 */
			'gallery_thumbnail_image_width' => 140,
		)
	);

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'mm_woocommerce_setup' );

/**
 * Add WooCommerce classes to body tag.
 *
 * @param array $classes Current body classes.
 *
 * @return mixed
 */
function mm_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'mm_woocommerce_active_body_class' );

/**
 * Before Content.
 *
 * Wraps all WooCommerce content in wrappers which match the theme markup.
 *
 * @return void
 */
function mm_woocommerce_wrapper_before() {
	$has_gallery = ! get_post_meta( get_the_ID(), 'remove-gallery', true );
	?>
	<div class="entry-content clearfix <?php echo $has_gallery ? esc_attr( ' entry-content-wide' ) : ''; ?>">
	<?php
}

add_action( 'woocommerce_before_main_content', 'mm_woocommerce_wrapper_before' );

/**
 * After Content.
 *
 * Closes the wrapping divs.
 *
 * @return void
 */
function mm_woocommerce_wrapper_after() {
	?>
	</div><!-- .entry-content.entry-content-wide -->
	<?php
}

add_action( 'woocommerce_after_main_content', 'mm_woocommerce_wrapper_after' );

/**
 * Remove WooCommerce fields.
 */
function mm_remove_wc_fields() {
	$has_gallery = ! get_post_meta( get_the_ID(), 'remove-gallery', true );
	$has_tabs    = ! get_post_meta( get_the_ID(), 'remove-tabs', true );
	$has_meta    = ! get_post_meta( get_the_ID(), 'remove-meta', true );
	$has_price   = ! get_post_meta( get_the_ID(), 'remove-price', true );

	if ( ! $has_gallery ) {
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	}

	if ( ! $has_tabs ) {
		add_filter(
			'woocommerce_product_tabs',
			function ( $tabs ) {
				unset( $tabs['description'] );
				unset( $tabs['additional_information'] );
				unset( $tabs['reviews'] );

				return $tabs;
			}
		);
	}

	if ( ! $has_meta ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	}

	if ( ! $has_price ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	}
}

add_action( 'template_redirect', 'mm_remove_wc_fields' );

/**
 * Replace "Add to cart" text.
 *
 * @param string $current Current button text.
 *
 * @return string
 */
function mm_replace_instant_buy_text( $current ) {
	$instant_buy_active = get_post_meta( get_the_ID(), 'instant-buy', true );

	if ( $instant_buy_active ) {
		return esc_html__( 'Order Now', 'mm' );
	}

	return $current;
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'mm_replace_instant_buy_text' );

/**
 * Skip redirect cart url.
 *
 * @param string $url Cart redirect url.
 *
 * @return string
 */
function mm_skip_cart_redirect_checkout( $url ) {
	return wc_get_checkout_url();
}

add_filter( 'woocommerce_add_to_cart_redirect', 'mm_skip_cart_redirect_checkout' );

/**
 * Remove "Added to cart" message.
 *
 * @param string $message Default message.
 *
 * @return string
 */
function mm_remove_add_to_cart_message( $message ) {
	return '';
}

add_filter( 'wc_add_to_cart_message_html', 'mm_remove_add_to_cart_message' );
