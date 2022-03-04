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
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action('woocommerce_before_main_content');

?>
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
	<div class="container">
		<div class="row">
			<?php get_sidebar('shop');
			if (woocommerce_product_loop()) { ?>

				<div class="col-lg-9 col-12 order-1 order-lg-2">
					<div class="row">
						<div class="col-lg-12">
							<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
								<div class="shop__list nav justify-content-center" role="tablist">
									<a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
									<a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
								</div>
								<?php
								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action('woocommerce_before_shop_loop'); ?>
							</div>
						</div>
					</div>
					<div class="tab__container">
						<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
							<div class="row">
								<?php
								woocommerce_product_loop_start();
								if (wc_get_loop_prop('total')) {
									while (have_posts()) {
										the_post();
										do_action('woocommerce_shop_loop');
										wc_get_template_part('content', 'product');
									}
								}
								woocommerce_product_loop_end();
								?>
							</div>
						</div>
						<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
							<div class="list__view__wrapper">
								<div class="row">
									<?php
									woocommerce_product_loop_start();
									if (wc_get_loop_prop('total')) {
										while (have_posts()) {
											the_post();
											do_action('woocommerce_shop_loop');
											wc_get_template_part('shop', 'list');
										}
									}
									woocommerce_product_loop_end();

									?></div>
							</div>
						</div>
					</div>
					<?php

					do_action('woocommerce_after_shop_loop');


					/**
					 * Hook: woocommerce_after_main_content.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action('woocommerce_after_main_content');

					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action('woocommerce_sidebar'); ?>

				<?php } else {
				do_action('woocommerce_no_products_found');
			} ?>
				</div>
		</div>
	</div>
</div>
<?php
get_footer('shop');
