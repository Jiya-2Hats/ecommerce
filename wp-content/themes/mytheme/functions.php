<?php
add_theme_support('woocommerce');
require('classes/menu/WalkerNavMenu.php');
require('classes/widgets/LatestProductWidget.php');
require('classes/widgets/ProductTagsWidget.php');
require('classes/widgets/ProductBannerWidget.php');
require('classes/widgets/ProductCategoriesWidget.php');
require('classes/widgets/BlogCategoriesWidget.php');
require('classes/widgets/RecentBlogPostWidget.php');
require('classes/widgets/RecentBlogCommentWidget.php');
require('classes/widgets/BlogArchieveWidget.php');

include('functions/theme-support/theme.php');
include('functions/widgets/front-page.php');
include('functions/widgets/product.php');
include('functions/taxonomy/product-category.php');
include('functions/taxonomy/product-tag.php');
include('functions/post-type/product-faq.php');
include('functions/post-type/slider.php');

include('functions/woocommerce/shortcode/product.php');

include('functions/woocommerce/single-product/hooks.php');
include('functions/woocommerce/shop/hooks.php');

require_once get_parent_theme_file_path('/functions/blog/better-comments.php');

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,
        'product_list_thumbnail' => 80,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));

    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');







add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function woocommerce_template_loop_product_title()
{
    echo '<h4>' . get_the_title() . '</h4>';
}
