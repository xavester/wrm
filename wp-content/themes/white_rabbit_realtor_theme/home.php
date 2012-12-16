<?php
/**
 * Template Name: home_page.
 *
 * A custom page template - home page - do not edit unless changes to paths are needed.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage White_Rabbit_Realtor_Theme
 * @since White_Rabbit_Realtor_Theme 1.0
 */

get_header(); ?>

<div class="glm"><a href="http://golm.org.uk/" title="Link to the Guild of Location Managers">
				<img src="/wp-content/uploads/GLM-logo-2010-AFFILIATE.png" alt="the Guild of Location Managers" width="115" height="90">
			</a></div>

</div>
<!-- end : header -->

<!-- begin: home content -->
<div id="content" class="clear_fix">
	<!-- begin: column_left -->
	<div id="column_left" class="column_left_home clear_fix">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="entry-content">
						
						<div class="sub_block"><?php the_content(); ?></div>

					</div><!-- .entry-content -->
					
				</div><!-- #post-## -->
				
				<?php if ( get_edit_post_link() ) : ?><p id="single_page_edit"><a href="<?php echo get_edit_post_link(); ?>" class="png_fix fx_button_hover post-edit-link"><span class="hide_this">Edit this entry</span></a></p><?php endif; ?>

<?php endwhile; ?>
			</div><!-- #column_left -->
		</div><!-- #container -->
		
<div class="clear"></div>

<?php get_footer(); ?>
