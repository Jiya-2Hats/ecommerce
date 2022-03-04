<?php

class ProductCategoriesWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_product_categories',
            __('Product Categories myTheme', 'mytheme_product_categories'),
            array('description' => __('Product Categories myTheme', 'mytheme_product_categories'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget']; ?>
        <aside class="wedget__categories poroduct--cat">
            <?php if (!empty($title)) :
            ?> <?php

                echo '<h3 class="wedget__title">' . $title . '</h3>'; ?>
            <?php
            endif;
            $categoryArguments = array(
                'taxonomy' => 'product_cat',
                'orderby' => 'name',
                'order'   => 'ASC',
            );
            $categories = get_categories($categoryArguments);

            ?>
            <ul>
                <?php
                foreach ($categories as $category) :

                ?>

                    <li><a href="<?php echo get_term_link($category->term_id) ?>"><?php echo $category->name ?> <span>(<?php echo $category->count ?>)</span></a></li>
                <?php endforeach; ?>
            </ul>
        </aside>
        <?php
        echo $args['after_widget'];
        ?>

    <?php
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Product Categories', 'mytheme_product_categories');
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


function loadProductCategoriesWidget()
{
    register_widget('ProductCategoriesWidget');
}
add_action('widgets_init', 'loadProductCategoriesWidget');
