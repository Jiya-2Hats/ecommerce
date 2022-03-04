<?php
function addPostTypeFAQ()
{
    $labels = array(
        'name' => 'FAQ',
        'singular_name' => 'FAQ',
        'add_new' => 'Add Item',
        'all_items' => 'All Items',
        'add_new_item' => 'Add Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search FAQ',
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
        'rewrite' => array('slug' => 'faq'),
        'query_var' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => array(
            'title',
        ),
    );
    register_post_type('faq', $args);
}
add_action('init', 'addPostTypeFAQ');

function FAQNewFields()
{
    add_meta_box('faq_question', 'Question', 'faqQuestion', 'faq', 'normal', 'low');
    add_meta_box('faq_answer', 'Answer', 'faqAnswer', 'faq', 'normal', 'low');
}
add_action('admin_init', 'FAQNewFields');

function faqQuestion()
{
    global $post;
    echo '<textarea  name="faq_question" id="faq_question" cols="80" >' . get_post_meta($post->ID, 'faq_question', true) . '</textarea>';
}

function faqAnswer()
{
    global $post;
    echo '<textarea  name="faq_answer" id="faq_answer" cols="80" >' . get_post_meta($post->ID, 'faq_answer', true) . '</textarea>';
}



function SaveFaqCustomFields()
{
    global $post;
    if (isset($_POST["faq_question"])) :
        update_post_meta($post->ID, 'faq_question', $_POST["faq_question"]);
    endif;

    if (isset($_POST["faq_answer"])) :
        update_post_meta($post->ID, 'faq_answer', $_POST["faq_answer"]);
    endif;
}

add_action('save_post', 'SaveFaqCustomFields');
