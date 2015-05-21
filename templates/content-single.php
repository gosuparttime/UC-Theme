<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
  
  <header class="page-header">
    <h1 >
      <?php the_title(); ?>
    </h1>
    <?php get_template_part('templates/entry-meta'); ?>
    <hr class="divide" />
  </header>
  <div class="entry-content"><? 	if (has_post_thumbnail()) {
			echo '<div class="thumbnail">';
  	 		the_post_thumbnail('news-head');
  			echo '</div>';
  		} 
  	?>
    <?php the_content(); ?>
  </div>
  <footer class="pad-one-tb">
  <hr />
  	<? if(get_field('attribute_article')){
		$url = get_field('original_url');
		if (!empty($url)){
			echo '<small><em>Original article published at: ';
			echo '<a href="'.$url.'" target="_blank" rel="canonical">';
			echo $url;
			echo ' <i class="fa fa-external-link" aria-hidden="true"></i>';
			echo '</a></em></small>';
		}
	} ?>
    <p>Posted In: <?php the_category(' '); ?></p>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'ucmaster'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php //comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>
