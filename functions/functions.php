<?php if ( ! defined('ABSPATH')) exit('No direct script access allowed');
/**
 * This file includes common functions and variables and loads EDMS class files.
 */

function get_name() {
	echo "Elite Dealer Management System";
}

function get_shortname() {
	echo "EDMS";
}

/**
 *	Create a page id using the loaded file's name
 *
 *	Example: index.php creates id of index
 *
 *	@return id name
 */
function page_id() {
	return basename($_SERVER['PHP_SELF'], ".php");
}

/**
 *	Is current loaded page the specified page?
 *
 *	@param string $page 
 *	@return boolean
 */
function is_page( $page = '' ) {
	if ( page_id() === (string) $page )
		return true;

	return false;
}

function get_template_part( $path = null, $name = '', $ext = ".php" ) {
	$name = (string) $name;

	$file = $path . '/' . $name . $ext;

	if ( file_exists( $file ) )
		require $file;
	else
		echo "Included file: '" . $file . "'' does not exist";
}

function get_navbar() {
	get_template_part( "../functions" , "navbar" );
}

/* Don't load file if global database variable is already set */
if ( ! isset( $edmsdb ) )
	/* Includes database class and sets $edmsdb global */
	include 'database.php';

?>