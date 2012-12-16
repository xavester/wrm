<?php

//Contact Form Admin Options

$ds_prepare_theme_options2 = array (
	
	array(
		'type' => 'open'
	),
	array(
		'name' => 'Contact Form Configuration',
		'type' => 'options_title'
	),
	array(
		'name' => 'Default Email Recipient',
		'desc' => '',
		'id' => $ds_theme_key . 'email_recipient',
		'type' => 'type_email_recipient',
		'default_value' => get_option('admin_email')
	),
	array(
		'name' => 'Email Thank You Header',
		'desc' => '',
		'id' => $ds_theme_key . 'email_thankyou_header',
		'type' => 'type_email_thankyou_header',
		'default_value' => 'Message Sent!'
	),
	array(
		'name' => 'Email Thank You Message',
		'desc' => '',
		'id' => $ds_theme_key . 'email_thankyou_message',
		'type' => 'type_email_thankyou_message',
		'default_value' => 'Thank you for taking the time to contact us. We value your opinions and appreciate your concerns. A customer service representative will be contacting you soon.'
	),
	array(
		'name' => 'Email Message Sending Failed Header',
		'desc' => '',
		'id' => $ds_theme_key . 'email_failed_header',
		'type' => 'type_email_failed_header',
		'default_value' => 'Message Sending Failed!'
	),
	array(
		'type' => 'close'
	)

);

function ds_write_theme_options2() {

   global $ds_prepare_theme_options2;
	
	?>
	
   <div class="wrap">
   
	<form method="post">
	
	<?php
	
	foreach ($ds_prepare_theme_options2 as $value) :
	
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
			
			case 'type_email_recipient':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" style="width: 200px;" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'type_email_thankyou_header':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
                
                </li>
            
				<?php
			break;
			
			case 'type_email_thankyou_message':
				?>
            
            	<?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><textarea name="<?php echo $value['id']; ?>" cols="55" rows="8"><?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?></textarea></p>
            
	            </li>
            
				<?php
			break;
			
			case 'type_email_failed_header':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                
                    <p><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" /></p>
                
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

function ds_put_theme_options_in_sidebar2() {

    global $ds_prepare_theme_options2;

		if ( $_GET['page'] == basename(__FILE__) ) :
		
			if ( 'save' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options2 as $value ) :
					update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
				endforeach;
			
				foreach ( $ds_prepare_theme_options2 as $value ) :
					if ( isset( $_REQUEST[ $value['id'] ] ) ) :
						update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
					else :
						delete_option( $value['id'] );
					endif;
				endforeach;
			
				header('Location: admin.php?page=' . basename(__FILE__) . '&saved=true');
				die;
			
			elseif ( 'reset' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options2 as $value ) :
					delete_option( $value['id'] );
				endforeach;
			

				header('Location: admin.php?page=' . basename(__FILE__) . '&reset=true');
				die;
			
			endif;
			
		endif;
	
	add_submenu_page( 'functions.php', 'Contact Form Configuration', 'Contact Form Config', 8, basename(__FILE__), 'ds_write_theme_options2' );
	
}

add_action('admin_menu', 'ds_put_theme_options_in_sidebar2');

?>