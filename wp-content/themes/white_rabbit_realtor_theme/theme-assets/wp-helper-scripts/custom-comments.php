<?php 

function newtheme_comment($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment; ?>
   
    <li id="li-comment-<?php comment_ID() ?>" class="comment_wraper" >
    
        <div id="comment-<?php comment_ID(); ?>" class="comment_main" >
        
            <div class="comment_author vcard clear_fix">
        
                <?php echo get_avatar($comment,$size='32',$default= get_bloginfo('template_url') . '/images/avatar-default.png' ); ?>
                <?php printf(__('<p class="comment_name"><span class="comment_fn">%s</span> <span class="comment_says">says:</span></p>'), get_comment_author_link()) ?>
                <div class="comment_meta">
                	<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
                    </a>
					<?php edit_comment_link(__('[edit]'),' ','') ?>
                </div>
            
            </div>
            
            <div class="comment_body">
            
                <?php comment_text() ?>
            
            </div>
            
            <?php if ($comment->comment_approved == '0') : ?>
            <p class="awaiting_moderation"><?php _e('Your comment is awaiting moderation.') ?></p>
            <?php endif; ?>
            
            <div class="comment_reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            
		</div>
     
<?php
	}
?>
