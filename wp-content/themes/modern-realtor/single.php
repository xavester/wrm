<?php get_header(); ?>

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
  <div id="column_left" class="single_page_modifier">
  
		<?php if (have_posts()) : ?>
        
            <?php while (have_posts()) : the_post(); ?>
  
                <!-- begin: ajax_info_holder //this section will be loaded once the listing results function will request it via ajax -->
                <div class="ajax_info_holder">

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
                    
                  <?php the_tags('<p class="post_info_tags"> Tags: ', ', ', '</p>'); ?></p>
                  
                  <p class="post_preview_readmore clear_fix" ><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="png_fix fx_button_hover"><span class="hide_this">Read More</span></a></p>
                    
                  <p class="ajax_info_holder_close"><a href="#" class="fx_button_hover"><span class="hide_this">Close Me</span></a></p>
                  
                </div>
                <!-- end: ajax_info_holder -->
        
					<?php if ( ds_get_cf('excerpt_image') ) : ?>
                  
                    <div class="image_frame_small_holder">
                    
                        <div class="image_frame_small png_fix"></div>
                
                        <?php ds_timthumb_image( ds_get_cf('excerpt_image'), 180, 111, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt'); ?>
                    
                    </div>
                    
                    <?php endif; ?>
                
                    <h2 id="single_page_title"><?php the_title(); ?></h2>
                    <p id="sub_title"><img src="<?php bloginfo('template_url'); ?>/images/post_icon_time.gif" width="13" height="12" alt="Time and Date" /> <span><?php the_time('F jS, Y') ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_user.gif" width="11" height="12" alt="User" /> <span>by <?php the_author() ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_comment.gif" width="14" height="12" alt="Comments" /> <span class="smooth_scroll"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span> </p>
                
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
                    
                    <?php endif; ?>
                            
                <div class="basic_style_1">

					<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>                    
                    
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    
                    <div class="post_block_data">
	                    <?php if ( cat_is_ancestor_of( (int)ds_get_ao('cat_blog_id'), (int)reset($result_id_cats) ) ) : ?>
                        	<p class="post_info">Category : <?php the_category(', ') ?></p>
						<?php endif; ?>
                        <?php the_tags('<p class="post_info_tags"> Tags: ', ', ', '</p>'); ?></p>
                    </div>
                    
                </div>
                
				<?php if ( (ds_get_cf('addnl_map')) && is_single() ) : ?>
                
                    <div id="map_canvas">
                    
                        <h3 class="font_harabara">Location Map</h3>
                        
                        <div id="location_map"></div>
                    
                    </div>
                
                <?php endif; ?>
                
                <div id="share_links">
                	<ul id="s_links_left" class="clear_fix">
                    	<li id="icon_label"></li>
                    	<li id="icon_digg"><a href="http://digg.com/submit?phase=2&url=<?php echo get_permalink(); ?>" target="_blank" title="Digg"><span class="hide_this">Digg</span></a></li>
                        <li id="icon_twitter"><a href="http://twitter.com/home?status=<?php echo get_permalink() ?>&source=<?php bloginfo('name'); ?>" target="_blank" title="Twitter"><span class="hide_this">Twitter</span></a></li>
                        <li id="icon_facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink() ?>&t=<?php the_title(); ?>" target="_blank" title="Facebook"><span class="hide_this">Facebook</span></a></li>
                        <li id="icon_stumbleupon"><a href="http://www.stumbleupon.com/submit?url=<?php echo get_permalink() ?>&title=<?php the_title(); ?>" target="_blank" title="Stumble Upon"><span class="hide_this">Stumble Upon</span></a></li>
                    </ul>
                    <ul id="s_links_right">
                    	<li id="icon_comment_rss"><a href="<?php echo get_post_comments_feed_link(); ?>"><span class="hide_this">Comment RSS</span></a></li>
                    	<li id="icon_email_this"><a href="#"><span class="hide_this">Email This To A Friend</span></a></li>
                    </ul>
                </div>
                
				<?php if ( get_edit_post_link() ) : ?><p id="single_page_edit"><a href="<?php echo get_edit_post_link(); ?>" class="png_fix fx_button_hover post-edit-link"><span class="hide_this">Edit this entry</span></a></p><?php endif; ?>
            
            <?php comments_template(); ?>
            
            <?php endwhile; ?>
        
        <?php else: ?>
        
        <div class="basic_style_1">
        
        	<h2 id="single_page_title">Page Not Found</h2>
        
            <p>Sorry, no posts matched your criteria.</p>
            
		</div>
        
        <?php endif; ?>
         
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
