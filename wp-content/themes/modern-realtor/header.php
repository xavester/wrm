<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>

	<?php
	if ( is_search() ) :
		echo 'Search Results &laquo;';
	else :
		wp_title('&laquo;', true, 'right');
	endif;
	?>
	
	<?php bloginfo('name');?>
    
</title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/theme-assets/css/reset.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/js/jquery.core.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/cufon/cufon.yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/cufon/Sansation_400.font.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/cufon/Harabara_700.font.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/js/jquery.scripts.js"></script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<script type="text/javascript">

jQuery(document).ready(function(){

	ds_flickr('<?php ds_ao('flickr_username'); ?>',<?php ds_ao('flickr_qty'); ?>,'#tab-footer-2 #footer_flickr',<?php ds_ao('flickr_api_feed'); ?>); //ds_flickr( 'flickr id', '# items to show', 'div container', 'groups=1 or user photos=0' )
	// you can use this site to convert your flickr username into IDs		http://get-flickr-id.ubuntu4life.com/
	
	ds_twitter('<?php ds_ao('twitter_username'); ?>',3,'#tab-footer-1'); //ds_twitter( 'twitter id', '# items to show', 'div container' )
	
});

</script>

<style type="text/css">

<?php if ( ds_get_ao('masthead_height') ) : ?>

/*** Logo Modifiers ***/
/** ----------------------------------------------------- **/
#header { height: <?php ds_ao('masthead_height'); ?>px; }
#header h1 { background-image: url(<?php ds_ao('header_logo'); ?>); width: <?php ds_ao('header_logo_width'); ?>px; height: <?php ds_ao('header_logo_height'); ?>px; }
#header h1 a { width: <?php ds_ao('header_logo_width'); ?>px; height: <?php ds_ao('header_logo_height'); ?>px; }
#footer_logo { background-image: url(<?php ds_ao('footer_logo'); ?>); width: <?php ds_ao('footer_logo_width'); ?>px; height: <?php ds_ao('footer_logo_height'); ?>px; }
#footer_logo a { width: <?php ds_ao('footer_logo_width'); ?>px; height: <?php ds_ao('footer_logo_height'); ?>px; }
/**/

<?php endif; ?>

<?php if ( ds_get_ao('header_banner_bgcolor') ) : ?>

/*** Color Modifiers ***/
/** ----------------------------------------------------- **/
#banner { background-color: <?php ds_ao('header_banner_bgcolor'); ?>; }
#banner_overlay { background-image: url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-' . ds_get_ao('header_overlay') . '.png'; ?>); }
#search_listings { background-color: <?php ds_ao('header_banner_bgcolor'); ?>; background-image: url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-' . ds_get_ao('header_overlay') . '.png'; ?>); }
#footer { background-color: <?php ds_ao('footer_bgcolor'); ?>; }
#footer_overlay { background-image: url(<?php echo get_bloginfo('template_url') . '/images/footer-overlay-' . ds_get_ao('footer_overlay') . '.png'; ?>); }

/*Sidebar Colors*/
#sidebar_tab1 .tabs-nav a { background-color: <?php ds_ao('footer_bgcolor'); ?>; }
#top_post li .top_post_title a { color: <?php ds_ao('footer_bgcolor'); ?>; }
#top_post li .top_post_title a:hover { color: <?php ds_ao('footer_bgcolor'); ?>; }
.sidebar_style_1 .widgettitle { color: <?php ds_ao('footer_bgcolor'); ?>; }
#top_post li .top_post_price { color: <?php ds_ao('footer_bgcolor'); ?>; }
/**/

/*Home Page Colors*/
.column_left_home .post_preview_title a { color: <?php ds_ao('header_banner_bgcolor'); ?>; }
.column_left_home .post_preview .post_listing_price { color: <?php ds_ao('footer_bgcolor'); ?>; }
.column_left_home .post_preview .post_listing_info span { color: <?php ds_ao('header_banner_bgcolor'); ?>; }
/**/

/*Text Colors and BG Table Header*/
.column_left_home .post_preview_title a { color: <?php ds_ao('post_title_color'); ?>; }
.column_left_home .post_preview .post_listing_price { color: <?php ds_ao('price_text_color'); ?>; }
#top_post li .top_post_title a { color: <?php ds_ao('post_title_color'); ?>; }
.sidebar_style_1 .widgettitle { color: #243E4C; }
.list_style .post_preview .post_preview_title a { color: <?php ds_ao('post_title_color'); ?>; }
.list_style .post_preview .post_listing_price { color: <?php ds_ao('price_text_color'); ?>; }
#single_page_title { color: <?php ds_ao('post_title_color'); ?>; }
.archive_table { background-color: <?php ds_ao('search_table_bgcolor'); ?>; }
.ajax_info_holder .post_preview_title a { color: <?php ds_ao('post_title_color'); ?>; }
.ajax_info_holder .post_listing_price { color: <?php ds_ao('price_text_color'); ?>; }
/**/


/**/

<?php endif; ?>

</style>

<?php if ( (ds_get_cf('addnl_map')) && is_single() ) : ?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true_or_false&amp;key=<?php ds_ao('google_map_api'); ?>&amp;sensor=false" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	
	var map = null;
	var geocoder = null;

	function initialize() {
	  if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById("location_map"));
		geocoder = new GClientGeocoder();
	  }
	}
	
	function showAddress(address) {
		geocoder.getLatLng(
			address,
			function(point) {
				if (!point) {
					alert(address + " not found");
				} else {
					map.setCenter(point, 13);
					var marker = new GMarker(point);
					map.addOverlay(marker);
					map.addControl(new GSmallMapControl());
					map.addControl(new GMapTypeControl());
				}
			}
		);
	}
	
	initialize();
	
	showAddress('<?php ds_cf('addnl_map'); ?>');


});
</script>

