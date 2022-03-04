<div class="col-lg-9 col-12">
    <div class="blog-details content">
        <article class="blog-post-details">
            <div class="post-thumbnail">
                <?php if (has_post_thumbnail()) : ?> <img src="<?php the_post_thumbnail_url(); ?>" alt="blog images"><?php endif; ?>
            </div>
            <div class="post_wrapper">
                <div class="post_header">
                    <h2><?php echo get_the_title() ?></h2>
                    <div class="blog-date-categori">
                        <ul>
                            <li><?php echo the_date() ?></li>
                            <li><a href="#" title="Posts by boighor" rel="author"><?php echo get_the_author() ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="post_content">
                    <p> <?php the_content(); ?></p>
                </div>
                <ul class="blog_meta">
                    <li><a href="#"><?php echo  get_comments_number() . " comments"; ?></a></li>
                    <li> / </li>
                    <li>Tags:
                        <?php $tags = get_the_tags();
                        if (isset($tags)) :
                            foreach ($tags as $tag) :
                        ?>
                                <span><?php echo $tag->name ?></span>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </li>
                </ul>
            </div>
        </article>
        <div class="comments_area">
            <?php comments_template(); ?>
        </div>

    </div>
</div>