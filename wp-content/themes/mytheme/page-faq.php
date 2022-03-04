<?php /* Template Name: FAQ */ ?>
<?php get_header(); ?>

<section class="wn__faq__area bg--white pt--80 pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wn__accordeion__content">
                    <h2>Below are frequently asked questions, you may find the answer for yourself</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id erat sagittis, faucibus metus malesuada, eleifend turpis. Mauris semper augue id nisl aliquet, a porta lectus mattis. Nulla at tortor augue. In eget enim diam. Donec gravida tortor sem, ac fermentum nibh rutrum sit amet. Nulla convallis mauris vitae congue consequat. Donec interdum nunc purus, vitae vulputate arcu fringilla quis. Vivamus iaculis euismod dui.</p>
                </div>
                <div id="accordion" class="wn_accordion" role="tablist">
                    <?php
                    $faqs =  new WP_Query([
                        'post_type' => 'faq',
                        'post_status' => 'publish',
                        'orderby'   => 'ID',
                        'order' => 'ASC',

                    ]);
                    $postCounter = 0;

                    while ($faqs->have_posts()) :
                        $faqs->the_post();
                        $faqId = get_the_ID();
                    ?>
                        <div class="card">
                            <div class="acc-header" role="tab" id="heading<?php echo $postCounter; ?>">
                                <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo $postCounter; ?>" role="button" aria-expanded="false" aria-controls="collapseEight">
                                        <?php echo (get_post_meta(get_the_ID(), 'faq_question', true)); ?> ? </a>
                                </h5>
                            </div>
                            <div id="collapse<?php echo $postCounter; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $postCounter; ?>" data-parent="#accordion">
                                <div class="card-body"><?php echo (get_post_meta(get_the_ID(), 'faq_answer', true)); ?></div>
                            </div>

                        </div> <?php
                                $postCounter++;
                            endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>