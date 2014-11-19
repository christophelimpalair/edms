<?php
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: application/json');

if ( ! isset($_POST["partname"]) || ! isset($_POST["partnum"]) || ! isset($_POST["amount"]) || ! isset($_POST["inventory_cost"]) || ! isset($_POST["retail_cost"]) ) {
	
	/* One or more required inputs aren't set. */
	exit("");

} else {

	/* Bootstrap EDMS and only load database */
	require_once '../../init.php';

	/* Store values */
	$partname = $_POST["partname"];
	$part_number = $_POST["partnum"];
	$amount = $_POST["amount"];
	$inventory_cost = $_POST["inventory_cost"];
	$retail_cost = $_POST["retail_cost"];
	$ordered_date = date('Y/m/d');

	/* Get access to database */
	global $edmsdb;

	try
	{
		/* Prepare insert statement */
		$query = $edmsdb->prepare('INSERT INTO parts (part_name, part_number, cost_inv, cost_retail, ordered_amt, ordered_date) VALUES (:partname, :part_number, :cost_inv, :cost_retail, :ordered_amt, :ordered_date)');

		/* Bind parameters and set data types */
		$query->bindParam(":partname", $partname ,PDO::PARAM_STR );
		$query->bindParam(":part_number", $part_number , PDO::PARAM_STR );
		$query->bindParam(":cost_inv", $inventory_cost , PDO::PARAM_STR );
		$query->bindParam(":cost_retail", $retail_cost , PDO::PARAM_STR );
		$query->bindParam(":ordered_amt", $amount , PDO::PARAM_INT );
		$query->bindParam(":ordered_date", $ordered_date  );

		/* Execute query and check if successful */
		if ( $query->execute() ) {

			/**
			 * Insert was successful
			 * 
			 * Send JSON result back to page
			 */
			$result = array( 
				"success" => "true",
				"message" => "Successfully ordered part!" 
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
				"message" => "There was an error inserting data. Contact system administrator."
			) );

		return false;
	}
}
?>