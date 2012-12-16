<?php get_header(); ?>

<!-- begin: main_content -->
<div id="main_content" class="clear_fix">

  <!-- begin: main_content_bar -->
  <div id="main_content_bar" class="clear_fix">
    
	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) : ?>
		<h2 id="main_content_bar_title" class="font_harabara"><?php single_cat_title(); ?></h2>
		<?php /* If this is a tag archive */ elseif( is_tag() ) : ?>
		<h2 id="main_content_bar_title" class="font_harabara">Posts Tagged <?php single_tag_title(); ?></h2>
		<?php /* If this is a daily archive */ elseif (is_day()) : ?>
		<h2 id="main_content_bar_title" class="font_harabara">Archive for <?php the_time('F jS, Y'); ?> </h2>
		<?php /* If this is a monthly archive */ elseif (is_month()) : ?>
		<h2 id="main_content_bar_title" class="font_harabara">Archive for <?php the_time('F, Y'); ?> </h2>
		<?php /* If this is a yearly archive */ elseif (is_year()) : ?>
		<h2 id="main_content_bar_title" class="font_harabara">Archive for <?php the_time('Y'); ?> </h2>
		<?php /* If this is an author archive */ elseif (is_author()) : ?>
		<h2 id="main_content_bar_title" class="font_harabara">Author Archive</h2>
		<?php /* If this is a paged archive */ elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
		<h2 id="main_content_bar_title" class="font_harabara">Blog Archives</h2> <?php endif; ?>
	
	<?php endif; ?>
    
    <div id="search_keywords">
    
		<?php get_search_form(); ?>
    
    </div>
  </div>
  <!-- end: main_content_bar -->
  
	<?php include TEMPLATEPATH . '/listing-fields.php'; ?>
  
  <!-- begin: column_left -->
  <div id="column_left" class="list_style" >
       
        <!-- begin: post_preview_wrapper -->
        <div class="post_preview_wrapper">

            <ul class="clear_fix">
            
				<?php if (have_posts()) : ?>
            
                    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                    
                    <?php while (have_posts()) : the_post(); ?>
                    
                       <li class="post_preview clear_fix">
                       
                          <div class="post_preview_content clear_fix">
                          
                            <?php if ( ds_get_cf('excerpt_image') ) : ?>
                          
                            <div class="image_frame_small_holder">
                            
                                <div class="image_frame_small png_fix"></div>
                        
                                <?php ds_timthumb_image( ds_get_cf('excerpt_image'), 180, 111, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt'); ?>
                            
                            </div>
                            
                            <?php endif; ?>
                            
                            <h2 class="post_preview_title font_sansation" >
	                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="post_info"><img src="<?php bloginfo('template_url'); ?>/images/post_icon_time.gif" width="13" height="12" alt="Time and Date" /> <span><?php the_time('F jS, Y') ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_user.gif" width="11" height="12" alt="User" /> <span>by <?php the_author() ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_comment.gif" width="14" height="12" alt="Comments" /> <span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></p>
                            
							<?php
							
					        $result_id_cats = array();
							
                            foreach((get_the_category()) as $category) : 
                                array_push($result_id_cats, $category->term_id);
                            endforeach;
							
                            ?>
							
                            <?php if ( ( !cat_is_ancestor_of( (int)ds_get_ao('cat_blog_id'), (int)reset($result_id_cats) ) ) && ( ds_get_ao('cat_blog_id') != reset($result_id_cats) ) ) : ?>
                            
							<?php if ( ds_get_cf('price') ) : ?>
                                <span class="post_info_label">Price :</span>
                                <p class="post_listing_price font_sansation">
                                    <?php ds_ao('currency') ?> <?php ds_cf('price') ?> <?php ds_cf('price_suffix') ?>
                                </p>
                            <?php endif; ?>


							<div class="details_box_holder" >
                            
                            	<ul class="details_box clear_fix" >
                                
                                	<li>
                                    
			                            <span class="post_info_label">Type :</span>
		                                <?php if ( ds_listing_type(ds_get_cf('listing_type')) ) : ?><p><?php echo ds_listing_type(ds_get_cf('listing_type')); ?></p><?php endif; ?>
                                    
                                    </li>
                                    
                                	<li>
                                    
			                            <span class="post_info_label">Status :</span>
										<?php if ( ds_get_cf('addnl_status') ) : ?>
                                        <p>
                                            <?php ds_cf('addnl_status') ?>
                                        </p>
                                        <?php endif; ?>
                                    
                                    </li>
                                    
                                	<li>
                                    
			                            <span class="post_info_label">Location :</span>
										<p><?php the_category(', ') ?></p>
                                   
                                    </li>
                                    
                                	<li>
                                    
			                            <span class="post_info_label">Additional Info :</span>
										<?php if ( ds_get_cf('addnl_info') ) : ?>
                                            <p>
                                                <?php ds_cf('addnl_info') ?>
                                            </p>
                                        <?php endif; ?>
                                    
                                    </li>
                                    
                                	<li>
                                    
			                            <span class="post_info_label">Rooms :</span>
										<?php if ( ( ds_get_cf('bedrooms') ) || ( ds_get_cf('bathrooms') ) || ( ds_get_cf('garages') ) ) : ?>
                                        
                                            <?php ds_get_cf('bedrooms') >= 2 ? $pl1 = 's' : $pl1 = ''; ?>
                                            <?php ds_get_cf('bathrooms') >= 2 ? $pl2 = 's' : $pl2 = ''; ?>
                                            <?php ds_get_cf('garages') >= 2 ? $pl3 = 's' : $pl3 = ''; ?>
                                        
                                            <p>
                                                <?php if ( ds_get_cf('bedrooms') ) : ?><span><?php ds_cf('bedrooms') ?></span> Bed<?php echo $pl1; ?> &bull;<?php endif; ?>
                                                <?php if ( ds_get_cf('bathrooms') ) : ?><span><?php ds_cf('bathrooms') ?></span> Bath<?php echo $pl2; ?> &bull; <?php endif; ?>
                                                <?php if ( ds_get_cf('garages') ) : ?><span><?php ds_cf('garages') ?></span> Garage<?php echo $pl3; ?> <?php endif; ?>
                                            </p>
                                        
                                        <?php endif; ?>
                                    
                                    </li>
                               
                                </ul>
                            
                            </div>
                            
                            <span class="post_info_label">Details :</span>
                            
                            <?php endif; ?>

                            <div class="post_preview_excerpt">
			                 	 <?php ds_custom_excerpt('', 290, 4); ?>
                            </div>
                            
                            <?php the_tags('<p class="post_info_tags"> Tags: ', ', ', '</p>'); ?>
                            
                          </div>
                          
                          <p class="post_preview_readmore clear_fix" ><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="png_fix fx_button_hover"><span class="hide_this">Read More</span></a></p>
                          
                       </li>
                    
                    <?php endwhile; ?>
                    
                <?php else : ?>
                
                	<div class="basic_style_1">
                
                    <?php
                    
                        if ( is_category() ) : // If this is a category archive
                            printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
                        elseif ( is_date() ) : // If this is a date archive
                            echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
                        elseif ( is_author() ) : // If this is a category archive
                            $userdata = get_userdatabylogin(get_query_var('author_name'));
                            printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
                        else :
                            echo("<h2 class='center'>No posts found.</h2>");
                        endif;
                        
                    ?>
                    
                    </div>
            
                <?php endif; ?>
            
            </ul>
           
			<?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
        
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