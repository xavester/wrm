<!-- begin: footer -->
<div id="footer">
<div id="footer_overlay" class="png_fix">

		<ul id="footer_wrapper" class="clear_fix">
        
			  <li id="footer_about" class="footer_section">
                <h3 class="footer_header_left png_fix"><span class="footer_header_right png_fix"><?php ds_ao('info_block_left_title'); ?></span></h3>
                <div class="about_us_content">
	                <?php ds_custom_excerpt(ds_get_ao('info_block_left_content'),400,3); ?>
                </div>
                <p class="about_us_readmore"><a href="<?php echo get_page_link(ds_get_ao('info_block_left_link')); ?>" class="png_fix fx_button_hover"><span class="hide_this">Read More</span></a></p>
              </li>
              
			  <li class="footer_section">
                <h3 class="footer_header_left header_white_left png_fix"><span class="footer_header_right header_white_right png_fix">Contact Us</span></h3>
                <div class="quick_contact_content">
                    <div id="form_result"></div>
                    <form action="<?php bloginfo('template_url'); ?>/theme-assets/php/contact-processor.php" method="post" id="quick_contact">
                    <ul id="footer_contact">
                        <li class="input_name">
                           <label for="id_name">Name : </label>
                           <input type="text" id="id_name" name="input_name" class="png_fix" />
                        </li>
                        <li class="input_email">
                           <label for="id_email">Email : </label>
                           <input type="text" id="id_email" name="input_email" class="png_fix" />
                        </li>
                        <li class="input_message">
                           <label for="id_message">Message : </label>
                           <textarea id="id_message" name="textarea_message" rows="" cols="" class="png_fix" ></textarea>
                        </li>
                        <li>
                        <button type="submit" id="id_send" name="button_send" class="button_send fx_button_hover png_fix" >
                           <span class="hide_this">Send</span>
                        </button>
                        <input type="hidden" name="input_admin_email" value="<?php ds_ao('email_recipient'); ?>" />
                        <input type="hidden" name="email_thankyou_header" value="<?php ds_ao('email_thankyou_header'); ?>" />
                        <input type="hidden" name="email_thankyou_message" value="<?php ds_ao('email_thankyou_message'); ?>" />
                        <input type="hidden" name="email_failed_header" value="<?php ds_ao('email_failed_header'); ?>" />
                        </li>
                    </ul>
                    </form>
                </div>
              </li>       
              
			  <li id="footer_tab1" class="footer_section">

                    <ul class="tabs-nav clear_fix">
                        <li class="footer_tab_left">
			                <a href="#tab-footer-1">Recent Twits</a>
                        </li>
                        <li class="footer_tab_right">
			                <a href="#tab-footer-2">Flickr Photos</a>
                        </li>
                    </ul>
                    <div id="tab-footer-1" class="tabs-container tabs-container-mod">
                    
		                <p class="footer_twitter_follow"><a href="#" class="png_fix fx_button_hover"><span class="hide_this">Follow</span></a></p>
                        
                    </div>
                    <div id="tab-footer-2" class="tabs-container tabs-container-mod">
                    
                        <div class="flickr clear_fix" id="footer_flickr">
                          
                        </div>
                        
                        <p class="footer_flickr_viewmore"><a href="#" class="png_fix fx_button_hover"><span class="hide_this">View More</span></a></p>

                    </div>

              </li>
        	
        </ul>
        
        <div id="footer_divider"></div>
        
        <div id="footer_bellow">
		
			<?php
		
			if ( function_exists( 'wp_nav_menu' ) ) :
			
				wp_nav_menu( 'theme_location=footer-menu&container=&menu_id=footer_nav&menu_class=clear_fix&depth=1&fallback_cb=menu_fb_footer' );
				
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
					
					<?php if ( ( ds_get_ao('contact_us_id') != '' ) && ( ds_get_ao('contact_us_id') != 'None Selected' ) ) : ?>
					 
						<li<?php if( is_page(ds_get_ao('contact_us_id') ) ) : ?> class="current_page_item"<?php endif; ?>><a href="<?php echo get_page_link(ds_get_ao('contact_us_id')); ?>" ><?php echo get_the_title(ds_get_ao('contact_us_id')); ?></a></li>
					
					<?php endif; ?>
				  
				</ul>
			
			<?php
			
			}
		
		   ?>
            
            <p id="footer_copyright"><?php ds_ao('footer_copyright'); ?></p>
			
			<?php
			
			if ( ds_get_ao('custom_dev_enable') == 'true' ) :
			
			$theme_name = 'Modern Realtor';
			$theme_name_link = 'http://themeforest.net/item/modern-realtor/96613';
			$theme_developer = 'Themespike';
			$theme_developer_link = 'http://www.themespike.com';
			
			?>
			
			<p id="client_section"><a href="<?php echo $theme_name_link; ?>" target="_blank"><?php echo $theme_name; ?></a> by <a href="<?php echo $theme_developer_link; ?>" target="_blank"><?php echo $theme_developer; ?></a>, Customized by <a href="<?php ds_ao('custom_dev_link'); ?>" target="_blank"><?php ds_ao('custom_dev_name'); ?></a></p>
			
			<?php endif; ?>
            
            <h3 id="footer_logo" class="png_fix">
                <a href="<?php echo get_option('home'); ?>/"><span class="hide_this"><?php bloginfo('name'); ?></span></a>
            </h3>
             
        </div>

</div>
</div>
<!-- end: footer -->

<script type="text/javascript"> Cufon.now(); </script>

<?php ds_ao('google_analytics'); ?>

</body>
</html>