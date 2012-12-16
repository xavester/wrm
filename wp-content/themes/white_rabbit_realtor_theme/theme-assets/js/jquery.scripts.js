// JavaScript Document

jQuery(document).ready(function(){
								
	$loadUri = jQuery('meta[name=the_uri]').attr('content');
	
	//loading images
	
    jQuery('img.post_preview_img_excerpt').each(function(){
        loadImage(this, $loadUri);
    });
	
    jQuery('img.banner_img').each(function(){
        loadImage(this, $loadUri);
    });
								
	//Ajax For Listing Result Table Format
	
	jQuery('.archive_table .archive_inside_body table tr td.cell_viewmore a').click( function() {  
																		 
		var $toLoad = $(this).attr('href') + ' .ajax_info_holder';
		var $toPosition = '#' + $(this).attr('rel');
		
		jQuery(this).parent().parent().attr({'id' : $(this).attr('rel')}).addClass('tr_no_bg');
		jQuery($toPosition + ' td').hide();
		jQuery($toPosition).append('<td class="ajax_loaded" colspan="7"></td>');
		jQuery($toPosition + ' .ajax_loaded .loading').remove();
		jQuery($toPosition + ' .ajax_loaded').append('<span class="loading">Please Wait Loading Data...</span>');
		jQuery($toPosition + ' .ajax_loaded .loading').hide();
		jQuery($toPosition + ' .ajax_loaded .loading').fadeIn('normal');
		jQuery($toPosition + ' .ajax_loaded').append('<div class="ajax_info_holder"></div>');
		showContent();
		
		function showContent() {
			jQuery($toPosition + ' .ajax_loaded .ajax_info_holder').hide();
			jQuery($toPosition + ' .ajax_loaded').load($toLoad,'',afterLoad);
		}
		
		function afterLoad() {
			jQuery($toPosition + ' .ajax_loaded .loading').fadeOut('normal');
			jQuery($toPosition + ' .ajax_loaded .ajax_info_holder').hide();
			jQuery($toPosition + ' .ajax_loaded .ajax_info_holder').fadeIn('slow');
			Cufon.replace('.post_preview_title',{ fontFamily: 'Sansation', hover: true });
			Cufon.replace('.post_listing_price',{ fontFamily: 'Sansation', hover: true });
			jQuery('.fx_button_hover').hover(
			  function () {
				jQuery(this).css('background-position', 'left bottom');
			  },
			  function () {
				jQuery(this).css('background-position', 'left top');
			  }
			);
			jQuery('.archive_inside_body table tr:last-child .ajax_loaded').addClass('noBg');
			deleteRow();
		}
		
		return false;
		
	})
	
	function deleteRow() {
	
		jQuery('.ajax_info_holder_close a').click( function() {  
			jQuery(this).closest('.ajax_loaded').parent().find('td').show();
			jQuery(this).closest('.ajax_loaded').parent().removeClass('tr_no_bg')
			jQuery(this).closest('.ajax_loaded').remove();
			return false;
		});
	
	}
	
	//Zebra Table
	zebra_table('#basic_style_1 table');
	zebra_table('.archive_table table');
	
	//Tabs
	
	$('#sidebar_tab1').tabs({ fxSlide: true, fxSpeed: 'fast' });
	
	$('#footer_tab1').tabs({ fxSlide: true, fxSpeed: 'fast' });
	
	$('#footer_tab1 .tabs-nav a').click( function() {
		jQuery('#footer_tab1 .tabs-container').removeClass('tabs-container-mod');
	});
	
	//Slide Scroll FX
	
	jQuery('#feat_banner_next, #feat_banner_prev').stop(false, true).animate({opacity: 0.25}, 1000, function() { });
	jQuery('#banner_page, #banner_page_desc').find('li').remove();
	
    jQuery('#featured_banner_images').cycle({
		fx:     'fade',
		speed:  'slow',
		next:   '#feat_banner_next',
		prev:   '#feat_banner_prev',
		after:  onAfter,
		pager:	'#banner_page',
    	pagerAnchorBuilder: function(idx, slide) { return '<li><a href="#" class="png_fix"><span class="hide_this">' + (idx + 1) + '</span></a></li>'; }
	});
	
	function onAfter(curr, next, opts) { jQuery('#banner_page_desc li:eq(' + opts.currSlide +') a').trigger('click'); }
	
	jQuery('#banner_desc_wrapper').cycle({
		fx:     'blindY',
		speed:  'slow', 
		next:   '#feat_banner_next',
		prev:   '#feat_banner_prev',
		cleartype:  1,
		sync:	1,
		cleartypeNoBg: true,
		timeout: 0,
		pager:	'#banner_page_desc',
    	pagerAnchorBuilder: function(idx, slide) { return '<li><a href="#">' + (idx + 1) + '</a></li>'; }
	});
	
	jQuery('#navigation, .desc_readmore, .desc_title').hover(
	  function () {
		jQuery('#featured_banner_images, #banner_desc_wrapper').cycle('pause');
	  },
	  function () {
		jQuery('#featured_banner_images, #banner_desc_wrapper').cycle('resume');
	  }
	);
	
	if (jQuery.browser.msie) {
  	$version = parseInt(jQuery.browser.version);
		if ( $version == 6 ) {
			jQuery('#recent_blog').cycle({
				fx:     'none',
				next:   '#recent_blog_down',
				prev:   '#recent_blog_up',
				cleartypeNoBg: true
			});
		}
		else {
			recent_blog_not_ie();
		}
	}
	else {
		recent_blog_not_ie();
	}
	
	function recent_blog_not_ie() {
		jQuery('#recent_blog').cycle({
			fx:     'blindY',
			speed:  'slow', 
			next:   '#recent_blog_down',
			prev:   '#recent_blog_up',
			pause:  1,
			sync:	1,
			cleartypeNoBg: true
		});
	}
	
	jQuery('#banner_image_wrapper').hover(
	  function () {
		jQuery('#feat_banner_next, #feat_banner_prev').stop(false, true).animate({opacity: 0.50}, 500, function() { });
	  },
	  function () {
		jQuery('#feat_banner_next, #feat_banner_prev').stop(false, true).animate({opacity: 0.25}, 500, function() { });
	  }
	);
	
	/*** FX ***/
	/** ----------------------------------------------------- **/
	
	jQuery('#icon_email_this').click(function() {
		mailpage();
		alert('mail page');
		return false;
	});

	jQuery('.fx_button_hover, #respond #submit, #contact_form #id_send2').hover(
	  function () {
		jQuery(this).css('background-position', 'left bottom');
	  },
	  function () {
		jQuery(this).css('background-position', 'left top');
	  }
	);
	
	jQuery('.fx_button_hover2').hover(
	  function () {
		jQuery(this).css('background-position', 'left top');
	  },
	  function () {
		jQuery(this).css('background-position', 'left bottom');
	  }
	);
	
	if (jQuery.browser.msie) {
  	$version = parseInt(jQuery.browser.version);
		if ( ( $version == 6 ) && ( $version == 7 ) ) {
			jQuery('.comment_main').find('.comment_reply').show();
		}
		else {
			comment_reply_hover();
		}
	}
	else {
		comment_reply_hover();
	}
	
	function comment_reply_hover() {
		jQuery('.comment_main').hover(
		  function () {
			jQuery(this).find('.comment_reply').show();
		  },
		  function () {
			jQuery(this).find('.comment_reply').hide();
		  }
		);
	}
	
	jQuery('.fx_input_field').focus(function() {
		if (this.value == this.defaultValue){
			jQuery(this).css('color', '#eee');
			this.value = '';
		}
		if(this.value != this.defaultValue){
			this.select();
		}
	});
	jQuery('.fx_input_field').blur(function() {
		if ($.trim(this.value) == ''){
			this.value = (this.defaultValue ? this.defaultValue : '');
			jQuery(this).css("color", "#777");
		}
	});
	
	jQuery('#respond input, #respond textarea').focus(function() {
		jQuery(this).addClass('on_focus_respond');
	});
	jQuery('#respond input, #respond textarea').blur(function() {
		jQuery(this).removeClass('on_focus_respond');
	});
	
    jQuery('#top_post li:first, #recent_comments li:first, tr td:first-child').addClass('first');
    jQuery('#top_post li:last, #recent_comments li:last, tr td:last-child').addClass('last');
	jQuery('.archive_inside_header .th_tf_post_title').width( jQuery('.archive_inside_body .cell_post_name').outerWidth() );
	jQuery('.archive_inside_header .th_tf_type').width( jQuery('.archive_inside_body .cell_type').outerWidth() );
	jQuery('.archive_inside_header .th_tf_bed').width( jQuery('.archive_inside_body .cell_bed').outerWidth() );
	jQuery('.archive_inside_header .th_tf_bath').width( jQuery('.archive_inside_body .cell_bath').outerWidth() );
	jQuery('.archive_inside_header .th_tf_garage').width( jQuery('.archive_inside_body .cell_garage').outerWidth() );
	jQuery('.archive_inside_header .th_tf_price').width( jQuery('.archive_inside_body .cell_price').outerWidth() );
	jQuery('.archive_inside_header .th_tf_prev').width( jQuery('.archive_inside_body .cell_viewmore').outerWidth() );
	jQuery('.archive_inside_body tr:last-child td').addClass('noBg');
	
	/*** Cufon ***/
	/** ----------------------------------------------------- **/
	
	Cufon.replace(
				  
		'.font_harabara'
					  
	,{ fontFamily: 'Harabara', hover: true });
	
	Cufon.replace(
				  
		'#single_page_title, ' +
		'.basic_style_1 h1, .basic_style_1 h2, .basic_style_1 h3, .basic_style_1 h4, .basic_style_1 h5, .basic_style_1 h6, ' +
		'#banner_desc_wrapper .desc_title, ' +	
		'.widgettitle, ' +
		'.font_sansation'
					  
	,{ fontFamily: 'Sansation', hover: true });

}); //end of document ready

