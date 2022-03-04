<?php

function ecommerceWidgetHeaderTopRight()
{
    register_sidebar(
        array(
            'before_title' => '<h3 class="p-2">',
            'after_title' => '</h3>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Top right',
            'id' => 'top-right',
            'description' => 'Header Top Right'
        )
    );
}
add_action('widgets_init', 'ecommerceWidgetHeaderTopRight');

function ecommerceWidgetSidebarRight()
{
    register_sidebar(
        array(
            'before_title' => ' <h3 class="wedget__title">',
            'after_title' => '</h3>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'SideBar Right',
            'id' => 'sidebar-right',
            'description' => 'SideBar Right'
        )
    );
}
add_action('widgets_init', 'ecommerceWidgetSidebarRight');
