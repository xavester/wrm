<?php

/* Admin Options
/* ----------------------------------------------*/

$ds_theme_key = 'wp_ao_';

include TEMPLATEPATH . '/theme-assets/wp-admin-options/options-0.php';
include TEMPLATEPATH . '/theme-assets/wp-admin-options/options-3.php';
include TEMPLATEPATH . '/theme-assets/wp-admin-options/options-4.php';
include TEMPLATEPATH . '/theme-assets/wp-admin-options/options-5.php';

/* Custom Fields
/* ----------------------------------------------*/

$ds_custom_field_key = '_wp_cf_';

include TEMPLATEPATH . '/theme-assets/wp-custom-fields/post-fields-0.php';

/* Sidebar Function
/* ----------------------------------------------*/

if ( function_exists('register_sidebar') ) :
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<li id="%1$s" class="clearFix widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
endif;

/* Feed Links
/* ----------------------------------------------*/

function wp_feed_links() {
	echo '<link rel="alternate" type="application/rss+xml" title="'. get_bloginfo('name').' RSS Feed" href="'. get_bloginfo('rss2_url').'" />';
	echo '<link rel="alternate" type="application/atom+xml" title="'. get_bloginfo('name').' Atom Feed" href="'. get_bloginfo('atom_url').'" />';
	echo '<link rel="alternate" type="application/rss+xml" title="'. get_bloginfo('name').' '. __('The latest comments to all posts in RSS').'" href="'. get_bloginfo('comments_rss2_url').'" />';
}

if (function_exists('automatic_feed_links')) :
    automatic_feed_links();
else :
    add_action('wp_head', 'wp_feed_links', 2);
endif;

/* Check CHMOD
/* ----------------------------------------------*/

function ds_check_chmod() {
	
	clearstatcache();
	
	$stat = TEMPLATEPATH . '/theme-assets/php/cache';
	
	$temp = fileperms( TEMPLATEPATH . '/theme-assets/php/cache');
	
	$test = substr(base_convert($temp,10,8),2);
	
	if ( $test != 777 ) :
	
	echo '<div class="error" id="notice">';
	echo '<p><strong>Warning :</strong> <br /> The Folder : <code>' . $stat . '</code> <br /> is not writable, please set the chmod of the folder to 777 for the theme to work correctly.</p>';
	echo '</div>';
	
	endif;

}

add_action('admin_head', 'ds_check_chmod');

/* Import Extra Admin Header Files
/* ----------------------------------------------*/

function ds_admin_extras() {
	
    $url_css = get_bloginfo('template_url') . '/theme-assets/css/custom-admin-style.css';
    echo '<link rel="stylesheet" type="text/css" href="' . $url_css . '" />';

    echo '<link rel="stylesheet" href="' . get_bloginfo('template_url') . '/theme-assets/css/colorpicker.css" type="text/css" />';
	
	echo '<script type="text/javascript" src="' . get_bloginfo('template_url') . '/theme-assets/js/colorpicker/colorpicker.js"></script>';
    echo '<script type="text/javascript" src="' . get_bloginfo('template_url') . '/theme-assets/js/colorpicker/eye.js"></script>';
    echo '<script type="text/javascript" src="' . get_bloginfo('template_url') . '/theme-assets/js/colorpicker/layout.js"></script>';
	
    echo '<script type="text/javascript">
	
	</script>';
	 
}

add_action('admin_head', 'ds_admin_extras');

/* Style Switcher
/* ----------------------------------------------*/

function the_new_stylesheet( $stylesheet_uri, $stylesheet_dir_uri ) {
	
	$stylesheet_uri = $stylesheet_dir_uri . ds_ao('theme_style') . '/style.css';
		
	return $stylesheet_uri;
	
}

add_filter( 'stylesheet_uri', 'the_new_stylesheet', 10, 2);

/* WP Helper Scripts
/* ----------------------------------------------*/

#include TEMPLATEPATH . '/theme-assets/wp-helper-scripts/wp-pagenavi.php';
#include TEMPLATEPATH . '/theme-assets/wp-helper-scripts/wp-commentnavi.php';
include TEMPLATEPATH . '/theme-assets/wp-helper-scripts/custom-comments.php';
#include TEMPLATEPATH . '/theme-assets/wp-helper-scripts/contact-form.php';

