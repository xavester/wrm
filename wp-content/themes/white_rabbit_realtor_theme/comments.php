<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) : ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	endif;
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

    <div class="comment_section">
   
		<h3 id="comments" class="comment_section_title font_harabara"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to <?php the_title(); ?></h3>
      
        <ol class="commentlist">
        <?php wp_list_comments('callback=newtheme_comment'); ?>
        </ol>
        
        <?php if (function_exists('wp_commentnavi')) : wp_commentnavi(); endif; ?>
   
   </div>
   
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		

	<?php endif; ?>
   
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond" class="clear_fix">

   <h3 class="font_harabara"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
   <div class="cancel-comment-reply"> <small><?php cancel_comment_reply_link(); ?></small> </div>
   
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	   <p class="respond_status">You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
   <?php else : ?>
   
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
   
	<?php if ( is_user_logged_in() ) : ?>
   
   	<p class="respond_status">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
      
   <?php else : ?>
   
      <p class="respond_info">The comments are moderated and rel="nofollow" is in use. Please no link dropping, no keywords or domains as names; do not spam, and please do not advertise.</p>
      <p class="field_name">
		<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
        <label for="author"><small>Name (required)</small></label>
      </p>
      <p class="field_email">
        <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
        <label for="email"><small>Mail (will not be published) (required)</small></label>
      </p>
      <p class="field_website">
        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
        <label for="url"><small>Website</small></label>
      </p>
      
	<?php endif; ?>
      
      <p class="respond_info"><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>
      
      <p class="textarea_comment">
         <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
      </p>
      <p class="respond_button">
         <button name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" >
            Submit
         </button> 
			<?php comment_id_fields(); ?>
      </p>
      
      <?php do_action('comment_form', $post->ID); ?>

   </form>
   
	<?php endif; // If registration required and not logged in ?>

</div>
   
<?php endif; ?>
