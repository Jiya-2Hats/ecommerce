<?php

class ProductTagsWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_product_tags',
            __('Product Tag myTheme', 'mytheme_product_tags'),
            array('description' => __('Product Tag myTheme', 'mytheme_product_tags'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget']; ?>
        <aside class="wedget__categories poroduct--tag">
            <?php if (!empty($title)) :
            ?> <?php
                echo $args['before_title'] . $title . $args['after_title']; ?>
            <?php
            endif
            ?>
            <?php $terms = get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false)); ?>

            <ul> <?php
                    foreach ($terms as $term) : ?>
                    <li><a href="<?php echo get_term_link($term->term_id, 'product_tag'); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
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
            $title = __('Product Tags', 'mytheme_product_tags');
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


function loadProductTagsWidget()
{
    register_widget('ProductTagsWidget');
}
add_action('widgets_init', 'loadProductTagsWidget');
