<?php

//Footer Admin Options

$ds_prepare_theme_options4 = array (
	
	array(
		'type' => 'open'
	),
	array(
		'name' => 'Footer Setup',
		'type' => 'options_title'
	),
	array(
		'name' => 'Info Block Left Title',
		'desc' => '',
		'id' => $ds_theme_key . 'info_block_left_title',
		'type' => 'info_block_left_title',
		'default_value' => 'About Us'
	),
	array(
		'name' => 'Info Block Left Content',
		'desc' => '',
		'id' => $ds_theme_key . 'info_block_left_content',
		'type' => 'info_block_left_content',
		'default_value' => ''
	),
	array(
		'name' => 'Info Block Left Link',
		'desc' => 'Link this excerpt information in a page',
		'id' => $ds_theme_key . 'info_block_left_link',
		'type' => 'info_block_left_link',
		'default_value' => ''
	),
	array(
		'name' => 'Twitter Widget',
		'desc' => 'Input your twitter username here',
		'id' => $ds_theme_key . 'twitter_username',
		'type' => 'type_twitter_username',
		'default_value' => ''
	),
	array(
		'name' => 'Flickr Widget',
		'desc' => 'Input your flickr username here, use this tool to <a href="http://idgettr.com/" target="_blank">get your flickr ID</a>',
		'id' => $ds_theme_key . 'flickr_username',
		'type' => 'type_flickr_username',
		'default_value' => ''
	),
	array(
		'name' => '',
		'desc' => '',
		'id' => $ds_theme_key . 'flickr_api_feed',
		'type' => 'flickr_api_feed',
		'default_value' => '0'
	),
	array(
		'name' => '',
		'desc' => 'How many number of images you want to display on the flickr widget',
		'id' => $ds_theme_key . 'flickr_qty',
		'type' => 'type_flickr_qty',
		'default_value' => '20'
	),
	array(
		'name' => 'Footer Copyright',
		'desc' => '',
		'id' => $ds_theme_key . 'footer_copyright',
		'type' => 'footer_copyright',
		'default_value' => '&copy; Copyright 2010 ModernRealtor | <a href="#">Privacy Statement</a> | <a href="#">Terms Of Use</a>'
	),
	array(
		'name' => 'Custom Developer&rsquo;s Name on the Footer.',
		'desc' => 'Display theme name and custom developer name on the footer.',
		'id' => $ds_theme_key . 'custom_dev_enable',
		'type' => 'custom_dev_enable',
		'default_value' => ''
	),
	array(
		'id' => $ds_theme_key . 'custom_dev_name',
		'type' => 'custom_dev_name',
		'default_value' => 'Themespike'
	),
	array(
		'id' => $ds_theme_key . 'custom_dev_link',
		'type' => 'custom_dev_link',
		'default_value' => 'http://www.themespike.com'
	),
	array(
		'type' => 'close'
	)

);

