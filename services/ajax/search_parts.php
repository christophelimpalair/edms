<?php
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: application/json');

if ( ! isset($_POST["value"]) ) {
	
	/* One or more required inputs aren't set. */
	exit("");

} else {

	/* Bootstrap EDMS and only load database */
	require_once '../../init.php';

	/* Store values */
	$id = $_POST["value"];

	/* Get access to database */
	global $edmsdb;

	try
	{
		/* Prepare select statement */
	    if ( $id === "all" ) :

	    	// Query for all parts
	    	$query = $edmsdb->prepare('SELECT part_name, part_number, stock_amt, cost_inv, cost_retail FROM parts');
	    
	    else :
	    
	    	// Query for a specific part
			$query = $edmsdb->prepare('SELECT part_name, part_number, stock_amt, cost_inv, cost_retail FROM parts WHERE id = :id');
			
			// Bind parameters and set data types
			$query->bindParam(":id", $id ,PDO::PARAM_INT );
		
		endif;


		/* Execute query and check if successful */
		if ( $query->execute() ) {

			$partsInfo = array();

			foreach ( $query->fetchAll() as $parts ) {
				$partsInfo["part_name"] = $parts["part_name"];
				$partsInfo["part_number"] = $parts["part_number"];
				$partsInfo["stock_amt"] = $parts["stock_amt"];
				$partsInfo["cost_inv"] = $parts["cost_inv"];
				$partsInfo["cost_retail"] = $parts["cost_retail"];
			}
			/**
			 * Lookup was successful
			 * 
			 * Send JSON result back to page
			 */
			$result = array( 
				"success" => "true",
				"parts" => $partsInfo
			);

			echo json_encode($result);

			return true;
		}

	} 
	catch (PDOException $e)
	{
		echo json_encode(
			array(
				"success" => "false",
				"message" => "There was an error selecting data. Contact system administrator."
			) );

		return false;
	}
}
?>