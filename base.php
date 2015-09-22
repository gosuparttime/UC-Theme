<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<a href="#content" class="sr-only sr-only-focusable">Skip to main content</a>
<!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'ucmaster'); ?>
    </div>
  <![endif]-->

<?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
<section id="feature-head">
  <div class="container">
    <div class="white-border">
      <? if (is_front_page()){
		get_template_part('templates/rotator');
	} else {
		get_template_part('templates/banner');
	}
	?>
    </div>
  </div>
</section>
<div class="white-bg" id="content-wrap">
  <div class="wrap container" role="document">
    <? if (! is_front_page()){ ?>
    	<div class="content row" id="content">
	<? } else {?>
    	<div class="row" id="content">
	<? } ?>
      <? if (! is_front_page()){ ?>
      <section id="side-nav" class="col-md-4 col-sm-5 col-xs-15" role="complementary">
        <?php get_template_part('templates/second', 'nav'); ?>
      </section>
      <? } ?>
      <!-- /.sidebar -->
      
      <main class="main <?php echo ucmaster_main_class(); ?>" role="main">
        <?php include ucmaster_template_path(); ?>
      </main>
      <!-- /.main -->
      <?php if (ucmaster_display_sidebar()) : ?>
      <?php endif; ?>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.wrap --> 
</div>
<!-- /#content-wrap -->
<?php get_template_part('templates/footer'); ?>
<!-- Piwik -->
<script type="text/javascript">
 var _paq = _paq || [];
 _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
 _paq.push(["setCookieDomain", "*.syr.edu"]);
 _paq.push(["setDomains", ["*.syr.edu"]]);
 _paq.push(['trackPageView']);
 _paq.push(['enableLinkTracking']);
 (function() {
   var u="//its-suwi.syr.edu/";
   _paq.push(['setTrackerUrl', u+'piwik.php']);
   _paq.push(['setSiteId', 1]);
   var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
   g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
 })();
</script>
<noscript><p><img src="//its-suwi.syr.edu/piwik.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body>
</html>