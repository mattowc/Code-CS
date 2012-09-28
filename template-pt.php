<?php
/*
Template Name:  Physical Therapy Page
*/
?>
<?php get_header(); ?>
		<div id="content">

			<div id="main">

				<?php while( have_posts() ) : the_post() ?>
					<?php /* Clean meta friendly posts/pages */ ?>
 
					<?php remove_filter('the_content', 'wpautop'); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><img src="<?php bloginfo( 'template_url' ); ?>/img/header-start.png" class="page-title-image" /> <em><?php the_title(); ?></em></h1>
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- End entry-content -->

					</div> <!-- End post div -->
				<?php endwhile; ?>

			</div><!-- End main -->
			<div id="sidebar">
				<ul class="sidebar">
					<?php dynamic_sidebar( 'physical-sidebar' ); ?>
				</ul>
			</div>
		</div> <!-- End content --> 

<?php get_footer(); ?>