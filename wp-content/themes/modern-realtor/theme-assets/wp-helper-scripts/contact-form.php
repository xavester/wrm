<?php

/* Contact Form
/* ----------------------------------------------*/

function contact_form_handler($atts) {
	
	extract( shortcode_atts( array(
      'mailto' => ds_get_ao('email_recipient'),
   ), $atts ) );

	return '<div id="form_result2"></div>
	
	<form action="' . get_bloginfo('template_url') . '/theme-assets/php/contact-processor.php" method="post" id="contact_form">
	
	<ul class="clear_fix">
		<li id="id_name_holder">
		   <label for="id_name2">Name : </label>
		   <span class="bg_input_text"><input type="text" id="id_name2" name="input_name" /></span>
		</li>
	
		<li id="id_email_holder">
		   <label for="id_email2">Email : </label>
		   <span class="bg_input_text"><input type="text" id="id_email2" name="input_email" /></span>
		</li>
		
		<li id="id_subject_holder">
		   <label for="id_subject2">Subject : </label>
		   <span class="bg_input_text"><input type="text" id="id_subject2" name="input_subject" /></span>
		</li>
		
		<li  id="id_message_holder" >
		   <label for="id_message2">Message : </label>
		   <span class="bg_textarea"><textarea id="id_message2" name="textarea_message" rows="" cols="" ></textarea></span>
		</li>
		
		<li id="id_send_holder" >
			<button type="submit" id="id_send2" name="button_send" >
			  <span>Send</span>
			</button>
			<input type="hidden" name="input_admin_email" value="' . esc_attr($mailto) . '" />
			<input type="hidden" name="email_thankyou_header" value="' . ds_get_ao('email_thankyou_header') . '" />
			<input type="hidden" name="email_thankyou_message" value="' . ds_get_ao('email_thankyou_message') . '" />
			<input type="hidden" name="email_failed_header" value="' . ds_get_ao('email_failed_header') . '" />
		</li>
	</ul>
	
	</form>';

}

add_shortcode('contact-form', 'contact_form_handler');

?>