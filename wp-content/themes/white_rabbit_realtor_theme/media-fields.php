<div id="media_listings">
  	
	<div id="media_listings_overlay">
   
    <ul class="clear_fix">
         <li>
	
			<?php
            $media_category = array(
             'id' => 'media_cat_list',
             'default_value' => 'Please Select',
            )
            ?>
         
			<p>Why Use Us</p>
			
			<select class="postform" id="questions" name="questions" onchange="location.href = document.getElementById('questions').value;">>
			<option selected="selected" value="-1"><?php echo esc_attr($media_category['default_value']); ?></option>
			<?php
			$post;
			$myposts = query_posts('cat='.ds_get_ao('cat_ms1_id').'&orderby=title');
			foreach($myposts as $post) :
			?>
			<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
			<?php endforeach; ?> 
		</select>
         
         </li>
		<!--<li>
			
			<p>Lights, camera, action!</p>
             
				<select class="postform" id="lca" name="lca" onchange="location.href = document.getElementById('lca').value;">>
				<option selected="selected" value="-1">
				
				<?php echo esc_attr($media_category['default_value']); ?></option>
				<?php
				$post;
				$myposts = query_posts('cat='.ds_get_ao('cat_ms2_id').'&orderby=date');
				foreach($myposts as $post) :
				?>
				<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
				<?php endforeach; ?> 
			</select>
			
         </li>-->
		
		<li>
			<p>What We Do</p>
          
				<select class="postform" id="bfa" name="bfa" onchange="location.href = document.getElementById('bfa').value;">>
				<option selected="selected" value="-1"><?php echo esc_attr($media_category['default_value']); ?></option>
				<?php
				$post;
				$myposts = query_posts('cat='.ds_get_ao('cat_ms3_id').'&orderby=date');
				foreach($myposts as $post) :
				?>
				<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
				<?php endforeach; ?> 
			</select>

         </li>

				<li>
					<p>Published Work</p>
		
					 <select class="postform" id="mag" name="mag" onchange="location.href = document.getElementById('mag').value;">>
					<option selected="selected" value="-1"><?php echo esc_attr($media_category['default_value']); ?></option>
					<?php
					$post;
					$myposts = query_posts('cat='.ds_get_ao('cat_ms4_id').'&orderby=date');
					foreach($myposts as $post) :
					?>
					<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
					<?php endforeach; ?> 
				</select>
		   </li>
    </ul>
    </div>
	<?php wp_reset_query(); ?> 
</div>