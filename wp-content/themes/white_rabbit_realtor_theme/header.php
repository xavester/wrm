<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>

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



<?php if (!is_home()) {?>
<!-- FlexSlider pieces -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/flexslider/flexslider.css" type="text/css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/flexslider/jquery.flexslider-min.js"></script>
	
<!-- Hook up the FlexSlider -->
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
          animation: "slide",
          slideshow: "true",
          controlsContainer: ".flex-container"
    });
  });
</script>
<?php } ?>



<!-- Start CSS -->

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/theme-assets/css/reset.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- END CSS -->

<?php wp_head(); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<style type="text/css">

<?php if ( ds_get_ao('masthead_height') ) : ?>

/*** Logo Modifiers ***/
/** ----------------------------------------------------- **/
#header h1 { background-image: url(<?php ds_ao('header_logo'); ?>); width: <?php ds_ao('header_logo_width'); ?>px; height: <?php ds_ao('header_logo_height'); ?>px; background-repeat: no-repeat;
}
#header h1 a { width: <?php ds_ao('header_logo_width'); ?>px; height: <?php ds_ao('header_logo_height'); ?>px; }
#footer_logo { background-image: url(<?php ds_ao('footer_logo'); ?>); width: <?php ds_ao('footer_logo_width'); ?>px; height: <?php ds_ao('footer_logo_height'); ?>px; }
#footer_logo a { width: <?php ds_ao('footer_logo_width'); ?>px; height: <?php ds_ao('footer_logo_height'); ?>px; }
/**/

<?php endif; ?>

</style>

<meta content="<?php bloginfo('template_url'); ?>" name="the_uri" />

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
<div id="wrapper">
	
	<div id="header">
		<div id="masthead">

        <h1 class="png_fix">
            <a href="<?php echo get_option('home'); ?>/"><span class="hide_this"><?php bloginfo('name'); ?></span></a>
            <span class="hide_this"><?php bloginfo('description'); ?></span>
        </h1>
        
		<?php
		
			is_page() | is_single() ? $dropoff = get_permalink() : $dropoff = get_option('home');
			
		?>

		<div id="access">
        
        <div id="nav_wrapper">
    
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
					<!-- End OF Navigation -->
				
				<?php
				
				}
				
				?>
            
                <div id="box"><div class="head"></div></div>
                
            </div><!-- end: nav wrapper -->
		</div><!-- end: access -->
    
    </div><!-- End Master Head-->
