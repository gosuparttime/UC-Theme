<div class="light-gray-bg collapse" id="site-search">
  <div class="container pad-one-tb">
    <div class="row">
    <div class="col-sm-9 col-xs-15"><p class="h5 shift-right">Search the <? echo get_bloginfo('name'); ?> Web Site</p></div>
      <div class="col-sm-6 col-xs-15 pull-right">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>
<header class="container" id="header-wrap">
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-8" id="logo"><a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
      <div class="hidden-xs"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/uc-su-logo-w.png" alt="<?php bloginfo( 'name' ); ?>" /></div>
      <div class="visible-xs"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/uc-su-logo-g.png" alt="<?php bloginfo( 'name' ); ?>" /></div>
      </a> </div>
    <div class="col-md-11 col-sm-9 col-xs-7" id="utility-wrap">
      <div class="row">
        <div class="col-md-12 col-sm-11 hidden-xs">
          <ul class="list-inline list-social">
            <li><a href="https://www.facebook.com/UniversityCollegeSU" target="_blank" title="University College on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sr-only">Facebook</span></a></li>
            <li><a href="https://twitter.com/gosuparttime/" target="_blank" title="University College on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="sr-only">Twitter</span></a></li>
            <li><a href="https://www.linkedin.com/groups?home=&gid=1957763" target="_blank" title="University College on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="sr-only" >LinkedIn</span></a></li>
            <li><a href="https://www.youtube.com/user/SUUniversityCollege" target="_blank" title="University College on YouTube"><i class="fa fa-youtube" aria-hidden="true"></i><span class="sr-only">YouTube</span></a></li>
            <li><a href="http://service.velaro.com/visitor/requestchat.aspx?siteid=8925&showwhen=inqueue" target="_blank" title="Chat with University College"><div class="span-block"><i class="fa fa-comment" aria-hidden="true"></i><span class="sr-only">Live Chat</span></div></a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-4" id="search-site">
          <button type="button" class="btn btn-search" data-toggle="collapse" data-target="#site-search">Search <i class="fa fa-search" aria-hidden="true"></i><span class="sr-only">Site Search</span></button>
        </div>
      </div>
      <div class="row hidden-xs" id="utility">
        <div class="col-xs-15">
          <button type="button" class="utility-toggle" data-toggle="dropdown" data-target=".utility-collapse">Utility Navigation <b class="caret" aria-hidden="true"></b></button>
          <nav class="utility-nav utility-collapse" role="navigation">
            <?php uc_ute_nav(); // Adjust using Menus in Wordpress Admin ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
<div id="nav-wrap">
  <div class="container">
    <div class="row">
      <div class="banner navbar navbar-default" role="banner">
        <div class="navbar-header">
          <button type="button" id="primary-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">Site Navigation
          <span class="pull-right"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></span>
          </button>
        </div>
        <nav class="collapse navbar-collapse" role="navigation" id="main-navigation">
          <?php main_uc_nav(); // Adjust using Menus in Wordpress Admin ?>
        </nav>
        
      </div>
    </div>
  </div>
</div>
