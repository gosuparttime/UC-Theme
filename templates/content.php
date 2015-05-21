<div class="feed-item"><article <?php post_class('row'); ?>>
  <? if (has_post_thumbnail()) {
		echo '<div class="col-xs-4 pull-right">';
	 	echo '<div class="thumbnail mar-two-t">';
  	 	the_post_thumbnail('feature-thumb');
  		echo '</div></div>';
		echo '<div class="col-xs-11">';
  } else {
	  echo '<div class="col-xs-15">';
  }
  ?>
  <header>
    <h4 class="entry-title"><a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h4>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary"><?php echo excerpt(60, false, true); ?></div>

</article>
  </div>