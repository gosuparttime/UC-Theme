<h3 class="zero-mar-t">Search Staff Directory</h3>
<div class="widget"><p>Search by first or last name – or both.</p>
</div>
<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="sr-only">
    <?php _e('Search for Staff:', 'ucmaster'); ?>
  </label>
  <div class="input-group col-xs-15">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'ucmaster'); ?> University College Staff">
    <input type="hidden" name="post_type" value="staff" />
    <span class="input-group-btn">
    <button type="submit" class="search-submit btn btn-primary">
    <?php _e('<i class="fa fa-search" aria-hidden="true"></i>Search ', 'ucmaster'); ?>
    </button>
    </span> </div>
</form>
