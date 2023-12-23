<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_title_warp_start', 6 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_custom_loop_product_link_open', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_custom_loop_product_link_close', 20 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_custom_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 6 );
add_action('woocommerce_shop_loop_item_title', 'display_colorpicker_value', 20);
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_title_warp_end', 22 );
add_filter('woocommerce_product_add_to_cart_text', 'change_add_to_cart_text', 10, 2);


function woocommerce_custom_loop_product_link_open() {
	echo '<a class="thumb-link tumb-link-' . get_the_ID() . '" href="' . get_permalink( get_the_ID() ) . '">';
}

function woocommerce_custom_loop_product_link_close() {
	echo '</a>';
}

function woocommerce_custom_template_loop_product_title() {
	echo '<h2><a href="' . get_permalink( get_the_ID() ) . '">' . get_the_title( get_the_ID() ) . '</a></h2>';
}

// Add a function to display the "colorpicker_value" attribute in the woocommerce_shop_loop_item_title hook
function display_colorpicker_value() {
	global $product;


	if (is_a($product, 'WC_Product')) {
		// get the attributes for the taxonomy "pa_colors"
		$attributes = $product->get_attributes();

		if ($attributes) {
			foreach ($attributes as $attribute) {

				if ($attribute->get_name() === 'pa_colors') {

					$terms = get_terms(array(
						'taxonomy' => $attribute->get_name(),
						'hide_empty' => false,
					));

					if ($terms) {
						echo '<p class="colorpicker-value">';
						foreach ($terms as $term) {
							$term_id = $term->term_id;
							$color = get_term_meta($term_id, 'colorpicker_value', true);

							echo '<span style="background-color: '. $color .'"></span>';
						}
						echo '</p>';
					}
				}
			}
		}
	}
}

add_filter('woocommerce_get_price_html', 'change_product_price_order', 10, 2);

function change_product_price_order($price, $product) {

	if ($product->is_on_sale()) {

		$regular_price = $product->get_variation_regular_price();
		$sale_price = $product->get_variation_sale_price();

		if ($regular_price && $sale_price) {
			// forming a new procedure for outputting prices

			$price = '<span class="price-sale">'. wc_price($sale_price) .'</span>';
			$price .= '<s  class="price-regular">'. wc_price($regular_price) .'</s>';
		}
	}

	return $price;
}

function change_add_to_cart_text($text, $product) {
	// Перевіряємо, чи товар є варіативним
	if ($product->is_type('variable')) {
		$text = __('Add to cart', 'themename'); // Замініть на свій текст
	}
	return $text;
}

function woocommerce_title_warp_start() {
	echo '<div class="product-meta-wrap">';
}

function woocommerce_title_warp_end() {
	echo '</div>';
}