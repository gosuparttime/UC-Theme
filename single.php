<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
<div class="row">
  <div class="col-sm-10 col-xs-15">
    <article>
    <?php get_template_part('templates/content', 'single'); ?>
   </article>
   <footer><? if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
} ?></footer>
    <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous">
          <?php next_posts_link(__('&larr; Older posts', 'ucmaster')); ?>
        </li>
        <li class="next">
          <?php previous_posts_link(__('Newer posts &rarr;', 'ucmaster')); ?>
        </li>
      </ul>
    </nav>
    <?php endif; ?>
  </div>
  <aside class="col-sm-5 col-xs-15" id="sidebar">
    <?php get_template_part('templates/sidebar'); ?>
  </aside>
</div>
