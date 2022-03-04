<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Bookshop Responsive Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
</head>

<body>
    <div class="wrapper woocommerce" id="wrapper">
        <header id="wn__header" class="header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <?php if (function_exists('the_custom_logo')) :
                                    $custom_logo_id = get_theme_mod('custom_logo');
                                    $logo = wp_get_attachment_image_src($custom_logo_id);
                                ?>
                                    <img src="<?php echo $logo[0] ?>" alt="logo images">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <?php get_template_part('theme-template/header/navbar');
                        ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                            <li class="shop_search"><a class="search__active" href="#"></a></li>
                            <li class="wishlist"><a href="#"></a></li>
                            <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">3</span></a>
                                <div class="block-minicart minicart__active">
                                    <div class="minicart-content-wrapper">
                                        <div class="micart__close">
                                            <span>close</span>
                                        </div>
                                        <?php dynamic_sidebar('top-right-block'); ?>

                                    </div>
                                </div>
                                <!-- End Shopping Cart -->
                            </li>
                            <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                                <?php get_template_part('theme-template/header/settingsbar') ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                get_template_part('theme-template/header/mobile-menu')
                ?>
            </div>
        </header>
        <?php get_template_part('template-parts/search/search-modal');
        ?>
        <?php if (!is_front_page() && !is_404()) : ?>
            <div class="ht__bradcaump__area bg-image--6">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bradcaump__inner text-center">
                                <?php
                                $locations = get_nav_menu_locations();
                                $menu = wp_get_nav_menu_object($locations['primary']);
                                $menu_items = wp_get_nav_menu_items($menu->name);
                                $this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));

                                ?>
                                <h2 class="bradcaump-title"><?php echo isset($this_item->title) ? $this_item->title : "Single page"; ?></h2>
                                <nav class="bradcaump-content">
                                    <a class="breadcrumb_item" href="index.html">Home</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb_item active"><?php echo isset($this_item->title) ? $this_item->title : "Single page"; ?>
                                    </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>