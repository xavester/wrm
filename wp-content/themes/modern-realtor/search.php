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
  <div id="column_left" class="list_style" >

	<?php if ($_GET['s'] == 'filter_listing_mode') : //begin if filter_listing_mode
    
        $posts_per_page_blocks = '';
        $posts_per_page_table = 20;
        
		if ( $_GET['bedrooms'] ) { $bedrooms = $_GET['bedrooms']; } else { $bedrooms = 0; }
		if ( $_GET['bathrooms'] ) { $bathrooms = $_GET['bathrooms']; } else { $bathrooms = 0; }
		if ( $_GET['garage'] ) { $garage = $_GET['garage']; } else { $garage = 0; }
		if ( $_GET['price_min'] ) { $price_min = ds_strip_comma( $_GET['price_min'] ); } else { $price_min = ''; }
		if ( $_GET['price_max'] ) { $price_max = ds_strip_comma( $_GET['price_max'] ); } else { $price_max = ''; }
		if ( $_GET['listing_type'] ) { $listing_type = $_GET['listing_type']; } else { $listing_type = 'rbutton_none'; }
		if ( $_GET['location'] ) { $location = $_GET['location']; } else { $location = ''; }
        
        if ($location == '') { $location = '""'; $mod_location = '!='; } else { $mod_location = '='; }
        if ($listing_type == 'rbutton_none') { $listing_type = ''; $mod_listing_type = '!='; } else { $mod_listing_type = '='; }
        if ($price_min == '') $price_min = 0;
        if ($price_max == '') $price_max = 0;
        if ($price_max == 0) { $mod_price = '!='; } else { $mod_price = '<='; }
        
        $querystr = "
        
        SELECT * FROM $wpdb->posts
        
        INNER JOIN $wpdb->postmeta key1 ON key1.post_id = $wpdb->posts.ID
        INNER JOIN $wpdb->postmeta key2 ON key2.post_id = key1.post_id
        INNER JOIN $wpdb->postmeta key3 ON key3.post_id = key2.post_id
        INNER JOIN $wpdb->postmeta key4 ON key4.post_id = key3.post_id
        INNER JOIN $wpdb->postmeta key5 ON key5.post_id = key4.post_id
        INNER JOIN $wpdb->term_relationships key6 ON key6.object_id = $wpdb->posts.ID
        INNER JOIN $wpdb->term_taxonomy key7 ON key7.term_taxonomy_id = key6.term_taxonomy_id
        INNER JOIN $wpdb->postmeta key8 ON key8.post_id = key5.post_id
        
        WHERE
            
        (
        
        ( ( key1.meta_key = '_wp_cf_bedrooms_value' AND key1.meta_value >= " . $bedrooms . " ) AND ( key2.meta_key = '_wp_cf_bathrooms_value' AND key2.meta_value >= " . $bathrooms . " ) AND ( key2.meta_key = '_wp_cf_bathrooms_value' AND key2.meta_value >= " . $bathrooms . " ) AND ( key8.meta_key = '_wp_cf_garages_value' AND key8.meta_value >= " . $garage . " ) )
        
        AND
        
        ( ( key3.meta_key = '_wp_cf_price_value' AND key3.meta_value >= " . $price_min . " ) AND ( key4.meta_key = '_wp_cf_price_value' AND key4.meta_value " . $mod_price . " " . $price_max . " ) )
        
        AND
        
        ( ( key5.meta_key = '_wp_cf_listing_type_value' AND key5.meta_value " . $mod_listing_type . " '" . $listing_type . "' ) )
             
        AND
        
        ( ( key7.taxonomy = 'category' ) )
             
        AND
        
        ( ( key7.term_id " . $mod_location . " " . $location . " ) )
             
        )
        
        AND
        
        ( post_status = 'publish' AND post_type = 'post' )
            
        GROUP BY $wpdb->posts.ID
        
        ORDER BY $wpdb->posts.post_date DESC
        
        ";
     
        $pageposts = $wpdb->get_results($querystr, OBJECT);
        
        $result_ids = array();
        
        foreach ($pageposts as $post) array_push ( $result_ids, $post->ID );
        
        $listing_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        
        if ( ($_GET['view'] == 0) || ($_GET['view'] == '') ) : //begin if toggle view (simple or expanded)
        
            function set_orderby( $order_by ) {
                $order_by = "ABS(meta_value) DESC";
                return $order_by;
            }
            
            if ($_GET['sortby'] == '') :
                query_posts( array('post__in'=>$result_ids, 'paged' => $listing_page, 'posts_per_page' => $posts_per_page_blocks) );
            else :
                $sortby = $_GET['sortby'];
                add_filter( 'posts_orderby', 'set_orderby' );
                query_posts( array('post__in'=>$result_ids, 'paged' => $listing_page, 'posts_per_page' => $posts_per_page_blocks, 'meta_key' => $sortby) );
            endif;
                 
            ?>
       
            <form action="<?php bloginfo('url'); ?>/" method="get" name="view_list">
            
                <input type="hidden" name="s" value="<?php echo $_GET['s']; ?>" />
                <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>" />
                <input type="hidden" name="listing_type" value="<?php echo $_GET['listing_type']; ?>" />
                <input type="hidden" name="price_min" value="<?php echo $_GET['price_min']; ?>" />
                <input type="hidden" name="price_max" value="<?php echo $_GET['price_max']; ?>" />
                <input type="hidden" name="bedrooms" value="<?php echo $_GET['bedrooms']; ?>" />
                <input type="hidden" name="bathrooms" value="<?php echo $_GET['bathrooms']; ?>" />
                <input type="hidden" name="garage" value="<?php echo $_GET['garage']; ?>" />
                <input type="hidden" id="sortby_id" name="sortby" value="<?php echo $_GET['sortby']; ?>" />
                <input type="hidden" id="view_id" name="view" value="<?php echo $_GET['view']; ?>" />
                
                <div class="view_list_button">
					<?php if ( ($_GET['view'] == 0) || ($_GET['view'] == '') ) : ?>
                        <a href="#" class="view_list_expanded active_view" onclick="document.getElementById('view_id').value='0';document.forms.view_list.submit()" ><span class="hide_this">Expanded View</span></a>
                        <a href="#" class="view_list_simple" onclick="document.getElementById('view_id').value='1';document.forms.view_list.submit()"><span class="hide_this">Simple View</span></a>
                    <?php else : ?>
                        <a href="#" class="view_list_expanded" onclick="document.getElementById('view_id').value='0';document.forms.view_list.submit()" ><span class="hide_this">Expanded View</span></a>
                        <a href="#" class="view_list_simple active_view" onclick="document.getElementById('view_id').value='1';document.forms.view_list.submit()"><span class="hide_this">Simple View</span></a>
                    <?php endif ?>
                </div>
          
            </form>
       
            <?php if ( ( have_posts() ) && ( !empty($result_ids) ) ) : //begin first loop  ?>
            
                <h2 id="list_style_title" class="font_harabara">Search Results</h2>
                
                <!-- begin: post_preview_wrapper -->
                <div class="post_preview_wrapper">
                <ul class="clear_fix">
            
                <?php while (have_posts()) : the_post(); //begin first while ?>

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
							
                            foreach((get_the_category()) as $category) { 
                                array_push($result_id_cats, $category->term_id);
                            } 
							
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

                <?php endwhile; //end first while ?>
				
                </ul>                
                </div>
                <!-- end: post_preview_wrapper -->
                
                <?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
    
            <?php else : //else first loop  ?>
        
                <div class="basic_style_1">
                
                    <h5>No posts found. Try a different search?</h5>
                    
                </div>
        
            <?php endif; //end first loop ?>
    
        <?php else : //else if toggle view (simple or expanded) ?>
    
            <?php
            
            function set_orderby( $order_by ) {
                $order_by = "ABS(meta_value) DESC";
                return $order_by;
            }
            
            if ($_GET['sortby'] == '') :
                query_posts( array('post__in'=>$result_ids, 'paged' => $listing_page, 'posts_per_page' => $posts_per_page_table) );
            else :
                $sortby = $_GET['sortby'];
                add_filter( 'posts_orderby', 'set_orderby' );
                query_posts( array('post__in'=>$result_ids, 'paged' => $listing_page, 'posts_per_page' => $posts_per_page_table, 'meta_key' => $sortby) );
            endif;
            
            ?>
    
            <form action="<?php bloginfo('url'); ?>/" method="get" name="view_list">
           
                <input type="hidden" name="s" value="<?php echo $_GET['s']; ?>" />
                <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>" />
                <input type="hidden" name="listing_type" value="<?php echo $_GET['listing_type']; ?>" />
                <input type="hidden" name="price_min" value="<?php echo $_GET['price_min']; ?>" />
                <input type="hidden" name="price_max" value="<?php echo $_GET['price_max']; ?>" />
                <input type="hidden" name="bedrooms" value="<?php echo $_GET['bedrooms']; ?>" />
                <input type="hidden" name="bathrooms" value="<?php echo $_GET['bathrooms']; ?>" />
                <input type="hidden" name="garage" value="<?php echo $_GET['garage']; ?>" />
                <input type="hidden" id="sortby_id" name="sortby" value="<?php echo $_GET['sortby']; ?>" />
                <input type="hidden" id="view_id" name="view" value="<?php echo $_GET['view']; ?>" />
    
                <div class="view_list_button">
					<?php if ( ($_GET['view'] == 0) || ($_GET['view'] == '') ) : ?>
                        <a href="#" class="view_list_expanded active_view" onclick="document.getElementById('view_id').value='0';document.forms.view_list.submit()" ><span class="hide_this">Expanded View</span></a>
                        <a href="#" class="view_list_simple" onclick="document.getElementById('view_id').value='1';document.forms.view_list.submit()"><span class="hide_this">Simple View</span></a>
                    <?php else : ?>
                        <a href="#" class="view_list_expanded" onclick="document.getElementById('view_id').value='0';document.forms.view_list.submit()" ><span class="hide_this">Expanded View</span></a>
                        <a href="#" class="view_list_simple active_view" onclick="document.getElementById('view_id').value='1';document.forms.view_list.submit()"><span class="hide_this">Simple View</span></a>
                    <?php endif ?>
                </div>
                
                <?php if ( ( have_posts() ) && ( !empty($result_ids) ) ) : //begin second loop  ?>
                
	                  	<h2 id="list_style_title" class="font_harabara">Search Results</h2>
                
                        <!-- begin: archive_table -->
                        
                        <div class="archive_table" >
                        
                            <div class="archive_inside_header png_fix">
                                <table>
                                      <tr>
                                         <th class="th_tf_post_title">Post Title</th>
                                         <th class="th_tf_type">Type</th>
                                         <th class="th_tf_bed">Bed</th>
                                         <th class="th_tf_bath">Bath</th>
                                         <th class="th_tf_garage">Garage</th>
                                         <th class="th_tf_price">Price</th>
                                         <th class="th_tf_prev"></th>
                                      </tr>
                                </table>
                            </div>
				            <div class="archive_inside_body">
                                <table>
                                   <tbody>
                    
                                    <?php while (have_posts()) : the_post(); ?>
                
                                              <tr>
                                                 <td class="cell_post_name"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></td>
                                                 <td class="cell_type"><?php echo ds_listing_type(ds_get_cf('listing_type')); ?></td>
                                                 <td class="cell_bed"><?php ds_cf('bedrooms') ?></td>
                                                 <td class="cell_bath"><?php ds_cf('bathrooms') ?></td>
                                                 <td class="cell_garage"><?php ds_cf('garages') ?></td>
                                                 <td class="cell_price"><?php ds_ao('currency') ?> <?php ds_cf('price') ?> <?php ds_cf('price_suffix') ?></td>
                                                 <td class="cell_viewmore"><a href="<?php the_permalink() ?>" class="fx_button_hover" rel="ajax_holder_<?php echo the_ID(); ?>" ><span class="hide_this">More Info</span></a></td>
                                              </tr>
                                    
                                    <?php endwhile; ?>
                            
                                   </tbody>
                                </table>
                            </div>
                            
	                        <?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
                            
                        </div>
                        <!-- end: archive_table -->
                        
                <?php else :  //else second loop ?>
                
                    <div class="basic_style_1">
                    
                        <h5>No posts found. Try a different search?</h5>
                        
                    </div>
                
                <?php endif;  //end second loop ?>
            
            </form>
    
        <?php endif; //end if toggle view (simple or expanded) ?>
        
        <?php remove_filter( 'posts_orderby', 'set_orderby' ); ?>
    
    <?php else : //else if filter_listing_mode ?>
    
       	<h2 id="list_style_title" class="font_harabara">Search Results</h2>
        
        <!-- begin: post_preview_wrapper -->
        <div class="post_preview_wrapper">
        <ul class="clear_fix">
        
		<?php if (have_posts()) : ?>
        
            <?php while (have_posts()) : the_post(); ?>
        
	        <li class="post_preview">
           
			  <?php ds_timthumb_image( ds_get_cf('excerpt_image'), 180, 111, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt', 1);?>
              
              <h2 class="post_preview_title font_sansation" ><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <div class="post_preview_content">
                 <p class="post_info"><img src="<?php bloginfo('template_url'); ?>/images/post_icon_time.gif" width="13" height="12" alt="Time and Date" /> <span><?php the_time('F jS, Y') ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_user.gif" width="11" height="12" alt="User" /> <span>by <?php the_author() ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_comment.gif" width="14" height="12" alt="Comments" /> <span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></p>
                 <?php if ( ds_get_cf('price') ) : ?><p class="post_listing_price font_harabara"><?php ds_ao('currency') ?> <?php ds_cf('price') ?> <?php ds_cf('price_suffix') ?></p><?php endif; ?>
					<?php if ( ( ds_get_cf('bedrooms') ) || ( ds_get_cf('bathrooms') ) || ( ds_get_cf('garages') ) ) : ?>
                        <p class="post_listing_info">
                            <?php if ( ds_get_cf('bedrooms') ) : ?>Bed : <span><?php ds_cf('bedrooms') ?></span><?php endif; ?>
                            <?php if ( ds_get_cf('bathrooms') ) : ?> &bull; Bath : <span><?php ds_cf('bathrooms') ?></span><?php endif; ?>
                            <?php if ( ds_get_cf('garages') ) : ?> &bull; Garage : <span><?php ds_cf('garages') ?></span><?php endif; ?>
                        </p>
                    <?php endif; ?>
                 <?php if ( ds_get_cf('addnl_info') ) : ?><p class="post_listing_info2"><?php ds_cf('addnl_info') ?></p><?php endif; ?>
		         <?php if ( ds_listing_type(ds_get_cf('listing_type')) ) : ?><p class="post_listing_info"><strong>Type :</strong> <?php echo ds_listing_type(ds_get_cf('listing_type')); ?> | <strong>Status :</strong> <?php ds_cf('addnl_status') ?> </p><?php endif; ?>
                 <div class="post_preview_excerpt">
					 	<?php ds_custom_excerpt('', 290, 4); ?>
                 </div>
                <p class="post_info">Category: <?php the_category(', ') ?></p>
                <p class="post_info"><?php the_tags('Tags: ', ', ', ''); ?></p>
              </div>
              
              <p class="post_preview_readmore clear_fix" ><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>" class="png_fix fx_button_hover"><span class="hide_this">Read More</span></a></p>
              
            </li>
            
			<?php endwhile; ?>
        
        <?php else : ?>
        
        <div class="basic_style_1 error_mod">
        
            <h5>No posts found. Try a different search?</h5>
            
		</div>
        
        <?php endif; ?>

        </ul>
        
   		<?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
        
        </div>
        <!-- end: post_preview_wrapper -->
    
    <?php endif; //end if filter_listing_mode ?>
  
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