/*** Functions ***/
/** ----------------------------------------------------- **/

function loadImage($currentImage, $temp_uri) { //preload image function

	$loadImgUrl = $temp_uri + '/images/ajax-loader2.gif';
	
	$curImgWidth = jQuery($currentImage).attr('width');
	$curImgHeight = jQuery($currentImage).attr('height');
	$curImgSrc = jQuery($currentImage).attr('src');
	$curImgClass = jQuery($currentImage).attr('class');
	$curImgID = jQuery($currentImage).attr('id');
	
	jQuery($currentImage).wrap('<div class="pre_load_holder"></div>');
	
	jQuery($currentImage).parent().css({'width' : $curImgWidth , 'height' : $curImgHeight, 'background-image' : 'url(' + $loadImgUrl + ')', 'background-position' : 'center center', 'background-repeat' : 'no-repeat', 'background-color' : '#fff' }).attr({'class' : $curImgClass });
	
	jQuery($currentImage).hide();
	
	var img = new Image();
  
	$(img)
	
	.load(function () {

		jQuery(this).hide();
		jQuery($currentImage).parent().replaceWith(this);
		jQuery(this).fadeIn();
	
	})
	
    .attr({'src' : $curImgSrc, 'class' : $curImgClass, 'width' : $curImgWidth , 'height' : $curImgHeight, 'id' : $curImgID });
	
}

jQuery(function(){ //Smooth Scroll
	jQuery('.smooth_scroll a').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			&& location.hostname == this.hostname) {
				var $target = $(this.hash);
				$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				jQuery('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
});

function zebra_table($object){  //Zebra Table

	jQuery( $object + ' tbody tr:nth-child(odd)').addClass('odd');
	
	jQuery( $object + ' tbody tr').hover(
		function () {
		jQuery(this).addClass('trover');
	},
		function () {
		jQuery(this).removeClass('trover');
	})
  
}

function lava_lamp_menu(){
	
	jQuery('#lava ul li').addClass('put_lava');
	jQuery('#lava ul li li, #lava ul#rss_and_links li').removeClass('put_lava');
	
	var style = 'easeOutElastic';
	
	if ( jQuery('#lava li.put_lava').hasClass('current_page_item') || jQuery('#lava li.put_lava').hasClass('current_page_ancestor')  ) {
	
		var default_left = Math.round(jQuery('#lava li.current_page_item, #lava li.current_page_ancestor').offset().left - jQuery('#lava').offset().left);
		var default_width = jQuery('#lava li.current_page_item, #lava li.current_page_ancestor').width();
	
	}
	
	else {
		
		var default_left = -15;
		var default_width = 0;
		
	}

	jQuery('#lava ul li ul').prepend('<li class="dropdown_top"></li>');
	jQuery('#lava ul li ul').append('<li class="dropdown_bottom png_fix"></li>');

	jQuery('#lava ul li ul li:last-child').prev().addClass('last');

	jQuery('#lava li.current_page_item a:first, #lava li.current_page_ancestor a:first').css('color', '#eee');
	
	jQuery('#lava .put_lava').hover(
	  function () {
		jQuery('#lava .put_lava').find('a:first').css('color', '#000');
		jQuery(this).find('a:first').css('color', '#eee');
	  }
	);
	
	jQuery('#lava #nav_home').click(
	  function () {
		jQuery('#lava').css('overflow', 'hidden');
	  }
	);
	
	jQuery('#lava #nav_home').mouseover(
	  function () {
		jQuery('#lava').css('overflow', 'hidden');
	  }
	);
	
	jQuery('#lava .sf-with-ul').mouseover(
	  function () {
		jQuery('#lava').css('overflow', 'visible');
	  }
	);
	
	
	
	jQuery('#box').css({left: default_left});
	jQuery('#box .head').css({width: default_width});

	jQuery('#lava li.put_lava').hover(function () {
		jQuery('#box').show();
		left = Math.round(jQuery(this).offset().left - jQuery('#lava').offset().left);
		width = jQuery(this).width();
		jQuery('#box').stop(false, true).animate({left: left},{duration:1500, easing: style});	
		jQuery('#box .head').stop(false, true).animate({width:width},{duration:1500, easing: style});	
	
	}).click(function () {
		jQuery('#lava li').removeClass('current_page_item');	
		jQuery(this).addClass('current_page_item');
	});
	
	jQuery('#lava').mouseleave(function () {
										 
		if (jQuery('#lava li.put_lava').is('.current_page_item, .current_page_ancestor')) {

			var leftx = Math.round(jQuery('#lava li.current_page_item, #lava li.current_page_ancestor').offset().left - jQuery('#lava').offset().left);
			var widthx = jQuery('#lava li.current_page_item, #lava li.current_page_ancestor').width();
			
			jQuery('#lava').css('overflow', 'hidden');
			
			jQuery('#box').stop(false, true).animate({left: leftx},{duration:1500, easing: style});	
			jQuery('#box .head').stop(false, true).animate({width: widthx},{duration:1500, easing: style});
			
			jQuery('.put_lava').find('a:first').css('color', '#000');
			jQuery('#lava li.current_page_item a:first, #lava li.current_page_ancestor a:first').css('color', '#eee');

			
		} else {
			
			jQuery('.put_lava').find('a:first').css('color', '#000');
			jQuery('#box').hide();
			
		}
										 
	});
	
	jQuery('#lava #box').css('display', 'block');
	
	adjust_height('.column_left_home .post_preview .post_preview_content');
		
}

/*** Twitter And Flickr Scripts ***/
/** ----------------------------------------------------- **/

function ds_twitter($username,$qty,$appendItTo) {

	$.getJSON('http://twitter.com/status/user_timeline/' + $username + '.json?count=' + $qty + '&callback=?', function(data){
	    $($appendItTo).prepend('<div class="tweet twitt_text_holder"></div>');
		$.each(data, function(index, item){
			$('.twitt_text_holder').append('<p>' + item.text.linkify() + '</p><p class="twitter_timestamp"><strong>' + relative_time(item.created_at) + '</strong></p>');
			$('#tab-footer-1 .footer_twitter_follow a').attr('href', 'http://twitter.com/' + item.user.screen_name);
		});
	});
	
	function relative_time(time_value) {
	  var values = time_value.split(" ");
	  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	  var parsed_date = Date.parse(time_value);
	  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	  delta = delta + (relative_to.getTimezoneOffset() * 60);
	  
	  var r = '';
	  if (delta < 60) {
		r = 'a minute ago';
	  } else if(delta < 120) {
		r = 'couple of minutes ago';
	  } else if(delta < (45*60)) {
		r = (parseInt(delta / 60)).toString() + ' minutes ago';
	  } else if(delta < (90*60)) {
		r = 'an hour ago';
	  } else if(delta < (24*60*60)) {
		r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
	  } else if(delta < (48*60*60)) {
		r = '1 day ago';
	  } else {
		r = (parseInt(delta / 86400)).toString() + ' days ago';
	  }
	  
	  return r;
	}
	
	String.prototype.linkify = function() {
		return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
			return m.link(m);
		});
	};
	
}

