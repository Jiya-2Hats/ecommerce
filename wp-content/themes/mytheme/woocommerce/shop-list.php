<?php global $product;
$currencySymbol = get_woocommerce_currency_symbol();
?>

<div class="list__view mt--40">
    <div class="thumb product-list-image">
        <a class="first__img" href="<?php echo get_permalink() ?>"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'product_list_thumbnail') ?>" alt="product image"></a>
        <a class="second__img animation1" href="<?php echo get_permalink() ?>"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'product_list_thumbnail') ?>" alt="product image"></a>
    </div>
    <div class="content">
        <h2><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h2>
        <ul class="rating d-flex">
            <?php echo do_shortcode('[product_ratings id="' . get_the_ID() . '"]'); ?>
        </ul>
        <ul class="prize__box">
            <li><?php echo $currencySymbol . $product->get_sale_price() ?></li>
            <li class="old__prize"><?php echo $currencySymbol . $product->get_regular_price() ?></li>
        </ul>
        <p><?php echo get_the_excerpt() ?></p>
        <ul class="cart__action d-flex">
            <li class="cart"><a href="<?php echo wc_get_cart_url() ?>" style="padding: 0;">
                    <?php

                    do_action(
                        'woocommerce_simple_add_to_cart'

                    ); ?></a></li>
            <li class="wishlist"><a href="cart.html"></a></li>
            <li class="compare"><a href="cart.html"></a></li>
        </ul>

    </div>
</div>