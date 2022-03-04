<?php get_header(); ?>
<?php
$query = new WP_Query(array('post_type' => 'contact', 'posts_per_page' => 5));
if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('template-parts/content/content-page');
    }
}
?>
</div>
<?php get_footer(); ?>