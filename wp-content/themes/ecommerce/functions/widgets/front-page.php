<?php

function ecommerceFirstBlock()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Home Page First Block',
            'id' => 'home-first-block',
            'description' => 'Front Page First Block'
        )
    );
}
add_action('widgets_init', 'ecommerceFirstBlock');


function ecommerceSecondBlock()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Home Page First Block',
            'id' => 'home-first-block',
            'description' => 'Front Page First Block'
        )
    );
}
add_action('widgets_init', 'ecommerceFirstBlock');
