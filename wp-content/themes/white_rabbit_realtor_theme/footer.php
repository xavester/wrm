<!-- begin: footer -->
<div id="footer">
<div id="footer_overlay" class="png_fix">
        
        <div id="footer_bellow">
		
			<?php
		
			if ( function_exists( 'wp_nav_menu' ) ) :
			
				wp_nav_menu( 'theme_location=header-menu&container=&menu_id=footer_nav&menu_class=clear_fix&depth=1&fallback_cb=menu_fb_footer' );
				
			else :
				
				menu_fb_footer();
			
			endif;
			
			function menu_fb_footer() {
		
			?>
		
				<ul id="footer_nav" class="clear_fix">
				  
					<li<?php if ( is_home() ) : ?> class="current_page_item"<?php endif; ?>><a href="<?php bloginfo( 'url' ); ?>" >Home</a></li>
						
						<?php
						
							 $args = array(
								'orderby' => 'parent',
								'post_type' => 'page',
								'post_parent' => 0,
								'exclude' => ds_get_ao('cat_blog_id') . ',' . ds_get_ao('contact_us_id'),
						);
						
						$pages = get_posts($args);
						foreach($pages as $page)
						{
						$out .=  ' <li> <a href="' . get_permalink($page->ID) . '" >' . wptexturize($page->post_title) . '</a> </li>';
						}
						
						echo $out;
						unset($out);
						
						?>
					
					<?php if ( ( ds_get_ao('cat_blog_id') != '' ) && ( ds_get_ao('cat_blog_id') != 'None Selected' ) ) :  // show the blog button ?>
					
						<?php if ( is_category(ds_get_ao('cat_blog_id')) ) $test_blog = reset(get_the_category($post->ID))->cat_ID; ?>
									 
						<li<?php if ( (is_category(ds_get_ao('cat_blog_id'))) || (post_is_in_descendant_category(ds_get_ao('cat_blog_id'))) || ($test_blog == ds_get_ao('cat_blog_id')) ) : ?> class="current_page_item"<?php endif; ?>>
						   
							  <a href="<?php echo get_category_link(ds_get_ao('cat_blog_id')); ?>" ><?php echo get_cat_name(ds_get_ao('cat_blog_id')); ?></a>
							  
						</li>
					
					<?php endif; ?>
				  
				</ul>
			
			<?php
			
			}
		
		   ?>
            
            <p id="footer_copyright"><?php ds_ao('footer_copyright'); ?></p>
             
        </div>

</div>
</div>
<!-- end: footer -->
<div class="clear"></div>
</div>
<script type="text/javascript"> Cufon.now(); </script>

<?php ds_ao('google_analytics'); ?>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>