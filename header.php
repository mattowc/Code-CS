<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml11-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<title>
		<?php
		if( is_single() ) { single_post_title(); }
		elseif( is_home() || is_front_page() ) { bloginfo('name');  }
		elseif( is_search() ) { bloginfo('name'); print' | Search results for ' . wp_specialchars( $s ); }
		elseif( is_page() ) { single_post_title(); }
		elseif( is_404() ) { bloginfo('name'); print" | Oops, we can't find that page!";}
		else { bloginfo('name'); }
		?>
	</title>
	

	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?> charset=<?php bloginfo('charset'); ?>" />

	<!-- Get the styles -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body>
	<div id="outter">
	<div id="top-navigation">
				<?php owc_main_top(); ?>
				<?php owc_main_top_light(); ?>
	</div> <!-- End top-navigation -->
	</div>

	<div id="container">

		<header>

			<div id="title">
				<img src="<?php bloginfo( 'template_url' ); ?>/img/title-box.png" id="title-logo" /><h1><?php bloginfo('name') ?></h1> 
				<h2><?php bloginfo( 'description' ); ?></h2>
			</div> <!-- End title -->

			<div id="contact">
				<em><?php echo get_owc_option('owc_contact'); ?></em>
			</div> <!-- End contact -->

		</header> <!-- End header -->


