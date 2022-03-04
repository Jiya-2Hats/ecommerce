<?php
function mythemeSupport()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('all-product');

    add_image_size('all-product', 270, 340);
    add_image_size('blog-post-sidebar-thumbnail', 80, 80);
}
add_action('after_setup_theme', 'mythemeSupport');

function mythemeRegisterStyles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('mytheme-google-fonts1', "https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800", array(), "", 'all');
    wp_enqueue_style('mytheme-google-fonts2', "https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800", array(), "", 'all');
    wp_enqueue_style('mytheme-google-fonts3', "https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900", array(), "", 'all');

    wp_enqueue_style('mytheme-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), $version, 'all');
    wp_enqueue_style('mytheme-plugins', get_template_directory_uri() . "/assets/css/plugins.css", array(), $version, 'all');
    wp_enqueue_style('mytheme-style',  get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('mytheme-custom',  get_template_directory_uri() . "/assets/css/custom.css", array(), $version, 'all');
    wp_enqueue_style('mytheme-woocommerce',  get_template_directory_uri() . "/assets/css/woocommerce.css", array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'mythemeRegisterStyles');

function mythemeRegisterScripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('mytheme-modernizr',  get_template_directory_uri() . "/assets/js/vendor/modernizr-3.5.0.min.js", array(), $version, false);
    wp_enqueue_script('mytheme-jquery',  get_template_directory_uri() . "/assets/js/vendor/jquery-3.2.1.min.js", array(), '3.2.1', true);
    wp_enqueue_script('mytheme-popper',  get_template_directory_uri() . "/assets/js/popper.min.js", array(), $version, true);
    wp_enqueue_script('mytheme-bootstrap',  get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), $version, true);
    wp_enqueue_script('mytheme-plugins',  get_template_directory_uri() . "/assets/js/plugins.js", array(), $version, true);
    wp_enqueue_script('mytheme-active',  get_template_directory_uri() . "/assets/js/active.js", array(), $version, true);
    wp_enqueue_script('mytheme-custom',  get_template_directory_uri() . "/assets/js/custom.js", array(), $version, true);
}
add_action('wp_enqueue_scripts', 'mythemeRegisterScripts');


// add_action('after_setup_theme', 'removeAdminBarInSite');
function removeAdminBarInSite()
{
    show_admin_bar(false);
}

function mythemeMenus()
{
    $locations = array(
        'primary' => "Top menus",
        'footer' => 'Footer Menu',
        'primary-mobile' => 'Primary Mobile Menu'
    );
    register_nav_menus($locations);
}

add_action('init', 'mythemeMenus');
