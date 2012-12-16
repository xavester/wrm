	
    <?php
	
	if ( ds_get_ao('search_listing') == 'true' ) :
	
		if ($_GET['s'] == 'filter_listing_mode') : ?>
		
			 
			<?php else : ?>
			 
			 
			 
			<?php
		
		endif;
	
	endif;
	
	?>
     
     <div class="sidebar_home sidebar_style_1">
        <!-- begin: widgetHolder -->
        <ul id="widgetHolder">
            <li>
                <div id="sidebar_tab1" class="roundify_8">
                
                    <ul class="tabs-nav clear_fix">
                        <li><a href="#tab-1"><span>Popular Posts</span></a></li>
                        <li><a href="#tab-2"><span>Recent Comments</span></a></li>
                    </ul>
                    
                    <div id="tab-1" class="tabs-container">
                    
                        <ul id="top_post">
                        
                        	<?php echo ds_popular_post(5); ?>
                        
                        </ul>
                        
                    </div>
                    
                    <div id="tab-2" class="tabs-container">
                    
                        <ul id="recent_comments">
                        
							<?php ds_recent_comments(5) ?>
                        
                        </ul>
                        
                    </div>
                    
                </div>
            </li>
            
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
            
                <li class="clearFix widget widget_pages">
                    <h3 class="widgettitle">Pages</h3>
                    <ul>
                    <?php wp_list_pages('title_li='); ?>
                    </ul>
                </li>
                <li class="clearFix widget widget_categories">
                    <h3 class="widgettitle">Archives</h3>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                </li>
                <li class="clearFix widget widget_categories">
                    <h3 class="widgettitle">Categories</h3>
                    <ul>
	                    <?php wp_list_categories('title_li='); ?>
                    </ul>
                </li>
                
			<?php endif; ?>
            
        </ul>
        <!-- end: widgetHolder -->
        
     </div>
