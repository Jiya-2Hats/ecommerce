<?php get_header(); ?>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content/content-archive');
        }
    }
    ?>
    <?php
    the_posts_pagination(array(
        'prev_text' => __('Back', 'textdomain'),
        'next_text' => __('Onward', 'textdomain'),
    ));
    ?>
<?php get_footer(); ?>