/* Register Menus
/* ----------------------------------------------*/

if ( function_exists( 'register_nav_menus' ) ) :

	add_theme_support( 'menus' );
	
	add_action( 'init', 'ds_register_menu' );
	
	function ds_register_menu() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' ),
			)
		);
	}

endif;

/* General Functions
/* ----------------------------------------------*/

function ds_custom_excerpt($temp_content='', $temp_max=800, $read_more = 1) { //Custom excerpt
	
	global $post;
	
	$temp_content ? $temp_content = $temp_content : $temp_content = get_the_content('', false, '');
	
	$maxchars = $temp_max;
	$temp_content = strip_tags($temp_content);
	$temp_content = substr($temp_content, 0, $maxchars);
	$pos = strrpos($temp_content, '');
	if ( $pos > 0) :
		$temp_content = substr($temp_content, 0, $pos);
	endif;
	$temp_content = preg_replace('/\[[a-zA-Z, a-zA-Z=0-9 ]*|\]/','',$temp_content);
	
	switch ($read_more) :
	
		case 1 :
		
			$temp_content = apply_filters('the_content', $temp_content . '... ' . '<a href="' . get_permalink($post->ID) .  '" >more...</a>');			
		
		break;
		
		case 2 :
		
			$temp_content = apply_filters('the_content', $temp_content . '... ' . '<a href="' . get_permalink($post->ID) .  '" >Continue Reading <em>' . $post->post_title .  '</em></a>');
		
		break;
		
		case 3 :
		
			$temp_content = apply_filters('the_content', $temp_content);
		
		break;
		
		case 4 :
		
			$temp_content = apply_filters('the_content', $temp_content . '... ');			
		
		break;
	
	endswitch;
	
	echo $temp_content;
	
}

function ds_custom_title($temp_max=50) { //Custom excerpt
	
	global $post;
	
	$temp_title = get_the_title($post->ID);
	
	$testlen = strlen($temp_title);
	
	if ( $testlen > $temp_max ) :

		$maxchars = $temp_max;
		$temp_title = strip_tags($temp_title);
		$temp_title = substr($temp_title, 0, $maxchars);
		$pos = strrpos($temp_title, '');
		if ( $pos > 0) :
			$temp_title = substr($temp_title, 0, $pos);
		endif;
		$temp_title = preg_replace('/\[[a-zA-Z, a-zA-Z=0-9 ]*|\]/','',$temp_title);
		
		$temp_title = $temp_title . '... ';
	
	endif;
	
	echo $temp_title;
	
}

function ds_strip_comma($the_string){
  return str_replace(',', '', $the_string);
}

function ds_recent_comments($no_comments = 10) { //Get recent comments
	
   global $wpdb;
	$request = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
	$request .= " ORDER BY comment_date DESC LIMIT $no_comments";
	$comments = $wpdb->get_results($request);
	
	if ($comments) :
		
		foreach ($comments as $comment) :

			ob_start();

				echo '<li>';

					echo '<a href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '" class="url" >' . ds_get_author($comment) . ':</a> on ';
					echo '<a href="' . get_permalink( $comment->comment_post_ID ) . '" >' . $comment->post_title . '</a>';
					
				echo '</li>';
				
			ob_end_flush();
			
		endforeach;
		
	else :
	
		echo '<li> No comments </li>';
		
	endif;
	
}

function ds_get_author($comment) {
	
	$author = '';
	
	if ( empty($comment->comment_author) ) :
	
		$author = 'Anonymous';
		
	else :
	
		$author = $comment->comment_author;
		
	endif;
	
	return $author;
	
}

function ds_popular_post($no_posts = 5) {
	
	global $wp_query;

	query_posts(
		array(
			 'orderby'    => 'comment_count',
			 'order'    => 'DESC',
			 'posts_per_page'    => $no_posts
		)
	);
	
	if ( have_posts() ) :
	   while ( have_posts() ) : the_post();
	   ?>
       
        <li class="clear_fix">
	        <img src="<?php bloginfo('template_url'); ?>/images/icon-top-post.gif" class="img_icon" alt="" />
            <h3 class="top_post_title font_sansation"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(20); ?></a></h3>
            <p class="top_post_sub_title font_sansation"><?php the_time('F jS, Y') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;', 'carousel_desc_comments'); ?></p>
        </li>

       <?php
	   endwhile;
	endif;

	wp_reset_query();
	
}

