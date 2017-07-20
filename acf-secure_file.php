<?php

/*
Plugin Name: Advanced Custom Fields: Secure File
Plugin URI: https://www.demotic.co.uk/
Description: Extends the standard File field to handle secure files
Version: 1.0.0
Author: Ben Fleming
Author URI: https://www.demotic.co.uk/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_secure_file') ) :

class acf_plugin_secure_file {
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	06/04/2017
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// vars
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// set text domain
		// https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
		load_plugin_textdomain( 'acf-secure_file', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field_types')); // v5
		//add_action('acf/register_fields', 		array($this, 'include_field_types')); // v4
		
	}
	
	
	/*
	*  include_field_types
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	06/04/2017
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	n/a
	*/
	
	function include_field_types() {
		
		include_once('fields/acf-secure_file-v5.php');
		
	}
	
}


// initialize
new acf_plugin_secure_file();


// class_exists check
endif;
	
?>