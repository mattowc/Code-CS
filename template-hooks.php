<?php
/*
 * Template hooks that are called from the template
 *
 * PHP v5
 *
 * @package owc-canyon-sports
 * @author Jon McDonald / One Web Centric <jon@onewebcentric.com>
 * @date 07/23/2012
 * @copyright 2012
 * @see codex.wordpress.org
 */

/**
 * Called to display the title of the site with the first letter adding emphasis
 */
function owc_fancy_title() {

	$site_title       =  get_bloginfo( 'name' );
	$prep_site_title  =  explode( " ", $site_title );
	$return_title     =  '';

	foreach( $prep_site_title as $word ) {
		$return_title .= '<span class="site-title">' . $word . ' </span>';
	}

	echo $return_title;
}

//Add the hook owc_fancy_title
add_action( 'owc_fancy_title', 'owc_fancy_title' );
?>