<div class="searchbar__content setting__block">
    <div class="content-inner">
        <?php if (is_user_logged_in()) : ?>
            <div class="switcher-currency">
                <strong class="label switcher-label">
                    <span>User</span>
                </strong>
                <div class="switcher-options">
                    <div class="switcher-currency-trigger">
                        <!-- <span class="currency-trigger">My Account</span> -->

                        <ul class="currency-trigger">
                            <?php
                            do_action('woocommerce_account_navigation');
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="switcher-currency">
            <strong class="label switcher-label">
                <span>Select Store</span>
            </strong>
            <div class="switcher-options">
                <div class="switcher-currency-trigger">
                    <span class="currency-trigger">
                        <a href="<?php echo get_permalink(wc_get_page_id('shop')) ?>">Fashion Store</a></span>

                </div>
            </div>
        </div>

    </div>
</div>