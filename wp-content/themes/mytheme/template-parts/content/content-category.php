<div class="col-sm-4 card my-3 mx-2">
    <div class="col-sm-12 mx-auto">
        <img class="mx-auto py-3 img-fluid post-thumb  d-md-flex" src="
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail_url('thumbnail');
                    }
                    ?>" alt="image">
        <h5 class="text-center"><a class="post-title-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
    </div>
    <div class=" col-sm-12 py-2 ">
        <p class=" excerpt-text-justify"> <?php the_excerpt(); ?></p>
        <a class="more-link" href="<?php the_permalink() ?>">Read more &rarr;</a>
    </div>
</div>