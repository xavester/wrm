<div id="search_listings" class="roundify_8 png_fix">
  	<div id="search_listings_overlay">
	<h2 class="font_sansation">Search Listings</h2>
    <form  method="get" id="searchform2" action="<?php bloginfo('url'); ?>/">
    <input type="hidden" name="s" id="s2" class="s2" value="filter_listing_mode" />
    <ul class="clear_fix">
         <li>
         
			<?php
            $search_category = array(
             'id' => 'search_cat_list',
             'default_value' => 'None Selected',
            )
            ?>
             <?php
             
                echo '<select class="select_location" name="location" id="id_select_location" style="width: 140px;">';
                echo '<option value="">' . esc_attr($search_category['default_value']) . '</option>';
            
                   $categories =  get_categories( 'exclude=' . exclude_child_cats(ds_get_ao('cat_blog_id')) . ds_get_ao('location_exclude_categories') );
                   foreach ($categories as $cat) :
                   
                      $option = '<option value="' . $cat->cat_ID . '"';
                      
                      if ( $cat->cat_ID == $_GET['location'] ) :
                      
                         $option .= ' selected="selected">';
                         
                      else :
                      
                         $option .= ' >';
                         
                      endif;
                      
                      $option .= $cat->cat_name;
                      $option .= ' (' . $cat->category_count . ')';
                      $option .= '</option>';
                      echo $option;
                      
                   endforeach;
            
                  echo '</select>';
             
             ?>
         
         </li>
         <li>   
           
             <select name="listing_type" class="select_type" id="id_select_type" style="width: 150px;">
                <option value="rbutton_none" <?php if ($_GET['listing_type'] == 'rbutton_none' ) echo 'selected="selected"' ?> >Listing Type</option>
                <option value="rbutton_home_sale" <?php if ($_GET['listing_type'] == 'rbutton_home_sale' ) echo 'selected="selected"' ?> >Homes for Sale</option>
                <option value="rbutton_for_rent" <?php if ($_GET['listing_type'] == 'rbutton_for_rent' ) echo 'selected="selected"' ?> >Apartments for Rent</option>
                <option value="rbutton_foreclosure" <?php if ($_GET['listing_type'] == 'rbutton_foreclosure' ) echo 'selected="selected"' ?> >Foreclosures</option>
                <option value="rbutton_new_home" <?php if ($_GET['listing_type'] == 'rbutton_new_home' ) echo 'selected="selected"' ?> >New Homes</option>
             </select>
            
         </li>
         <li>   
            <select id="id_input_price_low" name="price_min" class="input_price_low">
              <option value="" <?php if ($_GET['price_min'] == '' ) echo 'selected="selected"' ?> >Minimum Price</option>
              <option value="250000" <?php if ($_GET['price_min'] == '250000' ) echo 'selected="selected"' ?> >250,000</option>
              <option value="300000" <?php if ($_GET['price_min'] == '300000' ) echo 'selected="selected"' ?> >300,000</option>
              <option value="350000" <?php if ($_GET['price_min'] == '350000' ) echo 'selected="selected"' ?> >350,000</option>
              <option value="400000" <?php if ($_GET['price_min'] == '400000' ) echo 'selected="selected"' ?> >400,000</option>
              <option value="450000" <?php if ($_GET['price_min'] == '450000' ) echo 'selected="selected"' ?> >450,000</option>
              <option value="500000" <?php if ($_GET['price_min'] == '500000' ) echo 'selected="selected"' ?> >500,000</option>
              <option value="600000" <?php if ($_GET['price_min'] == '600000' ) echo 'selected="selected"' ?> >600,000</option>
              <option value="700000" <?php if ($_GET['price_min'] == '700000' ) echo 'selected="selected"' ?> >700,000</option>
              <option value="800000" <?php if ($_GET['price_min'] == '800000' ) echo 'selected="selected"' ?> >800,000</option>
              <option value="900000" <?php if ($_GET['price_min'] == '900000' ) echo 'selected="selected"' ?> >900,000</option>
              <option value="1000000" <?php if ($_GET['price_min'] == '1000000' ) echo 'selected="selected"' ?> >1,000,000</option>
              <option value="1250000" <?php if ($_GET['price_min'] == '1250000' ) echo 'selected="selected"' ?> >1,250,000</option>
              <option value="1500000" <?php if ($_GET['price_min'] == '1500000' ) echo 'selected="selected"' ?> >1,500,000</option>
              <option value="2000000" <?php if ($_GET['price_min'] == '2000000' ) echo 'selected="selected"' ?> >2,000,000</option>
              <option value="2500000" <?php if ($_GET['price_min'] == '2500000' ) echo 'selected="selected"' ?> >2,500,000</option>
              <option value="3000000" <?php if ($_GET['price_min'] == '3000000' ) echo 'selected="selected"' ?> >3,000,000</option>
              <option value="3500000" <?php if ($_GET['price_min'] == '3500000' ) echo 'selected="selected"' ?> >3,500,000</option>
              <option value="4000000" <?php if ($_GET['price_min'] == '4000000' ) echo 'selected="selected"' ?> >4,000,000</option>
              <option value="4500000" <?php if ($_GET['price_min'] == '4500000' ) echo 'selected="selected"' ?> >4,500,000</option>
              <option value="5000000" <?php if ($_GET['price_min'] == '5000000' ) echo 'selected="selected"' ?> >5,000,000</option>
              <option value="5000001" <?php if ($_GET['price_min'] == '5000001' ) echo 'selected="selected"' ?> >Over 5,000,000</option>
            </select>
            
          </li>
          <li>  
            <select id="id_input_price_high" name="price_max" class="input_price_high">
              <option value="" <?php if ($_GET['price_max'] == '' ) echo 'selected="selected"' ?> >Maximum Price</option>
              <option value="250000" <?php if ($_GET['price_max'] == '250000' ) echo 'selected="selected"' ?> >250,000</option>
              <option value="300000" <?php if ($_GET['price_max'] == '300000' ) echo 'selected="selected"' ?> >300,000</option>
              <option value="350000" <?php if ($_GET['price_max'] == '350000' ) echo 'selected="selected"' ?> >350,000</option>
              <option value="400000" <?php if ($_GET['price_max'] == '400000' ) echo 'selected="selected"' ?> >400,000</option>
              <option value="450000" <?php if ($_GET['price_max'] == '450000' ) echo 'selected="selected"' ?> >450,000</option>
              <option value="500000" <?php if ($_GET['price_max'] == '500000' ) echo 'selected="selected"' ?> >500,000</option>
              <option value="600000" <?php if ($_GET['price_max'] == '600000' ) echo 'selected="selected"' ?> >600,000</option>
              <option value="700000" <?php if ($_GET['price_max'] == '700000' ) echo 'selected="selected"' ?> >700,000</option>
              <option value="800000" <?php if ($_GET['price_max'] == '800000' ) echo 'selected="selected"' ?> >800,000</option>
              <option value="900000" <?php if ($_GET['price_max'] == '900000' ) echo 'selected="selected"' ?> >900,000</option>
              <option value="1000000" <?php if ($_GET['price_max'] == '1000000' ) echo 'selected="selected"' ?> >1,000,000</option>
              <option value="1250000" <?php if ($_GET['price_max'] == '1250000' ) echo 'selected="selected"' ?> >1,250,000</option>
              <option value="1500000" <?php if ($_GET['price_max'] == '1500000' ) echo 'selected="selected"' ?> >1,500,000</option>
              <option value="2000000" <?php if ($_GET['price_max'] == '2000000' ) echo 'selected="selected"' ?> >2,000,000</option>
              <option value="2500000" <?php if ($_GET['price_max'] == '2500000' ) echo 'selected="selected"' ?> >2,500,000</option>
              <option value="3000000" <?php if ($_GET['price_max'] == '3000000' ) echo 'selected="selected"' ?> >3,000,000</option>
              <option value="3500000" <?php if ($_GET['price_max'] == '3500000' ) echo 'selected="selected"' ?> >3,500,000</option>
              <option value="4000000" <?php if ($_GET['price_max'] == '4000000' ) echo 'selected="selected"' ?> >4,000,000</option>
              <option value="4500000" <?php if ($_GET['price_max'] == '4500000' ) echo 'selected="selected"' ?> >4,500,000</option>
              <option value="5000000" <?php if ($_GET['price_max'] == '5000000' ) echo 'selected="selected"' ?> >5,000,000</option>
              <option value="5000001" <?php if ($_GET['price_max'] == '5000001' ) echo 'selected="selected"' ?> >Over 5,000,000</option>
            </select>
          </li>
          <li>  
            <select name="bedrooms" class="select_bedrooms" id="id_select_bedrooms">
                <option value="0" <?php if ($_GET['bedrooms'] == 0 ) echo 'selected="selected"' ?> >Bedrooms</option>
                <option value="1" <?php if ($_GET['bedrooms'] == 1 ) echo 'selected="selected"' ?> >1+</option>
                <option value="2" <?php if ($_GET['bedrooms'] == 2 ) echo 'selected="selected"' ?> >2+</option>
                <option value="3" <?php if ($_GET['bedrooms'] == 3 ) echo 'selected="selected"' ?> >3+</option>
                <option value="4" <?php if ($_GET['bedrooms'] == 4 ) echo 'selected="selected"' ?> >4+</option>
                <option value="5" <?php if ($_GET['bedrooms'] == 5 ) echo 'selected="selected"' ?> >5+</option>
            </select>
          </li>
          <li>
            <select name="bathrooms" class="select_bathrooms" id="id_select_bathrooms">
                <option value="0" <?php if ($_GET['bathrooms'] == 0 ) echo 'selected="selected"' ?> >Bathrooms</option>
                <option value="1" <?php if ($_GET['bathrooms'] == 1 ) echo 'selected="selected"' ?> >1+</option>
                <option value="2" <?php if ($_GET['bathrooms'] == 2 ) echo 'selected="selected"' ?> >2+</option>
                <option value="3" <?php if ($_GET['bathrooms'] == 3 ) echo 'selected="selected"' ?> >3+</option>
                <option value="4" <?php if ($_GET['bathrooms'] == 4 ) echo 'selected="selected"' ?> >4+</option>
            </select>
          </li>
          <li>
            <select id="id_select_garage" class="select_garage" name="garage">
                <option value="0" <?php if ($_GET['garage'] == 0 ) echo 'selected="selected"' ?> >Garage</option>
                <option value="1" <?php if ($_GET['garage'] == 1 ) echo 'selected="selected"' ?> >1+</option>
                <option value="2" <?php if ($_GET['garage'] == 2 ) echo 'selected="selected"' ?> >2+</option>
                <option value="3" <?php if ($_GET['garage'] == 3 ) echo 'selected="selected"' ?> >3+</option>
                <option value="4" <?php if ($_GET['garage'] == 4 ) echo 'selected="selected"' ?> >4+</option>
            </select>
          </li>
          <li class="button_filter_listing">
	       <input type="hidden" name="view" value="<?php echo $_GET['view']; ?>" />
            <button type="submit" value="Start Searching" id="start_search_button" class="searchButton fx_button_hover2 png_fix" >
	            <span class="hide_this">Start Searching</span>
            </button>
          </li>
    </ul>
    </form>
     <div id="search_listings_close" class="fx_button_hover2"><a href="#"><span class="hide_this">Close Search Listings</span></a></div>
    </div>
</div>