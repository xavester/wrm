<?php get_header(); ?>
<!-- single -->
<?php //display the current and parent category (2 total)
$category = get_the_category();
$current_category = $category[0];
$parent_category = $current_category->category_parent;

if ( $parent_category != 0 ) {

if($parent_category == ds_get_ao('cat_media_id')){
	
	$isMedia = true;
	$name = $current_category->cat_name;
}

}

?>

<?php 


if($isMedia):
	
include TEMPLATEPATH . '/media-fields.php';

else:
	
include TEMPLATEPATH . '/listing-fields.php';

endif;
	
?>

<div class="glm"><a href="http://golm.org.uk/" title="Link to the Guild of Location Managers">
				<img src="/wp-content/uploads/GLM-logo-2010-AFFILIATE.png" alt="the Guild of Location Managers" width="115" height="90">
			</a></div>

</div>


<!-- begin: content -->
<div id="content" class="clear_fix">

  <!-- begin: column_left -->
  <div id="column_left" class="single_page_modifier">
  
<?php 
	if (have_posts()) :
		while (have_posts()) : the_post();
			if($isMedia): ?>		
				<h2 id="single_page_title"><?php echo $name ?> - <?php the_title(); ?> </h2>

			<? else: ?>
				<h2 id="single_page_title">Property Details</h2>

				<div class="title_box_holder" >

					<span class="post_info_label"><?php the_title(); ?></span><p><?php the_category(', ') ?></p>

                </div>

			<?php endif;


		 	if ( ds_get_cf('excerpt_image') || has_post_thumbnail() ) : ?>
   
                <div class="image_frame_small_holder">

                    <div class="image_frame_small png_fix"></div>
	
                        <?php 
                        
                        if (has_post_thumbnail()) {
                        	the_post_thumbnail('700x425');
                        } else {
                        	ds_timthumb_image( ds_get_cf('excerpt_image'), 700, 425, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt'); 
                    	}?>
                </div>
                    
            <?php endif; ?>

			<!--<p id="sub_title"><img src="<?php bloginfo('template_url'); ?>/images/post_icon_time.gif" width="13" height="12" alt="Time and Date" /> <span><?php the_time('F jS, Y') ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_user.gif" width="11" height="12" alt="User" /> <span>by <?php the_author() ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_comment.gif" width="14" height="12" alt="Comments" /> <span class="smooth_scroll"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span> </p>-->
                            
        	    <div class="basic_style_1">

					<?php 
					the_content('<p>Read the rest of this entry &raquo;</p>');
					wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
					
                    $result_id_cats = array();

                    foreach((get_the_category()) as $category) : 
                        array_push($result_id_cats, $category->term_id);
                    endforeach;

                   	if ( ( !cat_is_ancestor_of( (int)ds_get_ao('cat_blog_id'), (int)reset($result_id_cats) ) ) && ( ds_get_ao('cat_blog_id') != reset($result_id_cats) ) ) : ?>
	
	                    <div class="details_box_holder" >
                            <span class="post_info_label"><p><?php if ( ds_get_cf('addnl_featured') ) : ?>
                            <?php ds_cf('addnl_featured') ?><?php endif; ?></p>
	                    </div>
                    <?php 
                    endif; ?>

                </div>
                
                <div id="share_links">
                	<ul id="s_links_left" class="clear_fix">
	
					
                    	<li id="icon_label">Share this <?php if($isMedia): ?> article <?php else: ?> location: <?php endif; ?> </li>
                    	
                        <li id="icon_twitter"><a href="http://twitter.com/home?status=<?php echo get_permalink() ?>&source=<?php bloginfo('name'); ?>" target="_blank" title="Share On Twitter"><span class="hide_this">Twitter</span></a></li>
                        <li id="icon_facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink() ?>&t=<?php the_title(); ?>" target="_blank" title="Share on Facebook"><span class="hide_this">Facebook</span></a></li>
                        
                    </ul>
                    <ul id="s_links_right">
                    	<li id="icon_email_this"><a href="#"><span class="hide_this">Email This To A Friend</span></a></li>
                    </ul>
                </div>
                
				<?php if ( get_edit_post_link() ) : ?><p id="single_page_edit"><a href="<?php echo get_edit_post_link(); ?>" class="png_fix fx_button_hover post-edit-link"><span class="hide_this">Edit this entry</span></a></p>
				<?php endif; ?>
					
				<?php if($isMedia): comments_template(); endif; ?>
            
        <?php endwhile; ?>
        
    <?php else: ?>
        
        <div class="basic_style_1">
        
        	<h2 id="single_page_title">Page Not Found</h2>
        
            <p>Sorry, no posts matched your criteria.</p>
            
		</div>
        
    <?php endif; ?>
         
  </div>
  <!-- end: column_left -->
</div>
<!-- end: content -->

<?php get_footer(); ?>