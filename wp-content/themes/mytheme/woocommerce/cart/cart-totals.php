<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;

?>

<div class="row">
	<div class="col-lg-6 offset-lg-6">
		<div class="cartbox__total__area">
			<div class="cartbox-total d-flex justify-content-between">
				<ul class="cart__total__list">
					<li><?php esc_html_e('Cart Total', 'woocommerce'); ?></li>
					<li><?php esc_html_e('Sub Total', 'woocommerce'); ?></li>
				</ul>
				<ul class="cart__total__tk">
					<li><?php wc_cart_totals_order_total_html(); ?></li>
					<li>
						<?php wc_cart_totals_subtotal_html() ?> </li>
				</ul>
			</div>
			<div class="cart__total__amount">
				<span><?php esc_html_e('Grand  Total', 'woocommerce'); ?></span>
				<span><?php wc_cart_totals_order_total_html(); ?></span>
			</div>
		</div>
	</div>
</div>