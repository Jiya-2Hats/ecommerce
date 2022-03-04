<?php

/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */


defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}

if ($product->is_in_stock()) : ?>

	<div class="box-tocart d-flex">
		<span>Qty</span>

		<form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', wc_get_cart_url())); ?>" method="post" enctype='multipart/form-data'>

			<div class="addtocart__actions display-inline-flex">
				<?php
				do_action('woocommerce_before_add_to_cart_quantity');

				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
						'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
						'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
					)
				); ?>

				<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="tocart"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
			</div>
			<?php
			do_action('woocommerce_after_add_to_cart_quantity');
			?>
		</form>
	</div>

<?php endif; ?>