<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
<div class="row">
  <div class="col-sm-10 col-xs-15">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'ucmaster'); ?>
    </div>
    <?php get_search_form(); ?>
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
    <?php endwhile; ?>
    <?php if ($wp_query->max_num_pages > 1) : ?>
    <hr class="divide" />
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous">
          <?php next_posts_link(__('<i class="fa fa-arrow-left"></i> Older posts', 'ucmaster')); ?>
        </li>
        <li class="next">
          <?php previous_posts_link(__('Newer posts <i class="fa fa-arrow-right"></i>', 'ucmaster')); ?>
        </li>
      </ul>
    </nav>
    <?php endif; ?>
  </div>
  <aside id="sidebar" class="col-sm-5 col-xs-15">
    <?php get_template_part('templates/sidebar'); ?>
  </aside>
</div>
