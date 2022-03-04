<div class="brown--color box-search-content search_active block-bg close__top">

    <form role="search" method="get" id="search_mini_form" class="minisearch" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="field__search">
            <label class="screen-reader-text" for="s"><?php _x('Search for:', 'label'); ?></label>
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
            <div class="action">
                <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>