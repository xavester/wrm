<?php

//Featured Admin Options

$ds_prepare_theme_options3 = array (
	
	array(
		'type' => 'open'
	),
	array(
		'name' => 'Featured Locations Banner',
		'type' => 'options_title'
	),
	array(
		'name' => 'Select Locations Category',
		'desc' => 'Select a category on this list to be featured',
		'id' => $ds_theme_key . 'featured_cat',
		'type' => 'type_featured_cat',
		'default_value' => 'None Selected'
	),
	array(
		'name' => '',
		'desc' => 'How many posts do you want to be featured?',
		'id' => $ds_theme_key . 'feat_quantity',
		'type' => 'type_feat_quantity',
		'default_value' => '7'
	),
	array(
		'name' => 'Featured Media Banner',
		'type' => 'options_title'
	),
	array(
		'name' => 'Select Media Category',
		'desc' => 'Select a category on this list to be featured',
		'id' => $ds_theme_key . 'featured_media_cat',
		'type' => 'type_featured_media_cat',
		'default_value' => 'None Selected'
	),
	array(
		'name' => '',
		'desc' => 'How many posts do you want to be featured?',
		'id' => $ds_theme_key . 'feat_media_quantity',
		'type' => 'type_feat_media_quantity',
		'default_value' => '7'
	),
	array(
		'type' => 'close'
	)

);

function ds_write_theme_options3() {

   global $ds_prepare_theme_options3;
	
	?>
	
   <div class="wrap">
   
	<form method="post">
	
	<?php
	
	foreach ($ds_prepare_theme_options3 as $value) :
	
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
			
			case 'type_featured_cat':
				?>
            
            <?php if ( get_option($value['id']) == "" ) { update_option($value['id'], $value['default_value']); } // If id is empty put the default value in it ?>
            
            <li>

				<h3><?php echo $value['name']; ?></h3>
            
   			<p><?php echo $value['desc']; ?></p>
            
				<?php ds_get_category_list($value['id'], $value['default_value']); ?>
                
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>"/>
            
            </li>
                
				<?php
			break;
			
			case 'type_feat_quantity':
				?>
            
            <?php if ( get_option($value['id']) == "" ) { update_option($value['id'], $value['default_value']); } // If id is empty put the default value in it ?>
            
				<li>

				<h3><?php echo $value['name']; ?></h3>
            
   			<p><?php echo $value['desc']; ?></p>
            
            <?php
				
				echo '<select name="event-dropdown" onchange="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.options[this.selectedIndex].value;" style="width: 150px">';
				
					echo '<option value="8"'; if (get_option($value['id']) == "8") { echo ' selected="selected">'; } else { echo ' >'; } echo '8</option>';
					echo '<option value="7"'; if (get_option($value['id']) == "7") { echo ' selected="selected">'; } else { echo ' >'; } echo '7</option>';
					echo '<option value="6"'; if (get_option($value['id']) == "6") { echo ' selected="selected">'; } else { echo ' >'; } echo '6</option>';
					echo '<option value="5"'; if (get_option($value['id']) == "5") { echo ' selected="selected">'; } else { echo ' >'; } echo '5</option>';
					echo '<option value="7"'; if (get_option($value['id']) == "4") { echo ' selected="selected">'; } else { echo ' >'; } echo '4</option>';
					echo '<option value="3"'; if (get_option($value['id']) == "3") { echo ' selected="selected">'; } else { echo ' >'; } echo '3</option>';
					echo '<option value="2"'; if (get_option($value['id']) == "2") { echo ' selected="selected">'; } else { echo ' >'; } echo '2</option>';
					echo '<option value="1"'; if (get_option($value['id']) == "1") { echo ' selected="selected">'; } else { echo ' >'; } echo '1</option>';
					
				echo '</select>';
				
				?>
            
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>"/>
                
            </li>
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
			
			case 'type_featured_media_cat':
				?>
            
            <?php if ( get_option($value['id']) == "" ) { update_option($value['id'], $value['default_value']); } // If id is empty put the default value in it ?>
            
            <li>

				<h3><?php echo $value['name']; ?></h3>
            
   			<p><?php echo $value['desc']; ?></p>
            
				<?php ds_get_category_list($value['id'], $value['default_value']); ?>
                
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>"/>
            
            </li>
                
				<?php
			break;
			
			case 'type_feat_media_quantity':
				?>
            
            <?php if ( get_option($value['id']) == "" ) { update_option($value['id'], $value['default_value']); } // If id is empty put the default value in it ?>
            
				<li>

				<h3><?php echo $value['name']; ?></h3>
            
   			<p><?php echo $value['desc']; ?></p>
            
            <?php
				
				echo '<select name="event-dropdown" onchange="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.options[this.selectedIndex].value;" style="width: 150px">';
				
					echo '<option value="8"'; if (get_option($value['id']) == "8") { echo ' selected="selected">'; } else { echo ' >'; } echo '8</option>';
					echo '<option value="7"'; if (get_option($value['id']) == "7") { echo ' selected="selected">'; } else { echo ' >'; } echo '7</option>';
					echo '<option value="6"'; if (get_option($value['id']) == "6") { echo ' selected="selected">'; } else { echo ' >'; } echo '6</option>';
					echo '<option value="5"'; if (get_option($value['id']) == "5") { echo ' selected="selected">'; } else { echo ' >'; } echo '5</option>';
					echo '<option value="7"'; if (get_option($value['id']) == "4") { echo ' selected="selected">'; } else { echo ' >'; } echo '4</option>';
					echo '<option value="3"'; if (get_option($value['id']) == "3") { echo ' selected="selected">'; } else { echo ' >'; } echo '3</option>';
					echo '<option value="2"'; if (get_option($value['id']) == "2") { echo ' selected="selected">'; } else { echo ' >'; } echo '2</option>';
					echo '<option value="1"'; if (get_option($value['id']) == "1") { echo ' selected="selected">'; } else { echo ' >'; } echo '1</option>';
					
				echo '</select>';
				
				?>
            
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default_value']; } ?>"/>
                
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

function ds_put_theme_options_in_sidebar3() {

    global $ds_prepare_theme_options3;

		if ( $_GET['page'] == basename(__FILE__) ) :
		
			if ( 'save' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options3 as $value ) :
					update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
				endforeach;
			
				foreach ( $ds_prepare_theme_options3 as $value ) :
					if ( isset( $_REQUEST[ $value['id'] ] ) ) :
						update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
					else :
						delete_option( $value['id'] );
					endif;
				endforeach;
			
				header('Location: admin.php?page=' . basename(__FILE__) . '&saved=true');
				die;
			
			elseif ( 'reset' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options3 as $value ) :
					delete_option( $value['id'] );
				endforeach;
			

				header('Location: admin.php?page=' . basename(__FILE__) . '&reset=true');
				die;
			
			endif;
			
		endif;
	
	add_submenu_page( 'functions.php', 'Feature Banners', 'Feature Banners', 8, basename(__FILE__), 'ds_write_theme_options3' );
	
}

add_action('admin_menu', 'ds_put_theme_options_in_sidebar3');

?>