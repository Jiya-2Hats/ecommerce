<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>

<div class="maincontent bg--white pt--80 pb--55">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12">
				<div class="wn__single__product">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="wn__fotorama__wrapper">
								<div class="fotorama wn__fotorama__action" data-nav="thumbs">
									<?php
									do_action('woocommerce_product_thumbnails');
									?>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<?php
							$product = wc_get_product($product->get_id());
							?>
							<div class="product__info__main">

								<?php do_action('woocommerce_single_product_summary'); ?>

								<div class="product-share">
									<ul>
										<li class="categories-title">Share :</li>
										<li>
											<a href="#">
												<i class="icon-social-twitter icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-tumblr icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-facebook icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-linkedin icons"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product__info__detailed">
					<div class="pro_details_nav nav justify-content-start" role="tablist">
						<a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
						<a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
					</div>
					<div class="tab__container">
						<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
							<div class="description__attribute">
								<?php echo $product->get_description(); ?>
							</div>
						</div>
						<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
							<?php

							do_action('woocommerce_review_before');

							?>
						</div>
					</div>
				</div>

				<?php
				do_action('woocommerce_after_single_product_summary'); ?>
			</div>
			<?php
			do_action('woocommerce_sidebar');
			?>
		</div>
	</div>
</div>

<?php
/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
// do_action('woocommerce_before_shop_loop_item');

/**
 * Hook: woocommerce_before_shop_loop_item_title.
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked woocommerce_template_loop_product_thumbnail - 10
 */
// do_action('woocommerce_before_shop_loop_item_title');

/**
 * Hook: woocommerce_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */
// do_action('woocommerce_shop_loop_item_title');

/**
 * Hook: woocommerce_after_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
// do_action('woocommerce_after_shop_loop_item_title');

/**
 * Hook: woocommerce_after_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_close - 5
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
// do_action('woocommerce_after_shop_loop_item');
?>