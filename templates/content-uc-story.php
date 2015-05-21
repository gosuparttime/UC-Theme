<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content row">
    <? if (has_post_thumbnail()){
		$caption = get_post(get_post_thumbnail_id())->post_excerpt;
		echo '<div class="col-md-6 col-md-push-9 col-sm-7 col-sm-push-8 col-xs-15">';
		if ($caption){
			echo '<figure class="wp-caption">';
		} else {
			echo '<div class="thumbnail">';
		}
		if(is_mobile()) {
			the_post_thumbnail('news-head');
		} else{
			the_post_thumbnail('two-down');
		}
		if ($caption){
			echo '<figcaption class="wp-caption-text">';
			echo $caption;
			echo '</figcaption></figure>';
		} else {
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="col-md-9 col-md-pull-6 col-sm-8 col-sm-pull-7 col-xs-15">';
	 } else {
		 echo '<div class="col-xs-15">';
	 }
     the_content(); ?>
    </div></div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'ucmaster'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
