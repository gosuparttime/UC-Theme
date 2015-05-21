<div class="feed-item"><article <?php post_class('pad-one-b'); ?>>
  
  <header>
    <h4 class="entry-title"><a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h4>
    <?php //get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary"><?php echo excerpt(60, false, true); ?></div>

</article>