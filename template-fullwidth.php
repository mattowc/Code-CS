<?php
/*
Template Name:  Full Width Page
*/
?>
<?php get_header(); ?>
		<div id="content">

			<div id="main" style="width: 100%; border-top: none;">
				<?php while( have_posts() ) : the_post() ?>
					<?php /* Clean meta friendly posts/pages */ ?>
 
					<?php remove_filter('the_content', 'wpautop'); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- End entry-content -->

					</div> <!-- End post div -->
				<?php endwhile; ?>

			</div><!-- End main -->
		</div> <!-- End content --> 

<?php get_footer(); ?>