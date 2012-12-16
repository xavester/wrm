<?php

/**
 * Template Name: locations_temp
 *
 * A custom page to display all options.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage White_Rabbit_Realtor_Theme
 * @since White_Rabbit_Realtor_Theme 1.1
 */

get_header(); ?>
<?php include TEMPLATEPATH . '/listing-fields.php'; ?>

<div class="glm"><a href="http://golm.org.uk/" title="Link to the Guild of Location Managers">
	<img src="/wp-content/uploads/GLM-logo-2010-AFFILIATE.png" alt="the Guild of Location Managers" width="115" height="90">
</a></div>

</div>
<!-- end : header -->

<!-- begin : banner -->
<!-- begin: content -->
<div id="content" class="clear_fix">

	<?php include (TEMPLATEPATH . '/flexslider/slideshow.php'); ?>
  
  <!-- begin: column_left -->
  <div id="column_left" class="column_left_home">
  
     <!-- begin: post_preview_wrapper -->
     <div class="post_preview_wrapper">
        <h2 class="post_preview_main_title">New Properties</h2>
        <ul class="clear_fix">
        
			<?php
			
            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$hide_pages= (ds_get_ao('cat_blog_id').', -'.ds_get_ao('cat_media_id'));
			
			query_posts( array('paged' => $current_page, 'posts_per_page' => ds_get_ao('recent_post_qty'), 'cat' => '-' .$hide_pages. ',-1' ) );
			
            ?>
        
			<?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?>
	           <li class="post_preview">
                
                    <div class="post_preview_content clear_fix">
                    
                    	<div class="image_frame_small_holder">
                        
                        	<div class="image_frame_small png_fix"></div>
                    			<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
									<?php 
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('220x150');
									} else {
										ds_timthumb_image( ds_get_cf('excerpt_image'), 220, 150, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt');
									} ?>
							 </a>                       
                        </div>
                        
                        <h2 class="post_preview_title font_sansation">
                        	<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(32); ?></a>
                        </h2>
                        
                        <div class="post_preview_excerpt">
	                        <p><?php the_category(', ') ?></p>
	                        <!--<?php ds_custom_excerpt('', 190, 1); ?>-->
                        </div>
                        
                    </div>
                    
               </li>
               <?php endwhile; ?>
            <?php endif; ?>
           
        </ul>
        
		<?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
        
		<?php wp_reset_query(); ?> 
        
     </div>
     <!-- end: post_preview_wrapper -->
  </div>
  <!-- end: column_left -->
  <!-- begin: column_right -->
  <div id="column_right">
  </div>
  <!-- end: column_right -->
</div>
<!-- end: content -->

<?php get_footer(); ?>