<div class="row d-none">
    <div class="col-lg-12 d-none">
        <nav class="mobilemenu__nav">
            <?php
            wp_nav_menu(
                array(
                    'menu' => 'primary-mobile',
                    'theme_location' => 'primary-mobile',
                    'container' => '<nav>',
                    'menu_class' => 'mobilemenu__nav',
                    'add_li_class'  => '',
                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            );
            ?></nav>
    </div>
</div>

<div class="mobile-menu d-block d-lg-none">
</div>