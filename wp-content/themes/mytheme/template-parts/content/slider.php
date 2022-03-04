<?php $sliders =  new WP_Query([
    'post_type' => 'slider',
    'post_status' => 'publish',
    'orderby'   => 'ID',
    'order' => 'ASC',

]);
$postCounter = 0;

while ($sliders->have_posts()) :  $sliders->the_post(); ?>

    <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>Buy <span>your </span></h2>
                            <h2>favourite <span>Book </span></h2>
                            <h2>from <span>Here </span></h2>
                            <a class="shopbtn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php
            $postCounter++;
        endwhile; ?>