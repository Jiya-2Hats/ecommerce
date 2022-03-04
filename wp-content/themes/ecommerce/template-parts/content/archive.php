<div class="col-sm-12 card my-3">
    <div class="row">
        <div class="col-sm-2 mx-auto">
            <img class="mx-auto py-2 img-fluid post-thumb  d-md-flex" src="
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail_url();
                    } else {
                        echo get_template_directory_uri() . "/assets/img/default-image.jpeg";
                    }
                    ?>" alt="image">
            <div class="col-sm-12 mx-auto text-center">
                <span class="tag"><?php the_category() ?>
                </span>
            </div>
        </div>
        <div class="col-sm-10 py-2">
            <h5 class="py-4"><a class="post-title-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
            <?php the_excerpt(); ?>
            <a class="more-link" href="<?php the_permalink() ?>">Read more &rarr;</a>
        </div>
    </div>
</div>