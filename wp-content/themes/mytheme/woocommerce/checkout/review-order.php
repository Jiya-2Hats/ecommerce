<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>


<ul class="order__total">
	<li><?php esc_html_e('Product', 'woocommerce'); ?></li>
	<li><?php esc_html_e('Total', 'woocommerce'); ?></li>
</ul>
<?php do_action('woocommerce_review_order_before_cart_contents'); ?>
<ul class="order_product">
	<?php
	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

		if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
	?>

			<li>
				<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
				<?php echo apply_filters('woocommerce_checkout_cart_item_quantity',  sprintf('&times;&nbsp;%s', $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
				?>
				<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
				?>
				<span><?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
				</span>
			</li>

	<?php
		}
	}
	?>
</ul>

<ul class="shipping__method">

	<li><?php esc_html_e('Cart Subtotal', 'woocommerce'); ?>
		<?php wc_cart_totals_subtotal_html(); ?>
	</li>
	<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
		<li class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
			<?php wc_cart_totals_coupon_label($coupon); ?>
			<?php wc_cart_totals_coupon_html($coupon); ?>
		</li>
	<?php endforeach; ?>
	<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

		<?php do_action('woocommerce_review_order_before_shipping'); ?>
		<li>

			<?php wc_cart_totals_shipping_html(); ?>


		</li> <?php do_action('woocommerce_review_order_after_shipping'); ?>
	<?php endif; ?>
	<?php foreach (WC()->cart->get_fees() as $fee) : ?>
		<li class="fee">
			<?php echo esc_html($fee->name); ?>
			<?php wc_cart_totals_fee_html($fee); ?>
		</li>
	<?php endforeach; ?>
	<?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
		<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
			<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
			?>
				<li class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
					<?php echo esc_html($tax->label); ?>
					<?php echo wp_kses_post($tax->formatted_amount); ?>
				</li>
			<?php endforeach; ?>
		<?php else : ?>
			<li class="tax-total">
				<?php echo esc_html(WC()->countries->tax_or_vat()); ?>
				<?php wc_cart_totals_taxes_total_html(); ?>
			</li>
		<?php endif; ?>
	<?php endif; ?>
</ul>
<ul class="total__amount">
	<?php do_action('woocommerce_review_order_before_order_total'); ?>
	<li><?php esc_html_e('Order Total ', 'woocommerce'); ?> <span><?php wc_cart_totals_order_total_html(); ?></span></li>
	<?php do_action('woocommerce_review_order_after_order_total'); ?>
</ul>
<?php do_action('woocommerce_review_order_after_cart_contents'); ?>