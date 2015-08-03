<footer class="content-info gray-bg" role="contentinfo">
  <div class="container" id="inner-footer">
    <div class="row">
      <div class="col-sm-5 col-xs-15 mobile-space">
        <div class="half-col">
          <?php
        	if (has_nav_menu('footer_nav1')) :
          		wp_nav_menu(array('theme_location' => 'footer_nav1', 'menu_class' => 'nav'));
        	endif;
      		?>
        </div>
        <div class="half-col">
          <?php
        	if (has_nav_menu('footer_nav2')) :
          		wp_nav_menu(array('theme_location' => 'footer_nav2', 'menu_class' => 'nav'));
        	endif;
      		?>
          <?php
        	if (has_nav_menu('footer_nav3')) :
          		wp_nav_menu(array('theme_location' => 'footer_nav3', 'menu_class' => 'nav'));
        	endif;
      		?>
        </div>
      </div>
      <div class="col-sm-5 col-md-6 col-xs-15 mobile-space">
        <div class="half-col">
          <h5>Contact Us:</h5>
          <ul class="list-unstyled list-social nav">
            <li class="clearfix"><a href="http://parttime.syr.edu" title="Visit University College on the web">
              <div class="span-block clearfix hidden-sm-icon"><i class="fa fa-globe" aria-hidden="true"></i><span class="sr-only">University College on the Web</span></div>
              <div class="span-block pad-fix"><strong>Web: </strong><span class="blocked">parttime.syr.edu</span></div>
              <div class="clear"></div>
              </a></li>
            <li class="clearfix"><a href="mailto:<?php the_field('email', 'option'); ?>" title="Email University College">
              <div class="span-block clearfix hidden-sm-icon"><i class="fa fa-envelope" aria-hidden="true"></i><span class="sr-only">Email University College</span></div>
              <div class="span-block pad-fix"><strong>Email: </strong><span class="blocked"><?php the_field('email', 'option'); ?></span></div>
              <div class="clear"></div>
              </a></li>
            <li class="clearfix"><a href="tel:1.<?php the_field('phone', 'option'); ?>" title="Call University College">
              <div class="span-block clearfix hidden-sm-icon"><i class="fa fa-phone" aria-hidden="true"></i><span class="sr-only">Call University College</span></div>
              <div class="span-block pad-fix"><strong>Phone: </strong><span class="blocked"><?php the_field('phone', 'option'); ?></span></div>
              <div class="clear"></div>
              </a></li>
               <li class="clearfix"><a href="tel:1.866.498.9378" title="Call University College">
              <div class="span-block clearfix hidden-sm-icon"><i class="fa fa-phone" aria-hidden="true"></i><span class="sr-only">Call University College Toll Free</span></div>
              <div class="span-block pad-fix"><strong>Toll Free: </strong><span class="blocked">1.866.498.9378</span></div>
              <div class="clear"></div>
              </a></li>
            <li class="clearfix"><a href="http://service.velaro.com/visitor/requestchat.aspx?siteid=8925&showwhen=inqueue" target="_blank" title="Live chat with a University College representative">
              <div class="span-block clearfix hidden-sm-icon"><i class="fa fa-comment" aria-hidden="true"></i><span class="sr-only">Live Chat with a University College Representative</span></div>
              <div class="span-block pad-fix"><strong>Chat: </strong><span class="blocked">9am—5pm M/F</span></div>
              <div class="clear"></div>
              </a></li>
          </ul>
        </div>
        <div class="half-col">
          <h5>Follow Us:</h5>
          <ul class="list-unstyled list-social nav">
            <li class="clearfix"><a href="https://www.facebook.com/UniversityCollegeSU" target="_blank" title="University College on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></i>Facebook</a></li>
            <li class="clearfix"><a href="https://twitter.com/gosuparttime/" target="_blank" title="University College on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
            <li class="clearfix"><a href="https://www.linkedin.com/groups?home=&gid=1957763" target="_blank" title="University College on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i>LinkedIn</a></li>
            <li class="clearfix"><a href="https://www.youtube.com/user/SUUniversityCollege" target="_blank" title="University College on YouTube"><i class="fa fa-youtube" aria-hidden="true"></i>YouTube</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-5 col-md-4 col-xs-15" id="footer-info">
        <div id="footer-seal"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/uc-su-logo-w.png" alt="<?php bloginfo( 'name' ); ?>" /></div>
        <div id="footer-contact">
          <p class="colophon"><strong>&copy; <? echo date("Y");?>
            <?php bloginfo( 'name' ); ?>
            </strong></p>
          <p class="colophon"><span class="blocked"><?php the_field('location', 'option'); ?></span><span class="hidden-sm-icon"> &#8226; </span> <span class="blocked">Syracuse New York <span class="hidden-sm-icon"> &#8226; </span> 13244 </span></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<? 
if (get_field('target_pixel') == 'BPS'){ ?>
<!-- Facebook Conversion Code for BPS Inquiries -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6015415639627', {'value':'0.01','currency':'USD'}]);
</script>
<noscript>
<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6015415639627&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" />
</noscript>
<!-- Segment Pixel - SY - Syracuse University - BPS - Site - DO NOT MODIFY -->
<img src="http://bcp.crwdcntrl.net/5/c=931/b=22629562" width="1" height="1"/>
<!-- End of Segment Pixel -->
<!-- Segment Pixel - SY - Syracuse University UC [BPS] - Site - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=2761445&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->
<!-- end targeting -->
<? 
} elseif (get_field('target_pixel') == 'BPS-UC'){ ?>
<!-- Segment Pixel - SY - Syracuse University - BPS - Site - DO NOT MODIFY -->
<img src="http://bcp.crwdcntrl.net/5/c=931/b=22629562" width="1" height="1"/>
<!-- Segment Pixel - SY - Syracuse University - UC - Site - DO NOT MODIFY -->
<img src="http://bcp.crwdcntrl.net/5/c=931/b=22629567" width="1" height="1"/>
<!-- End of Segment Pixel -->
<!-- Segment Pixel - SY - Syracuse University UC [BPS] - Site - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=2761445&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->
<!-- Segment Pixel - SY - Syracuse University - UC - Site - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=2654591&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->
<!-- end targeting -->
<? } else { ?>
<!-- Targeting Pixels and Scripts -->
<!-- Segment Pixel - SY - Syracuse University - New - Site - DO NOT MODIFY -->
<img src="http://bcp.crwdcntrl.net/5/c=931/b=22629567" width="1" height="1"/>
<!-- End of Segment Pixel -->
<!-- Segment Pixel - SY - Syracuse University - UC - Site - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=2654591&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->
<!-- end targeting -->
<? } ?>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">I'm Interested!</h3>
      </div>
      <div class="modal-body">
        <?php get_template_part('forms/form', 'bps'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-small" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php wp_footer(); ?>
