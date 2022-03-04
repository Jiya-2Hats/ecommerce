<?php
function ecommerceSupport()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('all-product');
    add_image_size('all-product', 270, 340);
    the_post_thumbnail('all-product');
}
add_action('after_setup_theme', 'ecommerceSupport');

function ecommerceRegisterStyles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ecommerce-google-fonts1', "https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800", array(), "", 'all');
    wp_enqueue_style('ecommerce-google-fonts2', "https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800", array(), "", 'all');
    wp_enqueue_style('ecommerce-google-fonts3', "https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900", array(), "", 'all');

    wp_enqueue_style('ecommerce-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), $version, 'all');
    wp_enqueue_style('ecommerce-plugins', get_template_directory_uri() . "/assets/css/plugins.css", array(), $version, 'all');
    wp_enqueue_style('ecommerce-style',  get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('ecommerce-custom',  get_template_directory_uri() . "/assets/css/custom.css", array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'ecommerceRegisterStyles');

function ecommerceRegisterScripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('ecommerce-modernizr',  get_template_directory_uri() . "/assets/js/vendor/modernizr-3.5.0.min.js", array(), $version, false);
    wp_enqueue_script('ecommerce-jquery',  get_template_directory_uri() . "/assets/js/vendor/jquery-3.2.1.min.js", array(), '3.2.1', true);
    wp_enqueue_script('ecommerce-popper',  get_template_directory_uri() . "/assets/js/popper.min.js", array(), $version, true);
    wp_enqueue_script('ecommerce-bootstrap',  get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), $version, true);
    wp_enqueue_script('ecommerce-plugins',  get_template_directory_uri() . "/assets/js/plugins.js", array(), $version, true);
    wp_enqueue_script('ecommerce-active',  get_template_directory_uri() . "/assets/js/active.js", array(), $version, true);
}
add_action('wp_enqueue_scripts', 'ecommerceRegisterScripts');


// add_action('after_setup_theme', 'removeAdminBarInSite');
function removeAdminBarInSite()
{
    show_admin_bar(false);
}

function ecommerceMenus()
{
    $locations = array(
        'primary' => "Top menus",
        'footer' => 'Footer Menu'
    );
    register_nav_menus($locations);
}

add_action('init', 'ecommerceMenus');
