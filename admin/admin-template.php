<div id="wpbody-content">
	<div class="wrap">
		<?php screen_icon(); echo '<h2>' . __('Theme Options', CS_THEME) . '</h2>' ?>
		<?php if( isset( $message ) ): ?>
			<div>
				<p>
					<strong><?php echo $message; ?></strong>
				</p>
			</div>
		<?php endif; ?>
		<form name="manageThemeOptions" id="manageThemeOptions" method="post" action="">
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div id="owc-top-contact" class="stuffbox">
							<h3>
								<label for="top-contact">Top Contact Info</label>
							</h3>
							<div class="inside">
								<input type="text" name="top-contact" size="30" tabindex="1" value="<?php echo $options['owc_contact']; ?>" id="top-contact" />
								<p>Example would be:  333 Street</p>
							</div>
						</div>
						<div id="owc-footer-contact" class="stuffbox">
							<h3>
								<label for="footer-contact">Footer Contact Info</label>
							</h3>
							<div class="inside">
								<input type="text" name="footer-contact" size="30" tabindex="1" value="<?php echo $options['owc_footer_contact']; ?>" id="top-contact" />
								<p>Example would be:  555 Avenue</p>
							</div>
						</div>
						<div id="owc-copyright-contact" class="stuffbox">
							<h3>
								<label for="footer-copyright">Copyright</label>
							</h3>
							<div class="inside">
								<input type="text" name="footer-copyright" size="30" tabindex="1" value="<?php echo $options['owc_footer_copyright']; ?>" id="top-contact" />
								<p>Example would be:  Design by OWC</p>
							</div>
						</div>
						<div id="owc-copyright-contact" class="stuffbox">
							<h3>
								<label for="save">Save</label>
							</h3>
							<div class="inside">
								<input name="save" type="submit" class="button-primary" id="publish" tabindex="4" accesskey="p" value="Update Theme Options">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>