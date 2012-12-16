<?php

//Color Management Admin Options

$ds_prepare_theme_options1 = array (
	
	array(
		'type' => 'open'
	),
	array(
		'name' => 'Color Management Options',
		'type' => 'options_title'
	),
	array(
		'name' => 'Header Banner Background Color',
		'desc' => '',
		'id' => $ds_theme_key . 'header_banner_bgcolor',
		'type' => 'header_banner_bgcolor',
		'default_value' => '#0c3044'
	),
	array(
		'name' => 'Footer Background Color',
		'desc' => '',
		'id' => $ds_theme_key . 'footer_bgcolor',
		'type' => 'footer_bgcolor',
		'default_value' => '#061F2D'
	),
	array(
		'name' => 'Header Banner Transparent Overlay Image',
		'desc' => '',
		'id' => $ds_theme_key . 'header_overlay',
		'type' => 'header_overlay',
		'default_value' => '1'
	),
	array(
		'name' => 'Footer Transparent Overlay Image',
		'desc' => '',
		'id' => $ds_theme_key . 'footer_overlay',
		'type' => 'footer_overlay',
		'default_value' => '1'
	),
	array(
		'name' => 'Post Title Color',
		'desc' => '',
		'id' => $ds_theme_key . 'post_title_color',
		'type' => 'post_title_color',
		'default_value' => '#0c3044'
	),
	array(
		'name' => 'Price Text Color',
		'desc' => '',
		'id' => $ds_theme_key . 'price_text_color',
		'type' => 'price_text_color',
		'default_value' => '#0c3044'
	),
	array(
		'name' => 'Search Table Header BG Color',
		'desc' => '',
		'id' => $ds_theme_key . 'search_table_bgcolor',
		'type' => 'search_table_bgcolor',
		'default_value' => '#0c3044'
	),
	array(
		'type' => 'close'
	)

);

