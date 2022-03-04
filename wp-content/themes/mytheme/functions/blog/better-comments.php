<?php

function better_comments($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    } ?>

    <<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID() ?>">

        <?php
        switch ($comment->comment_type):
            case 'pingback':
            case 'trackback': ?>
                <div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e('Pingback:', 'textdomain'); ?></span> <?php comment_author_link(); ?></div>
            <?php
                break;
            default: ?>

                <ul class="comment__list">
                    <li>
                        <div class="wn__comment">
                            <div class="thumb">
                                <?php
                                if ($args['avatar_size'] != 0) {
                                    $avatar_size = !empty($args['avatar_size']) ? $args['avatar_size'] : 70; // set default avatar size
                                    echo get_avatar($comment, $avatar_size);
                                }
                                ?></div>
                            <div class="content">
                                <div class="comnt__author d-block d-sm-flex">
                                    <div class="comnt__author d-block d-sm-flex">
                                        <?php printf(__('<span class="fn">%s  Post author</span> ', 'textdomain'), get_comment_author_link()); ?>
                                        <span><?php
                                                echo  get_comment_date();
                                                echo " at " . get_comment_time();
                                                ?>
                                        </span>
                                    </div>
                                </div>
                                <?php comment_text(); ?>
                                <?php
                                if ($comment->comment_approved == '0') { ?>
                                    <em class="comment-awaiting-moderation">
                                        <?php _e('Your comment is awaiting moderation.', 'textdomain'); ?></em><br />
                                <?php
                                } ?>
                                <?php
                                comment_reply_link(array_merge($args, array(
                                    'add_below' => $add_below,
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth']
                                ))); ?>
                            </div>
                        </div>
                    </li>
                </ul>
    <?php
                break;
        endswitch;
    }
