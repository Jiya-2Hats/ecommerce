<?php

class ArchiveBlogPostWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_archive_blog_posts',
            __('Archive Blog Post Mytheme ', 'mytheme_archive_blog_posts'),
            array('description' => __('Archive Blog Post Mytheme ', 'mytheme_archive_blog_posts'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget']; ?>
        <aside class="widget archives_widget">
            <?php if (!empty($title)) :
            ?> <?php
                echo $args['before_title'] . $title . $args['after_title']; ?>
            <?php
            endif
            ?>
            <ul>
                <li>
                    <?php wp_get_archives(); ?>
                </li>
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
            $title = __('Archive Blog Post Mytheme', 'mytheme_archive_blog_posts');
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


function loadArchiveBlogPostWidget()
{
    register_widget('ArchiveBlogPostWidget');
}
add_action('widgets_init', 'loadArchiveBlogPostWidget');
