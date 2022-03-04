<h3 class="widget-title">Search</h3>
<form action="<?php echo esc_url(home_url('/')); ?>" role="search" method="get">
    <div class=" form-input">
        <input type="text" placeholder="Search..." name="s" id="s" value="<?php echo get_search_query(); ?>">
        <input type="hidden" value="post" name="post_type">
        <button><i class="fa fa-search"></i></button>
    </div>
</form>