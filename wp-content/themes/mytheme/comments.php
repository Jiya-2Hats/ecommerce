<div class="comments-wrapper">
    <div class="comments" id="comments">
        <div class="comments-header">
            <h3 class="comment__title"><?php if (!have_comments()) {
                                            echo  "Leave a Comment";
                                        } else {
                                            echo  get_comments_number() . " comments";
                                        }          ?></h3>
        </div>
        <div class="comments-inner">
            <div class="comments_area">

                <?php
                // Display comments
                wp_list_comments(array(
                    'callback' => 'better_comments'
                )); ?>
            </div>
        </div>

        <hr class="" aria-hidden="true">
        <?php
        if (comments_open()) {
            comment_form(
                array(
                    'class_form' => '',
                    'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title"',
                    'title_reply_after' => '</h2>'
                )
            );
        }
        ?>

    </div>
</div>