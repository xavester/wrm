<!-- Slideshow -->
<?php
			
	$imgwidth = 700;
	$imgwidthportrait = 365;
	$imgheight = 425;
    if (function_exists('get_attachments_by_media_tags')) {
	    $logos = array(get_post_thumbnail_id());
	    $logos_find = get_attachments_by_media_tags('media_tags=logo&');
			if ($logos_find) {
				foreach ($logos_find as $logo) {
					array_push($logos, $logo->ID);
				}
			}
    }
    
	$args_old = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'numberposts' => -1,
        'post_status' => null,
        'post_parent' => $post->ID,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'exclude' => $logos 
    );
    $args = array(
        'post_type' => 'post',
        'numberposts' => -1,
        'post_status' => null,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'category' => ds_get_ao('featured_cat')
    );
    
    $attachments = get_posts($args);
    
    if (count($attachments) >= 1) {
    echo '<!-- more than one -->';
        $l=1;
    echo '<!--';
    #echo ds_get_cf('excerpt_image');
    #print_r($attachments);
    echo '-->';
	?> <div class="flexslider-container">
		<div class="flexslider">
			<ul class="slides">
	        
	      <?php  if (has_post_thumbnail()) { 
                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), $imgwidth.'x'.$imgheight);
				echo "<li>\n";
					#echo "\t".'<a href="#">';			
						echo '<img src="' .$image_url[0].'" alt="" />';
					#echo "</a>\n";
					#echo "\t".'<p class="flex-caption">'.get_the_title().'</p>';
				echo "\n</li>\n";
             };
	            
				foreach ( $attachments as $attachment ):
					#echo '<!--' . $attachment->ID . ' = ' . get_post_thumbnail_id($attachment->ID) . '-->';
					$image_id = get_post_thumbnail_id($attachment->ID);
					$image_src = wp_get_attachment_image_src($image_id,'medium');
					$image_url = $image_src[0];
					$image_w = $image_src[1];
					$image_h = $image_src[2];
					
					/*if ($image_w > $image_h) {*/
						if ($l == 2) {
							// we've had one portrait already
							echo '</li> <!-- close portrait -->' . "\n";
							$l=1;
						}
						$image_land = wp_get_attachment_image_src($image_id,$imgwidth.'x'.$imgheight);
						#echo "<li class=\"landscape\">\n";
							echo "<li>\n";
								#echo "\t".'<a href="#">';			
									echo '<img src="' . $image_land[0] . '" alt="' . get_the_title() . '" width="' .  $image_land[1] . '" height="'.  $image_land[2] .'"/>' . "\n";
								#echo "</a>\n";
								#echo "\t".'<p class="flex-caption">'.get_the_title().'</p>';
						echo "\n</li>\n";
					/*} else {
						$image_port = wp_get_attachment_image_src($image_id,$imgwidthportrait.'x'.$imgheight);
						if ($l == 1) { 
							echo "<li class=\"portrait\">\n";
								#echo "\t".'<a href="#">';
									echo '<img src="' . $image_port[0] . '" alt="' . get_the_title() . '" width="' .  $image_port[1] . '" height="'.  $image_port[2] .'"/>' . "\n";
								#echo "</a>\n";
							$l=2;
						} else { 
							// we've had one portrait already
								#echo "\t".'<a href="#">';
									echo '<img src="' . $image_port[0] . '" alt="' . get_the_title() . '" width="' .  $image_port[1] . '" height="'.  $image_port[2] .'"/>' . "\n";
								#echo "</a>\n";
							echo '</li> <!-- close .portrait -->' . "\n";
							$l=1;
						}
					
					}*/
					
				endforeach;
				if ($l == 2) {
					// we've had one portrait already
					echo '</li> <!-- end portrait -->';
					$l=1;
				}?>
				</ul>
			</div>
		</div> <!-- end .flexslider-container -->


	<?php } else {
		echo '<!-- only one -->';
		if (has_post_thumbnail()) { 
            $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), $imgwidth.'x'.$imgheight);
			#echo "<li>\n";
				#echo "\t".'<a href="#">';			
					echo '<img src="' .$image_url[0].'" alt="" class="noslider"/>';
				#echo "</a>\n";
				#echo "\t".'<p class="flex-caption">'.get_the_title().'</p>';
			#echo "\n</li>\n";
         };
		
    };

	wp_reset_query();
?>
<!-- end Slideshow -->