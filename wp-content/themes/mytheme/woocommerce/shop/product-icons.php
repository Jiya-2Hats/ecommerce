<?php global $product; ?>
<div class="action">
    <div class="actions_inner">
        <ul class="add_to_links">
            <li><a class="cart" href="<?php echo wc_get_cart_url() ?>"><i class="bi bi-shopping-bag4"></i></a></li>
            <li><a class="wishlist" href="<?php echo wc_get_cart_url() ?>"><i class="bi bi-shopping-cart-full"></i></a></li>
            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
            <li><a href="<?php echo $product->get_permalink() ?>"><i class="bi bi-search"></i></a></li>
        </ul>
    </div>
</div>