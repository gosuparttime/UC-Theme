<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="sr-only" for="s"><?php _e('Search for:', 'ucmaster'); ?></label>
  <div class="input-group">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-field form-control col-xs-15" placeholder="<?php _e('Search', 'ucmaster'); ?> <?php bloginfo('name'); ?>">
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-primary"><?php _e('<i class="fa fa-search" aria-hidden="true"></i>Search', 'ucmaster'); ?></button>
    </span>
  </div>
</form>