function ds_get_cf($the_meta_key) { //Get post custom field

	global $post, $ds_custom_field_key;
	
	$raw_meta_key = get_post_meta( $post->ID, $ds_custom_field_key . $the_meta_key . '_value', true );

	return $raw_meta_key;

}

function ds_cf($the_meta_key) { //Print post custom field

	global $post, $ds_custom_field_key;
	
	$raw_meta_key = get_post_meta( $post->ID, $ds_custom_field_key . $the_meta_key . '_value', true );
	
	if ( $the_meta_key == 'price' ) :
	
		echo number_format($raw_meta_key, 2);
	
	else :
	
		echo $raw_meta_key;
	
	endif;

}

function ds_get_ao($the_value) { //Get the value of an admin option
	
	global $ds_theme_key;
	$the_value_raw = get_option($ds_theme_key . $the_value);

	return $the_value_raw;
	
}

function ds_ao($the_value) { //Print the value of an admin option
	
	global $ds_theme_key;
	$the_value_raw = get_option($ds_theme_key . $the_value);

	echo $the_value_raw;
	
}

function ds_listing_type($raw_meta_key) { //Identify the listing type

	switch ( $raw_meta_key ) :
		case 'rbutton_none':
		break;
		case 'rbutton_new_home':
			return 'New Home';
		break;
		case 'rbutton_home_sale':
			return 'Home for Sale';
		break;
		case 'rbutton_foreclosure':
			return 'Foreclosure';
		break;
		case 'rbutton_for_rent':
			return 'Home/Apartment for Rent';
		break;
	endswitch;

}

function ds_get_catslug_to_id($cat_slug) { //Convert category slug to category ID

	$cat_id = 0;
	$cat_id = get_category_by_slug($cat_slug);
	return $cat_id->term_id;
	 
}

function ds_get_pageslug_to_id($page_slug) { //Convert page slug to page ID

	global $wpdb;
	$page_id = 0;
	$results = $wpdb->get_results('SELECT ID FROM $wpdb->posts WHERE post_name = "$page_slug"');
	if ( $results ) :
		foreach ( $results as $result ) :
			$page_id = $result->ID;
		endforeach;
	endif;
	return $page_id;
	 
}

function ds_get_category_list($valueID, $valueDV) { //Get category list and display it as a dropdown list
		
	echo '<select name="dropdown_list_category" onchange="document.getElementById(' . "'" . $valueID . "'" . ').value=this.options[this.selectedIndex].value;">';
	echo '<option value="">' . esc_attr($valueDV) . '</option>';
	
	$categories =  get_categories(); 
	foreach ($categories as $cat) :
	
		$option = '<option value="' . $cat->cat_ID . '"';
		
		if ( $cat->cat_ID == get_option($valueID) ) :
			$option .= ' selected="selected">';
		else :
			$option .= ' >';
		endif;
		
		$option .= $cat->cat_name;
		$option .= ' (' . $cat->category_count . ')';
		$option .= '</option>';
		echo $option;
		
	endforeach;
	
	echo '</select>';
	
}

function ds_get_page_list($valueID, $valueDV) { //Get page list and display it as a dropdown list
		
	echo '<select name="dropdown_list_page" onchange="document.getElementById(' . "'" . $valueID . "'" . ').value=this.options[this.selectedIndex].value;">';
	echo '<option value="">' . esc_attr($valueDV) . '</option>';
	
	$pages =  get_pages(); 
	foreach ($pages as $pagg) :
	
		$option = '<option value="' . $pagg->ID . '"';
		
		if ( $pagg->ID == get_option($valueID) ) :
			$option .= ' selected="selected">';
		else :
			$option .= ' >';
		endif;
		
		$option .= $pagg->post_title;
		$option .= '</option>';
		echo $option;
		
	endforeach;
	
	echo '</select>';
	
}

