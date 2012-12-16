<?php get_header(); ?>
<?php include TEMPLATEPATH . '/listing-fields.php'; ?>
</div>
<!-- end : header -->

<!-- begin: content -->
<div id="content" class="clear_fix">
  
  <!-- begin: column_left -->
  <div id="column_left" class="list_style" >

	<?php 
	
	if ($_GET['s'] == 'QuickSearch') : //begin if filter_listing_mode
	
        $posts_per_page_blocks = 50;
        $posts_per_page_table =  50;
        
		$pladvsearchcatids = Array ();
		$pladvsearchcatnames = Array ();
		$sharedcatids = Array();
			
			foreach ($_GET['cat'] as &$pladvsearchcatvalue) {
				
				array_push($sharedcatids, $pladvsearchcatvalue);
				
				if ( $pladvsearchcatvalue != "-1" ) {

					array_push($pladvsearchcatids, $pladvsearchcatvalue);
			}
		}
		
        $pageposts = query_posts(array_merge(array( 'category__and' => $pladvsearchcatids )));

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
                <input type="hidden" name="cat[area]" value="<?php echo $sharedcatids[0]; ?>" />
                <input type="hidden" name="cat[building]" value="<?php echo $sharedcatids[1]; ?>" />
                <input type="hidden" name="cat[ext]" value="<?php echo $sharedcatids[2]; ?>" />
                <input type="hidden" name="cat[int]" value="<?php echo $sharedcatids[3]; ?>" />
                <input type="hidden" name="cat[sfeat]" value="<?php echo $sharedcatids[4]; ?>" />
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
            
                <h2 id="list_style_title" class="noline">Search Results</h2>
                
                <!-- begin: post_preview_wrapper -->
                <div class="post_preview_wrapper">
                <ul class="clear_fix">
            
                <?php while (have_posts()) : the_post(); //begin first while ?>

                        <li class="post_preview clear_fix">

                            <?php if ( has_post_thumbnail() ) : ?>
	                            <div class="image_frame_small_holder">
	                    			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	                        			<?php the_post_thumbnail('220x150'); ?>
		                            </a>
	                            </div>
                            <?php endif; ?>

							<div class="post_preview_content_list clear_fix">

                            <h2 class="post_preview_title" >
	                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
							<?php
							
					        $result_id_cats = array();
							
                            foreach((get_the_category()) as $category) { 
                                array_push($result_id_cats, $category->term_id);
                            } 
							
                            ?>
							
                            <?php if ( ( !cat_is_ancestor_of( (int)ds_get_ao('cat_blog_id'), (int)reset($result_id_cats) ) ) && ( ds_get_ao('cat_blog_id') != reset($result_id_cats) ) ) : ?>
                            
                            <?php endif; ?>

                            <div class="post_preview_excerpt">
			                 	
                            </div>

						  <div class="details_box_holder" >

                                <ul class="details_box clear_fix" >

										<?php if ( ds_get_cf('addnl_featured')
										
										 ) : ?>
										<li>
										
										  <span class="post_info_label">Featured in :</span>
										
                                        <p>
                                            <?php ds_cf('addnl_featured') ?>
                                        </p>
    								</li>
                                        <?php endif; ?>
                                	<li>

			                        <span class="post_info_label">Categories :</span>
									<p><?php the_category(', ') ?></p>

                                    </li>

									<li><?php the_tags('<p class="post_info_tags"><span class="post_info_label"> Tags:<span> ', ', ', '</p>'); ?></li>

                                </ul>

                            </div>

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
	                 <input type="hidden" name="cat[area]" value="<?php echo $sharedcatids[0]; ?>" />
		                <input type="hidden" name="cat[building]" value="<?php echo $sharedcatids[1]; ?>" />
		                <input type="hidden" name="cat[ext]" value="<?php echo $sharedcatids[2]; ?>" />
		                <input type="hidden" name="cat[int]" value="<?php echo $sharedcatids[3]; ?>" />
		                <input type="hidden" name="cat[sfeat]" value="<?php echo $sharedcatids[4]; ?>" />
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
                
	                  	<h2 id="list_style_title">Search Results</h2>
                
                        <!-- begin: archive_table -->
                        
                        <div class="archive_table" >
                    				 <ul class="archive_inside_body clear_fix">

											<?php if ( have_posts() ) : ?>
								               <?php while ( have_posts() ) : the_post(); ?>
									
									           <li class="post_preview">

								                    <div class="post_preview_content clear_fix">

								                    	<?php if ( has_post_thumbnail() ) { ?>
								                            <div class="image_frame_small_holder">
							                        			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
								                        			<?php the_post_thumbnail('220x150'); ?>
									                            </a>
								                            </div>
							                           <?php } else { ?>
							                           		 <div class="image_frame_small_holder">
							                           		 	<?php ds_timthumb_image( ds_get_cf('excerpt_image'), 220, 150, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt'); ?>
							                           		 </div>
							                            <?php } ?>

								                        <h2 class="post_preview_title"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php ds_custom_title(32); ?></a></h2>					                     
								                        <div class="details_box"><p><?php the_category(', '); ?></p>
								                        </div>

								                    </div>
								               </li>
								               <?php endwhile; ?>
								            <?php endif; ?>

								        </ul>
								
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
    
       	<h2 id="list_style_title">Search Results</h2>
        
        <!-- begin: post_preview_wrapper -->
        <div class="post_preview_wrapper">
        <ul class="clear_fix">
        
		<?php if (have_posts()) : ?>
        
            <?php while (have_posts()) : the_post(); ?>
        
	        <li class="post_preview">
           
			  <?php ds_timthumb_image( ds_get_cf('excerpt_image'), 180, 111, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt', 1);?>
              
              <h2 class="post_preview_title" ><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <div class="post_preview_content">
                 <p class="post_info"><img src="<?php bloginfo('template_url'); ?>/images/post_icon_time.gif" width="13" height="12" alt="Time and Date" /> <span><?php the_time('F jS, Y') ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_user.gif" width="11" height="12" alt="User" /> <span>by <?php the_author() ?></span> <img src="<?php bloginfo('template_url'); ?>/images/post_icon_comment.gif" width="14" height="12" alt="Comments" /> <span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></p>
               
                 <?php if ( ds_get_cf('addnl_info') ) : ?><p class="post_listing_info2"><?php ds_cf('addnl_info') ?></p><?php endif; ?>
		         <?php if ( ds_listing_type(ds_get_cf('listing_type')) ) : ?><p class="post_listing_info"><strong>Type :</strong> <?php echo ds_listing_type(ds_get_cf('listing_type')); ?> | <strong>Status :</strong> <?php ds_cf('addnl_featured') ?> </p><?php endif; ?>
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
        
            <h5>No locations found. Try a different search?</h5>
            
		</div>
        
        <?php endif; ?>

        </ul>
        
   		<?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
        
        </div>
        <!-- end: post_preview_wrapper -->
    
    <?php endif; //end if filter_listing_mode ?>
  
  </div>
  <!-- end: column_left -->
</div>
<!-- end: content -->

<?php get_footer(); ?>