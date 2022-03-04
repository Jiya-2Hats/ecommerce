<?php

function ecommerceSlider()
{
    $labels = array(
        'name' => __('Sliders'),
        'singular_name' => __('Sliders'),
        'all_items'           => __('All Sliders'),
        'view_item'           => __('View Slider'),
        'add_new_item'        => __('Add New Slider'),
        'add_new'             => __('Add New Slider'),
        'edit_item'           => __('Edit Slider'),
        'update_item'         => __('Update Slider'),
        'search_items'        => __('Search Slider'),
        'search_items' => __('Sliders')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Add New Slider contents',
        'menu_position' => 27,
        'public' => true,
        'has_archive' => true,
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => false),
        'menu_icon' => 'dashicons-format-image',
        'supports' => array(
            'title',
            'thumbnail', 'excerpt'
        ),
    );
    register_post_type('slider', $args);
}
add_action('init', 'ecommerceSlider');
