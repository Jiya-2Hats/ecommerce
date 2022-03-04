<div class="section__title text-center">
    <h2 class="title__be--2">upsell products</h2>
</div>
<div class="row mt--60">
    <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
        <?php
        $product = wc_get_product(get_the_ID());
        $product_ids = $product->get_upsell_ids();
        foreach ($product_ids as $product_id) :
            $product = wc_get_product($product_id);
        ?>
            <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="product__thumb">
                    <a class="first__img" href="<?php echo $product->get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') ?>" alt="product image"></a>
                    <a class="second__img animation1" href="<?php echo $product->get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') ?>" alt="product image"></a>
                    <div class="hot__box">
                        <span class="hot-label">BEST SALLER</span>
                    </div>
                </div>
                <div class="product__content content--center">
                    <h4><a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_name(); ?></a></h4>
                    <ul class="prize d-flex">
                        <li><?php echo get_woocommerce_currency_symbol() . $product->get_sale_price(); ?></li>
                        <li class="old_prize"><?php echo get_woocommerce_currency_symbol() . $product->get_regular_price(); ?></li>
                    </ul>
                    <div class="action">
                        <div class="actions_inner">
                            <ul class="add_to_links">
                                <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product__hover--content">
                        <ul class="rating d-flex">
                            <?php echo do_shortcode('[product_ratings id="' . $product->get_id() . '"]'); ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>