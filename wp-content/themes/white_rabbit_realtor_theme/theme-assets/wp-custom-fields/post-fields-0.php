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
		'name' => 'Featured In',
		'desc' => 'Featured in: i.e. Skins, Casualty, Hello magazine',
		'id' => $ds_custom_field_key . 'addnl_featured',
		'type' => 'cf_addnl_featuredin',
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
				
					case 'cf_listing_type':
						?>
                  
	               <?php $temp = get_post_meta($post->ID, $custom_field['id'] . '_value', true); ?>
                  
                  <tr>
                  
                     <td colspan="3">
		
                        <p><strong><?php echo $custom_field['name']; ?></strong></p>
                        
                        <p><?php echo $custom_field['desc']; ?></p>
                        
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
					
					case 'cf_addnl_featuredin':
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
		
		add_meta_box( 'new-meta-boxes', 'White Rabbit Custom Fields', 'ds_write_custom_fields', 'post', 'normal', 'high' );
		
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