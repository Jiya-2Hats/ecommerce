<?php get_header(); ?>
<div class="page-blog-details section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <h3>Search Results</h3>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content/content-archive');
                }
            }
            ?>
            <?php
            the_posts_pagination(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>