function ds_flickr($username,$qty,$appendItTo,$type) {
	
	$type ? $type = 'groups_pool' : $type = 'photos_public';
		
	$.getJSON( 'http://api.flickr.com/services/feeds/' + $type + '.gne?id=' + $username + '&lang=en-us&format=json&jsoncallback=?', flickrCallBack );
				   
	function flickrCallBack(data){
		
		$.each(data.items, function(index, item){
			$('<img/>').attr('src', item.media.m).appendTo($appendItTo)
				.wrap('<div class="flickr-thumb"><a href="' + item.link + '" ></a></div>');
			return (index != ($qty-1));
		});
	  
		jQuery('#footer_flickr .flickr-thumb img').stop(false, true).animate({opacity: 0.50}, 1000, function() { });
		
		jQuery('#footer_flickr .flickr-thumb img').hover(
		  function () {
			jQuery(this).stop(false, true).animate({opacity: 1}, 500, function() { });
		  },
		  function () {
			jQuery(this).stop(false, true).animate({opacity: 0.50}, 500, function() { });
		  }
		);
		
		$('#tab-footer-2 .footer_flickr_viewmore a').attr('href', 'http://flickr.com/' + $type.substring(0,6) + '/' + $username);
		
	}
	
}

function adjust_height($object) { //Adjust Height
	var $modHeight = new Number()
	var $tempHeight = new Array()
	var $x = new Number()
	jQuery($object).each(function() {
		$tempHeight[$x] = jQuery(this).innerHeight();
		$x++;
	});
	$modHeight = getMax($tempHeight);
	jQuery($object).each(function() {
		jQuery(this).height($modHeight);
	});
	function getMax(array) {
		return Math.max.apply( Math, array );
	};
}

function mailpage()
{
	mail_str = 'mailto:?subject=Check out the ' + document.title;
	mail_str += '&body=I thought you might be interested in the ' + document.title;
	mail_str += '. You can view it at, ' + location.href;
	location.href = mail_str;
}

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
 
 
/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"></span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: true,
		dropShadows : true,
		disableHI	: false,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,o.easing,function()
			{ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);

(function($){
	/* hoverIntent by Brian Cherne */
	$.fn.hoverIntent = function(f,g) {
		// default configuration options
		var cfg = {
			sensitivity: 7,
			interval: 100,
			timeout: 0
		};
		// override configuration options with user supplied object
		cfg = $.extend(cfg, g ? { over: f, out: g } : f );

		// instantiate variables
		// cX, cY = current X and Y position of mouse, updated by mousemove event
		// pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
				$(ob).unbind("mousemove",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				return cfg.over.apply(ob,[ev]);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
			}
		};

		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			return cfg.out.apply(ob,[ev]);
		};

		// A private function for handling mouse 'hovering'
		var handleHover = function(e) {
			// next three lines copied from jQuery.hover, ignore children onMouseOver/onMouseOut
			var p = (e.type == "mouseover" ? e.fromElement : e.toElement) || e.relatedTarget;
			while ( p && p != this ) { try { p = p.parentNode; } catch(e) { p = this; } }
			if ( p == this ) { return false; }

			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			var ob = this;

			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// else e.type == "onmouseover"
			if (e.type == "mouseover") {
				// set "previous" X and Y position based on initial entry point
				pX = ev.pageX; pY = ev.pageY;
				// update "current" X and Y position based on mousemove
				$(ob).bind("mousemove",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

			// else e.type == "onmouseout"
			} else {
				// unbind expensive mousemove event
				$(ob).unbind("mousemove",track);
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
			}
		};

		// bind the function to the two event listeners
		return this.mouseover(handleHover).mouseout(handleHover);
	};
	
})(jQuery);

/*
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2009 M. Alsup
 * Version: 2.74 (03-FEB-2010)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Requires: jQuery v1.2.6 or later
 */
