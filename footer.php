		<footer>

			<div id="bottom-navigation">
				<?php owc_footer_menu(); ?>
			</div> <!-- End bottom-navigation -->

			<div id="bottom-anchor">

				<span id="bottom-contact">
					<em><?php echo get_owc_option( 'owc_footer_contact' ); ?></em>
				</span>
				<br />
				<span id="bottom-copyright">
					<?php echo get_owc_option( 'owc_footer_copyright' ); ?>
				</span>

			</div> <!-- End bottom-anchor -->

		</footer><!-- End footer -->

	</div> <!-- End container -->
	<?php wp_footer(); ?>
</body>