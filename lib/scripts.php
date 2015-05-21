<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js (in footer)
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 */
function ucmaster_scripts() {
  /**
   * The build task in Grunt renames production assets with a hash
   * Read the asset names from assets-manifest.json
   */
  
    $assets = array(
    //'css'       => '/assets/css/main.css',
	  
      'css'       => '/assets/css/main.min.css',
	  'js'        => '/assets/js/scripts-min.js',
	  'appz'      => '/assets/js/app-min.js',
      'modernizr' => '/assets/js/vendor/modernizr.min.js',
	  //'retina' 	  => '/assets/js/vendor/retina.min.js',
	  'validate'  => '/assets/js/vendor/jquery.validate.min.js',
	  'vidz' 	  => '/assets/js/vendor/jquery.fitvids-min.js',
      'jquery'    => 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'
    );
  
  wp_register_style('frank-one','http://fast.fonts.net/cssapi/24365087-b739-4314-af6e-741946b60bef.css');
  wp_register_style('frank-two','http://fast.fonts.net/cssapi/151d88b4-645e-406a-a8d9-aea7bd0cedc9.css');
  //wp_register_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
  wp_enqueue_style('frank-one');
  wp_enqueue_style('frank-two');
  //wp_enqueue_style('font-awesome');
  wp_enqueue_style('ucmaster_css', get_template_directory_uri() . $assets['css'], false, null);

  /**
   * jQuery is loaded using the same method from HTML5 Boilerplate:
   * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
   * It's kept in the header instead of footer to avoid conflicts with plugins.
   */
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $assets['jquery'], array(), null, false);
    add_filter('script_loader_src', 'ucmaster_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  //wp_enqueue_script('retina', get_template_directory_uri() . $assets['retina'], array(), null, false);
  wp_enqueue_script('validate', get_template_directory_uri() . $assets['validate'], array(), null, false);		
  wp_enqueue_script('modernizr', get_template_directory_uri() . $assets['modernizr'], array(), null, false);
  wp_enqueue_script('jquery');
  wp_enqueue_script('ucmaster_js', get_template_directory_uri() . $assets['js'], array(), null, true);
  wp_enqueue_script('vidz', get_template_directory_uri() . $assets['vidz'], array(), null, true);
  wp_enqueue_script('appz', get_template_directory_uri() . $assets['appz'], array(), null, true);
}
add_action('wp_enqueue_scripts', 'ucmaster_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function ucmaster_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery/dist/jquery.min.js?1.11.1"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'ucmaster_jquery_local_fallback');

/**
 * Google Analytics snippet from HTML5 Boilerplate
 */
function ucmaster_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'ucmaster_google_analytics', 20);
}
