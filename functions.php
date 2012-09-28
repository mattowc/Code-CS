<?php
/*
 *  Jonathon McDonald
 *  
 *  Structure: 
 *  
 *  I.  Theme Constants
 *  II.  Translation
 *  III.  Shortcodes
 *  IV.  Template hooks
 *  V.  Misc. 
 *  VI.  Sidebars
 *  VII.  Menus
 *  VIII.  Admin
 */

/*
 * I. Theme constants
 */ 
define('CS_THEME', 'canyon-sports');
define('CS_PATH', get_template_directory_uri() );


/*
 * II. Translation
 */
//load_theme_textdomain( CS_THEME, CS_TEMPL_PATH . '/languages' );

//Load a language file if it exists
/*
$locale = get_locale();
$locale_file = CS_TEMPL_PATH . "/languages/$locale.php";
if( is_readable( $locale_file ) ) 
	require_once( $locale_file );
*/

/*
 * III.  Shortcodes
 */
include_once('shortcodes.php');

/*
 * IV. Template Hooks
 */
include_once('template-hooks.php');

/*
 * V. Misc
 */

//Simple function to get the page number if needed or wanted
function get_page_number() {
	if( get_query_var('paged') ) {
		print ' | ' . __('Page', CS_THEME ) . get_query_var('paged');
	}
}

function get_owc_option( $arg ) {
	$options = get_option('owc_option');
	return stripslashes( $options[$arg] );
}
/*
 * VI.  Sidebars
 */ 
register_sidebar( array('name' => __('Page Sidebar'), 'id' => 'page-sidebar'));
register_sidebar( array('name' => __('Biomechanics Sidebar'), 'id' => 'bio-sidebar'));
register_sidebar( array('name' => __('Physical Therapy Sidebar'), 'id' => 'physical-sidebar'));

/*
 * VII.  Menus
 */ 
//Initiate the original menus
$menus = array(
		'main_top' => __('Main Navigation'),
		'main_side' => __('Main Side Navigation'),
		'footer_menu' => __('Footer Menu')
	);

register_nav_menus( $menus );

//Function for the main navigation
function owc_main_top() {
	$args = array(
			'theme_location' => 'main_top',
			'menu_id' => 'top-navigation-left'
		);

	$return_list = '<ul id="top-navigation-left" class="menu">';

	if( has_nav_menu('main_top') ) {

		//Get a list of navigation menus
		$locations = get_nav_menu_locations();

		//Create an object for the menu we want
		$test = wp_get_nav_menu_object($locations['main_top']);

		//Get the menu items
		$menu_items = wp_get_nav_menu_items($test->term_id);

		//First to check if any of the pages are the current page
		$current = '';
		foreach( $menu_items as $item ) {
			$title = $item->title;
			if( is_page( $title ) )
				$current = $title;
		}

		//Counter item, if there's no current page defined, then we'll highlight the first item
		$counter = 0;

		//Loop through each items again now styling accordingly
		foreach( $menu_items as $item ) {
			$title = $item->title;
			if( $current == '' && $counter == 0 ) {
				$return_list .= '<li id="menu-item-' . $item->ID . '" class="current_page_item"><a href="' . $item->url . '">' . $item->title . '</a></li>';
			} elseif ( $current == $item->title ) {
				$return_list .= '<li id="menu-item-' . $item->ID . '" class="current_page_item"><a href="' . $item->url . '">' . $item->title . '</a></li>';
			} else {
				$return_list .= '<li id="menu-item-' . $item->ID . '"><a href="' . $item->url . '">' . $item->title . '</a></li>';
			}

			$counter++;
		}

		//Echo our return list
		$return_list .= '</ul>';
		echo $return_list;
	}
}

//Function for the navigation on top with less emphasis
function owc_main_top_light() {
	$args = array(
			'theme_location' => 'main_side',
			'menu_id' => 'light-navigation'
		);
	if( has_nav_menu('main_side') )
		wp_nav_menu( $args );
}

//Function for the bottom navigation
function owc_footer_menu() {
	$args = array(
			'theme_location' => 'footer_menu',
			'menu_id' => 'bottom_navigation'
		);
	if( has_nav_menu('footer_menu') )
		wp_nav_menu( $args );
}

/*
 * VIII. Admin
 */
function owc_register_settings() {
	register_setting( 'owc_theme_options', 'owc_options', 'owc_validate');
}
add_action( 'admin_init', 'owc_register_settings' );


function owc_menu() {
	add_theme_page( 'OWC Theme Options', 'Manage OWC Theme', 'edit_theme_options', 'owc_options', 'owc_options_page' );
}

add_action( 'admin_menu', 'owc_menu' );

function owc_options_page() {
	require_once('admin/index.php');
}

add_action('wp_enqueue_scripts', 'add_my_script'); 
function add_my_script() {

	wp_enqueue_style( 
		'slider-css',
		get_template_directory_uri() . '/js/flexslider.css'
	);

	wp_enqueue_script(
		'slider',
		get_template_directory_uri() . '/js/jquery.flexslider.js',
		array( 'jquery' )
	);

}

add_action('wp_head', 'add_custom_script');
function add_custom_script() {
	?>
	<script type="text/javascript">
	jQuery(window).load(function() {
    	jQuery('.flexslider').flexslider({
    		itemWidth: 600,
    		slideshow: true
    	});
  	});
	</script>
	<?php
}


?>