(function($){var ver="2.74";if($.support==undefined){$.support={opacity:!($.browser.msie)};}function debug(s){if($.fn.cycle.debug){log(s);}}function log(){if(window.console&&window.console.log){window.console.log("[cycle] "+Array.prototype.join.call(arguments," "));}}$.fn.cycle=function(options,arg2){var o={s:this.selector,c:this.context};if(this.length===0&&options!="stop"){if(!$.isReady&&o.s){log("DOM not ready, queuing slideshow");$(function(){$(o.s,o.c).cycle(options,arg2);});return this;}log("terminating; zero elements found by selector"+($.isReady?"":" (DOM not ready)"));return this;}return this.each(function(){var opts=handleArguments(this,options,arg2);if(opts===false){return;}if(this.cycleTimeout){clearTimeout(this.cycleTimeout);}this.cycleTimeout=this.cyclePause=0;var $cont=$(this);var $slides=opts.slideExpr?$(opts.slideExpr,this):$cont.children();var els=$slides.get();if(els.length<2){log("terminating; too few slides: "+els.length);return;}var opts2=buildOptions($cont,$slides,els,opts,o);if(opts2===false){return;}var startTime=opts2.continuous?10:getTimeout(opts2.currSlide,opts2.nextSlide,opts2,!opts2.rev);if(startTime){startTime+=(opts2.delay||0);if(startTime<10){startTime=10;}debug("first timeout: "+startTime);this.cycleTimeout=setTimeout(function(){go(els,opts2,0,!opts2.rev);},startTime);}});};function handleArguments(cont,options,arg2){if(cont.cycleStop==undefined){cont.cycleStop=0;}if(options===undefined||options===null){options={};}if(options.constructor==String){switch(options){case"stop":cont.cycleStop++;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);}cont.cycleTimeout=0;$(cont).removeData("cycle.opts");return false;case"toggle":cont.cyclePause=(cont.cyclePause===1)?0:1;return false;case"pause":cont.cyclePause=1;return false;case"resume":cont.cyclePause=0;if(arg2===true){options=$(cont).data("cycle.opts");if(!options){log("options not found, can not resume");return false;}if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}go(options.elements,options,1,1);}return false;case"prev":case"next":var opts=$(cont).data("cycle.opts");if(!opts){log('options not found, "prev/next" ignored');return false;}$.fn.cycle[options](opts);return false;default:options={fx:options};}return options;}else{if(options.constructor==Number){var num=options;options=$(cont).data("cycle.opts");if(!options){log("options not found, can not advance slide");return false;}if(num<0||num>=options.elements.length){log("invalid slide index: "+num);return false;}options.nextSlide=num;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}if(typeof arg2=="string"){options.oneTimeFx=arg2;}go(options.elements,options,1,num>=options.currSlide);return false;}}return options;}function removeFilter(el,opts){if(!$.support.opacity&&opts.cleartype&&el.style.filter){try{el.style.removeAttribute("filter");}catch(smother){}}}function buildOptions($cont,$slides,els,options,o){var opts=$.extend({},$.fn.cycle.defaults,options||{},$.metadata?$cont.metadata():$.meta?$cont.data():{});if(opts.autostop){opts.countdown=opts.autostopCount||els.length;}var cont=$cont[0];$cont.data("cycle.opts",opts);opts.$cont=$cont;opts.stopCount=cont.cycleStop;opts.elements=els;opts.before=opts.before?[opts.before]:[];opts.after=opts.after?[opts.after]:[];opts.after.unshift(function(){opts.busy=0;});if(!$.support.opacity&&opts.cleartype){opts.after.push(function(){removeFilter(this,opts);});}if(opts.continuous){opts.after.push(function(){go(els,opts,0,!opts.rev);});}saveOriginalOpts(opts);if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($slides);}if($cont.css("position")=="static"){$cont.css("position","relative");}if(opts.width){$cont.width(opts.width);}if(opts.height&&opts.height!="auto"){$cont.height(opts.height);}if(opts.startingSlide){opts.startingSlide=parseInt(opts.startingSlide);}if(opts.random){opts.randomMap=[];for(var i=0;i<els.length;i++){opts.randomMap.push(i);}opts.randomMap.sort(function(a,b){return Math.random()-0.5;});opts.randomIndex=0;opts.startingSlide=opts.randomMap[0];}else{if(opts.startingSlide>=els.length){opts.startingSlide=0;}}opts.currSlide=opts.startingSlide=opts.startingSlide||0;var first=opts.startingSlide;$slides.css({position:"absolute",top:0,left:0}).hide().each(function(i){var z=first?i>=first?els.length-(i-first):first-i:els.length-i;$(this).css("z-index",z);});$(els[first]).css("opacity",1).show();removeFilter(els[first],opts);if(opts.fit&&opts.width){$slides.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$slides.height(opts.height);}var reshape=opts.containerResize&&!$cont.innerHeight();if(reshape){var maxw=0,maxh=0;for(var j=0;j<els.length;j++){var $e=$(els[j]),e=$e[0],w=$e.outerWidth(),h=$e.outerHeight();if(!w){w=e.offsetWidth;}if(!h){h=e.offsetHeight;}maxw=w>maxw?w:maxw;maxh=h>maxh?h:maxh;}if(maxw>0&&maxh>0){$cont.css({width:maxw+"px",height:maxh+"px"});}}if(opts.pause){$cont.hover(function(){this.cyclePause++;},function(){this.cyclePause--;});}if(supportMultiTransitions(opts)===false){return false;}var requeue=false;options.requeueAttempts=options.requeueAttempts||0;$slides.each(function(){var $el=$(this);this.cycleH=(opts.fit&&opts.height)?opts.height:$el.height();this.cycleW=(opts.fit&&opts.width)?opts.width:$el.width();if($el.is("img")){var loadingIE=($.browser.msie&&this.cycleW==28&&this.cycleH==30&&!this.complete);var loadingFF=($.browser.mozilla&&this.cycleW==34&&this.cycleH==19&&!this.complete);var loadingOp=($.browser.opera&&((this.cycleW==42&&this.cycleH==19)||(this.cycleW==37&&this.cycleH==17))&&!this.complete);var loadingOther=(this.cycleH==0&&this.cycleW==0&&!this.complete);if(loadingIE||loadingFF||loadingOp||loadingOther){if(o.s&&opts.requeueOnImageNotLoaded&&++options.requeueAttempts<100){log(options.requeueAttempts," - img slide not loaded, requeuing slideshow: ",this.src,this.cycleW,this.cycleH);setTimeout(function(){$(o.s,o.c).cycle(options);},opts.requeueTimeout);requeue=true;return false;}else{log("could not determine size of image: "+this.src,this.cycleW,this.cycleH);}}}return true;});if(requeue){return false;}opts.cssBefore=opts.cssBefore||{};opts.animIn=opts.animIn||{};opts.animOut=opts.animOut||{};$slides.not(":eq("+first+")").css(opts.cssBefore);if(opts.cssFirst){$($slides[first]).css(opts.cssFirst);}if(opts.timeout){opts.timeout=parseInt(opts.timeout);if(opts.speed.constructor==String){opts.speed=$.fx.speeds[opts.speed]||parseInt(opts.speed);}if(!opts.sync){opts.speed=opts.speed/2;}while((opts.timeout-opts.speed)<250){opts.timeout+=opts.speed;}}if(opts.easing){opts.easeIn=opts.easeOut=opts.easing;}if(!opts.speedIn){opts.speedIn=opts.speed;}if(!opts.speedOut){opts.speedOut=opts.speed;}opts.slideCount=els.length;opts.currSlide=opts.lastSlide=first;if(opts.random){opts.nextSlide=opts.currSlide;if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{opts.nextSlide=opts.startingSlide>=(els.length-1)?0:opts.startingSlide+1;}if(!opts.multiFx){var init=$.fn.cycle.transitions[opts.fx];if($.isFunction(init)){init($cont,$slides,opts);}else{if(opts.fx!="custom"&&!opts.multiFx){log("unknown transition: "+opts.fx,"; slideshow terminating");return false;}}}var e0=$slides[first];if(opts.before.length){opts.before[0].apply(e0,[e0,e0,opts,true]);}if(opts.after.length>1){opts.after[1].apply(e0,[e0,e0,opts,true]);}if(opts.next){$(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,opts.rev?-1:1);});}if(opts.prev){$(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,opts.rev?1:-1);});}if(opts.pager){buildPager(els,opts);}exposeAddSlide(opts,els);return opts;}function saveOriginalOpts(opts){opts.original={before:[],after:[]};opts.original.cssBefore=$.extend({},opts.cssBefore);opts.original.cssAfter=$.extend({},opts.cssAfter);opts.original.animIn=$.extend({},opts.animIn);opts.original.animOut=$.extend({},opts.animOut);$.each(opts.before,function(){opts.original.before.push(this);});$.each(opts.after,function(){opts.original.after.push(this);});}function supportMultiTransitions(opts){var i,tx,txs=$.fn.cycle.transitions;if(opts.fx.indexOf(",")>0){opts.multiFx=true;opts.fxs=opts.fx.replace(/\s*/g,"").split(",");for(i=0;i<opts.fxs.length;i++){var fx=opts.fxs[i];tx=txs[fx];if(!tx||!txs.hasOwnProperty(fx)||!$.isFunction(tx)){log("discarding unknown transition: ",fx);opts.fxs.splice(i,1);i--;}}if(!opts.fxs.length){log("No valid transitions named; slideshow terminating.");return false;}}else{if(opts.fx=="all"){opts.multiFx=true;opts.fxs=[];for(p in txs){tx=txs[p];if(txs.hasOwnProperty(p)&&$.isFunction(tx)){opts.fxs.push(p);}}}}if(opts.multiFx&&opts.randomizeEffects){var r1=Math.floor(Math.random()*20)+30;for(i=0;i<r1;i++){var r2=Math.floor(Math.random()*opts.fxs.length);opts.fxs.push(opts.fxs.splice(r2,1)[0]);}debug("randomized fx sequence: ",opts.fxs);}return true;}function exposeAddSlide(opts,els){opts.addSlide=function(newSlide,prepend){var $s=$(newSlide),s=$s[0];if(!opts.autostopCount){opts.countdown++;}els[prepend?"unshift":"push"](s);if(opts.els){opts.els[prepend?"unshift":"push"](s);}opts.slideCount=els.length;$s.css("position","absolute");$s[prepend?"prependTo":"appendTo"](opts.$cont);if(prepend){opts.currSlide++;opts.nextSlide++;}if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($s);}if(opts.fit&&opts.width){$s.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$slides.height(opts.height);}s.cycleH=(opts.fit&&opts.height)?opts.height:$s.height();s.cycleW=(opts.fit&&opts.width)?opts.width:$s.width();$s.css(opts.cssBefore);if(opts.pager){$.fn.cycle.createPagerAnchor(els.length-1,s,$(opts.pager),els,opts);}if($.isFunction(opts.onAddSlide)){opts.onAddSlide($s);}else{$s.hide();}};}$.fn.cycle.resetState=function(opts,fx){fx=fx||opts.fx;opts.before=[];opts.after=[];opts.cssBefore=$.extend({},opts.original.cssBefore);opts.cssAfter=$.extend({},opts.original.cssAfter);opts.animIn=$.extend({},opts.original.animIn);opts.animOut=$.extend({},opts.original.animOut);opts.fxFn=null;$.each(opts.original.before,function(){opts.before.push(this);});$.each(opts.original.after,function(){opts.after.push(this);});var init=$.fn.cycle.transitions[fx];if($.isFunction(init)){init(opts.$cont,$(opts.elements),opts);}};function go(els,opts,manual,fwd){if(manual&&opts.busy&&opts.manualTrump){$(els).stop(true,true);opts.busy=false;}if(opts.busy){return;}var p=opts.$cont[0],curr=els[opts.currSlide],next=els[opts.nextSlide];if(p.cycleStop!=opts.stopCount||p.cycleTimeout===0&&!manual){return;}if(!manual&&!p.cyclePause&&((opts.autostop&&(--opts.countdown<=0))||(opts.nowrap&&!opts.random&&opts.nextSlide<opts.currSlide))){if(opts.end){opts.end(opts);}return;}if(manual||!p.cyclePause){var fx=opts.fx;curr.cycleH=curr.cycleH||$(curr).height();curr.cycleW=curr.cycleW||$(curr).width();next.cycleH=next.cycleH||$(next).height();next.cycleW=next.cycleW||$(next).width();if(opts.multiFx){if(opts.lastFx==undefined||++opts.lastFx>=opts.fxs.length){opts.lastFx=0;}fx=opts.fxs[opts.lastFx];opts.currFx=fx;}if(opts.oneTimeFx){fx=opts.oneTimeFx;opts.oneTimeFx=null;}$.fn.cycle.resetState(opts,fx);if(opts.before.length){$.each(opts.before,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});}var after=function(){$.each(opts.after,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});};if(opts.nextSlide!=opts.currSlide){opts.busy=1;if(opts.fxFn){opts.fxFn(curr,next,opts,after,fwd);}else{if($.isFunction($.fn.cycle[opts.fx])){$.fn.cycle[opts.fx](curr,next,opts,after);}else{$.fn.cycle.custom(curr,next,opts,after,manual&&opts.fastOnEvent);}}}opts.lastSlide=opts.currSlide;if(opts.random){opts.currSlide=opts.nextSlide;if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{var roll=(opts.nextSlide+1)==els.length;opts.nextSlide=roll?0:opts.nextSlide+1;opts.currSlide=roll?els.length-1:opts.nextSlide-1;}if(opts.pager){$.fn.cycle.updateActivePagerLink(opts.pager,opts.currSlide);}}var ms=0;if(opts.timeout&&!opts.continuous){ms=getTimeout(curr,next,opts,fwd);}else{if(opts.continuous&&p.cyclePause){ms=10;}}if(ms>0){p.cycleTimeout=setTimeout(function(){go(els,opts,0,!opts.rev);},ms);}}$.fn.cycle.updateActivePagerLink=function(pager,currSlide){$(pager).each(function(){$(this).find("a").removeClass("activeSlide").filter("a:eq("+currSlide+")").addClass("activeSlide");});};function getTimeout(curr,next,opts,fwd){if(opts.timeoutFn){var t=opts.timeoutFn(curr,next,opts,fwd);while((t-opts.speed)<250){t+=opts.speed;}debug("calculated timeout: "+t+"; speed: "+opts.speed);if(t!==false){return t;}}return opts.timeout;}$.fn.cycle.next=function(opts){advance(opts,opts.rev?-1:1);};$.fn.cycle.prev=function(opts){advance(opts,opts.rev?1:-1);};function advance(opts,val){var els=opts.elements;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}if(opts.random&&val<0){opts.randomIndex--;if(--opts.randomIndex==-2){opts.randomIndex=els.length-2;}else{if(opts.randomIndex==-1){opts.randomIndex=els.length-1;}}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.random){if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{opts.nextSlide=opts.currSlide+val;if(opts.nextSlide<0){if(opts.nowrap){return false;}opts.nextSlide=els.length-1;}else{if(opts.nextSlide>=els.length){if(opts.nowrap){return false;}opts.nextSlide=0;}}}}if($.isFunction(opts.prevNextClick)){opts.prevNextClick(val>0,opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,val>=0);return false;}function buildPager(els,opts){var $p=$(opts.pager);$.each(els,function(i,o){$.fn.cycle.createPagerAnchor(i,o,$p,els,opts);});$.fn.cycle.updateActivePagerLink(opts.pager,opts.startingSlide);}$.fn.cycle.createPagerAnchor=function(i,el,$p,els,opts){var a;if($.isFunction(opts.pagerAnchorBuilder)){a=opts.pagerAnchorBuilder(i,el);}else{a='<a href="#">'+(i+1)+"</a>";}if(!a){return;}var $a=$(a);if($a.parents("body").length===0){var arr=[];if($p.length>1){$p.each(function(){var $clone=$a.clone(true);$(this).append($clone);arr.push($clone[0]);});$a=$(arr);}else{$a.appendTo($p);}}$a.bind(opts.pagerEvent,function(e){e.preventDefault();opts.nextSlide=i;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}if($.isFunction(opts.pagerClick)){opts.pagerClick(opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,opts.currSlide<i);return false;});if(opts.pagerEvent!="click"){$a.click(function(){return false;});}if(opts.pauseOnPagerHover){$a.hover(function(){opts.$cont[0].cyclePause++;},function(){opts.$cont[0].cyclePause--;});}};$.fn.cycle.hopsFromLast=function(opts,fwd){var hops,l=opts.lastSlide,c=opts.currSlide;if(fwd){hops=c>l?c-l:opts.slideCount-l;}else{hops=c<l?l-c:l+opts.slideCount-c;}return hops;};function clearTypeFix($slides){function hex(s){s=parseInt(s).toString(16);return s.length<2?"0"+s:s;}function getBg(e){for(;e&&e.nodeName.toLowerCase()!="html";e=e.parentNode){var v=$.css(e,"background-color");if(v.indexOf("rgb")>=0){var rgb=v.match(/\d+/g);return"#"+hex(rgb[0])+hex(rgb[1])+hex(rgb[2]);}if(v&&v!="transparent"){return v;}}return"#ffffff";}$slides.each(function(){$(this).css("background-color",getBg(this));});}$.fn.cycle.commonReset=function(curr,next,opts,w,h,rev){$(opts.elements).not(curr).hide();opts.cssBefore.opacity=1;opts.cssBefore.display="block";if(w!==false&&next.cycleW>0){opts.cssBefore.width=next.cycleW;}if(h!==false&&next.cycleH>0){opts.cssBefore.height=next.cycleH;}opts.cssAfter=opts.cssAfter||{};opts.cssAfter.display="none";$(curr).css("zIndex",opts.slideCount+(rev===true?1:0));$(next).css("zIndex",opts.slideCount+(rev===true?0:1));};$.fn.cycle.custom=function(curr,next,opts,cb,speedOverride){var $l=$(curr),$n=$(next);var speedIn=opts.speedIn,speedOut=opts.speedOut,easeIn=opts.easeIn,easeOut=opts.easeOut;$n.css(opts.cssBefore);if(speedOverride){if(typeof speedOverride=="number"){speedIn=speedOut=speedOverride;}else{speedIn=speedOut=1;}easeIn=easeOut=null;}var fn=function(){$n.animate(opts.animIn,speedIn,easeIn,cb);};$l.animate(opts.animOut,speedOut,easeOut,function(){if(opts.cssAfter){$l.css(opts.cssAfter);}if(!opts.sync){fn();}});if(opts.sync){fn();}};$.fn.cycle.transitions={fade:function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css("opacity",0);opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.opacity=0;});opts.animIn={opacity:1};opts.animOut={opacity:0};opts.cssBefore={top:0,left:0};}};$.fn.cycle.ver=function(){return ver;};$.fn.cycle.defaults={fx:"fade",timeout:4000,timeoutFn:null,continuous:0,speed:1000,speedIn:null,speedOut:null,next:null,prev:null,prevNextClick:null,prevNextEvent:"click",pager:null,pagerClick:null,pagerEvent:"click",pagerAnchorBuilder:null,before:null,after:null,end:null,easing:null,easeIn:null,easeOut:null,shuffle:null,animIn:null,animOut:null,cssBefore:null,cssAfter:null,fxFn:null,height:"auto",startingSlide:0,sync:1,random:0,fit:0,containerResize:1,pause:0,pauseOnPagerHover:0,autostop:0,autostopCount:0,delay:0,slideExpr:null,cleartype:!$.support.opacity,cleartypeNoBg:false,nowrap:0,fastOnEvent:0,randomizeEffects:1,rev:0,manualTrump:true,requeueOnImageNotLoaded:true,requeueTimeout:250};})(jQuery);
/*
 * jQuery Cycle Plugin Transition Definitions
 * This script is a plugin for the jQuery Cycle Plugin
 * Examples and documentation at: http://malsup.com/jquery/cycle/
 * Copyright (c) 2007-2008 M. Alsup
 * Version:	 2.72
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
(function($){$.fn.cycle.transitions.none=function($cont,$slides,opts){opts.fxFn=function(curr,next,opts,after){$(next).show();$(curr).hide();after();};};$.fn.cycle.transitions.scrollUp=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssBefore={top:h,left:0};opts.cssFirst={top:0};opts.animIn={top:0};opts.animOut={top:-h};};$.fn.cycle.transitions.scrollDown=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssFirst={top:0};opts.cssBefore={top:-h,left:0};opts.animIn={top:0};opts.animOut={top:h};};$.fn.cycle.transitions.scrollLeft=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst={left:0};opts.cssBefore={left:w,top:0};opts.animIn={left:0};opts.animOut={left:0-w};};$.fn.cycle.transitions.scrollRight=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst={left:0};opts.cssBefore={left:-w,top:0};opts.animIn={left:0};opts.animOut={left:w};};$.fn.cycle.transitions.scrollHorz=function($cont,$slides,opts){$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts,fwd){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.left=fwd?(next.cycleW-1):(1-next.cycleW);opts.animOut.left=fwd?-curr.cycleW:curr.cycleW;});opts.cssFirst={left:0};opts.cssBefore={top:0};opts.animIn={left:0};opts.animOut={top:0};};$.fn.cycle.transitions.scrollVert=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push(function(curr,next,opts,fwd){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.top=fwd?(1-next.cycleH):(next.cycleH-1);opts.animOut.top=fwd?curr.cycleH:-curr.cycleH;});opts.cssFirst={top:0};opts.cssBefore={left:0};opts.animIn={top:0};opts.animOut={left:0};};$.fn.cycle.transitions.slideX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;});opts.cssBefore={left:0,top:0,width:0};opts.animIn={width:"show"};opts.animOut={width:0};};$.fn.cycle.transitions.slideY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;});opts.cssBefore={left:0,top:0,height:0};opts.animIn={height:"show"};opts.animOut={height:0};};$.fn.cycle.transitions.shuffle=function($cont,$slides,opts){var i,w=$cont.css("overflow","visible").width();$slides.css({left:0,top:0});opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);});if(!opts.speedAdjusted){opts.speed=opts.speed/2;opts.speedAdjusted=true;}opts.random=0;opts.shuffle=opts.shuffle||{left:-w,top:15};opts.els=[];for(i=0;i<$slides.length;i++){opts.els.push($slides[i]);}for(i=0;i<opts.currSlide;i++){opts.els.push(opts.els.shift());}opts.fxFn=function(curr,next,opts,cb,fwd){var $el=fwd?$(curr):$(next);$(next).css(opts.cssBefore);var count=opts.slideCount;$el.animate(opts.shuffle,opts.speedIn,opts.easeIn,function(){var hops=$.fn.cycle.hopsFromLast(opts,fwd);for(var k=0;k<hops;k++){fwd?opts.els.push(opts.els.shift()):opts.els.unshift(opts.els.pop());}if(fwd){for(var i=0,len=opts.els.length;i<len;i++){$(opts.els[i]).css("z-index",len-i+count);}}else{var z=$(curr).css("z-index");$el.css("z-index",parseInt(z)+1+count);}$el.animate({left:0,top:0},opts.speedOut,opts.easeOut,function(){$(fwd?this:curr).hide();if(cb){cb();}});});};opts.cssBefore={display:"block",opacity:1,top:0,left:0};};$.fn.cycle.transitions.turnUp=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=next.cycleH;opts.animIn.height=next.cycleH;});opts.cssFirst={top:0};opts.cssBefore={left:0,height:0};opts.animIn={top:0};opts.animOut={height:0};};$.fn.cycle.transitions.turnDown=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssFirst={top:0};opts.cssBefore={left:0,top:0,height:0};opts.animOut={height:0};};$.fn.cycle.transitions.turnLeft=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=next.cycleW;opts.animIn.width=next.cycleW;});opts.cssBefore={top:0,width:0};opts.animIn={left:0};opts.animOut={width:0};};$.fn.cycle.transitions.turnRight=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore={top:0,left:0,width:0};opts.animIn={left:0};opts.animOut={width:0};};$.fn.cycle.transitions.zoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false,true);opts.cssBefore.top=next.cycleH/2;opts.cssBefore.left=next.cycleW/2;opts.animIn={top:0,left:0,width:next.cycleW,height:next.cycleH};opts.animOut={width:0,height:0,top:curr.cycleH/2,left:curr.cycleW/2};});opts.cssFirst={top:0,left:0};opts.cssBefore={width:0,height:0};};$.fn.cycle.transitions.fadeZoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false);opts.cssBefore.left=next.cycleW/2;opts.cssBefore.top=next.cycleH/2;opts.animIn={top:0,left:0,width:next.cycleW,height:next.cycleH};});opts.cssBefore={width:0,height:0};opts.animOut={opacity:0};};$.fn.cycle.transitions.blindX=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore={left:w,top:0};opts.animIn={left:0};opts.animOut={left:w};};$.fn.cycle.transitions.blindY=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore={top:h,left:0};opts.animIn={top:0};opts.animOut={top:h};};$.fn.cycle.transitions.blindZ=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();var w=$cont.width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore={top:h,left:w};opts.animIn={top:0,left:0};opts.animOut={top:h,left:w};};$.fn.cycle.transitions.growX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=this.cycleW/2;opts.animIn={left:0,width:this.cycleW};opts.animOut={left:0};});opts.cssBefore={width:0,top:0};};$.fn.cycle.transitions.growY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=this.cycleH/2;opts.animIn={top:0,height:this.cycleH};opts.animOut={top:0};});opts.cssBefore={height:0,left:0};};$.fn.cycle.transitions.curtainX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true,true);opts.cssBefore.left=next.cycleW/2;opts.animIn={left:0,width:this.cycleW};opts.animOut={left:curr.cycleW/2,width:0};});opts.cssBefore={top:0,width:0};};$.fn.cycle.transitions.curtainY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false,true);opts.cssBefore.top=next.cycleH/2;opts.animIn={top:0,height:next.cycleH};opts.animOut={top:curr.cycleH/2,height:0};});opts.cssBefore={left:0,height:0};};$.fn.cycle.transitions.cover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);if(d=="right"){opts.cssBefore.left=-w;}else{if(d=="up"){opts.cssBefore.top=h;}else{if(d=="down"){opts.cssBefore.top=-h;}else{opts.cssBefore.left=w;}}}});opts.animIn={left:0,top:0};opts.animOut={opacity:1};opts.cssBefore={top:0,left:0};};$.fn.cycle.transitions.uncover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(d=="right"){opts.animOut.left=w;}else{if(d=="up"){opts.animOut.top=-h;}else{if(d=="down"){opts.animOut.top=h;}else{opts.animOut.left=-w;}}}});opts.animIn={left:0,top:0};opts.animOut={opacity:1};opts.cssBefore={top:0,left:0};};$.fn.cycle.transitions.toss=function($cont,$slides,opts){var w=$cont.css("overflow","visible").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(!opts.animOut.left&&!opts.animOut.top){opts.animOut={left:w*2,top:-h/2,opacity:0};}else{opts.animOut.opacity=0;}});opts.cssBefore={left:0,top:0};opts.animIn={left:0};};$.fn.cycle.transitions.wipe=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.cssBefore=opts.cssBefore||{};var clip;if(opts.clip){if(/l2r/.test(opts.clip)){clip="rect(0px 0px "+h+"px 0px)";}else{if(/r2l/.test(opts.clip)){clip="rect(0px "+w+"px "+h+"px "+w+"px)";}else{if(/t2b/.test(opts.clip)){clip="rect(0px "+w+"px 0px 0px)";}else{if(/b2t/.test(opts.clip)){clip="rect("+h+"px "+w+"px "+h+"px 0px)";}else{if(/zoom/.test(opts.clip)){var top=parseInt(h/2);var left=parseInt(w/2);clip="rect("+top+"px "+left+"px "+top+"px "+left+"px)";}}}}}}opts.cssBefore.clip=opts.cssBefore.clip||clip||"rect(0px 0px 0px 0px)";var d=opts.cssBefore.clip.match(/(\d+)/g);var t=parseInt(d[0]),r=parseInt(d[1]),b=parseInt(d[2]),l=parseInt(d[3]);opts.before.push(function(curr,next,opts){if(curr==next){return;}var $curr=$(curr),$next=$(next);$.fn.cycle.commonReset(curr,next,opts,true,true,false);opts.cssAfter.display="block";var step=1,count=parseInt((opts.speedIn/13))-1;(function f(){var tt=t?t-parseInt(step*(t/count)):0;var ll=l?l-parseInt(step*(l/count)):0;var bb=b<h?b+parseInt(step*((h-b)/count||1)):h;var rr=r<w?r+parseInt(step*((w-r)/count||1)):w;$next.css({clip:"rect("+tt+"px "+rr+"px "+bb+"px "+ll+"px)"});(step++<=count)?setTimeout(f,13):$curr.css("display","none");})();});opts.cssBefore={display:"block",opacity:1,top:0,left:0};opts.animIn={left:0};opts.animOut={left:0};};})(jQuery);

/*!
 * jQuery corner plugin: simple corner rounding
 * Examples and documentation at: http://jquery.malsup.com/corner/
 * version 2.03 (05-DEC-2009)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */

