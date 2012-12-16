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
  
                <div class="basic_style_1">

                    <h2 id="single_page_title"><?php the_title(); ?></h2>
                    
					<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>                    
                    
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    
                </div>
                
				<?php if ( get_edit_post_link() ) : ?><p id="single_page_edit"><a href="<?php echo get_edit_post_link(); ?>" class="png_fix fx_button_hover post-edit-link"><span class="hide_this">Edit this entry</span></a></p><?php endif; ?>
            
            <?php endwhile; ?>
            
        <?php else : ?>            
        
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