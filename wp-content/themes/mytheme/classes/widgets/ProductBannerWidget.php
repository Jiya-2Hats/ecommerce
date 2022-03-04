<?php

class ProductBannerWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_banner_tags',
            __('Product Banner myTheme', 'mytheme_banner_tags'),
            array('description' => __('Product Tag myTheme', 'mytheme_banner_tags'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget']; ?>
        <aside class="wedget__categories sidebar--banner">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/others/banner_left.jpg" alt="banner images">
            <div class="text">
                <h2><?php echo $title ?></h2>
                <h6><?php echo $instance['banner_content'] ?></h6>
            </div>
        </aside>
        <?php
        echo $args['after_widget']; ?>

    <?php
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Product Banner', 'mytheme_banner_tags');
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('banner_content'); ?>"><?php _e('Banner Content:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('banner_content'); ?>" name="<?php echo $this->get_field_name('banner_content'); ?>" type="text" value="<?php echo esc_attr($bannerContent); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['banner_content'] = (!empty($new_instance['banner_content'])) ? strip_tags($new_instance['banner_content']) : '';


        return $instance;
    }
}


function loadProductBannerWidget()
{
    register_widget('ProductBannerWidget');
}
add_action('widgets_init', 'loadProductBannerWidget');
