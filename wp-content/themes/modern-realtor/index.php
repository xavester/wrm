<?php get_header(); ?>

<!-- begin : banner -->
<div id="banner">
    <div id="banner_divider"></div>
    <div id="banner_overlay" class="png_fix">
    <div id="banner_wrapper" class="clear_fix">
    
        <!-- begin : banner_image_wrapper -->
        
		<?php
        $feature_banner = new WP_Query();
        $feature_banner->query('cat=' . ds_get_ao('featured_cat') . '&showposts=' . ds_get_ao('feat_quantity'));
        ?>
        
        <div id="banner_image_wrapper">
    
            <div id="featured_banner_frame" class="png_fix"></div>
            
            <ul id="featured_banner_images">
            
				<?php if ( $feature_banner->have_posts() ) : ?>
					<?php while ( $feature_banner->have_posts() ) : $feature_banner->the_post(); ?>
                        <li><?php ds_timthumb_image( ds_get_cf('excerpt_image'), 507, 235, get_the_title(),'/images/banner-sample-image-default.jpg', 'banner_img');?></li>
                    <?php endwhile; ?>
                <?php endif; ?>
                
            </ul>
            
            <div id="feat_banner_prev"><span class="hide_this">Prev</span></div>
            <div id="feat_banner_next"><span class="hide_this">Next</span></div>
            
            <ul id="banner_page"><li></li></ul>
            <ul id="banner_page_desc"><li></li></ul>
       
        </div>
        <!-- end : banner_image_wrapper -->
        
        <!-- begin : banner_desc_wrapper -->
        <ul id="banner_desc_wrapper">
        
			<?php if ( $feature_banner->have_posts() ) : ?>
                <?php while ( $feature_banner->have_posts() ) : $feature_banner->the_post(); ?>
                <li>
                    <h3 class="desc_title"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(60); ?></a></h3>
                    <p class="desc_sub_title">// Posted By : <?php the_author() ?> // <?php the_time('F jS, Y') ?> // <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;', 'carousel_desc_comments'); ?></p>
                    <?php if ( ds_get_cf('addnl_info') ) : ?><p class="desc_status"><?php ds_cf('addnl_info') ?> | <strong>Status:</strong> <?php ds_cf('addnl_status') ?></p><?php endif; ?>
                  	<?php ds_custom_excerpt('', 190, 4); ?>
                    <?php if ( ds_get_cf('price') ) : ?><h4 class="desc_price font_harabara"><?php ds_ao('currency') ?> <?php ds_cf('price') ?> <?php ds_cf('price_suffix') ?></h4><?php endif; ?>
                    
                    <?php if ( ( ds_get_cf('bedrooms') ) || ( ds_get_cf('bathrooms') ) || ( ds_get_cf('garages') ) ) : ?>
                    
	                    <p>
							<?php if ( ds_get_cf('bedrooms') ) : ?> // Bedroom : <?php ds_cf('bedrooms') ?><?php endif; ?>
							<?php if ( ds_get_cf('bathrooms') ) : ?> // Bathroom : <?php ds_cf('bathrooms') ?><?php endif; ?>
							<?php if ( ds_get_cf('garages') ) : ?> // Garage : <?php ds_cf('garages') ?><?php endif; ?>
                        </p>
                    
					<?php endif; ?>
                    
                    <p class="desc_readmore"><a href="<?php the_permalink() ?>" class="png_fix"><span class="hide_this">Read More</span></a></p>
                </li>
                <?php endwhile; ?>
            <?php endif; ?>

        </ul>
        <!-- end : banner_desc_wrapper -->
    
    </div>
    </div>
</div>
<!-- end : banner -->

