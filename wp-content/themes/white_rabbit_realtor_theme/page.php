<?php get_header(); ?>
<div class="glm"><a href="http://golm.org.uk/" title="Link to the Guild of Location Managers">
				<img src="/wp-content/uploads/GLM-logo-2010-AFFILIATE.png" alt="the Guild of Location Managers" width="115" height="90">
			</a></div>
</div>
<!-- end : header -->


<!-- begin: content -->
<div id="content" class="clear_fix">
  
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

	       

     <!-- end: sidebar_home -->
  </div>
  <!-- end: column_right -->
</div>
<!-- end: content -->

<?php get_footer(); ?>