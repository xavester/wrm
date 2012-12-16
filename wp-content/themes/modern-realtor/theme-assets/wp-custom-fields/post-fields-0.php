<?php

$ds_prepare_custom_fields = array (
	array(
		'name' => 'Excerpt Image',
		'desc' => 'Using the <a href="upload.php" target="_blank">media library</a>, upload an image and paste the file URL here. This is the post excerpt image and it will automatically be resized.',
		'id' => $ds_custom_field_key . 'excerpt_image',
		'type' => 'cf_excerpt_image',
		'default_value' => ''
	),
	array(
		'name' => 'Price',
		'desc' => 'Input Price',
		'id' => $ds_custom_field_key . 'price',
		'type' => 'cf_price',
		'default_value' => ''
	),
	array(
		'name' => 'Price Suffix',
		'desc' => 'Input Price Suffix (e.g. / Month) ',
		'id' => $ds_custom_field_key . 'price_suffix',
		'type' => 'cf_price_suffix',
		'default_value' => ''
	),
	array(
		'name' => 'Bedrooms',
		'desc' => 'How many bedrooms',
		'id' => $ds_custom_field_key . 'bedrooms',
		'type' => 'cf_bedrooms',
		'default_value' => ''
	),
	array(
		'name' => 'Bathrooms',
		'desc' => 'How many bathrooms',
		'id' => $ds_custom_field_key . 'bathrooms',
		'type' => 'cf_bathrooms',
		'default_value' => ''
	),
	array(
		'name' => 'Garage',
		'desc' => 'How many garages',
		'id' => $ds_custom_field_key . 'garages',
		'type' => 'cf_garages',
		'default_value' => ''
	),
	array(
		'name' => 'Listing Type',
		'desc' => 'Select a Listing Type',
		'id' => $ds_custom_field_key . 'listing_type',
		'type' => 'cf_listing_type',
		'default_value' => 'rbutton_none'
	),
	array(
		'name' => 'Additional Information',
		'desc' => 'Input additional information',
		'id' => $ds_custom_field_key . 'addnl_info',
		'type' => 'cf_addnl_info',
		'default_value' => ''
	),
	array(
		'name' => 'Status',
		'desc' => 'Post Status',
		'id' => $ds_custom_field_key . 'addnl_status',
		'type' => 'cf_addnl_status',
		'default_value' => ''
	),
	array(
		'name' => 'Address',
		'desc' => 'Input address for the google map rendering',
		'id' => $ds_custom_field_key . 'addnl_map',
		'type' => 'cf_addnl_map',
		'default_value' => ''
	)
);

