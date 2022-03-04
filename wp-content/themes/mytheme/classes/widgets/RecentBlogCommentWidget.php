<?php

class RecentBlogCommentWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'mytheme_recent_blog_comments',
            __('Recent Blog Comment Mytheme ', 'mytheme_recent_blog_comments'),
            array('description' => __('Recent Blog Comment Mytheme ', 'mytheme_recent_blog_comments'),)
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


            <ul> <?php
                    while (have_comments()) : the_comment() ?>
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="thumb">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php echo get_avatar(get_comment_ID(), 70);
                                    ?></a>
                            </div>
                            <div class="content blog-sidebar-content">
                                <?php printf(__('<p class="fn">%s  Says</p> ', 'textdomain'), get_comment_author_link()); ?>
                                <a href="<?php echo get_permalink(); ?>"> <?php
                                                                            $comment = get_comment();
                                                                            echo substr($comment->comment_content, 0, 25);
                                                                            if (substr($comment->comment_content, 26, 1)) {
                                                                                echo "...";
                                                                            }
                                                                            // echo wordwrap($comment->comment_content, 15, '..');
                                                                            ?></a>
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
            $title = __('Recent Blog Comment Mytheme', 'mytheme_recent_blog_comments');
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


function loadRecentBlogCommentWidget()
{
    register_widget('RecentBlogCommentWidget');
}
add_action('widgets_init', 'loadRecentBlogCommentWidget');
