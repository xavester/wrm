<div id="search_listings" class="roundify_8 png_fix">
  	<div id="search_listings_overlay">
	<h2>Quick Search</h2>
   
 <form  method="get" id="searchform2" action="<?php bloginfo('url'); ?>/">
    <input type="hidden" name="s" id="s2" class="s2" value="QuickSearch" />

	<?php
    $search_category = array(
     'id' => 'search_cat_list',
     'default_value_1' => 'Area',
	 'default_value_2' => 'Building type',
	 'default_value_3' => 'Exterior style',
	 'default_value_4' => 'Interior style',
	 'default_value_5' => 'Special features',
    )
    ?>

    <ul class="clear_fix">
         <li>
			
			<?php wp_dropdown_categories('child_of='.ds_get_ao('location_include_categories').'&show_option_none='.esc_attr($search_category['default_value_1']).'&hide_empty=1&name=cat[area]&show_count=1'); ?>
             
         
         </li>
		<li>
			<?php wp_dropdown_categories('child_of='.ds_get_ao('building_include_categories').'&show_option_none='.esc_attr($search_category['default_value_2']).'&hide_empty=1&name=cat[building]&show_count=1'); ?>

         </li>
		
		<li>
			
			<?php wp_dropdown_categories('child_of='.ds_get_ao('exterior_include_categories').'&show_option_none='.esc_attr($search_category['default_value_3']).'&hide_empty=0&name=cat[ext]&show_count=1'); ?>

         </li>

		<li>

		<?php wp_dropdown_categories('child_of='.ds_get_ao('interior_include_categories').'&show_option_none='.esc_attr($search_category['default_value_4']).'&hide_empty=0&name=cat[int]&show_count=1'); ?>
		            
		</li>
		
		<li>
		
		<?php wp_dropdown_categories('child_of='.ds_get_ao('special_include_categories').'&show_option_none='.esc_attr($search_category['default_value_5']).'&hide_empty=1&name=cat[sfeat]&show_count=1'); ?>

	
		</li>
			
		 <!--<li>
		 	
			<h3>Code</h3>
			  <?php $temp_sq = esc_attr(apply_filters('the_search_query', get_search_query())) ?>
			<input type="text" id="code" name="code" value="<?php if (($temp_sq == '') || ($_GET['s'] == 'filter_listing_mode')) : echo ''; else : echo $temp_sq; endif; ?>"  class="fx_input_field" />
		
		 </li>-->
		

          <li class="button_filter_listing">
	       <input type="hidden" name="view" value="<?php echo $_GET['view']; ?>" />
            <button type="submit" value="Start Searching" id="start_search_button" class="searchButton png_fix" >
	            Search
            </button>
          </li>
    </ul>
    </form>
	
 </div>
	
</div><!-- end #search_listings -->


