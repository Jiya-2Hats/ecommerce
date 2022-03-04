<div class="product__info__main">
    <?php
    $product = wc_get_product(get_the_ID());
    ?>
    <h1><?php the_title() ?></h1>
    <div class="product-reviews-summary d-flex">
        <ul class="rating-summary d-flex">
            <?php echo do_shortcode('[product_ratings id="' . $product->get_id() . '"]'); ?>
        </ul>
    </div>
    <div class="price-box">
        <span><?php echo get_woocommerce_currency_symbol() . $product->get_price();  ?></span>
    </div>
    <div class="product__overview">
        <p><?php echo the_excerpt(); ?></p>
    </div>
    <?php echo do_shortcode('[product_add_to_cart id="' . $product->get_id() . '"]') ?>
    <div class="product_meta">
        <span class="posted_in">Categories:
            <a href="#">Adventure</a>,
            <a href="#">Kids' Music</a>
        </span>
    </div>
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