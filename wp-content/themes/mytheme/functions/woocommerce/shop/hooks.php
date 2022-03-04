<?php

remove_all_actions('woocommerce_after_shop_loop_item');
add_action('woocommerce_after_shop_loop_item', 'mytheme_shop_icons', 1);
add_action('woocommerce_after_shop_loop_item', 'mythem_ratings', 2);

function mythem_ratings()
{
    wc_get_template('shop/rating.php');
}


function mytheme_shop_icons()
{
    wc_get_template('shop/product-icons.php');
}