<!-- begin: main_content -->
<div id="main_content" class="clear_fix">

  <!-- begin: main_content_bar -->
  <div id="main_content_bar" class="clear_fix">
  	<div id="recent_blog_buttons" class="clear_fix">
    	<a href="#" id="recent_blog_down"><span class="hide_this">Button Down</span></a>
        <a href="#" id="recent_blog_up"><span class="hide_this">Button Up</span></a>
    </div>
    
	<?php
    
    $new_blog_posts = new WP_Query();
    $new_blog_posts->query('cat=' . ds_get_ao('cat_blog_id'));
    
    ?>
    
    <ul id="recent_blog">
    
		<?php if ( $new_blog_posts->have_posts() ) : ?>
           <?php while ( $new_blog_posts->have_posts() ) : $new_blog_posts->the_post(); ?>
    
		        <li>
                	<span>Recent Blog: </span>
                    <a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>" class="blog_prev_title">
						<?php ds_custom_title(45); ?>
                    </a>
                    <img src="<?php bloginfo('template_url'); ?>/images/post_icon_user.gif" width="11" height="12" alt="User" /> <span>by <?php the_author() ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_comment.gif" width="14" height="12" alt="Comments" /> <span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
                </li>
        
		   <?php endwhile; ?>
        <?php endif; ?>
        
    </ul>
    
    <div id="search_keywords">
    
		<?php get_search_form(); ?>
    
    </div>
  </div>
  <!-- end: main_content_bar -->
  
	<?php include TEMPLATEPATH . '/listing-fields.php'; ?>
  
  <!-- begin: column_left -->
  <div id="column_left" class="column_left_home">
  
     <!-- begin: post_preview_wrapper -->
     <div class="post_preview_wrapper">
        <h2 class="post_preview_main_title font_harabara">Recent Posts</h2>
        <ul class="clear_fix">
        
			<?php
			
            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			query_posts( array('paged' => $current_page, 'posts_per_page' => ds_get_ao('recent_post_qty'), 'cat' => '-' . ds_get_ao('cat_blog_id') . ',-1' ) );
			
            ?>
        
			<?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?>
	           <li class="post_preview">
                
                    <div class="post_preview_content clear_fix">
                    
                    	<div class="image_frame_small_holder">
                        
                        	<div class="image_frame_small png_fix"></div>
                    
							<?php ds_timthumb_image( ds_get_cf('excerpt_image'), 180, 111, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt');?>
                        
                        </div>
                        
                        <h2 class="post_preview_title font_sansation"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(32); ?></a></h2>
                        
                        <?php if ( ds_listing_type(ds_get_cf('listing_type')) ) : ?>
                        <p class="post_listing_type">
                            <span class="post_info_label">Type :</span>
                            <?php echo ds_listing_type(ds_get_cf('listing_type')); ?>
                        </p>
                        <?php endif; ?>
                        
                        <?php if ( ds_get_cf('price') ) : ?>
                        <p class="post_listing_price font_sansation">
                            Price : <?php ds_ao('currency') ?> <?php ds_cf('price') ?> <?php ds_cf('price_suffix') ?>
                        </p>
						<?php endif; ?>
                        
                        <?php if ( ( ds_get_cf('bedrooms') ) || ( ds_get_cf('bathrooms') ) || ( ds_get_cf('garages') ) ) : ?>
                        
                        	<?php ds_get_cf('bedrooms') >= 2 ? $pl1 = 's' : $pl1 = ''; ?>
                        	<?php ds_get_cf('bathrooms') >= 2 ? $pl2 = 's' : $pl2 = ''; ?>
                        	<?php ds_get_cf('garages') >= 2 ? $pl3 = 's' : $pl3 = ''; ?>
                        
                            <p class="post_listing_info">
                                <?php if ( ds_get_cf('bedrooms') ) : ?><span><?php ds_cf('bedrooms') ?></span> Bed<?php echo $pl1; ?> &bull;<?php endif; ?>
                                <?php if ( ds_get_cf('bathrooms') ) : ?><span><?php ds_cf('bathrooms') ?></span> Bath<?php echo $pl2; ?> &bull; <?php endif; ?>
                                <?php if ( ds_get_cf('garages') ) : ?><span><?php ds_cf('garages') ?></span> Garage<?php echo $pl3; ?> <?php endif; ?>
                            </p>
                        
                        <?php endif; ?>
                        
                        <?php if ( ds_get_cf('addnl_status') ) : ?>
                        <p class="post_listing_status">
                            <span class="post_info_label">Status : </span>
                            <?php ds_cf('addnl_status') ?>
                        </p>
						<?php endif; ?>
                        
                        <p class="post_info">
                        	<span class="post_info_label">Location : </span>
							<?php the_category(', ') ?>
                        </p>
                        
                        <?php if ( ds_get_cf('addnl_info') ) : ?>
                        	<p class="post_listing_info2">
                                <span class="post_info_label">Additional Info : </span>
                                <?php ds_cf('addnl_info') ?>
                            </p>
						<?php endif; ?>
                        
                        <div class="post_preview_excerpt">
	                        <span class="post_info_label">Details : </span>
	                        <?php ds_custom_excerpt('', 190, 4); ?>
                        </div>
                        
                    </div>
                
		            <p class="post_preview_readmore"><a href="<?php the_permalink() ?>" class="png_fix fx_button_hover2"><span class="hide_this">Read More</span></a></p>
                    
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
     <!-- begin: sidebar_home -->

		     <?php get_sidebar(); ?>

     <!-- end: sidebar_home -->
  </div>
  <!-- end: column_right -->
</div>
<!-- end: main_content -->

<?php get_footer(); ?>