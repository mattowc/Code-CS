<?php get_header(); ?>
		<div id="content">

			<div id="main">
				<?php while( have_posts() ) : the_post() ?>
					<?php /* Clean meta friendly posts/pages */ ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<h1 class="entry-title"><img src="<?php bloginfo( 'template_url' ); ?>/img/header-start.png" class="page-title-image" /> <em><?php the_title(); ?></em></h1>

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- End entry-content -->

					</div> <!-- End post div -->
				<?php endwhile; ?>

			</div><!-- End main -->
			<?php get_sidebar( ); ?>
		</div> <!-- End content --> 

<?php get_footer(); ?>