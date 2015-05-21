
<?php get_template_part('templates/page', 'header'); ?>
<div class="row"><div class="col-sm-10 col-xs-15">
<div class="thumbnail"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/404.jpg" alt="Otto on wheeled cart in Carrier Dome" /></div>
<div class="lead">
  <p>Otto has searched far and wide, but can't find what you were trying to see</p>
</div>

<p>It looks like this was the result of either:</p>
<ul>
  <li>a mistyped address</li>
  <li>an out-of-date link</li>
</ul>
<p>May we recommend you try checking your URL, or try going back to the <a href="<?php echo esc_url(home_url('/')); ?>">homepage</a>?</p></div>
<div class="col-sm-5 col-xs-15">
<h3 class="zero-mar-t">Search the <? echo get_bloginfo('name'); ?> Web Site</h3>
        <p>Try searching the University College web site again for information</p>
        <?php get_search_form(); ?>
</div>
</div>