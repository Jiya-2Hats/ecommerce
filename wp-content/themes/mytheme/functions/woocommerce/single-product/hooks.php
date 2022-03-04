<?php

add_action('woocommerce_template_loop_product_thumbnail', 'product_gallery', 1);
function product_gallery()
{
    global $product;

    $image_link = wp_get_attachment_image_url($product->get_image_id(), 'full');

?>
    <a class="first__img" href="<?php echo get_permalink() ?>"><img src="<?php echo $image_link  ?>" alt="product image"></a>
    <a class="second__img animation1" href="<?php echo get_permalink() ?>"><img src="<?php $image_link  ?>" alt="product image"></a>
    <div class="hot__box">
        <span class="hot-label">BEST SALLER</span>
    </div><?php
        }




        add_filter('woocommerce_product_tabs', 'woocommerce_default_product_tabs');

        // removed all

        remove_all_actions('woocommerce_single_product_summary');
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 1);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 2);
        add_action('woocommerce_single_product_summary', 'mytheme_template_single_price', 3);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 4);
        add_action('woocommerce_single_product_summary', 'woocommerce_single_variation_add_to_cart_button', 5);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);

        remove_all_actions('woocommerce_after_single_product_summary');
        add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 1);
        add_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 2);

        function mytheme_template_single_rating()
        {

            $product = wc_get_product(get_the_ID());
            $ratings = $product->get_average_rating();
            if (!is_numeric($ratings)) return '';
            $html = '<div class="product-reviews-summary d-flex">
    <ul class="rating-summary d-flex">';
            for ($i = 0; $i < $ratings; $i++) :
                $html .= '<li><i class="zmdi zmdi-star"></i></li>';
            endfor;
            for (; $i < 5; $i++) :
                $html .= '<li class="off"><i class="zmdi zmdi-star-outline"></i></li>';
            endfor;
            $html .= '</ul>
    </div>';
            echo $html;
        }
        function mytheme_template_single_price()
        {
            global $product;
            echo '<div class="price-box">
          <span>' . get_woocommerce_currency_symbol() . $product->get_price() . '</span>
		  </div>';
        }