function ds_write_custom_fields() {

	global $post, $ds_prepare_custom_fields;
	
	echo'
	
		<table cellspacing="0" id="inactive-plugins-table" style="width: 100%;">
		
			<tbody>
			
			';
	
			foreach ( $ds_prepare_custom_fields as $custom_field ) :
				
				switch ( $custom_field['type'] ) :
				
					case 'cf_excerpt_image':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                  <tr>
                  
                     <td colspan="4">
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <?php $testPrice = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                        
                        <p> <input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
                    
                  </tr>
                  
						<?php
					break;
				
			
					case 'cf_price':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                  <tr>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?> <?php if ( ds_get_ao('currency') != '' ) : ?> ( <?php ds_ao('currency'); ?> ) <?php endif; ?></p>
                        
                        <?php $testPrice = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                        
                        <p> <input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo number_format($temp, 2); } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
                  
						<?php
					break;
					
					case 'cf_price_suffix':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
                     
                     </tr>
						
						<?php
					break;
					
					case 'cf_bedrooms':
						?>
                        
                     <tr>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
						
						<?php
					break;
					
					case 'cf_bathrooms':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
						
						<?php
					break;
					
					case 'cf_garages':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
                  
                  </tr>
						
						<?php
					break;
				
					case 'cf_listing_type':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                  <tr>
                  
                     <td colspan="3">
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p>
                        
                        <?php
								
                        echo '<input type="radio" value="rbutton_none" name="cf_listing_type" id="rbutton_none" onclick="document.getElementById(' . "'" . $custom_field['id'] . '_value' . "'" . ').value=this.value;"';
                        if ( ( $custom_field['default_value'] == "rbutton_none" ) || ( $temp == "rbutton_none" ) ) echo ' checked="checked">'; else echo ' />';
                        echo ' <label for="rbutton_none">None Selected</label> ';
                        
                        echo '<input type="radio" value="rbutton_new_home" name="cf_listing_type" id="rbutton_new_home" onclick="document.getElementById(' . "'" . $custom_field['id'] . '_value' . "'" . ').value=this.value;"';
                        if ( ( $custom_field['default_value'] == "rbutton_new_home" ) || ( $temp == "rbutton_new_home" ) ) echo ' checked="checked">'; else echo ' />';
                        echo ' <label for="rbutton_new_home">New Home</label> ';
                        
                        echo '<input type="radio" value="rbutton_home_sale" name="cf_listing_type" id="rbutton_home_sale" onclick="document.getElementById(' . "'" . $custom_field['id'] . '_value' . "'" . ').value=this.value;"';
                        if ( ( $custom_field['default_value'] == "rbutton_home_sale" ) || ( $temp == "rbutton_home_sale" ) ) echo ' checked="checked">'; else echo ' />';
                        echo ' <label for="rbutton_home_sale">Home for Sale</label> ';
                        
                        echo '<input type="radio" value="rbutton_for_rent" name="cf_listing_type" id="rbutton_for_rent" onclick="document.getElementById(' . "'" . $custom_field['id'] . '_value' . "'" . ').value=this.value;"';
                        if ( ( $custom_field['default_value'] == "rbutton_for_rent" ) || ( $temp == "rbutton_for_rent" ) ) echo ' checked="checked">'; else echo ' />';
                        echo ' <label for="rbutton_for_rent">Apartment for Rent</label> ';
								
                        echo '<input type="radio" value="rbutton_foreclosure" name="cf_listing_type" id="rbutton_foreclosure" onclick="document.getElementById(' . "'" . $custom_field['id'] . '_value' . "'" . ').value=this.value;"';
                        if ( ( $custom_field['default_value'] == "rbutton_foreclosures" ) || ( $temp == "rbutton_foreclosures" ) ) echo ' checked="checked">'; else echo ' />';
                        echo ' <label for="rbutton_foreclosure">Foreclosure</label> ';
								
                        ?>
                        
                        </p>
                        
                        <input name="<?php echo $custom_field['id'] . '_value'; ?>" id="<?php echo $custom_field['id'] . '_value'; ?>" type="hidden" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>"/>
                            
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
							 
                     </td>
                     
                  </tr>
							 
						<?php
					break;
					
					case 'cf_addnl_info':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                   
                   <tr>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
                  
					<?php
					break;
					
					case 'cf_addnl_status':
						?>
                  
	               	<?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
						
					<?php
					break;
					
					case 'cf_addnl_map':
						?>
                  
	               	<?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                     <td>
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
                        <p><input style="width: 100%" name="<?php echo $custom_field['id'] . '_value'; ?>" type="text" value="<?php if ( $temp != "") { echo $temp; } else { echo $custom_field['default_value']; } ?>" /></p>
         
                        <input name="<?php echo $custom_field['id'] . '_noncename'; ?>" id="<?php echo $custom_field['id'] . '_noncename'; ?>" type="hidden" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>"/>
						
                     </td>
                  
                  	</tr>
						
					<?php
					break;

					
				endswitch;
			
			endforeach;
	
	echo'
	
			</tbody>
			
		</table>';
}

function ds_init_custom_fields() {
	
	if ( function_exists('add_meta_box') ) :
		
		add_meta_box( 'new-meta-boxes', 'Theme Custom Fields', 'ds_write_custom_fields', 'post', 'normal', 'high' );
		
	endif;
	
}

function ds_save_custom_fields( $post_id ) {
	
		global $post, $ds_prepare_custom_fields, $ds_custom_field_key;
	
		foreach ( $ds_prepare_custom_fields as $custom_field ) :

			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			
			if ( !wp_verify_nonce( $_POST[$custom_field['id'] . '_noncename'], plugin_basename(__FILE__) ) ) :
			 return $post_id;
			endif;
			
			// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
			// to do anything
			
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
			
			// Check permissions
			if ( 'page' == $_POST['post_type'] ) :
			
				if ( !current_user_can( 'edit_page', $post_id ) ) :
				
					return $post_id;
					
			 	elseif ( !current_user_can( 'edit_post', $post_id ) ) :
				
					return $post_id;
					
				endif;
					
			endif;
			
			// OK, we're authenticated: we need to find and save the data
			
			if ( $custom_field['id'] == $ds_custom_field_key . 'price' ) :
			
				$data = ds_strip_comma($_POST[$custom_field['id'] . '_value']);
				
			else :
			
				$data = $_POST[$custom_field['id'] . '_value'];
			
			endif;
	
			if ( get_post_meta($post_id, $custom_field['id'] . '_value' ) == '') :
			
				add_post_meta($post_id, $custom_field['id'] . '_value', $data, true);
				
			elseif ( $data != get_post_meta($post_id,  $custom_field['id'] . '_value', true) ) :
				
				update_post_meta($post_id, $custom_field['id'] . '_value', $data);
				
			endif;
			
			if ($data == "") :
			
				delete_post_meta($post_id, $custom_field['id'] . '_value', get_post_meta($post_id, $custom_field['id'] . '_value', true));
				
			endif;
		
		endforeach;

}

add_action('admin_menu', 'ds_init_custom_fields');
add_action('save_post', 'ds_save_custom_fields');

?>