function ds_write_theme_options1() {

   global $ds_prepare_theme_options1, $ds_theme_key;
	
	?>
	
   <div class="wrap">
   
	<form method="post">
	
	<?php
	
	foreach ($ds_prepare_theme_options1 as $value) :
	
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
			
			case 'header_banner_bgcolor':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<div id="<?php echo $value['id'] . '_cp'; ?>" class="color_picker">
                    
                        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpickerField" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" />
                        
                    	<div style="background-color: <?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?> ;"></div>
                        
                    </div>
            
    	        </li>
            
				<?php
			break;
			
			case 'footer_bgcolor':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<div id="<?php echo $value['id'] . '_cp'; ?>" class="color_picker">
                    
                        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpickerField" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" />
                        
                    	<div style="background-color: <?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?> ;"></div>
                        
                    </div>
            
    	        </li>
            
				<?php
			break;
			
			case 'header_overlay':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
                    <ul class="ds_ul_image_select ds_clear_fix">
                    
                    	<li>
                        
                            <div class="<?php echo $ds_theme_key; ?>header_banner_bgcolor_cp_prev" style="background: <?php ds_ao('header_banner_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-1.png'; ?>) no-repeat 80% 100%;"><label for="hbutton1"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="1" id="hbutton1" name="b_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '1') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
                            </p>
                        
                        </li>
                        
                    	<li>
                        
                        	
                            <div class="<?php echo $ds_theme_key; ?>header_banner_bgcolor_cp_prev" style="width: 100px; height: 100px; background: <?php ds_ao('header_banner_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-2.png'; ?>) no-repeat 10% 100%;"><label for="hbutton2"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="2" id="hbutton2" name="b_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '2') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
                            </p>
                        
                        </li>
                        
                    	<li>
                        
                        	
                            <div class="<?php echo $ds_theme_key; ?>header_banner_bgcolor_cp_prev" style="width: 100px; height: 100px; background: <?php ds_ao('header_banner_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-3.png'; ?>) no-repeat 10% 100%;"><label for="hbutton3"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="3" id="hbutton3" name="b_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '3') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
                            </p>
                        
                        </li>
                        
                    	<li>
                        
                        	
                            <div class="<?php echo $ds_theme_key; ?>header_banner_bgcolor_cp_prev" style="width: 100px; height: 100px; background: <?php ds_ao('header_banner_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-4.png'; ?>) no-repeat 90% 100%;"><label for="hbutton4"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="4" id="hbutton4" name="b_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '4') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
                            </p>
                        
                        </li>
                        
                    	<li>
                        
                        	
                            <div class="<?php echo $ds_theme_key; ?>header_banner_bgcolor_cp_prev" style="width: 100px; height: 100px; background: <?php ds_ao('header_banner_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/banner-overlay-5.png'; ?>) no-repeat 10% 100%;"><label for="hbutton5"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="5" id="hbutton5" name="b_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '5') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
                            </p>
                        
                        </li>
                    
                    </ul>
                            
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != '') : echo get_option( $value['id'] ); else : echo  $value['default_value']; endif; ?>" />
                
	            </li>
                
				<?php
			break;
			
			case 'footer_overlay':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
                    <ul class="ds_ul_image_select ds_clear_fix">
                    
                    	<li>
                        
                            <div class="<?php echo $ds_theme_key; ?>footer_bgcolor_cp_prev" style="background: <?php ds_ao('footer_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/footer-overlay-1.png'; ?>) no-repeat 50% 0%;"><label for="fbutton1"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="1" id="fbutton1" name="f_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '1') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
							</p>                 
                            
                        </li>
                        
                    	<li>
                        
                            <div class="<?php echo $ds_theme_key; ?>footer_bgcolor_cp_prev" style="background: <?php ds_ao('footer_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/footer-overlay-2.png'; ?>) no-repeat 50% 0%;"><label for="fbutton2"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="2" id="fbutton2" name="f_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '2') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
							</p>                 
                            
                        </li>
                        
                    	<li>
                        
                            <div class="<?php echo $ds_theme_key; ?>footer_bgcolor_cp_prev" style="background: <?php ds_ao('footer_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/footer-overlay-3.png'; ?>) no-repeat 55% 0%;"><label for="fbutton3"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="3" id="fbutton3" name="f_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '3') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
							</p>                 
                            
                        </li>
                        
                    	<li>
                        
                            <div class="<?php echo $ds_theme_key; ?>footer_bgcolor_cp_prev" style="background: <?php ds_ao('footer_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/footer-overlay-4.png'; ?>) no-repeat 50% 0%;"><label for="fbutton4"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="4" id="fbutton4" name="f_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '4') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
							</p>                 
                            
                        </li>
                        
                    	<li>
                        
                            <div class="<?php echo $ds_theme_key; ?>footer_bgcolor_cp_prev" style="background: <?php ds_ao('footer_bgcolor'); ?> url(<?php echo get_bloginfo('template_url') . '/images/footer-overlay-5.png'; ?>) no-repeat 50% 0%;"><label for="fbutton5"></label></div>
                            <p>
							<?php
							echo '<input type="radio" value="5" id="fbutton5" name="f_overlay" onclick="document.getElementById(' . "'" . $value['id'] . "'" . ').value=this.value;"';
							if ( get_option($value['id']) == '5') : echo ' checked="checked">'; else : echo ' />'; endif;
                            ?>
							</p>                 
                            
                        </li>
                        
                    </ul>
                            
                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != '') : echo get_option( $value['id'] ); else : echo $value['default_value']; endif; ?>" />
                
	            </li>
                
				<?php
			break;
			
			case 'post_title_color':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<div id="<?php echo $value['id'] . '_cp'; ?>" class="color_picker">
                    
                        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpickerField" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" />
                        
                    	<div style="background-color: <?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?> ;"></div>
                        
                    </div>
            
    	        </li>
            
				<?php
			break;
			
			case 'price_text_color':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<div id="<?php echo $value['id'] . '_cp'; ?>" class="color_picker">
                    
                        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpickerField" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" />
                        
                    	<div style="background-color: <?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?> ;"></div>
                        
                    </div>
            
    	        </li>
            
				<?php
			break;


			case 'search_table_bgcolor':
				?>
            
	            <?php if ( get_option($value['id']) == '' ) : update_option($value['id'], $value['default_value']); endif; ?>
            
				<li>

                    <h3><?php echo $value['name']; ?></h3>
                
                    <p><?php echo $value['desc']; ?></p>
                    
					<div id="<?php echo $value['id'] . '_cp'; ?>" class="color_picker">
                    
                        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpickerField" type="text" value="<?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?>" />
                        
                    	<div style="background-color: <?php echo htmlspecialchars(get_option( $value['id'], $value['default_value']  )); ?> ;"></div>
                        
                    </div>
            
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

function ds_put_theme_options_in_sidebar1() {

    global $ds_prepare_theme_options1;

		if ( $_GET['page'] == basename(__FILE__) ) :
		
			if ( 'save' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options1 as $value ) :
					update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
				endforeach;
			
				foreach ( $ds_prepare_theme_options1 as $value ) :
					if ( isset( $_REQUEST[ $value['id'] ] ) ) :
						update_option( $value['id'], stripslashes_deep($_REQUEST[ $value['id'] ]) );
					else :
						delete_option( $value['id'] );
					endif;
				endforeach;
			
				header('Location: admin.php?page=' . basename(__FILE__) . '&saved=true');
				die;
			
			elseif ( 'reset' == $_REQUEST['action'] ) :
			
				foreach ( $ds_prepare_theme_options1 as $value ) :
					delete_option( $value['id'] );
				endforeach;
			

				header('Location: admin.php?page=' . basename(__FILE__) . '&reset=true');
				die;
			
			endif;
			
		endif;
	
	add_submenu_page( 'functions.php', 'Color Management', 'Color Management', 8, basename(__FILE__), 'ds_write_theme_options1' );
	
}

add_action('admin_menu', 'ds_put_theme_options_in_sidebar1');

?>