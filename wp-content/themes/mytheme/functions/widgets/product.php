<?php

function mythemeWidgetSidebar()
{
    register_sidebar(
        array(
            'before_title' => ' <h3 class="wedget__title">',
            'after_title' => '</h3>',
            'before_widget' => ' ',
            'after_widget' => ' ',
            'name' => 'Shop SideBar',
            'id' => 'shop-sidebar',
            'description' => 'Shop SideBar'
        )
    );
}
add_action('widgets_init', 'mythemeWidgetSidebar');


function mythemeTopRightIcon()
{
    register_sidebar(
        array(
            'before_title' => ' ',
            'after_title' => '',
            'before_widget' => ' ',
            'after_widget' => ' ',
            'name' => 'Top Right Block',
            'id' => 'top-right-block',
            'description' => 'Top Right Block for icons'
        )
    );
}
add_action('widgets_init', 'mythemeTopRightIcon');
