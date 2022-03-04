<?php get_header(); ?>
<div class="page-blog-details section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content/single/content-article');
                }
            }
            ?>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="wn__sidebar">

                    <!-- Start Single Widget -->
                    <aside class="widget search_widget">
                        <?php get_template_part('template-parts/search/blog-search'); ?>
                    </aside>
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>