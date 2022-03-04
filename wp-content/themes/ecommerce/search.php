<?php get_header(); ?>
<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9 col-12 py-4">
                <div class="blog-page">
                    <div class="page__header">
                        <h2>Search Results</h2>
                    </div>
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content/archive');
                        }
                    } else {

                    ?>

                        <section class="page_error section-padding--lg bg--white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="error__inner text-center">
                                            <div class="error__logo">
                                                <a href="#"><img src="<?php echo get_template_directory_uri()  ?>/assets/images/others/404.png" alt="error images"></a>
                                            </div>
                                            <div class="error__content">
                                                <h2>Nothing Found</h2>
                                                <p>It looks like you are lost! Try searching here</p>
                                                <?php get_template_part('template-parts/search/search');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                    }
                    ?>


                </div>
                <?php
                the_posts_pagination();
                ?>
            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>