function ds_write_theme_options4() {

   global $ds_prepare_theme_options4;
	
	?>
	
   <div class="wrap">
   
	<form method="post">
	
	<?php
	
	foreach ($ds_prepare_theme_options4 as $value) :
	
		switch ( $value['type'] ) :
	
			case 'open' :
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
			
			case 'info_block_left_title':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'info_block_left_content':
				?>
            
            	<?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
                    <p><textarea name="<?php echo $value['id']; ?>" cols="55" rows="15"><?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?></textarea></p>
            
	            </li>
            
				<?php
			break;
			
			case 'info_block_left_link':
				?>
            
				<?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
                
                <li>
            
                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
                    <?php ds_get_page_list($value['id'], 'Nothing Selected'); ?>
                    
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" />
                
				</li>
                
				<?php
			break;
			
			case 'type_twitter_username':
				?>

				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><label for="<?php echo $value['id']; ?>">Username </label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'type_flickr_username':
				?>

				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><label for="<?php echo $value['id']; ?>">Username </label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>" />
            
				<?php
			break;
			
			case 'flickr_api_feed':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
					<?php
                    
                    echo '<input type="radio" value="0" name="sample" id="rbutton1" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
                    if ( get_option($value['id']) == '0' ) : echo ' checked="checked">'; else : echo ' />'; endif;
                    echo ' <label for="rbutton1">Photostream ID</label> | ';
                    
                    echo '<input type="radio" value="1" name="sample" id="rbutton2" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
                    if ( get_option($value['id']) == '1' ) : echo ' checked="checked">'; else : echo ' />'; endif;
                    echo ' <label for="rbutton2">Group Pool ID</label>';
                
                    ?>
                
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != '') : echo get_option( $value['id'] ); else : echo $value['default_value']; endif; ?>" />
                    
                    </p>
                    
                </li>
                
				<?php
			break;
			
			case 'type_flickr_qty':
				?>
            
            	<?php if ( get_option($value['id']) == "" ) { update_option($value['id'], $value['default_value']); } // If id is empty put the default value in it ?>
            
				<li>

				<h3><?php echo $value['name']; ?></h3>
            
   				<p><?php echo $value['desc']; ?></p>
            
            	<?php
				
				echo '<select name="event-dropdown" onchange="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.options[this.selectedIndex].value;" style="width: 150px">';
				
					echo '<option value="20"'; if (get_option($value['id']) == "20") { echo ' selected="selected">'; } else { echo ' >'; } echo '20</option>';
					echo '<option value="15"'; if (get_option($value['id']) == "15") { echo ' selected="selected">'; } else { echo ' >'; } echo '15</option>';
					echo '<option value="10"'; if (get_option($value['id']) == "10") { echo ' selected="selected">'; } else { echo ' >'; } echo '10</option>';
					echo '<option value="5"'; if (get_option($value['id']) == "5") { echo ' selected="selected">'; } else { echo ' >'; } echo '5</option>';
					
				echo '</select>';
				
				?>
            
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>"/>
                
            </li>
                
				<?php
			break;
			
			case 'footer_copyright':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" style="width: 50em;" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'custom_dev_enable':
				?>
            
            <?php if ( get_option($value['id']) == "" ) { update_option($value['id'], $value['default_value']); } // If id is empty put the default value in it ?>
            
				<li>

				<h3><?php echo $value['name']; ?></h3>
            
	   			<p></p>
            
            <?php
				
				echo '<input type="checkbox" value="check1" name="sample" id="cbutton1" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.checked;"';
				if ( get_option($value['id']) == "true" ) { echo ' checked="checked">'; } else { echo ' />'; }
				echo ' <label for="cbutton1">' . $value['desc'] . '</label>';
		
				?>
            
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>"/>
                
				<?php
			break;
			
			case 'custom_dev_name':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<p><label>Developer Name :</label> <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
				<?php
			break;
			
			case 'custom_dev_link':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<p><label>Developer Website :</label> <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" size="50" /></p>
					
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

function ds_put_theme_options_in_sidebar4() {

    global $ds_prepare_theme_options4;

		if ( $_GET['page'] == basename(__FILE__) ) :
		
			if ( 'save' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options4 as $value ) :
					update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
				endforeach;
			
				foreach ( $ds_prepare_theme_options4 as $value ) :
					if ( isset( $_REQUEST[ $value['id'] ] ) ) :
						update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
					else :
						delete_option( $value['id'] );
					endif;
				endforeach;
			
				header('Location: admin.php?page=' . basename(__FILE__) . '&saved=true');
				die;
			
			elseif ( 'reset' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options4 as $value ) :
					delete_option( $value['id'] );
				endforeach;
			

				header('Location: admin.php?page=' . basename(__FILE__) . '&reset=true');
				die;
			
			endif;
			
		endif;
	
	add_submenu_page( 'functions.php', 'Footer Setup', 'Footer Setup', 8, basename(__FILE__), 'ds_write_theme_options4' );
	
}

add_action('admin_menu', 'ds_put_theme_options_in_sidebar4');

?>