function include_child_cats($include_this_cat) {
	
	$include_cats = get_categories('parent=' . $include_this_cat);
	$result = $include_this_cat . ',';
	foreach ($include_cats as $include_cats) :
		$result .= $include_cats->cat_ID . ',';
	endforeach;
	return $result;
	
}

function exclude_child_cats($exclude_this_cat) {
	
	$exclude_cats = get_categories('child_of=' . $exclude_this_cat);
	$result = $exclude_this_cat . ',';
	foreach ($include_cats as $exclude_cats) :
		$result .= $exclude_cats->cat_ID . ',';
	endforeach;
	return $result;
	
}

function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) :
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) ) :
			return true;
		else :
			return false;
		endif;
	endforeach;
}

function vdump($temp) {
	echo '<div style="position: absolute; left: 15px; top: 15px; padding: 25px; width: 500px !important; background: #eee; color: #333; text-align: left; z-index: 99999;">';
	echo '<pre style="font:10px/18px Verdana, Geneva, sans-serif;">';
	var_dump($temp);
	echo '</pre>';
	echo '</div>';
}

function ds_timthumb_image( $the_url, $the_width=500, $the_height=550, $the_alt='', $default='/images/default_empty_image_featured.jpg', $the_class='', $no_def = 0 ) { //Timthumb function
	
	if ( !$the_url ) :
	
		if ( $no_def ) :
	
			return false;
		
		else :
		
			echo '<img src="' . get_bloginfo('template_url') . '/theme-assets/php/timthumb.php?src=' . get_bloginfo('template_url') . $default . '&amp;h=' . $the_height . '&amp;w=' . $the_width . '" alt="' . $the_alt . '" class="' . $the_class . '" width="' . $the_width . '" height="' . $the_height . '" />';
		
		endif;

	else :
	
		global $blog_id;
		
		// is it wp3 multisite?
		
		if (isset($blog_id) && $blog_id > 0) :
		
			$url_parts = explode('/files/', $the_url);
			if (isset($url_parts[1])) {
				$the_url = '/blogs.dir/' . $blog_id . '/files/' . $url_parts[1];
			}

			echo '<img src="' . get_bloginfo('template_url') . '/theme-assets/php/timthumb.php?src=' . $the_url . '&amp;h=' . $the_height . '&amp;w=' . $the_width . '" alt="' . $the_alt . '"  class="' . $the_class . '"  width="' . $the_width . '" height="' . $the_height . '" />';
		
		else:
		
			echo '<img src="' . get_bloginfo('template_url') . '/theme-assets/php/timthumb.php?src=' . $the_url . '&amp;h=' . $the_height . '&amp;w=' . $the_width . '" alt="' . $the_alt . '"  class="' . $the_class . '"  width="' . $the_width . '" height="' . $the_height . '" />';
	
		endif;
		
	endif;
	
}

add_theme_support('post-thumbnails');


// Add the posts and pages columns filter. They can both use the same function.
#add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
#add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

// Add the column
function tcb_add_post_thumbnail_column($cols){
    $cols['tcb_post_thumb'] = __('Featured');
    return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
#add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
#add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      //echo the_post_thumbnail( 'featured-thumbnail' );
      echo the_post_thumbnail( 'thumbnail' );
      break;
  }
}
function my_custom_css() {
	?>
	<style type="text/css">
		.column-thumbnail, .column-column-featured_image { width: 100px!important; }
		.column-id { width: 50px; } /* Simply Show IDs */
	</style>
	<?php
}
add_action('admin_head', 'my_custom_css');

function make_mce_awesome( $init ) {
    $init['theme_advanced_blockformats'] = 'p,h3,h4,address';
    $init['theme_advanced_disable'] = 'underline,spellchecker,wp_help,justifyfull,justifyleft,justifycenter,justifyright,forecolor,strikethrough';
    #$init['theme_advanced_text_colors'] = '0f3156,636466,0486d3';
	#$init['theme_advanced_buttons2_add'] = 'styleselect';
	#$init['theme_advanced_styles'] = "bigTitle=bigTitle;Call To Action Button=ctaButton,Rounded Corners=rounded";
    return $init;
}
add_filter('tiny_mce_before_init', 'make_mce_awesome');


?>
