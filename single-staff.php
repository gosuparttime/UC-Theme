<div class="hidden-xs">
  <p id="breadcrumbs"> <span prefix="v: http://rdf.data-vocabulary.org/#"> <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" rel="v:url" property="v:title">Home</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>directory" rel="v:url" property="v:title">Directory</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>directory/staff-directory" rel="v:url" property="v:title">Staff Directory</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title"><?php echo the_title(); ?></span></span> </span></p>
</div>
<?php get_template_part('templates/content', 'staff'); ?>
