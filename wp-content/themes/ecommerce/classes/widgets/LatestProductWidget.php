<?php

class LatestProductWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'latest_product_widget',
            __('Latest Product', 'latest_product'),
            array('description' => __('Lists recent product', 'latest_product'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']); ?> <section class="wn__product__area brown--color pt--80  pb--30">
            <div class="container"><?php

                                    echo $args['before_widget'];
                                    ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">
                                <?php if (!empty($title))
                                    echo $args['before_title'] . $title . $args['after_title']; ?>
                                <span class="color--theme"></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                    <?php


                    $args = array(
                        'post_type' => 'product',
                    );
                    query_posts($args);
                    while (have_posts()) {
                        the_post();
                    ?>
                        <div class="product product__style--3">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product__thumb">
                                    <a class="first__img" href="<?php the_permalink() ?>">

                                        <img src="<?php the_post_thumbnail_url(); ?> " /></a>
                                    <a class=" second__img animation1" href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALLER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center">
                                    <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                    <ul class="prize d-flex">
                                        <li><?php
                                            echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_sale_price', true);
                                            ?></li>
                                        <li class="old_prize"><?php echo  get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_regular_price', true); ?></li>
                                    </ul>
                                    <?php get_template_part('template-parts/product/product-actions');
                                    ?>
                                    <div class="product__hover--content">
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <?php
                echo $args['after_widget']; ?>
            </div>
        </section>
    <?php
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Latest Product', 'latest_product');
        }
    ?> <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }


    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}


function wpb_load_widget()
{
    register_widget('LatestProductWidget');
}
add_action('widgets_init', 'wpb_load_widget');
