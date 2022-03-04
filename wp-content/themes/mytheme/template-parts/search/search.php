<div class="search_form_wrapper">
    <form role="search" method="get" id="search_mini_form" class="minisearch" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="form__box">
            <label class="screen-reader-text" for="s"><?php _x('Search for:', 'label'); ?></label>
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />

            <button><i class="fa fa-search"></i></button>

        </div>
    </form>
</div>