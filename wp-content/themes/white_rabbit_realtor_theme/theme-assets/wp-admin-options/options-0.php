<?php

//General Admin Options

$ds_prepare_theme_options = array (
	
	array(
		'type' => 'open'
	),
	array(
		'name' => 'General Options',
		'type' => 'options_title'
	),
	array(
		'name' => 'Number of Recent Post in Locations Page',
		'desc' => 'How many post that you want to display on the recent posts section in the location section',
		'id' => $ds_theme_key . 'recent_post_qty',
		'type' => 'type_recent_post_qty',
		'default_value' => ''
	),
	
	array(
		'name' => 'Blog Setup',
		'desc' => 'Select your blog category on this list to enable the blog functionality of the theme, you can <a href="edit-tags.php?taxonomy=category">create your category blog here</a>',
		'id' => $ds_theme_key . 'cat_blog_id',
		'type' => 'type_blog_cat',
		'default_value' => 'None Selected'
	),
	array(
		'name' => 'Media Setup',
		'desc' => 'Select your media category on this list to enable the media functionality of the theme, you can <a href="edit-tags.php?taxonomy=category">create your category media here</a>',
		'id' => $ds_theme_key . 'cat_media_id',
		'type' => 'type_media_cat',
		'default_value' => 'None Selected'
	),
	
	array(
		'name' => 'Number of Recent Post in Media Page',
		'desc' => 'How many post that you want to display on the recent posts section in the media section',
		'id' => $ds_theme_key . 'recent_post_qty',
		'type' => 'type_m_recent_post_qty',
		'default_value' => ''
	),
	
	array(
		'name' => 'Media HomePage Articles',
			'desc' => 'Select your media category to show on the home page of the media section (standard media_front), you can <a href="edit-tags.php?taxonomy=category">create your category media here</a>',
		'id' => $ds_theme_key . 'cat_front_id',
		'type' => 'type_front_cat',
		'default_value' => 'None Selected'
	),
	
	array(
		'name' => 'Media Section 1',
		'desc' => 'Select the category for section 1 on media pages, you can <a href="edit-tags.php?taxonomy=category">create your category media here</a>',
		'id' => $ds_theme_key . 'cat_ms1_id',
		'type' => 'type_ms1_cat',
		'default_value' => 'None Selected'
	),
	
	array(
		'name' => 'Media Section 2',
		'desc' => 'Select the category for section 2 on media pages, you can <a href="edit-tags.php?taxonomy=category">create your category media here</a>',
		'id' => $ds_theme_key . 'cat_ms2_id',
		'type' => 'type_ms2_cat',
		'default_value' => 'None Selected'
	),
	
	array(
		'name' => 'Media Section 3',
		'desc' => 'Select the category for section 3 on media pages, you can <a href="edit-tags.php?taxonomy=category">create your category media here</a>',
		'id' => $ds_theme_key . 'cat_ms3_id',
		'type' => 'type_ms3_cat',
		'default_value' => 'None Selected'
	),
	
	array(
		'name' => 'Media Section 4',
		'desc' => 'Select the category for section 4 on media pages, you can <a href="categories.php">create your category media here</a>',
		'id' => $ds_theme_key . 'cat_ms4_id',
		'type' => 'type_ms4_cat',
		'default_value' => 'None Selected'
	),

	array(
		'name' => 'Setup Contact Us Page',
		'desc' => 'Please select your contact us page on this list if you created one',
		'id' => $ds_theme_key . 'contact_us_id',
		'type' => 'type_contact_us_id',
		'default_value' => 'None Selected'
	),
	array(
		'name' => 'Search Listing Functionality',
		'desc' => 'Check this box if you want to enable the search listing section on the theme sidebar',
		'id' => $ds_theme_key . 'search_listing',
		'type' => 'type_search_listing',
		'default_value' => 'true'
	),
	array(
		'name' => 'Area Parent Category',
		'desc' => 'Input the category ID of the area category',
		'id' => $ds_theme_key . 'location_include_categories',
		'type' => 'type_location_include_categories',
		'default_value' => ''
	),
	array(
		'name' => 'Building Type Parent Category',
		'desc' => 'Input the category ID of the building type category',
		'id' => $ds_theme_key . 'building_include_categories',
		'type' => 'type_building_include_categories',
		'default_value' => ''
	),
	array(
		'name' => 'Exterior Style Parent Category',
		'desc' => 'Input the category ID of the exterior style category',
		'id' => $ds_theme_key . 'exterior_include_categories',
		'type' => 'type_exterior_include_categories',
		'default_value' => ''
	),
	array(
		'name' => 'Interior Style Parent Category',
		'desc' => 'Input the category ID of the interior style category',
		'id' => $ds_theme_key . 'interior_include_categories',
		'type' => 'type_interior_include_categories',
		'default_value' => ''
	),
	array(
		'name' => 'Special Features Parent Category',
		'desc' => 'Input the category ID of the interior style category',
		'id' => $ds_theme_key . 'special_include_categories',
		'type' => 'type_special_include_categories',
		'default_value' => ''
	),
	array(
		'name' => 'Facebook Link ID',
		'desc' => 'Input your facebook ID here, here is a simple <a href="http://www.ehow.com/how_5753004_facebook-id.html" target="_blank">instruction to get your facebook id</a>',
		'id' => $ds_theme_key . 'facebook_id',
		'type' => 'facebook_id',
		'default_value' => ''
	),
	array(
		'name' => 'Google Analytics',
		'desc' => 'Place your Google analytics script here (learn more about <a href="http://www.google.com/analytics/" target="_blank">google analytics</a>)',
		'id' => $ds_theme_key . 'google_analytics',
		'type' => 'type_google_analytics',
		'default_value' => ''
	),
	array(
		'name' => 'Google Map API',
		'desc' => 'The location map needs an API key in order to work correctly, <a href="http://code.google.com/apis/maps/signup.html" target="_blank">please visit this site</a> to get your own Google Map API and paste your Google Map API here',
		'id' => $ds_theme_key . 'google_map_api',
		'type' => 'type_google_map_api',
		'default_value' => ''
	),
	array(
		'type' => 'close'
	)

);

