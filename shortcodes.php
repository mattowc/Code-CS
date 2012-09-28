<?php
/*
 * Shortcodes that can be used by the user to style their site without needing to code
 *
 * PHP v5
 *
 * @package owc-canyon-sports
 * @author Jon McDonald / One Web Centric <jon@onewebcentric.com>
 * @date 07/23/2012
 * @copyright 2012
 * @see codex.wordpress.org
 */

// One half ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!

function owc_one_half_begin( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

	return '<div class="row"><div class="one-half">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'one_half', 'owc_one_half_begin' );

function owc_one_half_end( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

	return '<div class="one-half right">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'last_half', 'owc_one_half_end' );


// Two thirds ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!
function owc_two_third_begin( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

	return '<div class="row"><div class="two-third">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'two_thirds', 'owc_two_third_begin' );

function owc_one_third_end( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

	return '<div class="one-third right">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'last_one_third', 'owc_one_third_end' );

// Full width ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!
function owc_full_width( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

	return'<div class="row"><div class="full-width">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'full_width', 'owc_full_width' );

// Slider ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!
function owc_slider( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => '',
			'width' => '600px',
			'height' => '200px',
			'images' => ''
		), $atts ) );

	$images = explode(',', $images);
	$return_content = '';
	foreach($images as $image) {
		$return_content .= '<li><img src="' . trim($image) . '" /></li>';
	}

	return '<div class="flexslider"><ul class="slides">' . do_shortcode( $return_content ) . '</ul></div>';
}
add_shortcode( 'owc_slider', 'owc_slider' );

// Call us ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!
function owc_call_us( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => '',
		), $atts ) );

	return '<div class="call-us">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'owc_call', 'owc_call_us' );

// Button ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!
function owc_button_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => '',
			'link' => false
		), $atts ) );

	if( !$link )
		return '<input type="submit" name="submit-owc-button" class="button" value="' . do_shortcode( $content ) . '" />';
	else
		return '<div class="button"><a href="' . $link . '">' . do_shortcode( $content ) . '</a></div>';
}
add_shortcode( 'owc_button', 'owc_button_func' );

// Contact form ------ ------ ------ ------ ------ ------ ------ ------ ------ ------!
function owc_contact_form( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'class' => '',
			'send' => ''
		), $atts ) );

	$return_content = '';

	if( isset( $_POST['submit-owc-button'] ) && wp_verify_nonce( $_POST['owc_contact_form'], 'owc_contact_form' ) ) {
		$to = "jon@onewebcentric.com";
		$subject = 'Message from ' . $_POST['owc-name'] . ' (' . get_bloginfo('name') . ') ' . $_POST['owc-subject'];
		$message = '<h1>Contact form submission</h1>';
		$message .= 'From <em>' . $_POST['owc-name'] . '</em> <' . $_POST['owc-email'] . '>';
		$message .= '<br /><p>';
		$message .= stripslashes($_POST['owc-message']);
		$message .= '</p>';
		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
		wp_mail($to, $subject, $message);
		echo'Sent!';
	}

		$return_content .= '
		<form action="" method="post"> ' . wp_nonce_field('owc_contact_form', 'owc_contact_form') . '
			<div class="contact-form-left-inner">
				<label class="form-labels" id="name">Name: </label><br />
			<input type="text" name="owc-name" /><br />
				<label class="form-labels" id="email">Email: </label><br />
			<input type="text" name="owc-email" /><br />
				<label class="form-labels" id="subject">Subject: </label><br />
			<input type="text" name="owc-subject" />
			</div>
			<div class="contact-form-right-inner">
				<label class="form-labels" id="message">Message: </label><br />
			<textarea name="owc-message"></textarea>
			<br />
			[owc_button]Send[/owc_button]
			</div>
		</form> ';

	return '<div class="contact-form">' . do_shortcode( $return_content ) . '</div>';
}
add_shortcode( 'owc_contact', 'owc_contact_form' );

?>