<?php get_header(); ?>
		<div id="content">

			<div id="main">
				<?php while( have_posts() ) : the_post() ?>
					<?php /* Clean meta friendly posts/pages */ ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<h1 class="entry-title"><em><?php the_title(); ?></em></h1>

						<div class="entry-meta">
							<span class="meta-prep meta-prep-author"><?php _E( 'By ', CS_THEME ); ?></span>
							<span class="author vcard"><a class="author-url" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('user_nicename'); ?></a></span>
							<span class="meta-sep"> | </span>
							<span class="meta-prep meta-prep-entry-date"><?php _e('Published on ', CS_THEME ); ?></span>
							<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
						</div><!-- End entry-meta -->

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- End entry-content -->

						<div class="entry-utility">
							<?php _e( 'Posted in', CS_THEME ); ?> <?php echo get_the_category_list( ', ' ); ?> | <?php comments_popup_link( __('Leave a comment', CS_THEME), __('1 comment', CS_THEME), __('% comments', CS_THEME) ); ?>
						</div>
					</div> <!-- End post div -->
				<?php endwhile; ?>

			</div><!-- End main -->
			<?php get_sidebar( ); ?>
		</div> <!-- End content --> 

<?php get_footer(); ?>