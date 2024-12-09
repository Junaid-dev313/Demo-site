<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Ameron_Admin_Templates extends Ameron_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'ameron' ),
		    esc_html__( 'Templates', 'ameron' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Ameron_Admin_Templates;
