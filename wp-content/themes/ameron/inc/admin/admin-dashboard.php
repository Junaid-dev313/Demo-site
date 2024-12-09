<?php
/**
* The Ameron_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Ameron_Admin_Dashboard extends Ameron_Admin_Page {

	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = ameron()->get_name();
		$this->menu_title = ameron()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
 
	public function save() {

	}
}
new Ameron_Admin_Dashboard;
