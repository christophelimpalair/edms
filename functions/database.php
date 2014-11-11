<?php
/**
 * This file controls database interactions 
 * and sets global $edmsdb
 */

global $edmsdb;

// $edmsdb = new Database( DB_USER, DB_PASS, DB_NAME, DB_HOST );

try
{
	$edmsdb = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
	$edmsdb->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $e)
{
	exit( 'PDO Error: ' . $e->getMessage() );
}

?>