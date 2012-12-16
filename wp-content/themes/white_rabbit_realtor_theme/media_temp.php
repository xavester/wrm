<?php

/**
 * Template Name: media_temp_b
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
<?php include TEMPLATEPATH . '/media-fields.php'; ?>

<div class="glm"><a href="http://golm.org.uk/" title="Link to the Guild of Location Managers">
				<img src="/wp-content/uploads/GLM-logo-2010-AFFILIATE.png" alt="the Guild of Location Managers" width="115" height="90">
			</a></div>

</div>
<!-- end : header -->

<!-- begin : banner -->
<!-- begin: content -->
<div id="content" class="clear_fix">
<div id="banner">
    <div id="banner_overlay" class="png_fix">
    <div id="banner_wrapper" class="clear_fix">
    
        <!-- begin : banner_image_wrapper -->
        
		<?php
        $feature_banner = new WP_Query();
        $feature_banner->query('cat=' . ds_get_ao('featured_media_cat') . '&showposts=' . ds_get_ao('feat_media_quantity'));
        ?>
        
        <div id="banner_image_wrapper">
    
            <div id="featured_banner_frame" class="png_fix"></div>
            
            <ul id="featured_banner_images">
            
				<?php if ( $feature_banner->have_posts() ) : ?>
					<?php while ( $feature_banner->have_posts() ) : $feature_banner->the_post(); ?>
                        <li><?php ds_timthumb_image( ds_get_cf('excerpt_image'),700, 425, get_the_title(),'/images/banner-sample-image-default.jpg', 'banner_img');?></li>
                    <?php endwhile; ?>
                <?php endif; ?>
                
            </ul>
            
            <div id="feat_banner_prev"><span class="hide_this">Prev</span></div>
            <div id="feat_banner_next"><span class="hide_this">Next</span></div>
            
            <!--<ul id="banner_page"><li></li></ul>-->
			
			<ul id="banner_page_desc"><li></li></ul>
			
			<div class="clear_fix"></div>

        </div>
        <!-- end : banner_image_wrapper -->
		<!-- begin : banner_desc_wrapper -->
        <ul id="banner_desc_wrapper">
        
			<?php if ( $feature_banner->have_posts() ) : ?>
                <?php while ( $feature_banner->have_posts() ) : $feature_banner->the_post(); ?>
                <li>
                    <h3 class="desc_title"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(60); ?></a></h3>

                <?php endwhile; ?>
            <?php endif; ?>

        </ul>
        <!-- end : banner_desc_wrapper -->

    </div>
    </div>
</div>
<!-- end : banner -->
  
  <!-- begin: column_left -->
  <div id="column_left" class="column_left_home">
  
     <!-- begin: post_preview_wrapper -->
     <div class="post_preview_wrapper">
        <h2 class="post_preview_main_title">Media</h2>
        <ul class="clear_fix">
        
			<?php
			
            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$show_pages= (ds_get_ao('cat_media_id'));
			
			query_posts( array('paged' => $paged, 'posts_per_page' => ds_get_ao('recent_post_qty'), 'cat' => $show_pages. ',-1,-0' ) );
			
            ?>
        
			<?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?>
	           <li class="post_preview">
                
                    <div class="post_preview_content clear_fix">
                    
                    	<div class="image_frame_small_holder">
                        
                        	<div class="image_frame_small png_fix"></div>
                    
							<?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('220x150');
								} else {
									ds_timthumb_image( ds_get_cf('excerpt_image'), 220, 150, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt');
								} ?>
 
                        </div>
                        
                        <h2 class="post_preview_title font_sansation"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(32); ?></a></h2>
                        
                        <div class="post_preview_excerpt">
	                        <?php ds_custom_excerpt('', 190, 1); ?>
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