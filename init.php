<?php
/**
 * Elite Dealer Management System (EDMS)
 *
 * Revolutionizing the car dealership industry since 2014.
 * No one saw this coming.
 *
 * @author 	David Lamee 			lameed@email.uscupstate.edu
 * @author 	Christophe Limpalair 	cgl@email.uscupstate.edu
 * @author 	Joel Miller 			jfmiller@email.uscupstate.edu
 * @author 	David Nguyen 			xdtnguyenx@gmail.com
 */

// ------------------------------------------------------------------------

/**
 * This file sets the ABSPATH, checks PHP/MySQL versions, sets error reporting,
 * and loads core files to set up the EDMS environment.  
 */

define( 'ABSPATH' , dirname(__FILE__) . '/' );

/**
 * Application Environment Error Reporting
 *
 * Default:
 *
 * 		development
 * 		production
 *
 * Development shows all errors.
 * Production hides all errors
 */
define( 'ENVIRONMENT' , 'development' );

switch(ENVIRONMENT)
{
	case 'development':
		error_reporting(E_ALL);
		break;
	case 'production':
	default:
		error_reporting(0);
}

/**
 * EDMS Version
 *
 * @global string $edms_version
 */
$edms_version = "1.0.0";

/**
 * Required PHP Version for EDMS to run
 * @var string $required_php_version
 */
$required_php_version = "5.2.4";

/**
 * Required MySQL Version for EDMS to run
 * @var string $required_mysql_version
 */
$required_mysql_version = "5.0";


// ------------------------------------------------------------------------

// ** Check versions before loading core files ** //

// Server PHP version
$php_version = phpversion();

if ( version_compare( $required_php_version, $php_version, '>' ) ) {
	die( sprintf( "Your server is running PHP version %s but EDMS requires version %s to work." , $php_version, $required_php_version ) );
}

if ( ! extension_loaded( 'mysql' ) || ! extension_loaded( 'pdo' ) ) {
	die( "Your PHP installation seems to be missing MySQL extensions. This is required for EDMS to work." );
}

// ** Version checks complete. Ready to load core files ** //

// ------------------------------------------------------------------------

/* Check document root for database config file */
if ( file_exists( $_SERVER["DOCUMENT_ROOT"] . 'edms-config.php' ) ) {
	/* Includes database config and security keys */
	require( $_SERVER["DOCUMENT_ROOT"] . 'edms-config.php' );
} else {
	/* Missing config file. Bail */
	die( "Missing core file: edms-config.php. Contact system administrator" );
}

if ( file_exists(ABSPATH . 'functions/functions.php') ) {
	/* Includes basic EDMS functions necessary for pages to load */
	require_once(ABSPATH . 'functions/functions.php');
} else {
	/* Missing file. Bail */
	die( "Missing core file: functions.php. Please contact system administrator." );
}

/* That's it for init. Happy coding! */