function ds_write_theme_options() {

   global $ds_prepare_theme_options;
	
	?>
	
   <div class="wrap">
   
	<form method="post">
	
	<?php
	
	foreach ($ds_prepare_theme_options as $value) :
	
		switch ( $value['type'] ) :		
	
			case 'open':
				?><ul class="ds_admin">
            
            <?php

				if ( $_REQUEST['reset'] ) echo '<li><div id="message" class="updated fade"><p><strong>Settings Reset.</strong></p></div></li>';
				if ( $_REQUEST['saved'] ) echo '<li><div id="message" class="updated fade"><p><strong>Settings Saved.</strong></p></div></li>';
				
				?>
            
				<?php
			break;
			
			case 'options_title':
				?>
				<li>
				<div class="icon32" id="icon-options-general"><br/></div>
				<h2><?php echo $value['name']; ?></h2>
            </li>
				<?php
			break;
			
			case 'type_currency':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
	            </li>
            
				<?php
			break;
			
			case 'type_blog_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;
			
			case 'type_media_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;
			
			case 'type_front_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;
			
			case 'type_ms1_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;
			
			case 'type_ms2_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;case 'type_ms3_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;case 'type_ms4_cat':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                <li>
    
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_category_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
                </li>
                
				<?php
			break;
			
			
			case 'type_contact_us_id':
				?>
			
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
			
				<li>
			
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <?php ds_get_page_list($value['id'], $value['default_value']); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
				
				</li>
				
				<?php
			break;
			
			case 'type_recent_post_qty':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
	            </li>
            
				<?php
			break;
			
			case 'type_search_listing':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

				<h3><?php echo $value['name']; ?></h3>
            
                <?php
				
				echo '<input type="checkbox" value="check1" name="sample" id="cbutton1" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.checked;"';
				if ( get_option($value['id']) == "true" ) { echo ' checked="checked">'; } else { echo ' />'; }
				echo ' <label for="cbutton1">' . $value['desc'] . '</label>';
		
				?>
            
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>"/>
                
				<?php
			break;
			
			case 'type_location_include_categories':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

				<h3><?php echo $value['name']; ?></h3>
            
	   			<p><?php echo $value['desc']; ?></p>
            
				<p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
            </li>

			<?php
		break;
		
		case 'type_building_include_categories':
			?>
        
            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
        
			<li>

			<h3><?php echo $value['name']; ?></h3>
        
   			<p><?php echo $value['desc']; ?></p>
        
			<p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
        
        </li>

			<?php
		break;
		
		case 'type_exterior_include_categories':
			?>
        
            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
        
			<li>

			<h3><?php echo $value['name']; ?></h3>
        
   			<p><?php echo $value['desc']; ?></p>
        
			<p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
        
        </li>
		
		<?php
	break;
	
	case 'type_interior_include_categories':
		?>
    
        <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
    
		<li>

		<h3><?php echo $value['name']; ?></h3>
    
		<p><?php echo $value['desc']; ?></p>
    
		<p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
    
    </li>

		<?php
	break;
	
	case 'type_special_include_categories':
		?>
    
        <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
    
		<li>

		<h3><?php echo $value['name']; ?></h3>
    
		<p><?php echo $value['desc']; ?></p>
    
		<p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
    
    </li>
		
            
				<?php
			break;
			
			case 'facebook_id':
				?>

				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><label for="<?php echo $value['id']; ?>">Facebook ID </label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'type_google_analytics':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><textarea name="<?php echo $value['id']; ?>" cols="55" rows="5"><?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?></textarea></p>
            
	            </li>
            
				<?php
			break;
			
			case 'close':
				?></ul><?php
			break;
			
			case 'type_google_map_api':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><textarea name="<?php echo $value['id']; ?>" cols="55" rows="5"><?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?></textarea></p>
            
	            </li>
            
				<?php
			break;
			
			case 'close':
				?></ul><?php
			break;
		
		endswitch;
		
	endforeach;
	
	?>
    
    <p class="submit" style="float: left;">
        <input name="save" type="submit" value="Save changes" class="button-primary" />
        <input type="hidden" name="action" value="save" />
    </p>
    
	</form>
   
	<form method="post">
    <p class="submit" style="float: left;">
        <input name="reset" type="submit" value="Reset"/>
        <input type="hidden" name="action" value="reset" />
    </p>
	</form>
    
	</div>
	
	<?php
	
}

function ds_put_theme_options_in_sidebar() {

    global $ds_prepare_theme_options;

		if ( $_GET['page'] == 'functions.php' ) :
		
			if ( 'save' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options as $value ) :
					update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
				endforeach;
			
				foreach ( $ds_prepare_theme_options as $value ) :
					if ( isset( $_REQUEST[ $value['id'] ] ) ) :
						update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
					else :
						delete_option( $value['id'] );
					endif;
				endforeach;
			
				header('Location: admin.php?page=functions.php&saved=true');
				die;
			
			elseif ( 'reset' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options as $value ) :
					delete_option( $value['id'] );
				endforeach;
			

				header('Location: admin.php?page=functions.php&reset=true');
				die;
			
			endif;
			
		endif;
	
	add_menu_page( 'General Options', 'Theme Editor', 8, 'functions.php', 'ds_write_theme_options' );
	add_submenu_page( 'functions.php', 'General Options', 'General Options', 8, 'functions.php', 'ds_write_theme_options' );
	
}

add_action('admin_menu', 'ds_put_theme_options_in_sidebar');

?>