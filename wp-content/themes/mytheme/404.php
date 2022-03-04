<?php get_header(); ?>

<div class="ht__bradcaump__area bg-image--5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Page Not Found</h2>
                    <nav class="bradcaump-content">
                        <a class="breadcrumb_item" href="index.html">Home</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb_item active">Page Not Found</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- Start Error Area -->
<section class="page_error section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error__inner text-center">
                    <div class="error__logo">
                        <a href="#"><img src="<?php echo get_template_directory_uri()  ?>/assets/images/others/404.png" alt="error images"></a>
                    </div>
                    <div class="error__content">
                        <h2>error - not found</h2>
                        <p>It looks like you are lost! Try searching here</p>
                        <?php get_template_part('template-parts/search/search');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>