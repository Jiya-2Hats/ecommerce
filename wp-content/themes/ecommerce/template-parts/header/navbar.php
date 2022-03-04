<nav class="mainmenu__nav"><?php
                            wp_nav_menu(
                                array(
                                    'menu' => 'primary',
                                    'theme_location' => 'primary',
                                    'container' => 'ul',
                                    'menu_class' => 'meninmenu d-flex justify-content-start',
                                    'add_li_class'  => 'navbar-item',
                                    'fallback_cb'       => 'WalkerNavMenu::fallback',

                                    'walker' => new WalkerNavMenu(),

                                )
                            );
                            ?></nav>