<?php endif; ?>

<meta content="<?php bloginfo('template_url'); ?>" name="the_uri" />

<?php wp_head(); ?>

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/theme-assets/css/ie.css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme-assets/js/dd.belated.png.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('.png_fix');
  DD_belatedPNG.fix('.sf-sub-indicator');
</script>
<![endif]-->

</head>
<body <?php body_class(); ?>>
<!-- begin : header -->
<div id="header">
	<!-- begin : header_wrapper -->
	<div class="header_wrapper">

        <h1 class="png_fix">
            <a href="<?php echo get_option('home'); ?>/"><span class="hide_this"><?php bloginfo('name'); ?></span></a>
            <span class="hide_this"><?php bloginfo('description'); ?></span>
        </h1>
        
		<?php
		
			is_page() | is_single() ? $dropoff = get_permalink() : $dropoff = get_option('home');
		
        	if ( is_user_logged_in() ) :
			global $current_user;
			get_currentuserinfo();
			
		?>
        
            <div id="header_login_after" class="relative_mod">
                <p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" id="hlg_user" class="png_fix"><?php echo $current_user->user_login; ?></a> | <a href="<?php echo wp_logout_url($dropoff); ?>" id="hlg_signout" class="fx_button_hover png_fix"><span class="hide_this">Log Out</span></a> | <a href="<?php echo get_option('home'); ?>/wp-admin/" id="hlg_cpanel" class="fx_button_hover png_fix"><span class="hide_this">Control Panel</span></a></p>
            </div>
        
        <?php else : ?>
        
            <div id="header_login" class="relative_mod">
                <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
                    <input type="text" name="log" id="input_username" value="username" class="fx_input_field" />
                    <input type="password" name="pwd" id="input_password" value="password" class="fx_input_field" />
                    <button type="submit" id="button_header_login" class="fx_button_hover">
                        <span class="hide_this">Log In</span>
                    </button>
                    <a href="<?php echo get_option('home'); ?>/wp-login.php?action=register" id="button_header_signup" class="fx_button_hover">
                        <span class="hide_this">Sign Up</span>
                    </a>
                    <input type="hidden" name="redirect_to" value="<?php echo $dropoff; ?>" />
                    <input type="hidden" name="testcookie" value="1" />
                </form>
            </div>
        
        <?php endif; ?>
        
        <ul id="nav_wrapper">
        	<li id="nav_wrapper_left"></li>
            <li id="lava">
			
				<?php
				
				if ( function_exists( 'wp_nav_menu' ) ) :
				
					wp_nav_menu( 'theme_location=header-menu&container=&menu_id=navigation&menu_class=clear_fix&fallback_cb=menu_fb_header' );
					
				else :
					
					menu_fb_header();
				
				endif;
				
				function menu_fb_header() {
				
				?>
				
					<ul id="navigation" class="clear_fix">
					
						<li<?php if ( is_home() ) : ?> class="current_page_item"<?php endif; ?> id="nav_home" ><a href="<?php bloginfo( 'url' ); ?>" >Home</a></li>
						
						<?php wp_list_pages('title_li=&exclude=' . ds_get_ao('contact_us_id') . ',' . ds_get_ao('home_page_id')); ?>
						
						<?php if ( ( ds_get_ao('cat_blog_id') != '' ) && ( ds_get_ao('cat_blog_id') != 'None Selected' ) ) :  // show the blog button ?>
										 
							<li<?php if ( (is_category(ds_get_ao('cat_blog_id'))) || (post_is_in_descendant_category(ds_get_ao('cat_blog_id'))) || ( reset(get_the_category($post->ID))->cat_ID == ds_get_ao('cat_blog_id'))) : ?> class="current_page_item"<?php endif; ?>>
							   
								  <a href="<?php echo get_category_link(ds_get_ao('cat_blog_id')); ?>" ><?php echo get_cat_name(ds_get_ao('cat_blog_id')); ?></a>
							   
								  <?php
								  
								  $exclude_cats = get_categories('child_of=' . ds_get_ao('cat_blog_id'));
								  // test if there will be a dropdown for the blog category
								  if ( $exclude_cats[0]->cat_ID != '' ) :
									 echo '<ul>';
									 wp_list_categories('child_of=' . ds_get_ao('cat_blog_id') . '&title_li=&use_desc_for_title=0');
									 echo '</ul>';
								  endif;
								  
								  ?>
								  
							</li>
						
						<?php endif; ?>
						
						<?php if ( ( ds_get_ao('contact_us_id') != '' ) && ( ds_get_ao('contact_us_id') != 'None Selected' ) ) : ?>
						 
							<li<?php if( is_page(ds_get_ao('contact_us_id') ) ) : ?> class="current_page_item"<?php endif; ?>><a href="<?php echo get_page_link(ds_get_ao('contact_us_id')); ?>" ><?php echo get_the_title(ds_get_ao('contact_us_id')); ?></a></li>
						
						<?php endif; ?>
	
					</ul>
				
				<?php
				
				}
				
				?>
            
                <div id="box"><div class="head"></div></div>
                
                <ul id="rss_and_links" class="clear_fix"><li><a href="http://facebook.com/profile.php?id=<?php ds_ao('facebook_id'); ?>" class="link_fb fx_button_hover png_fix" title="Facebook Account"><span class="hide_this">Facebook Link</span></a></li><li><a href="<?php bloginfo('rss2_url'); ?>" class="link_rss fx_button_hover png_fix"  title="RSS"><span class="hide_this">RSS Link</span></a></li></ul>
                
            </li>
            <li id="nav_wrapper_right"></li>
        </ul>
    
    </div>
	<!-- end : header_wrapper -->

</div>
<!-- end : header -->