/**
 *  corner() takes a single string argument:  $('#myDiv').corner("effect corners width")
 *
 *  effect:  name of the effect to apply, such as round, bevel, notch, bite, etc (default is round). 
 *  corners: one or more of: top, bottom, tr, tl, br, or bl. 
 *           by default, all four corners are adorned. 
 *  width:   width of the effect; in the case of rounded corners this is the radius. 
 *           specify this value using the px suffix such as 10px (and yes, it must be pixels).
 *
 * @author Dave Methvin (http://methvin.com/jquery/jq-corner.html)
 * @author Mike Alsup   (http://jquery.malsup.com/corner/)
 */
;(function($) { 

var ua = navigator.userAgent;
var moz = $.browser.mozilla && /gecko/i.test(ua);
var webkit = $.browser.safari && /Safari\/[5-9]/.test(ua);

var expr = $.browser.msie && (function() {
    var div = document.createElement('div');
    try { div.style.setExpression('width','0+0'); div.style.removeExpression('width'); }
    catch(e) { return false; }
    return true;
})();
    
function sz(el, p) { 
    return parseInt($.css(el,p))||0; 
};
function hex2(s) {
    var s = parseInt(s).toString(16);
    return ( s.length < 2 ) ? '0'+s : s;
};
function gpc(node) {
    for ( ; node && node.nodeName.toLowerCase() != 'html'; node = node.parentNode ) {
        var v = $.css(node,'backgroundColor');
        if (v == 'rgba(0, 0, 0, 0)')
            continue; // webkit
        if (v.indexOf('rgb') >= 0) { 
            var rgb = v.match(/\d+/g); 
            return '#'+ hex2(rgb[0]) + hex2(rgb[1]) + hex2(rgb[2]);
        }
        if ( v && v != 'transparent' )
            return v;
    }
    return '#ffffff';
};

function getWidth(fx, i, width) {
    switch(fx) {
    case 'round':  return Math.round(width*(1-Math.cos(Math.asin(i/width))));
    case 'cool':   return Math.round(width*(1+Math.cos(Math.asin(i/width))));
    case 'sharp':  return Math.round(width*(1-Math.cos(Math.acos(i/width))));
    case 'bite':   return Math.round(width*(Math.cos(Math.asin((width-i-1)/width))));
    case 'slide':  return Math.round(width*(Math.atan2(i,width/i)));
    case 'jut':    return Math.round(width*(Math.atan2(width,(width-i-1))));
    case 'curl':   return Math.round(width*(Math.atan(i)));
    case 'tear':   return Math.round(width*(Math.cos(i)));
    case 'wicked': return Math.round(width*(Math.tan(i)));
    case 'long':   return Math.round(width*(Math.sqrt(i)));
    case 'sculpt': return Math.round(width*(Math.log((width-i-1),width)));
    case 'dog':    return (i&1) ? (i+1) : width;
    case 'dog2':   return (i&2) ? (i+1) : width;
    case 'dog3':   return (i&3) ? (i+1) : width;
    case 'fray':   return (i%2)*width;
    case 'notch':  return width; 
    case 'bevel':  return i+1;
    }
};

$.fn.corner = function(options) {
    // in 1.3+ we can fix mistakes with the ready state
	if (this.length == 0) {
        if (!$.isReady && this.selector) {
            var s = this.selector, c = this.context;
            $(function() {
                $(s,c).corner(options);
            });
        }
        return this;
	}

    return this.each(function(index){
		var $this = $(this);
		var o = [ options || '', $this.attr($.fn.corner.defaults.metaAttr) || ''].join(' ').toLowerCase();
		//var o = (options || $this.attr($.fn.corner.defaults.metaAttr) || '').toLowerCase();
		var keep = /keep/.test(o);                       // keep borders?
		var cc = ((o.match(/cc:(#[0-9a-f]+)/)||[])[1]);  // corner color
		var sc = ((o.match(/sc:(#[0-9a-f]+)/)||[])[1]);  // strip color
		var width = parseInt((o.match(/(\d+)px/)||[])[1]) || 10; // corner width
		var re = /round|bevel|notch|bite|cool|sharp|slide|jut|curl|tear|fray|wicked|sculpt|long|dog3|dog2|dog/;
		var fx = ((o.match(re)||['round'])[0]);
		var edges = { T:0, B:1 };
		var opts = {
			TL:  /top|tl|left/.test(o),       TR:  /top|tr|right/.test(o),
			BL:  /bottom|bl|left/.test(o),    BR:  /bottom|br|right/.test(o)
		};
		if ( !opts.TL && !opts.TR && !opts.BL && !opts.BR )
			opts = { TL:1, TR:1, BL:1, BR:1 };
			
		// support native rounding
		if ($.fn.corner.defaults.useNative && fx == 'round' && (moz || webkit) && !cc && !sc) {
			if (opts.TL)
				$this.css(moz ? '-moz-border-radius-topleft' : '-webkit-border-top-left-radius', width + 'px');
			if (opts.TR)
				$this.css(moz ? '-moz-border-radius-topright' : '-webkit-border-top-right-radius', width + 'px');
			if (opts.BL)
				$this.css(moz ? '-moz-border-radius-bottomleft' : '-webkit-border-bottom-left-radius', width + 'px');
			if (opts.BR)
				$this.css(moz ? '-moz-border-radius-bottomright' : '-webkit-border-bottom-right-radius', width + 'px');
			return;
		}
			
		var strip = document.createElement('div');
		strip.style.overflow = 'hidden';
		strip.style.height = '1px';
		strip.style.backgroundColor = sc || 'transparent';
		strip.style.borderStyle = 'solid';
	
        var pad = {
            T: parseInt($.css(this,'paddingTop'))||0,     R: parseInt($.css(this,'paddingRight'))||0,
            B: parseInt($.css(this,'paddingBottom'))||0,  L: parseInt($.css(this,'paddingLeft'))||0
        };

        if (typeof this.style.zoom != undefined) this.style.zoom = 1; // force 'hasLayout' in IE
        if (!keep) this.style.border = 'none';
        strip.style.borderColor = cc || gpc(this.parentNode);
        var cssHeight = $.curCSS(this, 'height');

        for (var j in edges) {
            var bot = edges[j];
            // only add stips if needed
            if ((bot && (opts.BL || opts.BR)) || (!bot && (opts.TL || opts.TR))) {
                strip.style.borderStyle = 'none '+(opts[j+'R']?'solid':'none')+' none '+(opts[j+'L']?'solid':'none');
                var d = document.createElement('div');
                $(d).addClass('jquery-corner');
                var ds = d.style;

                bot ? this.appendChild(d) : this.insertBefore(d, this.firstChild);

                if (bot && cssHeight != 'auto') {
                    if ($.css(this,'position') == 'static')
                        this.style.position = 'relative';
                    ds.position = 'absolute';
                    ds.bottom = ds.left = ds.padding = ds.margin = '0';
                    if (expr)
                        ds.setExpression('width', 'this.parentNode.offsetWidth');
                    else
                        ds.width = '100%';
                }
                else if (!bot && $.browser.msie) {
                    if ($.css(this,'position') == 'static')
                        this.style.position = 'relative';
                    ds.position = 'absolute';
                    ds.top = ds.left = ds.right = ds.padding = ds.margin = '0';
                    
                    // fix ie6 problem when blocked element has a border width
                    if (expr) {
                        var bw = sz(this,'borderLeftWidth') + sz(this,'borderRightWidth');
                        ds.setExpression('width', 'this.parentNode.offsetWidth - '+bw+'+ "px"');
                    }
                    else
                        ds.width = '100%';
                }
                else {
                	ds.position = 'relative';
                    ds.margin = !bot ? '-'+pad.T+'px -'+pad.R+'px '+(pad.T-width)+'px -'+pad.L+'px' : 
                                        (pad.B-width)+'px -'+pad.R+'px -'+pad.B+'px -'+pad.L+'px';                
                }

                for (var i=0; i < width; i++) {
                    var w = Math.max(0,getWidth(fx,i, width));
                    var e = strip.cloneNode(false);
                    e.style.borderWidth = '0 '+(opts[j+'R']?w:0)+'px 0 '+(opts[j+'L']?w:0)+'px';
                    bot ? d.appendChild(e) : d.insertBefore(e, d.firstChild);
                }
            }
        }
    });
};

$.fn.uncorner = function() { 
	if (moz || webkit)
		this.css(moz ? '-moz-border-radius' : '-webkit-border-radius', 0);
	$('div.jquery-corner', this).remove();
	return this;
};

// expose options
$.fn.corner.defaults = {
	useNative: true, // true if plugin should attempt to use native browser support for border radius rounding
	metaAttr:  'data-corner' // name of meta attribute to use for options
};
    
})(jQuery);

/**
 * Tabs - jQuery plugin for accessible, unobtrusive tabs
 * @requires jQuery v1.1.1
 *
 * http://stilbuero.de/tabs/
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Version: 2.7.4
 */
(function($){$.extend({tabs:{remoteCount:0}});$.fn.tabs=function(initial,settings){if(typeof initial=='object')settings=initial;settings=$.extend({initial:(initial&&typeof initial=='number'&&initial>0)?--initial:0,disabled:null,bookmarkable:$.ajaxHistory?true:false,remote:false,spinner:'Loading&#8230;',hashPrefix:'remote-tab-',fxFade:null,fxSlide:null,fxShow:null,fxHide:null,fxSpeed:'normal',fxShowSpeed:null,fxHideSpeed:null,fxAutoHeight:false,onClick:null,onHide:null,onShow:null,navClass:'tabs-nav',selectedClass:'tabs-selected',disabledClass:'tabs-disabled',containerClass:'tabs-container',hideClass:'tabs-hide',loadingClass:'tabs-loading',tabStruct:'div'},settings||{});$.browser.msie6=$.browser.msie&&($.browser.version&&$.browser.version<7||/MSIE 6.0/.test(navigator.userAgent));function unFocus(){scrollTo(0,0);}return this.each(function(){var container=this;var nav=$('ul.'+settings.navClass,container);nav=nav.size()&&nav||$('>ul:eq(0)',container);var tabs=$('a',nav);if(settings.remote){tabs.each(function(){var id=settings.hashPrefix+(++$.tabs.remoteCount),hash='#'+id,url=this.href;this.href=hash;$('<div id="'+id+'" class="'+settings.containerClass+'"></div>').appendTo(container);$(this).bind('loadRemoteTab',function(e,callback){var $$=$(this).addClass(settings.loadingClass),span=$('span',this)[0],tabTitle=span.innerHTML;if(settings.spinner){span.innerHTML='<em>'+settings.spinner+'</em>';}setTimeout(function(){$(hash).load(url,function(){if(settings.spinner){span.innerHTML=tabTitle;}$$.removeClass(settings.loadingClass);callback&&callback();});},0);});});}var containers=$('div.'+settings.containerClass,container);containers=containers.size()&&containers||$('>'+settings.tabStruct,container);nav.is('.'+settings.navClass)||nav.addClass(settings.navClass);containers.each(function(){var $$=$(this);$$.is('.'+settings.containerClass)||$$.addClass(settings.containerClass);});var hasSelectedClass=$('li',nav).index($('li.'+settings.selectedClass,nav)[0]);if(hasSelectedClass>=0){settings.initial=hasSelectedClass;}if(location.hash){tabs.each(function(i){if(this.hash==location.hash){settings.initial=i;if(($.browser.msie||$.browser.opera)&&!settings.remote){var toShow=$(location.hash);var toShowId=toShow.attr('id');toShow.attr('id','');setTimeout(function(){toShow.attr('id',toShowId);},500);}unFocus();return false;}});}if($.browser.msie){unFocus();}containers.filter(':eq('+settings.initial+')').show().end().not(':eq('+settings.initial+')').addClass(settings.hideClass);$('li',nav).removeClass(settings.selectedClass).eq(settings.initial).addClass(settings.selectedClass);tabs.eq(settings.initial).trigger('loadRemoteTab').end();if(settings.fxAutoHeight){var _setAutoHeight=function(reset){var heights=$.map(containers.get(),function(el){var h,jq=$(el);if(reset){if($.browser.msie6){el.style.removeExpression('behaviour');el.style.height='';el.minHeight=null;}h=jq.css({'min-height':''}).height();}else{h=jq.height();}return h;}).sort(function(a,b){return b-a;});if($.browser.msie6){containers.each(function(){this.minHeight=heights[0]+'px';this.style.setExpression('behaviour','this.style.height = this.minHeight ? this.minHeight : "1px"');});}else{containers.css({'min-height':heights[0]+'px'});}};_setAutoHeight();var cachedWidth=container.offsetWidth;var cachedHeight=container.offsetHeight;var watchFontSize=$('#tabs-watch-font-size').get(0)||$('<span id="tabs-watch-font-size">M</span>').css({display:'block',position:'absolute',visibility:'hidden'}).appendTo(document.body).get(0);var cachedFontSize=watchFontSize.offsetHeight;setInterval(function(){var currentWidth=container.offsetWidth;var currentHeight=container.offsetHeight;var currentFontSize=watchFontSize.offsetHeight;if(currentHeight>cachedHeight||currentWidth!=cachedWidth||currentFontSize!=cachedFontSize){_setAutoHeight((currentWidth>cachedWidth||currentFontSize<cachedFontSize));cachedWidth=currentWidth;cachedHeight=currentHeight;cachedFontSize=currentFontSize;}},50);}var showAnim={},hideAnim={},showSpeed=settings.fxShowSpeed||settings.fxSpeed,hideSpeed=settings.fxHideSpeed||settings.fxSpeed;if(settings.fxSlide||settings.fxFade){if(settings.fxSlide){showAnim['height']='show';hideAnim['height']='hide';}if(settings.fxFade){showAnim['opacity']='show';hideAnim['opacity']='hide';}}else{if(settings.fxShow){showAnim=settings.fxShow;}else{showAnim['min-width']=0;showSpeed=1;}if(settings.fxHide){hideAnim=settings.fxHide;}else{hideAnim['min-width']=0;hideSpeed=1;}}var onClick=settings.onClick,onHide=settings.onHide,onShow=settings.onShow;tabs.bind('triggerTab',function(){var li=$(this).parents('li:eq(0)');if(container.locked||li.is('.'+settings.selectedClass)||li.is('.'+settings.disabledClass)){return false;}var hash=this.hash;if($.browser.msie){$(this).trigger('click');if(settings.bookmarkable){$.ajaxHistory.update(hash);location.hash=hash.replace('#','');}}else if($.browser.safari){var tempForm=$('<form action="'+hash+'"><div><input type="submit" value="h" /></div></form>').get(0);tempForm.submit();$(this).trigger('click');if(settings.bookmarkable){$.ajaxHistory.update(hash);}}else{if(settings.bookmarkable){location.hash=hash.replace('#','');}else{$(this).trigger('click');}}});tabs.bind('disableTab',function(){var li=$(this).parents('li:eq(0)');if($.browser.safari){li.animate({opacity:0},1,function(){li.css({opacity:''});});}li.addClass(settings.disabledClass);});if(settings.disabled&&settings.disabled.length){for(var i=0,k=settings.disabled.length;i<k;i++){tabs.eq(--settings.disabled[i]).trigger('disableTab').end();}};tabs.bind('enableTab',function(){var li=$(this).parents('li:eq(0)');li.removeClass(settings.disabledClass);if($.browser.safari){li.animate({opacity:1},1,function(){li.css({opacity:''});});}});tabs.bind('click',function(e){var trueClick=e.clientX;var clicked=this,li=$(this).parents('li:eq(0)'),toShow=$(this.hash),toHide=containers.filter(':visible');if(container['locked']||li.is('.'+settings.selectedClass)||li.is('.'+settings.disabledClass)||typeof onClick=='function'&&onClick(this,toShow[0],toHide[0])===false){this.blur();return false;}container['locked']=true;if(toShow.size()){if($.browser.msie&&settings.bookmarkable){var toShowId=this.hash.replace('#','');toShow.attr('id','');setTimeout(function(){toShow.attr('id',toShowId);},0);}var resetCSS={display:'',overflow:'',height:''};if(!$.browser.msie){resetCSS['opacity']='';}function switchTab(){if(settings.bookmarkable&&trueClick){$.ajaxHistory.update(clicked.hash);}toHide.animate(hideAnim,hideSpeed,function(){$(clicked).parents('li:eq(0)').addClass(settings.selectedClass).siblings().removeClass(settings.selectedClass);toHide.addClass(settings.hideClass).css(resetCSS);if(typeof onHide=='function'){onHide(clicked,toShow[0],toHide[0]);}if(!(settings.fxSlide||settings.fxFade||settings.fxShow)){toShow.css('display','block');}toShow.animate(showAnim,showSpeed,function(){toShow.removeClass(settings.hideClass).css(resetCSS);if($.browser.msie){toHide[0].style.filter='';toShow[0].style.filter='';}if(typeof onShow=='function'){onShow(clicked,toShow[0],toHide[0]);}container['locked']=null;});});}if(!settings.remote){switchTab();}else{$(clicked).trigger('loadRemoteTab',[switchTab]);}}else{alert('There is no such container.');}var scrollX=window.pageXOffset||document.documentElement&&document.documentElement.scrollLeft||document.body.scrollLeft||0;var scrollY=window.pageYOffset||document.documentElement&&document.documentElement.scrollTop||document.body.scrollTop||0;setTimeout(function(){window.scrollTo(scrollX,scrollY);},0);this.blur();return settings.bookmarkable&&!!trueClick;});if(settings.bookmarkable){$.ajaxHistory.initialize(function(){tabs.eq(settings.initial).trigger('click').end();});}});};var tabEvents=['triggerTab','disableTab','enableTab'];for(var i=0;i<tabEvents.length;i++){$.fn[tabEvents[i]]=(function(tabEvent){return function(tab){return this.each(function(){var nav=$('ul.tabs-nav',this);nav=nav.size()&&nav||$('>ul:eq(0)',this);var a;if(!tab||typeof tab=='number'){a=$('li a',nav).eq((tab&&tab>0&&tab-1||0));}else if(typeof tab=='string'){a=$('li a[@href$="#'+tab+'"]',nav);}a.trigger(tabEvent);});};})(tabEvents[i]);}$.fn.activeTab=function(){var selectedTabs=[];this.each(function(){var nav=$('ul.tabs-nav',this);nav=nav.size()&&nav||$('>ul:eq(0)',this);var lis=$('li',nav);selectedTabs.push(lis.index(lis.filter('.tabs-selected')[0])+1);});return selectedTabs[0];};})(jQuery);
