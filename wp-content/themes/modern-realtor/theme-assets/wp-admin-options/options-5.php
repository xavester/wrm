<?php

//Logo Admin Options

$ds_prepare_theme_options5 = array (
	
	array(
		'type' => 'open'
	),
	array(
		'name' => 'Logo Setup',
		'type' => 'options_title1'
	),
	array(
		'name' => 'Header Logo',
		'desc' => 'Place the file URL/address of your logo here. You can use your <a href="upload.php" target"_blank">media library</a> for this',
		'id' => $ds_theme_key . 'header_logo',
		'type' => 'type_header_logo',
		'default_value' => get_bloginfo('template_url') . '/images/logo-header.png'
	),
	array(
		'name' => 'Header Logo Dimensions (in pixels)',
		'desc' => 'Width',
		'id' => $ds_theme_key . 'header_logo_width',
		'type' => 'type_header_logo_width',
		'default_value' => '197'
	),
	array(
		'name' => '',
		'desc' => 'Height',
		'id' => $ds_theme_key . 'header_logo_height',
		'type' => 'type_header_logo_height',
		'default_value' => '44'
	),
	array(
		'name' => 'Masthead Height',
		'desc' => 'Adjust the masthead height to accommodate the height of your logo',
		'id' => $ds_theme_key . 'masthead_height',
		'type' => 'type_masthead_height',
		'default_value' => '123'
	),
	array(
		'name' => 'Footer Logo',
		'desc' => 'Place the file URL/address of your logo here. You can use your <a href="upload.php" target"_blank">media library</a> for this',
		'id' => $ds_theme_key . 'footer_logo',
		'type' => 'type_footer_logo',
		'default_value' => get_bloginfo('template_url') . '/images/logo-footer.png'
	),
	array(
		'name' => 'Footer Logo Dimensions (in pixels)',
		'desc' => 'Width',
		'id' => $ds_theme_key . 'footer_logo_width',
		'type' => 'type_footer_logo_width',
		'default_value' => '200'
	),
	array(
		'name' => '',
		'desc' => 'Height',
		'id' => $ds_theme_key . 'footer_logo_height',
		'type' => 'type_footer_logo_height',
		'default_value' => '48'
	),
	array(
		'type' => 'close'
	)

);

function ds_write_theme_options5() {

   global $ds_prepare_theme_options5;
	
	?>
	
   <div class="wrap">
   
	<form method="post">
	
	<?php
	
	foreach ($ds_prepare_theme_options5 as $value) :
	
		switch ( $value['type'] ) :
	
			case 'open' :
				?><ul class="ds_admin">
            
	            <?php

				if ( $_REQUEST['reset'] ) echo '<li><div id="message" class="updated fade"><p><strong>Settings Reset.</strong></p></div></li>';
				if ( $_REQUEST['saved'] ) echo '<li><div id="message" class="updated fade"><p><strong>Settings Saved.</strong></p></div></li>';
				
				?>
            
				<?php
			break;
			
			case 'options_title1':
				?>
				<li>
					<div class="icon32" id="icon-options-general"><br/></div>
                    <h2><?php echo $value['name']; ?></h2>
	            </li>
				<?php
			break;
			
			case 'type_header_logo':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p>
                        Your current header logo: <br />
                        <img src="<?php echo get_option($value['id']); ?>" class="logo_preview" />
                    </p>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><input size="100" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
            	</li>
            
				<?php
			break;
			
			case 'type_header_logo_width':
				?>
            
	            <li>
            
		            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
    
                    <h3><?php echo $value['name']; ?></h3>
                    
                    <p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label> <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
				<?php
			break;
			
			case 'type_header_logo_height':
				?>
            
		            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                    <p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label> <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
	            </li>
            
				<?php
			break;
			
			case 'type_masthead_height':
				?>
            
                <li>
                
		            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
                    
                    <h3><?php echo $value['name']; ?></h3>
                    
                    <p><?php echo $value['desc']; ?></p>
                    
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'type_footer_logo':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

					<h3><?php echo $value['name']; ?></h3>
            
                    <p>
                        Your current footer logo: <br />
                        <img src="<?php echo get_option($value['id']); ?>" class="logo_preview" />
                    </p>
            
		   			<p><?php echo $value['desc']; ?></p>
            
                    <p><input size="100" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
	            </li>
            
				<?php
			break;
			
			case 'type_footer_logo_width':
				?>
            
	            <li>
            
		            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
    
                    <h3><?php echo $value['name']; ?></h3>
                    
                    <p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label> <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
				<?php
			break;
			
			case 'type_footer_logo_height':
				?>
            
		            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
                    <p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label> <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
            
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

function ds_put_theme_options_in_sidebar5() {

    global $ds_prepare_theme_options5;

		if ( $_GET['page'] == basename(__FILE__) ) :
		
			if ( 'save' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options5 as $value ) :
					update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
				endforeach;
			
				foreach ( $ds_prepare_theme_options5 as $value ) :
					if ( isset( $_REQUEST[ $value['id'] ] ) ) :
						update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
					else :
						delete_option( $value['id'] );
					endif;
				endforeach;
			
				header('Location: admin.php?page=' . basename(__FILE__) . '&saved=true');
				die;
			
			elseif ( 'reset' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options5 as $value ) :
					delete_option( $value['id'] );
				endforeach;
			

				header('Location: admin.php?page=' . basename(__FILE__) . '&reset=true');
				die;
			
			endif;
			
		endif;
	
	add_submenu_page( 'functions.php', 'Logo Setup', 'Logo Setup', 8, basename(__FILE__), 'ds_write_theme_options5' );
	
}

add_action('admin_menu', 'ds_put_theme_options_in_sidebar5');

?>