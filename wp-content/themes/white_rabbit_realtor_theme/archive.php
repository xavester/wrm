<?php get_header(); ?>
<?php include TEMPLATEPATH . '/listing-fields.php'; ?>
</div>
<!-- end : header -->

<!-- begin: content -->
<div id="content" class="clear_fix">
	
  <!-- begin: column_left -->
  <div id="column_left" class="list_style" >
	

  <!-- begin: main_content_bar -->
  <div id="main_content_bar" class="clear_fix">
    
	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) : ?>
		<h2 id="main_content_bar_title">Search Term : <?php single_cat_title(); ?></h2>
		<?php /* If this is a tag archive */ elseif( is_tag() ) : ?>
		<h2 id="main_content_bar_title">Posts Tagged <?php single_tag_title(); ?></h2>
		<?php /* If this is a daily archive */ elseif (is_day()) : ?>
		<h2 id="main_content_bar_title">Archive for <?php the_time('F jS, Y'); ?> </h2>
		<?php /* If this is a monthly archive */ elseif (is_month()) : ?>
		<h2 id="main_content_bar_title">Archive for <?php the_time('F, Y'); ?> </h2>
		<?php /* If this is a yearly archive */ elseif (is_year()) : ?>
		<h2 id="main_content_bar_title">Archive for <?php the_time('Y'); ?> </h2>
		<?php /* If this is an author archive */ elseif (is_author()) : ?>
		<h2 id="main_content_bar_title">Author Archive</h2>
		<?php /* If this is a paged archive */ elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
		<h2 id="main_content_bar_title">Blog Archives</h2> <?php endif; ?>
	
	<?php endif; ?>

  </div>
  <!-- end: main_content_bar -->
       
        <!-- begin: post_preview_wrapper -->
        <div class="post_preview_wrapper">

            <ul class="clear_fix">
            
				<?php if (have_posts()) : ?>
            
                    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                    
                    <?php while (have_posts()) : the_post(); ?>
                    
                       <li class="post_preview clear_fix">
                          
                           	<?php if ( ds_get_cf('excerpt_image') ) : ?>

                            <div class="image_frame_smaller_holder">

                                <div class="image_frame_smaller png_fix"></div>
                                <?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('160x120');
								} else {
	                                ds_timthumb_image( ds_get_cf('excerpt_image'), 160, 120, get_the_title(),'/images/sample-thumb-default.jpg', 'post_preview_img_excerpt');
								} ?>
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
                            
								 

									<div class="post_preview_excerpt">
					                 	 <?php ds_custom_excerpt('', 140, 1); ?>
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

					  <?php endif; ?>
                    
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
</div>
<!-- end: content -->

<?php get_footer(); ?>