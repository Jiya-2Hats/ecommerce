<?php function addPostTypeSlider()
{
    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => 'Add Item',
        'all_items' => 'All Items',
        'add_new_item' => 'Add Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Slider',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Item'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slider'),
        'query_var' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => array(
            'title',
            'thumbnail'
        ),
    );
    register_post_type('slider', $args);
}
add_action('init', 'addPostTypeSlider');

function SliderNewFields()
{
    add_meta_box('slider_content', 'content', 'sliderContent', 'slider', 'normal', 'low');
}
add_action('admin_init', 'SliderNewFields');

function sliderContent()
{
    global $post;
    echo '<textarea  name="slider_content" id="slider_content" cols="80" >' . get_post_meta($post->ID, 'slider_content', true) . '</textarea>';
}



function SavesliderCustomFields()
{
    global $post;
    if (isset($_POST["slider_content"])) :
        update_post_meta($post->ID, 'slider_content', $_POST["slider_content"]);
    endif;
}

add_action('save_post', 'SaveSliderCustomFields');
