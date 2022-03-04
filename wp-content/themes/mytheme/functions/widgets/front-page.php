<?php

function mythemeFirstBlock()
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
add_action('widgets_init', 'mythemeFirstBlock');


function mythemeSecondBlock()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Home Page second Block',
            'id' => 'home-second-block',
            'description' => 'Front Page Second Block'
        )
    );
}
add_action('widgets_init', 'mythemeSecondBlock');


function mythemeBlogSidebar()
{
    register_sidebar(
        array(
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'description' => 'Blog page sidebar block'
        )
    );
}
add_action('widgets_init', 'mythemeBlogSidebar');
