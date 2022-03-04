<?php get_header(); ?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
?>
        <h2> <?php echo (get_post_meta(get_the_ID(), 'faq_question', true)); ?></h2>
        <p> <?php echo get_post_meta(get_the_ID(), 'faq_answer', true)  ?></p>
<?php
    endwhile;
endif;
?>
</div>
<?php get_footer(); ?>