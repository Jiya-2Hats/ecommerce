<?php

class RecentBlogPostWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_recent_blog_posts',
            __('Recent Blog Post Mytheme ', 'mytheme_recent_blog_posts'),
            array('description' => __('Recent Blog Post Mytheme ', 'mytheme_recent_blog_posts'),)
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
            <?php wp_get_recent_posts();

            ?>

            <ul> <?php
                    while (have_posts()) : the_post() ?>
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="thumb">
                                <a href="<?php echo get_permalink(); ?>"><?php echo  the_post_thumbnail('blog-post-sidebar-thumbnail'); ?></a>
                            </div>
                            <div class="content blog-sidebar-content">
                                <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                <p> <?php get_the_date() ?></p>
                            </div>
                        </div>

                    </li>
                <?php endwhile; ?>
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
            $title = __('Recent Blog Post Mytheme', 'mytheme_recent_blog_posts');
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


function loadRecentBlogPostWidget()
{
    register_widget('RecentBlogPostWidget');
}
add_action('widgets_init', 'loadRecentBlogPostWidget');
