<?php

class BlogCategoriesWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_blog_categories',
            __('Blog Categories Mytheme', 'mytheme_blog_categories'),
            array('description' => __('Blog Categories Mytheme', 'mytheme_blog_categories'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget']; ?>
        <aside class="widget category_widget">
            <?php if (!empty($title)) :
            ?> <?php
                echo $args['before_title'] . $title . $args['after_title']; ?>
            <?php
            endif
            ?>
            <?php $terms = get_terms(array('taxonomy' => 'category', 'hide_empty' => false)); ?>

            <ul> <?php
                    foreach ($terms as $term) : ?>
                    <li><a href="<?php echo get_term_link($term->term_id, 'category'); ?>"><?php echo $term->name; ?></a></li>
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
            $title = __('Blog Categories', 'mytheme_blog_categories');
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


function loadBlogCategoriesWidget()
{
    register_widget('BlogCategoriesWidget');
}
add_action('widgets_init', 'loadBlogCategoriesWidget');
