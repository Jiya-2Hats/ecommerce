<?php
global $product;

if (!wc_review_ratings_enabled()) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ($rating_count >= 0) : ?>

    <?php echo wc_get_rating_html($average, $rating_count);

    ?>

    <div class="product__hover--content">
        <ul class="rating d-flex">
            <?php
            for ($i = 0; $i < $rating_count; $i++) :

            ?>
                <li class="on"><i class="fa fa-star-o"></i></li>
            <?php endfor;
            for (; $i < 5; $i++) : ?>
                <li class="off"><i class="fa fa-star-o"></i></li><?php endfor; ?>
        </ul>
    </div>



<?php endif;
