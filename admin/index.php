<?php
/*
Admin page
*/
$owc_options = array( 'owc_contact' => '',
	'owc_footer_contact' => '',
	'owc_footer_copyright' => 'Design by OWC'
);
add_option('owc_option', $owc_options);

if(isset($_POST['save'])) {
	update_option( 'owc_option', array( 
	'owc_contact' => $_POST['top-contact'],
	'owc_footer_contact' => $_POST['footer-contact'],
	'owc_footer_copyright' => $_POST['footer-copyright']
		) );
}

$options = get_option('owc_option');
$options['owc_contact'] = stripslashes($options['owc_contact']);
$options['owc_footer_contact'] = stripslashes($options['owc_footer_contact']);
$options['owc_footer_copyright'] = stripslashes($options['owc_footer_copyright']);


require_once('admin-template.php');
?>