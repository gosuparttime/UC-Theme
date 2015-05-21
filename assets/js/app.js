// as the page loads, call these scripts
jQuery(document).ready(function($) {

	$('#myCarousel').carousel();
	$('#feature-slider').carousel(
	{
  		interval: 20000
	});
	//Mega Menus
	 $('.dropdown').on('show.bs.dropdown', function(){
      var $dropdown = $(this).find('.nav-panel');
     // var orig_margin_top = parseInt($dropdown.css('height'));
      $dropdown.css({'height': '0px', opacity: 0}).animate({'height': 'auto', opacity: 1}, 200, function(){
         $(this).css({'height':''});
      });
   });
   // Add slidedown & fadeout animation to dropdown
   $('.dropdown').on('hide.bs.dropdown', function(){
      var $dropdown = $(this).find('.nav-panel');
      //var orig_margin_top = parseInt($dropdown.css('height'));
      $dropdown.css({'height': 'auto', opacity: 1,}).animate({'height': '0px', opacity: 0}, 200, function(){
         $(this).css({'height':''});
      });
   });
	
	$('.nav-panel').bind('click', function (e) {
		e.stopPropagation();
	});
	/*$('.dropdown-nav').bind('click', function (e) {
		e.stopPropagation();
	});
	$('.dropdown-nav').click(function(e) {
	  e.stopPropagation();
	  setTimeout($.proxy(function() {
		if ('ontouchstart' in document.documentElement) {
		  $(this).siblings('.dropdown-backdrop').off().remove();
		}
	  }, this), 0);
	});
	*/
	$('#primary-toggle').on('click', function () {
		$('.second-collapse').removeClass('in');
	});
	$('#second-toggle').on('click', function () {
		$('.navbar-collapse').removeClass('in');
	});
	// three level?
	$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
		// Avoid following the href location when clicking
		event.preventDefault(); 
		// Avoid having the menu to close when clicking
		event.stopPropagation(); 
		
		
		// Re-add .open to parent sub-menu item
		if ($(this).parent('li').siblings().find('li.dropdown').hasClass('open')){
			$(this).removeClass('open');
		}
		if ($(this).parent().hasClass('open')){
			$(this).parent().removeClass('open');
		} else {
			$(this).parent().addClass('open');
		}
		//$(this).parent().find("ul").parent().find("li.dropdown").addClass('open');
		
	});
	$( window ).load(function() {
		if($('.nav').children('li').hasClass('active')){
			$('li.active').addClass('open');
		}
		if($('.nav').find('ul.dropdown-menu').children('li').hasClass('active')){
			$('li.active').addClass('open');
			$('li.active').parent().parent().addClass('open');
		}
	});
	$('.dropdown-toggle').click(function() {
	  //e.preventDefault();
	  // I turned this off to hopefully make the "Request Info" button work
	  
	  setTimeout($.proxy(function() {
		if ('ontouchstart' in document.documentElement) {
		  $(this).siblings('.dropdown-backdrop').off().remove();
		}
	  }, this), 0);
	});
	// Add Icon to half nav items
	$("ul.nav-half a").each(function() {
	  $(this).append("<i class='fa fa-chevron-right'></i>");
	});
	// --------------------------------------------------------------------------------
	// Adjust image / captions for WP
	// --------------------------------------------------------------------------------
	// Remove width & height attributes from images (added by default in WordPress)
	$('img').removeAttr('width').removeAttr('height');
	// Remove style attribute on image captions, which sets a fixed width by default
  	$('.wp-caption').removeAttr('style');
	
	// --------------------------------------------------------------------------------
	// Remove "+" from Events Cal links
	// --------------------------------------------------------------------------------
	$("a.tribe-events-gmap").each(function() {
	  $(this).html($(this).html().replace(/[+]/, "<i class='fa fa-map-marker'></i>"));
	});
	$("a.tribe-events-button").each(function() {
	  $(this).html($(this).html().replace(/[+]/, "<i class='fa fa-calendar'></i>"));
	});
	$("li.tribe-events-nav-previous").each(function() {
	  $(this).find("span").replaceWith("<i class='fa fa-arrow-left'></i>");
	});
	$("li.tribe-events-nav-next").each(function() {
	  $(this).find("span").replaceWith("<i class='fa fa-arrow-right'></i>");
	});
	$("ul.tribe-bar-views-list").append('<i class="fa fa-sort tribe-selector"></i>');
	// Popovers for calendar
	$('.url').popover({
    container: 'body',
    html: true,
    content: function () {
        return $(this).next('.tribe-events-tooltip').html();
		}
	});
	$('.popout').popover();
	// Test active states
	//  $('nav.second-collapse > ul > li > ul > li a[href="'+ window.location.hostname +'"]').parent('li').addClass('current-menu-item');
	var path = window.location.pathname;
        //path = path.replace(/\/$/, "");
        //path = decodeURIComponent(path);
		path = "http://parttime-dev.syr.edu" + path;
		//alert(path);
	$(".second-collapse a").each(function () {
		
        var href = $(this).attr('href');
		if (path === href) {
            $(this).parent('li').addClass('current-menu-item');
			$(this).parent('li').parent('ul').parent('li').addClass('active');
        }
    });
	//
	
	// Modal Windows
	// –––––––––––––––––––––––––––––––––––––––––––––
	/*$('[data-remote]').on('click',function(e) {
		e.preventDefault();
		var $this = $(this);
		var remote = $this.data('remote');
		//alert(remote);
		if(remote) {
			$($this.data('target')).load(remote);
		}
	});//*/
	$('[data-toggle="ajaxModal"]').on('click',
		function(e) {
            $('#ajaxModal').remove();
            e.preventDefault();
            var $this = $(this);
            var $remote = $this.data('remote') || $this.attr('href');
            var $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
            $('body').append($modal);
            $modal.modal({backdrop: 'static', keyboard: false});
        	$modal.load($remote);
		}
	);
	//
	// Fit Vidz
	$(".video-player").fitVids();
	//
	
	// Add Table / Table Hover class by default if none added to editor
	$("#content").find("table").each(function() {
		// Add Classes
		if ($(this).hasClass("table")){
			//
		} else {
			$(this).addClass("table");
		}
		if ($(this).parent('div').hasClass("table-responsive")){
			//
		} else {
			$(this).wrap('<div class="table-responsive">');
		}
	});
	
	// Show/hide Other field for CF7 Forms
	$('#other-cf7').hide();
	$('#your-subject').change(function() {
	   if ($(this).val() === 'Other Question'){
		   $('#other-cf7').show();
	   } else {
		   $('#other-cf7').hide();
	   }
	});
}); /* end of as page load scripts */


